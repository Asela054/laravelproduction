<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ProductionDailyComplete;

class ProductionPackingController extends Controller
{
    /* ─────────────────────────────────────────
     |  PAGE
     ───────────────────────────────────────── */

    public function index()
    {
        return view('production.packing-records');
    }

    /* ─────────────────────────────────────────
     |  DATATABLE
     ───────────────────────────────────────── */

    public function data()
    {
        $query = DB::table('tbl_production_orderdetail')
            ->join('tbl_production_order',
                'tbl_production_order.idtbl_production_order',
                '=',
                'tbl_production_orderdetail.tbl_production_order_idtbl_production_order')
            ->join('tbl_product',
                'tbl_product.idtbl_product',
                '=',
                'tbl_production_orderdetail.tbl_product_idtbl_product')
            ->where('tbl_production_orderdetail.status', 1)
            ->select(
                'tbl_production_orderdetail.idtbl_production_orderdetail',
                'tbl_production_order.prodate',
                'tbl_production_order.procode',
                'tbl_product.product_code',
                'tbl_product.product_name',
                'tbl_production_orderdetail.qty',
                'tbl_production_order.prostartdate',
                'tbl_production_order.proenddate'
            );

        return datatables($query)
            ->addIndexColumn()
            ->make(true);
    }

    /* ─────────────────────────────────────────
     |  CHECK QTY BEFORE SUBMIT
     ───────────────────────────────────────── */

    public function checkQty(Request $request)
    {
        $recordID   = $request->recordID;
        $comqty     = (float) $request->comqty;
        $damageqty  = (float) ($request->damageqty ?? 0);

        $orderDetail = DB::table('tbl_production_orderdetail')
            ->where('idtbl_production_orderdetail', $recordID)
            ->where('status', 1)
            ->select('qty', 'tbl_production_order_idtbl_production_order', 'tbl_product_idtbl_product')
            ->first();

        $issued = DB::table('tbl_production_daily_complete')
            ->where('tbl_production_order_idtbl_production_order',
                $orderDetail->tbl_production_order_idtbl_production_order)
            ->where('tbl_product_idtbl_product', $orderDetail->tbl_product_idtbl_product)
            ->where('status', 1)
            ->sum(DB::raw('qty + damageqty'));

        $total = $issued + $comqty + $damageqty;

        return response()->json([
            'valid' => $total <= $orderDetail->qty
        ]);
    }

    /* ─────────────────────────────────────────
     |  STORE DAILY COMPLETE
     ───────────────────────────────────────── */

    public function storeComplete(Request $request)
    {
        $request->validate([
            'comdate'              => 'required|date',
            'commfdate'            => 'required|date',
            'comexpdate'           => 'required|date',
            'comqty'               => 'required|numeric',
            'hideproorderdetailid' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $orderDetail = DB::table('tbl_production_orderdetail')
                ->where('idtbl_production_orderdetail', $request->hideproorderdetailid)
                ->where('status', 1)
                ->select('tbl_production_order_idtbl_production_order', 'tbl_product_idtbl_product')
                ->first();

            ProductionDailyComplete::create([
                'comdate'                                     => $request->comdate,
                'qty'                                         => $request->comqty,
                'damageqty'                                   => $request->damageqty ?? 0,
                'mfdate'                                      => $request->commfdate,
                'expdate'                                     => $request->comexpdate,
                'checkstatus'                                 => 0,
                'unitprice'                                   => 0,
                'status'                                      => 1,
                'insertdatetime'                              => Carbon::now(),
                'tbl_user_idtbl_user'                         => Auth::id(),
                'tbl_production_order_idtbl_production_order' => $orderDetail->tbl_production_order_idtbl_production_order,
                'tbl_product_idtbl_product'                   => $orderDetail->tbl_product_idtbl_product,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Daily complete recorded successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /* ─────────────────────────────────────────
     |  VIEW DAILY COMPLETE LIST (modal rows)
     ───────────────────────────────────────── */

    public function viewDailyComplete(Request $request)
    {
        $recordID = $request->recordID;

        $orderDetail = DB::table('tbl_production_orderdetail')
            ->where('idtbl_production_orderdetail', $recordID)
            ->where('status', 1)
            ->select('tbl_production_order_idtbl_production_order', 'tbl_product_idtbl_product')
            ->first();

        $rows = DB::table('tbl_production_daily_complete')
            ->leftJoin('tbl_user',
                'tbl_user.idtbl_user',
                '=',
                'tbl_production_daily_complete.checkperson')
            ->where('tbl_production_daily_complete.tbl_production_order_idtbl_production_order',
                $orderDetail->tbl_production_order_idtbl_production_order)
            ->where('tbl_production_daily_complete.tbl_product_idtbl_product',
                $orderDetail->tbl_product_idtbl_product)
            ->where('tbl_production_daily_complete.status', 1)
            ->select(
                'tbl_production_daily_complete.*',
                'tbl_user.name'
            )
            ->get();

        return response()->json($rows);
    }

    /* ─────────────────────────────────────────
     |  APPROVE DAILY COMPLETE
     ───────────────────────────────────────── */


     public function approveComplete(Request $request)
    {
        DB::beginTransaction();

        try {
            $recordID  = $request->recordID;
            $userId    = Auth::id();
            $now       = Carbon::now();

            $record = DB::table('tbl_production_daily_complete')
                ->join('tbl_production_order',
                    'tbl_production_order.idtbl_production_order',
                    '=',
                    'tbl_production_daily_complete.tbl_production_order_idtbl_production_order')
                ->where('tbl_production_daily_complete.idtbl_production_daily_complete', $recordID)
                ->select(
                    'tbl_production_daily_complete.qty',
                    'tbl_production_daily_complete.comdate',
                    'tbl_production_daily_complete.tbl_product_idtbl_product',
                    'tbl_production_daily_complete.tbl_production_order_idtbl_production_order',
                    'tbl_production_order.procode'
                )
                ->first();

            if (!$record) {
                DB::rollBack();
                return response()->json(['status' => 0, 'message' => 'Record not found'], 404);
            }

            $checkStatus = DB::table('tbl_production_daily_complete')
                ->where('idtbl_production_daily_complete', $recordID)
                ->value('checkstatus');

            if ($checkStatus == 1) {
                DB::rollBack();
                return response()->json(['status' => 0, 'message' => 'Record already approved'], 400);
            }

            // Generate batch number
            $batchno = 'MF' . $record->procode . str_replace('-', '', $record->comdate);

            // Update daily complete record
            DB::table('tbl_production_daily_complete')
                ->where('idtbl_production_daily_complete', $recordID)
                ->update([
                    'checkstatus'    => 1,
                    'checkperson'    => $userId,
                    'batchno'        => $batchno,
                    'updateuser'     => $userId,
                    'updatedatetime' => $now,
                ]);

            // ── GRN header zero-value columns ──
            $grnTotal           = 0;
            $grnVatAmount       = 0;
            $grnNetTotal        = 0;
            $grnConfirmStatus   = 0;
            $grnTransferStatus  = 0;
            $grnPorderid        = 0;

            // Insert GRN header
            $grnId = DB::table('tbl_grn')->insertGetId([
                'date'                        => $record->comdate,
                'total'                       => $grnTotal,
                'vatamount'                   => $grnVatAmount,
                'nettotal'                    => $grnNetTotal,
                'invoicenum'                  => 0,
                'dispatchnum'                 => 0,
                'batchno'                     => $batchno,
                'status'                      => 1,
                'confirm_status'              => $grnConfirmStatus,
                'transferstatus'              => $grnTransferStatus,
                'updatedatetime'              => $now,
                'tbl_user_idtbl_user'         => $userId,
                'tbl_porder_idtbl_porder'     => $grnPorderid,
                'tbl_location_idtbl_location' => 1,
            ]);

            // ── GRN detail zero-value columns ──
            $detailUnitPrice  = 0;
            $detailSalePrice  = 0;
            $detailTotal      = 0;

            // Insert GRN detail
            DB::table('tbl_grndetail')->insert([
                'date'                      => $record->comdate,
                'type'                      => 0,
                'qty'                       => $record->qty,
                'unitprice'                 => $detailUnitPrice,
                'saleprice'                 => $detailSalePrice,
                'total'                     => $detailTotal,
                'status'                    => 1,
                'updatedatetime'            => $now,
                'tbl_user_idtbl_user'       => $userId,
                'tbl_grn_idtbl_grn'         => $grnId,
                'tbl_product_idtbl_product' => $record->tbl_product_idtbl_product,
            ]);

            DB::commit();

            return response()->json(['status' => 1, 'message' => 'Record approved successfully']);

        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Approval error: ' . $e->getMessage(), [
                'recordID' => $request->recordID ?? null,
                'trace'    => $e->getTraceAsString()
            ]);

            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function rejectComplete(Request $request)
    {
        DB::beginTransaction();

        try {
            $recordID = $request->recordID;

            $checkStatus = DB::table('tbl_production_daily_complete')
                ->where('idtbl_production_daily_complete', $recordID)
                ->value('checkstatus');

            if ($checkStatus == 1) {
                DB::rollBack();
                return response()->json(['status' => 0, 'message' => 'Already approved, cannot reject'], 400);
            }

            DB::table('tbl_production_daily_complete')
                ->where('idtbl_production_daily_complete', $recordID)
                ->update([
                    'checkstatus'    => 3,
                    'checkperson'    => Auth::id(),
                    'updateuser'     => Auth::id(),
                    'updatedatetime' => Carbon::now(),
                ]);

            DB::commit();

            return response()->json(['status' => 1, 'message' => 'Record rejected successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}