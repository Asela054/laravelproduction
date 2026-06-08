<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductionOrderController extends Controller
{
    public function index()
    {
        $companyID   = session('companyid', 1);
        $addcheck    = checkPrivilege(4, 'add') ? 1 : 0;
        $editcheck   = checkPrivilege(4, 'edit') ? 1 : 0;
        $statuscheck = checkPrivilege(4, 'statuschange') ? 1 : 0;
        $deletecheck = checkPrivilege(4, 'remove') ? 1 : 0;

        return view('production.order', compact('companyID', 'addcheck', 'editcheck', 'statuscheck', 'deletecheck'));
    }

    public function data(Request $request)
    {
        $companyID = session('companyid', 1);

        $baseQuery = DB::table('tbl_production_orderdetail as pod')
            ->join('tbl_production_order as po', 'po.idtbl_production_order', '=', 'pod.tbl_production_order_idtbl_production_order')
            ->join('tbl_product as p', 'p.idtbl_product', '=', 'pod.tbl_product_idtbl_product')
            ->select(
                'pod.idtbl_production_orderdetail',
                'po.idtbl_production_order',
                'po.prodate',
                'po.procode',
                'p.product_code',
                'p.product_name',
                'pod.qty',
                'pod.issueqty',
                'po.prostartdate',
                'po.proenddate'
            )
            ->where('pod.status', 1);

        $recordsTotal = $baseQuery->count();
        $query        = clone $baseQuery;
        $searchValue  = $request->input('search.value', '');

        if ($searchValue) {
            $query->where(function ($sub) use ($searchValue) {
                $sub->where('po.prodate', 'like', "%{$searchValue}%")
                    ->orWhere('p.product_code', 'like', "%{$searchValue}%")
                    ->orWhere('p.product_name', 'like', "%{$searchValue}%")
                    ->orWhere('pod.qty', 'like', "%{$searchValue}%")
                    ->orWhere('po.prostartdate', 'like', "%{$searchValue}%")
                    ->orWhere('po.proenddate', 'like', "%{$searchValue}%");
            });
        }

        $recordsFiltered  = $query->count();
        $columns          = ['po.prodate', 'p.product_code', 'p.product_name', 'pod.qty', 'po.prostartdate', 'po.proenddate'];
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderDir         = in_array($request->input('order.0.dir', 'desc'), ['asc', 'desc']) ? $request->input('order.0.dir', 'desc') : 'desc';
        $orderColumn      = $columns[$orderColumnIndex] ?? 'po.prodate';

        $rows = $query
            ->orderBy($orderColumn, $orderDir)
            ->offset(intval($request->input('start', 0)))
            ->limit(intval($request->input('length', 10)))
            ->get();

        return response()->json([
            'draw'            => intval($request->input('draw', 0)),
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $rows,
        ]);
    }

    public function getSalesOrders()
    {
        $orders = DB::table('tbl_customer_order')
            ->select('idtbl_customer_order', 'cuspono')
            ->where('status', 1)
            ->orderByDesc('idtbl_customer_order')
            ->limit(200)
            ->get();

        return response()->json(['data' => $orders]);
    }

    public function getSalesOrderProducts(Request $request)
    {
        $orderId = $request->input('orderid');

        if (!$orderId) {
            return response()->json(['data' => []]);
        }

        $items = DB::table('tbl_customer_order_detail as cod')
            ->join('tbl_product as p', 'p.idtbl_product', '=', 'cod.tbl_product_idtbl_product')
            ->select(
                'cod.tbl_product_idtbl_product as product_id',
                'p.product_code',
                'p.product_name',
                'cod.qty as order_qty',
                'cod.unitprice'
            )
            ->where('cod.tbl_customer_order_idtbl_customer_order', $orderId)
            ->where('cod.status', 1)
            ->get();

        // For each product calculate already production ordered qty
        foreach ($items as $item) {
            $producedQty = DB::table('tbl_production_orderdetail as pod')
                ->join('tbl_production_order as po', 'po.idtbl_production_order', '=', 'pod.tbl_production_order_idtbl_production_order')
                ->where('po.tbl_customer_order_idtbl_customer_order', $orderId)
                ->where('pod.tbl_product_idtbl_product', $item->product_id)
                ->where('pod.status', 1)
                ->sum('pod.qty');

            $item->produced_qty  = floatval($producedQty);
            $item->balance_qty   = floatval($item->order_qty) - floatval($producedQty);
        }

        return response()->json(['data' => $items]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'orderid'     => 'required|integer',
            'productlist' => 'required|integer',
            'proqty'      => 'required|numeric|min:0.01',
            'uprice'      => 'required|numeric|min:0',
            'startdate'   => 'nullable|date',
            'enddate'     => 'nullable|date',
        ]);

        $userID = session('userid', auth()->id() ?? null);

        if (!$userID) {
            return response()->json(['status' => 0, 'message' => 'Unable to determine user.'], 422);
        }

        $insertdatetime = now()->format('Y-m-d H:i:s');

        return DB::transaction(function () use ($validated, $userID, $insertdatetime) {
            $nextProcode = DB::table('tbl_production_order')->max('procode');
            $nextProcode = $nextProcode ? intval($nextProcode) + 1 : 1;

            $productionOrderId = DB::table('tbl_production_order')->insertGetId([
                'procode'                                       => $nextProcode,
                'prodate'                                       => $insertdatetime,
                'prostartdate'                                  => $validated['startdate'] ?? null,
                'proenddate'                                    => $validated['enddate'] ?? null,
                'status'                                        => 1,
                'insertdatetime'                                => $insertdatetime,
                'tbl_user_idtbl_user'                           => $userID,
                'tbl_customer_order_idtbl_customer_order'       => $validated['orderid'],
            ]);

            DB::table('tbl_production_orderdetail')->insert([
                'tbl_product_idtbl_product'                       => $validated['productlist'],
                'qty'                                             => $validated['proqty'],
                'issueqty'                                        => 0,
                'unitprice'                                       => $validated['uprice'],
                'total'                                           => $validated['proqty'] * $validated['uprice'],
                'materialissue'                                   => 0,
                'partialissued'                                   => 0,
                'status'                                          => 1,
                'insertdatetime'                                  => $insertdatetime,
                'tbl_user_idtbl_user'                             => $userID,
                'tbl_production_order_idtbl_production_order'     => $productionOrderId,
            ]);

            return response()->json(['status' => 1, 'message' => 'Production order created successfully.']);
        }, 5);
    }

    public function productionDetailAccoProduction(Request $request)
    {
        $orderId = $request->input('orderid');

        $details = DB::table('tbl_production_orderdetail as pod')
            ->join('tbl_product as p', 'p.idtbl_product', '=', 'pod.tbl_product_idtbl_product')
            ->select(
                'pod.idtbl_production_orderdetail',
                'pod.tbl_product_idtbl_product',
                'pod.qty',
                'pod.issueqty',
                'p.product_code',
                'p.product_name'
            )
            ->where('pod.tbl_production_order_idtbl_production_order', $orderId)
            ->where('pod.status', 1)
            ->get();

        return response()->json(['data' => $details]);
    }

    public function getQtyInfoAccoProductionDetail(Request $request)
    {
        $productId     = $request->input('productid');
        $productionId  = $request->input('productionid');

        $detail = DB::table('tbl_production_orderdetail')
            ->select('qty', 'issueqty')
            ->where('tbl_product_idtbl_product', $productId)
            ->where('tbl_production_order_idtbl_production_order', $productionId)
            ->where('status', 1)
            ->first();

        if (!$detail) {
            return response()->json([
                'detail' => [
                    'qty' => 0,
                    'issueqty' => 0,
                    'balance' => 0
                ]
            ]);
        }

        $orderQty = floatval($detail->qty);
        $issueQty = floatval($detail->issueqty);

        return response()->json([
            'detail' => [
                'qty'      => $orderQty,
                'issueqty' => $issueQty,
                'balance'  => $orderQty - $issueQty
            ]
        ]);
    }

    public function productionBomListAccoFg(Request $request)
    {
        $recordID    = $request->input('recordID');
        $productionID = $request->input('productionID');

        $bomList = DB::table('tbl_product_bom_info as pbi')
            ->join('tbl_product_bom as pb', 'pb.tbl_product_bom_info_idtbl_product_bom_info', '=', 'pbi.idtbl_product_bom_info')
            ->join('tbl_customer_order_detail as cod', 'cod.tbl_product_idtbl_product', '=', 'pb.tbl_product_idtbl_product')
            ->join('tbl_production_order as po', 'po.tbl_customer_order_idtbl_customer_order', '=', 'cod.tbl_customer_order_idtbl_customer_order')
            ->select('pbi.idtbl_product_bom_info', 'pbi.title')
            ->where('pbi.status', 1)
            ->where('cod.tbl_product_idtbl_product', $recordID)
            ->where('po.idtbl_production_order', $productionID)
            ->where('cod.status', 1)
            ->distinct()
            ->get();

        return response()->json($bomList);
    }

    public function getProductionInfo(Request $request)
    {
        $productionid   = $request->input('productionid');
        $orderfinishgood = $request->input('orderfinishgood');
        $productbomlist  = $request->input('productbomlist');
        $orderqty        = floatval($request->input('orderqty'));

        $bomRows = DB::table('tbl_product_bom as pb')
            ->join('tbl_material_info as mi', 'mi.idtbl_material_info', '=', 'pb.tbl_material_info_idtbl_material_info')
            ->join('tbl_production_orderdetail as pod', 'pod.tbl_product_idtbl_product', '=', 'pb.tbl_product_idtbl_product')
            ->select(
                'pb.idtbl_product_bom',
                'pb.qty',
                'pb.wastage',
                'pb.tbl_material_info_idtbl_material_info',
                'mi.materialinfocode'
            )
            ->where('pod.idtbl_production_orderdetail', $productionid)
            ->where('pb.tbl_product_bom_info_idtbl_product_bom_info', $productbomlist)
            ->where('pb.status', 1)
            ->get();

        $stockStatus = 0;
        $html        = '';

        foreach ($bomRows as $row) {
            $materialID = $row->tbl_material_info_idtbl_material_info;
            $checkqty   = (($row->qty + (($row->qty * $row->wastage) / 100)) * $orderqty);

            $stockSum = DB::table('tbl_material_stock')
                ->where('tbl_material_info_idtbl_material_info', $materialID)
                ->where('status', 1)
                ->sum('qty');

            if (round($stockSum, 2) < round($checkqty, 2)) {
                $stockStatus = 1;
            }

            $html .= '
                <tr class="pointer">
                    <td>' . $row->idtbl_product_bom . '</td>
                    <td class="d-none">' . $materialID . '</td>
                    <td>' . e($row->materialinfocode) . '</td>
                    <td>' . $checkqty . '</td>
                    <td></td>
                </tr>
            ';
        }

        return response()->json([
            'stockstatus' => $stockStatus,
            'htmlview'    => $html,
        ]);
    }

    public function issueMaterialForProduction(Request $request)
    {
        $productionorderID = $request->input('productionorderid');
        $orderfinishgood   = $request->input('orderfinishgood');
        $orderqty          = floatval($request->input('orderqty'));
        $balanceqty        = floatval($request->input('balanceqty'));
        $tableData         = $request->input('tableData', []);
        $userID            = session('userid', auth()->id() ?? 1);
        $updatedatetime    = now()->format('Y-m-d H:i:s');

        DB::beginTransaction();

        try {
            $detail = DB::table('tbl_production_orderdetail')
                ->select('tbl_product_idtbl_product', 'tbl_production_order_idtbl_production_order', 'qty', 'issueqty')
                ->where('idtbl_production_orderdetail', $productionorderID)
                ->first();

            $totalissueqty = $detail->issueqty + $balanceqty;

            if ($detail->qty == $totalissueqty) {
                DB::table('tbl_production_orderdetail')
                    ->where('tbl_production_order_idtbl_production_order', $productionorderID)
                    ->where('tbl_product_idtbl_product', $orderfinishgood)
                    ->update([
                        'materialissue'  => 1,
                        'partialissued'  => 1,
                        'issueqty'       => DB::raw('issueqty + ' . $balanceqty),
                        'updateuser'     => $userID,
                        'updatedatetime' => $updatedatetime,
                    ]);
            } else {
                DB::table('tbl_production_orderdetail')
                    ->where('tbl_production_order_idtbl_production_order', $productionorderID)
                    ->where('tbl_product_idtbl_product', $orderfinishgood)
                    ->update([
                        'partialissued'  => 1,
                        'issueqty'       => DB::raw('issueqty + ' . $balanceqty),
                        'updateuser'     => $userID,
                        'updatedatetime' => $updatedatetime,
                    ]);
            }

            foreach ($tableData as $row) {
                $materialID    = $row['col_2'];
                $qty           = floatval($row['col_4']);
                $batchnumlist  = $row['col_5'];

                DB::table('tbl_production_material_issue')->insert([
                    'qty'                                                     => $qty,
                    'batchno'                                                 => $batchnumlist,
                    'status'                                                  => 1,
                    'insertdatetime'                                          => $updatedatetime,
                    'tbl_user_idtbl_user'                                     => $userID,
                    'tbl_production_order_idtbl_production_order'             => $productionorderID,
                    'tbl_product_idtbl_product'                               => $orderfinishgood,
                    'tbl_material_info_idtbl_material_info'                   => $materialID,
                ]);

                $checkbatchlist = explode(',', $batchnumlist);
                $balqty         = $qty;

                foreach ($checkbatchlist as $batchno) {
                    if ($balqty <= 0) break;

                    $stock = DB::table('tbl_material_stock')
                        ->where('tbl_material_info_idtbl_material_info', $materialID)
                        ->where('batchno', trim($batchno))
                        ->where('status', 1)
                        ->first();

                    if (!$stock) continue;

                    if ($stock->qty >= $balqty) {
                        $dedqty = $stock->qty - $balqty;
                        $balqty = 0;
                    } else {
                        $dedqty = 0;
                        $balqty = $balqty - $stock->qty;
                    }

                    DB::table('tbl_material_stock')
                        ->where('batchno', $stock->batchno)
                        ->where('tbl_material_info_idtbl_material_info', $materialID)
                        ->update([
                            'qty'            => $dedqty,
                            'updateuser'     => $userID,
                            'updatedatetime' => $updatedatetime,
                        ]);
                }
            }

            DB::commit();

            return response()->json(['status' => 1, 'action' => json_encode([
                'icon' => 'fas fa-save', 'title' => '', 'message' => 'Record Added Successfully',
                'url' => '', 'target' => '_blank', 'type' => 'success'
            ])]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Issue material failed: ' . $e->getMessage());

            return response()->json(['status' => 0, 'action' => json_encode([
                'icon' => 'fas fa-exclamation-triangle', 'title' => '', 'message' => 'Record Error',
                'url' => '', 'target' => '_blank', 'type' => 'danger'
            ])]);
        }
    }

    public function productionOrderStatus(Request $request, $id, $status)
    {
        $statusValue = intval($status);
        $userID      = session('userid', auth()->id() ?? 1);

        $updated = DB::table('tbl_production_orderdetail')
            ->where('idtbl_production_orderdetail', $id)
            ->update([
                'status'         => $statusValue,
                'updateuser'     => $userID,
                'updatedatetime' => now()->format('Y-m-d H:i:s'),
            ]);

        if (!$updated) {
            return response()->json(['status' => 0, 'message' => 'Unable to update status.']);
        }

        return response()->json(['status' => 1, 'message' => 'Status updated successfully.']);
    }

    public function getBatchNoListAccoMaterial(Request $request)
    {
        $materialID = $request->input('materialID');

        $batches = DB::table('tbl_material_stock as s')
            ->join('tbl_material_info as mi', 'mi.idtbl_material_info', '=', 's.tbl_material_info_idtbl_material_info')
            ->join('tbl_unit as u', 'u.idtbl_unit', '=', 'mi.tbl_unit_idtbl_unit')
            ->select(
                's.batchno',
                's.qty',
                'u.unitname',
                'u.unitcode'
            )
            ->where('s.tbl_material_info_idtbl_material_info', $materialID)
            ->where('s.status', 1)
            ->get();

        return response()->json($batches);
    }
}