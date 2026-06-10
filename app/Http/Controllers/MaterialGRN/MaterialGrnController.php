<?php

namespace App\Http\Controllers\MaterialGRN;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\MaterialGrn;
use App\Models\MaterialGrnDetail;
use App\Models\MaterialStock;
use App\Models\SupplierPOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterialGrnController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('privilege:12')->only(['index', 'getData', 'show', 'listSupplierPOrders', 'supplierPOrderDetails', 'pdf']);
    //     $this->middleware('privilege:12,add')->only(['store']);
    //     $this->middleware('privilege:12,edit')->only(['confirm']);
    //     $this->middleware('privilege:12,delete')->only(['destroy']);
    // }

    // ── Index ────────────────────────────────────────────────────────────
    public function index()
    {
        $locations = Location::select(['idtbl_locations', 'locationname'])
            ->where('status', 1)
            ->get();

        return view('materialgrn.index', compact('locations'));
    }

    // ── DataTable feed ───────────────────────────────────────────────────
    public function getData()
    {
        $data = MaterialGrn::with([
            'user:idtbl_user,name',
            'supplierPOrder',
            'supplierPOrder.suppliers:idtbl_supplier,suppliername',
            'location:idtbl_locations,locationname',
        ])->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    // ── List open SPOs for AJAX dropdown ────────────────────────────────
    public function listSupplierPOrders()
    {
        $orders = SupplierPOrder::with('suppliers:idtbl_supplier,suppliername')
            ->where('status', 1)
            ->where('confirmstatus', 1)           // must be confirmed
            ->where(function ($q) {
                $q->whereNull('grnissuestatus')->orWhere('grnissuestatus', 0);
            })
            ->orderByDesc('idtbl_supplier_porder')
            ->get(['idtbl_supplier_porder', 'order_number', 'tbl_supplier_idtbl_supplier']);

        $payload = $orders->map(fn($o) => [
            'id'    => $o->idtbl_supplier_porder,
            'label' => ($o->order_number ?? ('SPO-' . $o->idtbl_supplier_porder))
                       . ($o->suppliers ? ' — ' . $o->suppliers->suppliername : ''),
        ])->values();

        return response()->json($payload);
    }

    // ── SPO header + line details for GRN creation form ─────────────────
    public function supplierPOrderDetails($id)
    {
        $order = SupplierPOrder::with([
            'details' => fn($q) => $q->where('status', 1),
            'details.material:idtbl_material_info,materialname,materialinfocode,unitperctn',
            'suppliers:idtbl_supplier,suppliername',
        ])->findOrFail($id);

        $details = $order->details->map(fn($d) => [
            'material_id'   => $d->tbl_material_info_idtbl_material_info,
            'material_name' => $d->material->materialname        ?? '',
            'material_code' => $d->material->materialinfocode    ?? '',
            'unitprice'     => (float) $d->unitprice,
            'ordered_qty'   => (float) $d->qty,
            'total'         => (float) $d->total,
        ])->values();

        return response()->json([
            'order' => [
                'id'       => $order->idtbl_supplier_porder,
                'number'   => $order->order_number,
                'supplier' => $order->suppliers->suppliername ?? null,
                'vat_rate' => (float) ($order->vatpre ?? 0),
            ],
            'details' => $details,
        ]);
    }

    public function nextGrnNumber()
    {
        return response()->json(['grn_number' => MaterialGrn::generateGrnNumber()]);
    }

    // ── Store new Material GRN ───────────────────────────────────────────
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date'                   => ['required', 'date'],
            'invoicenum'             => ['required', 'string', 'max:255'],
            'dispatchnum'            => ['required', 'string', 'max:255'],
            'location_id'            => ['required', 'integer'],
            'supplier_porder_id'     => ['required', 'integer'],
            'total'                  => ['required', 'numeric'],
            'vatamount'              => ['required', 'numeric'],
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
        $userId  = Auth::id();

        $grn = DB::transaction(function () use ($payload, $userId) {
            $grn = MaterialGrn::create([
                'date'                                     => $payload['date'],
                'invoicenum'                               => $payload['invoicenum'],
                'dispatchnum'                              => $payload['dispatchnum'],
                'total'                                    => $payload['total'],
                'vatamount'                                => $payload['vatamount'],
                'nettotal'                                 => $payload['nettotal'],
                'status'                                   => 1,
                'confirm_status'                           => 0,
                'insertdatetime'                           => now(),
                'updatedatetime'                           => now(),
                'tbl_user_idtbl_user'                      => $userId,
                'tbl_supplier_porder_idtbl_supplier_porder'=> $payload['supplier_porder_id'],
                'tbl_location_idtbl_location'              => $payload['location_id'],
            ]);


            foreach ($payload['details'] as $detail) {
                MaterialGrnDetail::create([
                    'qty'                                   => $detail['qty'],
                    'unitprice'                             => $detail['unitprice'],
                    'total'                                 => $detail['total'],
                    'status'                                => 1,
                    'insertdatetime'                        => now(),
                    'updatedatetime'                        => now(),
                    'tbl_user_idtbl_user'                   => $userId,
                    'tbl_material_grn_idtbl_material_grn'   => $grn->idtbl_material_grn,
                    'tbl_material_info_idtbl_material_info' => $detail['material_id'],
                ]);
            }

            // Mark SPO as GRN issued
            SupplierPOrder::where('idtbl_supplier_porder', $payload['supplier_porder_id'])
                ->update(['grnissuestatus' => 1]);

            return $grn;
        });

        return response()->json([
            'message' => 'Material GRN created',
            'id'      => $grn->idtbl_material_grn,
        ], 201);
    }

    public function destroy($id)
    {
        $grn = MaterialGrn::findOrFail($id);

        if ((int) $grn->confirm_status === 1) {
            return response()->json(['message' => 'Cannot delete a confirmed GRN'], 409);
        }

        DB::transaction(function () use ($grn) {
            // Reopen the SPO
            SupplierPOrder::where('idtbl_supplier_porder',
                $grn->tbl_supplier_porder_idtbl_supplier_porder)
                ->update(['grnissuestatus' => 0]);

            $grn->details()->delete();
            $grn->delete();
        });

        return response()->json(['message' => 'Material GRN deleted']);
    }

    // ── Show GRN detail lines (for view modal) ───────────────────────────
    public function show($id)
    {
        $grn = MaterialGrn::with([
            'supplierPOrder',
            'supplierPOrder.suppliers:idtbl_supplier,suppliername',
            'details.material:idtbl_material_info,materialname,materialinfocode',
            'location:idtbl_locations,locationname',
            'user:idtbl_user,name',
        ])->findOrFail($id);

        // Attach ordered_qty from SPO for comparison display
        $spoDetails = collect();
        if ($grn->supplierPOrder) {
            $spoDetails = $grn->supplierPOrder->details()
                ->where('status', 1)
                ->get()
                ->keyBy('tbl_material_info_idtbl_material_info');
        }

        $details = $grn->details->map(function ($d) use ($spoDetails) {
            $ordered = (float) ($spoDetails[$d->tbl_material_info_idtbl_material_info]->qty ?? 0);
            $received = (float) $d->qty;

            if ($ordered <= 0) {
                $qtyStatus = 'unknown';
            } elseif ($received < $ordered) {
                $qtyStatus = 'short';
            } elseif ($received > $ordered) {
                $qtyStatus = 'over';
            } else {
                $qtyStatus = 'exact';
            }

            return [
                'material_name' => $d->material->materialname     ?? '-',
                'material_code' => $d->material->materialinfocode ?? '-',
                'unitprice'     => (float) $d->unitprice,
                'ordered_qty'   => $ordered,
                'received_qty'  => $received,
                'qty_status'    => $qtyStatus,
                'total'         => (float) $d->total,
            ];
        });

        return response()->json([
            'grn_number'     => $grn->grn_number,
            'date'           => $grn->date,
            'invoicenum'     => $grn->invoicenum,
            'dispatchnum'    => $grn->dispatchnum,
            'batchno'        => $grn->batchno,
            'supplier'       => optional($grn->supplierPOrder?->suppliers)->suppliername,
            'spo_number'     => $grn->supplierPOrder?->order_number,
            'location'       => optional($grn->location)->locationname,
            'total'          => (float) $grn->total,
            'vatamount'      => (float) $grn->vatamount,
            'nettotal'       => (float) $grn->nettotal,
            'confirm_status' => (int) $grn->confirm_status,
            'details'        => $details,
        ]);
    }

    // ── Confirm GRN → push to tbl_material_stock ────────────────────────
    public function confirm($id)
    {
        $userId = Auth::id();
        $grn    = MaterialGrn::with('details')->findOrFail($id);

        if ((int) $grn->confirm_status === 1) {
            return response()->json(['message' => 'GRN already confirmed'], 409);
        }

        DB::transaction(function () use ($grn, $userId) {
            foreach ($grn->details as $detail) {
                MaterialStock::create([
                    'batchno'                               => $grn->batchno,
                    'qty'                                   => $detail->qty,
                    'unitprice'                             => $detail->unitprice,
                    'status'                                => 1,
                    'insertdatetime'                        => now(),
                    'updateuser'                            => $userId,
                    'updatedatetime'                        => now(),
                    'tbl_user_idtbl_user'                   => $userId,
                    'tbl_material_info_idtbl_material_info' => $detail->tbl_material_info_idtbl_material_info,
                    'tbl_location_idtbl_location'           => $grn->tbl_location_idtbl_location,
                ]);
            }

            $grn->update([
                'confirm_status' => 1,
                'updatedatetime' => now(),
                'tbl_user_idtbl_user' => $userId,
            ]);
        });

        return response()->json(['message' => 'Material GRN confirmed and stock updated']);
    }

    // ── PDF / Print view ─────────────────────────────────────────────────
    public function pdf($id)
    {
        $grn = MaterialGrn::with([
            'supplierPOrder',
            'supplierPOrder.suppliers:idtbl_supplier,suppliername',
            'details.material:idtbl_material_info,materialname,materialinfocode',
            'location:idtbl_locations,locationname',
            'user:idtbl_user,name',
        ])->findOrFail($id);

        $spoDetails = collect();
        if ($grn->supplierPOrder) {
            $spoDetails = $grn->supplierPOrder->details()
                ->where('status', 1)
                ->get()
                ->keyBy('tbl_material_info_idtbl_material_info');
        }

        $details = $grn->details->map(function ($d) use ($spoDetails) {
            $ordered  = (float) ($spoDetails[$d->tbl_material_info_idtbl_material_info]->qty ?? 0);
            $received = (float) $d->qty;
            return (object) [
                'material_name' => $d->material->materialname     ?? '-',
                'material_code' => $d->material->materialinfocode ?? '-',
                'unitprice'     => $d->unitprice,
                'ordered_qty'   => $ordered,
                'received_qty'  => $received,
                'total'         => $d->total,
            ];
        });

        return view('materialgrn.print', compact('grn', 'details'));
    }
}