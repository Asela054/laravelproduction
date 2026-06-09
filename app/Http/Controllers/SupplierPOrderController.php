<?php

namespace App\Http\Controllers;

use App\Models\SupplierPOrder;
use App\Models\SupplierPOrderDetail;
use App\Models\MaterialDetail;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierPOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('privilege:11')->only([
            'index',
            'show',
            'getCustomersData',
            'downloadDocs',
        ]);
        $this->middleware('privilege:11,add')->only(['create', 'store']);
        $this->middleware('privilege:11,edit')->only(['edit', 'update']);
        $this->middleware('privilege:11,remove')->only(['destroy']);
        $this->middleware('privilege:11,statuschange')->only(['updateStatus']);
    }

    public function index()
    {
        return view('supplierpurchasingorder.index');
    }

    public function getData()
    {
        $query = SupplierPOrder::with('users:idtbl_user,name', 'suppliers:idtbl_supplier,suppliername')
            ->where('status', '!=', 3)
            ->orderBy('idtbl_supplier_porder', 'desc')
            ->get();

        return datatables()->of($query)
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Load all active suppliers.
     * tbl_supplier.status is int(11) — compare with 1.
     */
    public function getSupplierDetails()
    {
        $suppliers = Supplier::where('status', 1)
            ->get(['idtbl_supplier', 'suppliername']);

        return response()->json($suppliers);
    }

    /**
     * Load all active materials.
     * Returns idtbl_material_info, materialname, materialinfocode, unitperctn (used as unit price).
     */
    public function getMaterialDetails()
    {
        $materials = MaterialDetail::where('status', 1)
            ->get(['idtbl_material_info', 'materialname', 'materialinfocode', 'unitperctn']);

        return response()->json($materials);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orderdate'    => ['required', 'date'],
            'remark'       => ['nullable', 'string'],
            'total'        => ['required', 'numeric'],
            'nettotal'     => ['required', 'numeric'],
            'vatper'       => ['required', 'numeric'],
            'vatamount'    => ['required', 'numeric'],
            'supplierId'   => ['required', 'exists:tbl_supplier,idtbl_supplier'],
            'orderDetails' => ['required', 'array', 'min:1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $payload = $validator->validated();

        DB::transaction(function () use ($payload) {
            $spo = SupplierPOrder::create([
                'orderdate'                   => Carbon::today(),
                'total'                       => $payload['total'],
                'vat'                         => $payload['vatamount'],
                'nettotal'                    => $payload['nettotal'],
                'vatpre'                      => $payload['vatper'],
                'remark'                      => $payload['remark'] ?? '',
                'confirmstatus'               => 0,
                'status'                      => 1,
                'insertdatetime'              => now(),
                'tbl_user_idtbl_user'         => auth()->user()->idtbl_user,
                'tbl_supplier_idtbl_supplier' => $payload['supplierId'],
                'completestatus'              => 0,
                'grnissuestatus'              => 0,
            ]);

            foreach ($payload['orderDetails'] as $detail) {
                $qty        = $detail['newQty'];
                $unitPrice  = $detail['unitPrice'];   // sourced from unitperctn
                $totalPrice = $unitPrice * $qty;

                $spo->details()->create([
                    'qty'                                       => $qty,
                    'unitprice'                                 => $unitPrice,
                    'total'                                     => $totalPrice,
                    'insertdatetime'                            => now(),
                    'status'                                    => 1,
                    'tbl_material_info_idtbl_material_info'     => $detail['materialId'],
                    'tbl_user_idtbl_user'                       => auth()->user()->idtbl_user,
                ]);
            }
        });

        return response()->json(['message' => 'Supplier purchase order created']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orderdate'    => ['required', 'date'],
            'remark'       => ['nullable', 'string'],
            'total'        => ['required', 'numeric'],
            'nettotal'     => ['required', 'numeric'],
            'vatper'       => ['required', 'numeric'],
            'vatamount'    => ['required', 'numeric'],
            'orderDetails' => ['required', 'array', 'min:1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $payload = $validator->validated();

        $spo = SupplierPOrder::find($id);
        if (!$spo) {
            return response()->json(['message' => 'Supplier Purchase Order not found'], 404);
        }

        if ($spo->confirmstatus == 1) {
            return response()->json(['message' => 'Confirmed orders cannot be updated'], 409);
        }

        DB::transaction(function () use ($payload, $spo) {
            $spo->update([
                'orderdate' => Carbon::parse($payload['orderdate'])->toDateString(),
                'total'     => $payload['total'],
                'vat'       => $payload['vatamount'],
                'nettotal'  => $payload['nettotal'],
                'vatpre'    => $payload['vatper'],
                'remark'    => $payload['remark'] ?? '',
            ]);

            $spo->details()->delete();

            foreach ($payload['orderDetails'] as $detail) {
                $qty        = $detail['newQty'];
                $unitPrice  = $detail['unitPrice'];
                $totalPrice = $unitPrice * $qty;

                $spo->details()->create([
                    'qty'                                       => $qty,
                    'unitprice'                                 => $unitPrice,
                    'total'                                     => $totalPrice,
                    'insertdatetime'                            => now(),
                    'updatedatetime'                            => now(),
                    'status'                                    => 1,
                    'tbl_material_info_idtbl_material_info'     => $detail['materialId'],
                    'tbl_user_idtbl_user'                       => auth()->user()->idtbl_user,
                ]);
            }
        });

        return response()->json(['message' => 'Supplier purchase order updated']);
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required', 'in:1,3'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $spo = SupplierPOrder::find($id);
        if (!$spo) {
            return response()->json(['message' => 'Supplier Purchase Order not found'], 404);
        }

        if ($spo->confirmstatus == 1 && $request->input('status') != 1) {
            return response()->json(['message' => 'Confirmed orders cannot be changed'], 409);
        }

        $status = (int) $request->input('status');

        if ($status === 1) $spo->confirmstatus = 1;
        if ($status === 3) $spo->status = 3;

        $spo->save();

        return response()->json([
            'message' => $status === 1
                ? 'Supplier purchase order confirmed'
                : 'Supplier purchase order deleted',
        ]);
    }

    public function pdf($id)
    {
        $spo = SupplierPOrder::with([
            'suppliers:idtbl_supplier,suppliername',
            'details.material:idtbl_material_info,materialname,materialinfocode,unitperctn',
        ])->find($id);

        if (!$spo) {
            abort(404, 'Supplier Purchase Order not found');
        }

        return view('supplierpurchasingorder.print', [
            'order'   => $spo,
            'details' => $spo->details,
        ]);
    }

    public function show($id)
    {
        $spo = SupplierPOrder::with([
            'suppliers:idtbl_supplier,suppliername',
            'details.material:idtbl_material_info,materialname,materialinfocode,unitperctn',
        ])->find($id);

        if (!$spo) {
            return response()->json(['message' => 'Supplier Purchase Order not found'], 404);
        }

        $details = $spo->details->map(function ($detail) {
            return [
                'material_id' => $detail->tbl_material_info_idtbl_material_info,
                'qty'         => $detail->qty,
                'unitprice'   => $detail->unitprice,
                'total'       => $detail->total,
                'material'    => $detail->material,
            ];
        });

        return response()->json([
            'id'         => $spo->idtbl_supplier_porder,
            'order_number' => $spo->order_number, 
            'orderdate'  => $spo->orderdate
                ? Carbon::parse($spo->orderdate)->toDateString()
                : null,
            'supplierId' => optional($spo->suppliers)->idtbl_supplier,
            'supplier'   => optional($spo->suppliers)->suppliername,
            'remark'     => $spo->remark,
            'total'      => $spo->total,
            'nettotal'   => $spo->nettotal,
            'vatper'     => $spo->vatpre,
            'vatamount'  => $spo->vat,
            'details'    => $details,
        ]);
    }
}