<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PackingQuality;

class ProductionPackingQualityController extends Controller
{
    /* ─────────────────────────────────────────
     |  PAGE
     ───────────────────────────────────────── */

    public function index()
    {
        return view('production.quality');
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
                'tbl_production_order.idtbl_production_order',
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
     |  SEMI PRODUCTION DETAILS (view modal)
     ───────────────────────────────────────── */

    public function semiProductionDetails(Request $request)
    {
        $recordID = $request->recordID;

        $products = DB::table('tbl_product')
            ->join('tbl_production_orderdetail',
                'tbl_product.idtbl_product',
                '=',
                'tbl_production_orderdetail.tbl_product_idtbl_product')
            ->join('tbl_production_order',
                'tbl_production_order.idtbl_production_order',
                '=',
                'tbl_production_orderdetail.tbl_production_order_idtbl_production_order')
            ->where('tbl_product.status', 1)
            ->where('tbl_production_orderdetail.tbl_production_order_idtbl_production_order', $recordID)
            ->select(
                'tbl_production_order.idtbl_production_order',
                'tbl_product.idtbl_product',
                'tbl_product.product_code',
                'tbl_product.product_name'
            )
            ->get();

        return response()->json($products);
    }

    /* ─────────────────────────────────────────
     |  QUALITY FORM DATA (for modal)
     ───────────────────────────────────────── */

    public function qualityForm(Request $request)
    {
        $recordID = $request->recordID;

        $product = DB::table('tbl_product')
            ->join('tbl_production_orderdetail',
                'tbl_product.idtbl_product',
                '=',
                'tbl_production_orderdetail.tbl_product_idtbl_product')
            ->join('tbl_production_order',
                'tbl_production_order.idtbl_production_order',
                '=',
                'tbl_production_orderdetail.tbl_production_order_idtbl_production_order')
            ->where('tbl_product.status', 1)
            ->where('tbl_production_orderdetail.tbl_production_order_idtbl_production_order', $recordID)
            ->whereNotIn('tbl_product.idtbl_product', function ($q) use ($recordID) {
                $q->select('tbl_product_idtbl_product')
                    ->from('tbl_packing_quality')
                    ->where('status', 1)
                    ->where('tbl_production_order_idtbl_production_order', $recordID);
            })
            ->select('tbl_product.idtbl_product', 'tbl_product.product_code', 'tbl_product.product_name')
            ->get();

        $productId = $product->isNotEmpty() ? $product->first()->idtbl_product : null;

        return response()->json([
            'products'       => $product,
            'rawMaterials'   => $this->getBomMaterials($productId, 1),
            'packMaterials'  => $this->getBomMaterials($productId, 2),
            'labelMaterials' => $this->getBomMaterials($productId, 3),
        ]);
    }

    /* ─────────────────────────────────────────
     |  BOM MATERIALS BY PRODUCT (on dropdown change)
     ───────────────────────────────────────── */

    public function bomMaterials(Request $request)
    {
        $productId = $request->productId;

        return response()->json([
            'rawMaterials'   => $this->getBomMaterials($productId, 1),
            'packMaterials'  => $this->getBomMaterials($productId, 2),
            'labelMaterials' => $this->getBomMaterials($productId, 3),
        ]);
    }

    /* ─────────────────────────────────────────
     |  SHARED: GET BOM MATERIALS BY CATEGORY
     ───────────────────────────────────────── */

    private function getBomMaterials($productId, $categoryId)
    {
        if (!$productId) return collect();

        return DB::table('tbl_product_bom')
            ->join('tbl_material_info',
                'tbl_material_info.idtbl_material_info',
                '=',
                'tbl_product_bom.tbl_material_info_idtbl_material_info')
            ->join('tbl_material_category',
                'tbl_material_category.idtbl_material_category',
                '=',
                'tbl_material_info.tbl_material_category_idtbl_material_category')
            ->join('tbl_unit',
                'tbl_unit.idtbl_unit',
                '=',
                'tbl_material_info.tbl_unit_idtbl_unit')
            ->where('tbl_product_bom.tbl_product_idtbl_product', $productId)
            ->where('tbl_product_bom.status', 1)
            ->where('tbl_material_category.idtbl_material_category', $categoryId)
            ->select(
                'tbl_product_bom.qty',
                'tbl_material_info.materialinfocode',
                'tbl_material_info.materialname',
                'tbl_unit.unitcode',
                'tbl_product_bom.wastage'
            )
            ->get();
    }

    /* ─────────────────────────────────────────
     |  STORE QUALITY
     ───────────────────────────────────────── */

    public function storeQuality(Request $request)
    {
        try {
            PackingQuality::create([
                'examined_quantity'                           => $request->exqty,
                'net_weight'                                  => $request->netweight,
                'gross_weight'                                => $request->grossweight,
                'moisture'                                    => $request->moisture,
                'color'                                       => $request->color,
                'taste'                                       => $request->taste,
                'seal'                                        => $request->seal ?? 0,
                'water_leakages'                              => $request->leakages ?? 0,
                'statuspassfail'                              => $request->qualityform ?? 0,
                'comments'                                    => $request->comment ?? '',   // null-safe
                'status'                                      => 1,
                'insertdatetime'                              => Carbon::now(),
                'tbl_user_idtbl_user'                         => Auth::id(),
                'tbl_production_order_idtbl_production_order' => $request->hideproductionmaterial,
                'tbl_product_idtbl_product'                   => $request->materialinfo,
            ]);

            return response()->json(['status' => 1, 'message' => 'Record added successfully']);

         } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage(),   // will show the real SQL error
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
            ], 500);
        }
    }

    /* ─────────────────────────────────────────
     |  GET QUALITY VIEW DESCRIPTION
     ───────────────────────────────────────── */

    public function qualityViewDescription(Request $request)
    {
        $recordID = $request->recordID;

        $rows = DB::table('tbl_packing_quality')
            ->where('tbl_production_order_idtbl_production_order', $recordID)
            ->where('status', 1)
            ->select(
                'idtbl_packing_quality',
                'examined_quantity',
                'net_weight',
                'gross_weight',
                'moisture',
                'color',
                'taste',
                'seal',
                'water_leakages',
                'statuspassfail',
                'comments'
            )
            ->get()
            ->map(function ($row) {
                $row->descstatus  = $row->statuspassfail == 1 ? 'PASS' : 'FAIL';
                $row->descstatus1 = $row->seal == 1 ? 'YES' : 'NO';
                $row->descstatus2 = $row->water_leakages == 1 ? 'YES' : 'NO';
                return $row;
            });

        return response()->json($rows);
    }

    /* ─────────────────────────────────────────
     |  GET QUALITY FOR EDIT
     ───────────────────────────────────────── */

    public function editQualityInfo(Request $request)
    {
        $recordID = $request->recordID;

        $row = DB::table('tbl_packing_quality')
            ->where('tbl_production_order_idtbl_production_order', $recordID)
            ->where('status', 1)
            ->select(
                'idtbl_packing_quality',
                'examined_quantity',
                'net_weight',
                'gross_weight',
                'moisture',
                'color',
                'taste',
                'seal',
                'water_leakages',
                'statuspassfail',
                'comments'
            )
            ->first();

        return response()->json($row);
    }

    /* ─────────────────────────────────────────
     |  UPDATE QUALITY
     ───────────────────────────────────────── */

    public function updateQuality(Request $request)
    {
        DB::beginTransaction();

        try {
            DB::table('tbl_packing_quality')
                ->where('tbl_production_order_idtbl_production_order', $request->editedproductionid)
                ->update([
                    'examined_quantity' => $request->exqty,
                    'net_weight'        => $request->netweight,
                    'gross_weight'      => $request->grossweight,
                    'moisture'          => $request->moisture,
                    'color'             => $request->color,
                    'taste'             => $request->taste,
                    'seal'              => $request->seal ?? 0,
                    'water_leakages'    => $request->leakages ?? 0,
                    'statuspassfail'    => $request->qualityform ?? 0,
                    'comments'          => $request->comment ?? '',
                    'updatedatetime'    => Carbon::now(),
                    'updateuser'        => Auth::id(),
                ]);

            DB::commit();

            return response()->json(['status' => 1, 'message' => 'Record updated successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage(),  // show real error while debugging
                'line'    => $e->getLine(),
            ], 500);
        }
    }
}