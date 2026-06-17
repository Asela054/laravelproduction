<?php

namespace App\Http\Controllers\MaterialGRN;

use App\Http\Controllers\Controller;
use App\Models\MaterialGrn;
use App\Models\MaterialGrnReturn;
use App\Models\MaterialGrnReturnDetail;
use App\Models\MaterialStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterialGrnReturnController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('privilege:12')->only(['index', 'getData', 'show', 'listGrns', 'grnDetails', 'pdf']);
    //     $this->middleware('privilege:12,add')->only(['store']);
    //     $this->middleware('privilege:12,edit')->only(['confirm']);
    //     $this->middleware('privilege:12,delete')->only(['destroy']);
    // }

    // Index 
    public function index()
    {
        return view('materialgrnreturn.index');
    }

    // get data
    public function getData()
    {
        $data = MaterialGrnReturn::with([
            'user:idtbl_user,name',
            'materialGrn:idtbl_material_grn,grn_number,batchno',
            'location:idtbl_locations,locationname',
        ])
            ->where('status', 1)
            ->orderByDesc('idtbl_material_grn_return')
            ->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function listGrns()
    {
        $grns = MaterialGrn::with('supplierPOrder:idtbl_supplier_porder,order_number')
            ->where('status', 1)
            ->where('confirm_status', 1)         
            ->orderByDesc('idtbl_material_grn')
            ->get(['idtbl_material_grn', 'grn_number', 'batchno',
                   'tbl_supplier_porder_idtbl_supplier_porder',
                   'tbl_location_idtbl_location']);

        $payload = $grns->map(fn($g) => [
            'id'      => $g->idtbl_material_grn,
            'label'   => $g->grn_number,
            'batchno' => $g->batchno ?? '',
        ])->values();

        return response()->json($payload);
    }

    public function grnDetails($id)
    {
        $grn = MaterialGrn::with([
            'details' => fn($q) => $q->where('status', 1),
            'details.material:idtbl_material_info,materialname,materialinfocode',
            'location:idtbl_locations,locationname',
        ])->findOrFail($id);

        // Sum already-returned qty per material for this GRN (status=1 = active row,
        // regardless of confirm_status, since pending returns also reserve stock once submitted)
        $alreadyReturned = MaterialGrnReturnDetail::where('status', 1)
            ->whereHas('materialGrnReturn', function ($q) use ($id) {
                $q->where('tbl_material_grn_idtbl_material_grn', $id)
                ->where('status', 1);
            })
            ->selectRaw('tbl_material_info_idtbl_material_info as material_id, SUM(qty) as returned_qty')
            ->groupBy('tbl_material_info_idtbl_material_info')
            ->pluck('returned_qty', 'material_id');

        $details = $grn->details->map(function ($d) use ($alreadyReturned) {
            $grnQty     = (float) $d->qty;
            $returnedQty = (float) ($alreadyReturned[$d->tbl_material_info_idtbl_material_info] ?? 0);
            $remainingQty = max(0, $grnQty - $returnedQty);

            return [
                'material_id'    => $d->tbl_material_info_idtbl_material_info,
                'material_name'  => $d->material->materialname     ?? '',
                'material_code'  => $d->material->materialinfocode ?? '',
                'unitprice'      => (float) $d->unitprice,
                'grn_qty'        => $grnQty,
                'returned_qty'   => $returnedQty,
                'remaining_qty'  => $remainingQty,
            ];
        })->values();

        return response()->json([
            'grn' => [
                'id'           => $grn->idtbl_material_grn,
                'grn_number'   => $grn->grn_number,
                'batchno'      => $grn->batchno ?? '',
                'location_id'  => $grn->tbl_location_idtbl_location,
                'location_name'=> optional($grn->location)->locationname ?? '',
            ],
            'details' => $details,
        ]);
    }

    // GRN return number
    public function nextReturnNumber()
    {
        return response()->json([
            'return_number' => MaterialGrnReturn::generateReturnNumber(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date'                   => ['required', 'date'],
            'grn_id'                 => ['required', 'integer'],
            'reason'                 => ['required', 'string', 'max:1000'],
            'total'                  => ['required', 'numeric'],
            'nettotal'               => ['required', 'numeric'],
            'details'                => ['required', 'array', 'min:1'],
            'details.*.material_id'  => ['required', 'integer'],
            'details.*.qty'          => ['required', 'numeric', 'min:0'],
            'details.*.unitprice'    => ['required', 'numeric'],
            'details.*.total'        => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $payload = $validator->validated();

        // Filter out rows with zero return qty
        $lines = collect($payload['details'])->filter(fn($d) => (float) $d['qty'] > 0)->values();
        if ($lines->isEmpty()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => ['details' => ['At least one material must have a return quantity greater than zero.']],
            ], 422);
        }

        $userId = Auth::id();
        $grn    = MaterialGrn::with(['location', 'details' => fn($q) => $q->where('status', 1)])
            ->findOrFail($payload['grn_id']);

        // Validate against remaining returnable qty per material
        $grnQtyMap = $grn->details->keyBy('tbl_material_info_idtbl_material_info')
            ->map(fn($d) => (float) $d->qty);

        $alreadyReturned = MaterialGrnReturnDetail::where('status', 1)
            ->whereHas('materialGrnReturn', function ($q) use ($payload) {
                $q->where('tbl_material_grn_idtbl_material_grn', $payload['grn_id'])
                ->where('status', 1);
            })
            ->selectRaw('tbl_material_info_idtbl_material_info as material_id, SUM(qty) as returned_qty')
            ->groupBy('tbl_material_info_idtbl_material_info')
            ->pluck('returned_qty', 'material_id');

        $qtyErrors = [];
        foreach ($lines as $line) {
            $matId       = $line['material_id'];
            $grnQty      = (float) ($grnQtyMap[$matId] ?? 0);
            $returnedQty = (float) ($alreadyReturned[$matId] ?? 0);
            $remainingQty = max(0, $grnQty - $returnedQty);

            if ((float) $line['qty'] > $remainingQty) {
                $qtyErrors[] = "Material ID {$matId}: requested return qty ({$line['qty']}) exceeds "
                    . "remaining returnable qty ({$remainingQty}).";
            }
        }

        if (!empty($qtyErrors)) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => ['details' => $qtyErrors],
            ], 422);
        }

        $return = DB::transaction(function () use ($payload, $lines, $userId, $grn) {

            $return = MaterialGrnReturn::create([
                'date'                                   => $payload['date'],
                'batchno'                                => $grn->batchno,
                'reason'                                 => $payload['reason'],
                'total'                                  => $payload['total'],
                'nettotal'                               => $payload['nettotal'],
                'status'                                 => 1,
                'confirm_status'                         => 0,
                'insertdatetime'                         => now(),
                'updatedatetime'                         => now(),
                'tbl_user_idtbl_user'                    => $userId,
                'tbl_material_grn_idtbl_material_grn'   => $grn->idtbl_material_grn,
                'tbl_location_idtbl_location'            => $grn->tbl_location_idtbl_location,
            ]);

            foreach ($lines as $detail) {
                MaterialGrnReturnDetail::create([
                    'qty'                                               => $detail['qty'],
                    'unitprice'                                         => $detail['unitprice'],
                    'total'                                             => $detail['total'],
                    'status'                                            => 1,
                    'insertdatetime'                                    => now(),
                    'updatedatetime'                                    => now(),
                    'tbl_user_idtbl_user'                               => $userId,
                    'tbl_material_grn_return_idtbl_material_grn_return' => $return->idtbl_material_grn_return,
                    'tbl_material_info_idtbl_material_info'             => $detail['material_id'],
                ]);
            }

            return $return;
        });

        return response()->json([
            'message' => 'Material GRN Return created',
            'id'      => $return->idtbl_material_grn_return,
        ], 201);
    }


    // Delete
    public function destroy($id)
    {
        $return = MaterialGrnReturn::findOrFail($id);

        if ((int) $return->confirm_status === 1) {
            return response()->json(['message' => 'Cannot delete a confirmed GRN Return'], 409);
        }

        DB::transaction(function () use ($return) {
            $return->details()->update([
                'status'         => 0,
                'updatedatetime' => now(),
            ]);

            $return->update([
                'status'         => 0,
                'updatedatetime' => now(),
            ]);
        });

        return response()->json(['message' => 'Material GRN Return deleted']);
    }

    // Show detail (for view modal)
    public function show($id)
    {
        $return = MaterialGrnReturn::with([
            'materialGrn:idtbl_material_grn,grn_number,batchno',
            'details.material:idtbl_material_info,materialname,materialinfocode',
            'location:idtbl_locations,locationname',
            'user:idtbl_user,name',
        ])->findOrFail($id);

        if ((int) $return->status === 0) {
            return response()->json(['message' => 'GRN Return not found'], 404);
        }

        $grnDetails = collect();
        if ($return->materialGrn) {
            $grnDetails = $return->materialGrn
                ->details()
                ->where('status', 1)
                ->get()
                ->keyBy('tbl_material_info_idtbl_material_info');
        }

        $details = $return->details->map(function ($d) use ($grnDetails) {
            $grnQty    = (float) ($grnDetails[$d->tbl_material_info_idtbl_material_info]->qty ?? 0);
            $returnQty = (float) $d->qty;

            return [
                'material_name' => $d->material->materialname     ?? '-',
                'material_code' => $d->material->materialinfocode ?? '-',
                'unitprice'     => (float) $d->unitprice,
                'grn_qty'       => $grnQty,
                'return_qty'    => $returnQty,
                'total'         => (float) $d->total,
            ];
        });

        return response()->json([
            'return_number'  => $return->return_number,
            'date'           => $return->date,
            'grn_number'     => optional($return->materialGrn)->grn_number,
            'batchno'        => $return->batchno,
            'location'       => optional($return->location)->locationname,
            'reason'         => $return->reason,
            'total'          => (float) $return->total,
            'nettotal'       => (float) $return->nettotal,
            'confirm_status' => (int) $return->confirm_status,
            'details'        => $details,
        ]);
    }

    public function confirm($id)
    {
        $userId = Auth::id();
        $return = MaterialGrnReturn::with('details', 'materialGrn')->findOrFail($id);

        if ((int) $return->status === 0) {
            return response()->json(['message' => 'Cannot confirm a deleted GRN Return'], 409);
        }

        if ((int) $return->confirm_status === 1) {
            return response()->json(['message' => 'GRN Return already confirmed'], 409);
        }

        $errors = [];

        DB::transaction(function () use ($return, $userId, &$errors) {
            foreach ($return->details as $detail) {
                $materialId = $detail->tbl_material_info_idtbl_material_info;
                $returnQty  = (float) $detail->qty;
                $batchno    = $return->batchno;
                $locationId = $return->tbl_location_idtbl_location;

                // Find matching stock rows ordered oldest first (FIFO deduction)
                $stockRows = MaterialStock::where('tbl_material_info_idtbl_material_info', $materialId)
                    ->where('tbl_location_idtbl_location', $locationId)
                    ->where('batchno', $batchno)
                    ->where('status', 1)
                    ->where('qty', '>', 0)
                    ->orderBy('idtbl_material_stock')
                    ->lockForUpdate()
                    ->get();

                $availableTotal = $stockRows->sum('qty');

                if ($availableTotal < $returnQty) {
                    $errors[] = "Insufficient stock for material ID {$materialId} "
                            . "(available: {$availableTotal}, returning: {$returnQty}).";
                    return; // abort transaction via exception below
                }

                // Deduct FIFO
                $remaining = $returnQty;
                foreach ($stockRows as $stock) {
                    if ($remaining <= 0) break;

                    if ($stock->qty <= $remaining) {
                        $remaining  -= $stock->qty;
                        $stock->qty  = 0;
                    } else {
                        $stock->qty -= $remaining;
                        $remaining   = 0;
                    }

                    $stock->updatedatetime = now();
                    $stock->updateuser     = $userId;
                    $stock->save();
                }
            }

            if (!empty($errors)) return;

            $return->update([
                'confirm_status'     => 1,
                'updatedatetime'     => now(),
                'tbl_user_idtbl_user'=> $userId,
            ]);
        });

        if (!empty($errors)) {
            return response()->json([
                'message' => 'Confirmation failed due to insufficient stock.',
                'errors'  => $errors,
            ], 409);
        }

        return response()->json(['message' => 'Material GRN Return confirmed and stock deducted']);
    }

    // Print view 
    public function pdf($id)
    {
        $return = MaterialGrnReturn::with([
            'materialGrn:idtbl_material_grn,grn_number,batchno',
            'details.material:idtbl_material_info,materialname,materialinfocode',
            'location:idtbl_locations,locationname',
            'user:idtbl_user,name',
        ])->findOrFail($id);

        $grnDetails = collect();
        if ($return->materialGrn) {
            $grnDetails = $return->materialGrn
                ->details()
                ->where('status', 1)
                ->get()
                ->keyBy('tbl_material_info_idtbl_material_info');
        }

        $details = $return->details->map(function ($d) use ($grnDetails) {
            $grnQty = (float) ($grnDetails[$d->tbl_material_info_idtbl_material_info]->qty ?? 0);
            return (object) [
                'material_name' => $d->material->materialname     ?? '-',
                'material_code' => $d->material->materialinfocode ?? '-',
                'unitprice'     => $d->unitprice,
                'grn_qty'       => $grnQty,
                'return_qty'    => (float) $d->qty,
                'total'         => $d->total,
            ];
        });

        return view('materialgrnreturn.print', compact('return', 'details'));
    }
}