<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ProductBomInfo;
use App\Models\ProductBom;
use App\Models\MaterialCategory;
use App\Models\MaterialDetail;

class FinishGoodBomController extends Controller
{
    /* ================= INDEX ================= */

    public function index()
    {
        $materialCategories = MaterialCategory::where('status', 1)->get();

        $materialNames = MaterialDetail::with('unit')
            ->where('status', 1)
            ->get();

        return view('finishgoodbom.finishgoodbom', compact('materialCategories', 'materialNames'));
    }

    /* ================= DATATABLE ================= */

    public function data()
    {
        $query = ProductBomInfo::where('status', '!=', 3)
            ->select('tbl_product_bom_info.*')
            ->with(['boms.materialInfo']);

        return datatables($query)
            ->addIndexColumn()

            ->addColumn('finish_good', function ($row) {
                $bom = $row->boms->where('status', 1)->first();
                if (!$bom) return '-';

                $product = DB::table('tbl_product')
                    ->where('tbl_product.idtbl_product', $bom->tbl_product_idtbl_product)
                    ->select('product_code', 'product_name')
                    ->first();

                return $product ? $product->product_code : '-';
            })

            ->addColumn('material_names', function ($row) {
                return $row->boms->where('status', 1)
                    ->map(fn($b) => optional($b->materialInfo)->materialname)
                    ->filter()
                    ->implode(', ');
            })

            ->make(true);
    }

    /* ================= STORE ================= */

    public function store(Request $request)
    {
        $request->validate([
            'bomtitle'         => 'required',
            'finishgood'       => 'required',
            'materialcategory' => 'required|array',
            'materialinfo'     => 'required|array',
            'qty'              => 'required|array',
            'wastage'          => 'required|array',
        ]);

        DB::beginTransaction();

        try {

            $bomInfo = ProductBomInfo::create([
                'title'               => $request->bomtitle,
                'status'              => 1,
                'insertdatetime'      => Carbon::now(),
                'tbl_user_idtbl_user' => Auth::id(),
            ]);

            foreach ($request->materialcategory as $i => $category) {
                ProductBom::create([
                    'qty'                                         => $request->qty[$i],
                    'wastage'                                     => $request->wastage[$i],
                    'status'                                      => 1,
                    'insertdatetime'                              => Carbon::now(),
                    'tbl_user_idtbl_user'                         => Auth::id(),
                    'tbl_product_idtbl_product'                   => $request->finishgood,
                    'tbl_material_info_idtbl_material_info'       => $request->materialinfo[$i],
                    'tbl_product_bom_info_idtbl_product_bom_info' => $bomInfo->idtbl_product_bom_info,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'BOM created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /* ================= EDIT ================= */

    public function edit($id)
    {
        $bomInfo = ProductBomInfo::findOrFail($id);

        $boms = ProductBom::where('tbl_product_bom_info_idtbl_product_bom_info', $id)
            ->where('status', 1)
            ->get();

        $finishGood = null;

        if ($boms->isNotEmpty()) {
            $finishGood = DB::table('tbl_product')
                ->where('idtbl_product', $boms->first()->tbl_product_idtbl_product)
                ->select('idtbl_product', 'product_code', 'product_name')
                ->first();
        }

        $categories = MaterialCategory::where('status', 1)->get();

        $bomRows = $boms->map(function ($bom) use ($categories) {

            $material = DB::table('tbl_material_info')
                ->join('tbl_unit', 'tbl_unit.idtbl_unit', '=', 'tbl_material_info.tbl_unit_idtbl_unit')
                ->where('tbl_material_info.idtbl_material_info', $bom->tbl_material_info_idtbl_material_info)
                ->select(
                    'tbl_material_info.idtbl_material_info',
                    'tbl_material_info.materialinfocode',
                    'tbl_material_info.materialname',
                    'tbl_material_info.tbl_material_category_idtbl_material_category',
                    'tbl_unit.unitcode'
                )
                ->first();

            $materialsInCategory = DB::table('tbl_material_info')
                ->join('tbl_unit', 'tbl_unit.idtbl_unit', '=', 'tbl_material_info.tbl_unit_idtbl_unit')
                ->where('tbl_material_info.tbl_material_category_idtbl_material_category',
                    optional($material)->tbl_material_category_idtbl_material_category)
                ->where('tbl_material_info.status', 1)
                ->select(
                    'tbl_material_info.idtbl_material_info',
                    'tbl_material_info.materialinfocode',
                    'tbl_material_info.materialname',
                    'tbl_unit.unitcode'
                )
                ->get();

            return [
                'bom'                 => $bom,
                'material'            => $material,
                'materialsInCategory' => $materialsInCategory,
                'categories'          => $categories,
            ];
        });

        return response()->json([
            'id'         => $bomInfo->idtbl_product_bom_info,
            'title'      => $bomInfo->title,
            'finishGood' => $finishGood,
            'bomRows'    => $bomRows,
        ]);
    }

    /* ================= UPDATE ================= */

    public function update(Request $request, $id)
    {
        $request->validate([
            'bomtitle'         => 'required',
            'finishgood'       => 'required',
            'materialcategory' => 'required|array',
            'materialinfo'     => 'required|array',
            'qty'              => 'required|array',
            'wastage'          => 'required|array',
        ]);

        DB::beginTransaction();

        try {

            $bomInfo = ProductBomInfo::findOrFail($id);

            $bomInfo->update([
                'title'          => $request->bomtitle,
                'updateuser'     => Auth::id(),
                'updatedatetime' => Carbon::now(),
            ]);

            ProductBom::where('tbl_product_bom_info_idtbl_product_bom_info', $id)->delete();

            foreach ($request->materialcategory as $i => $category) {
                ProductBom::create([
                    'qty'                                         => $request->qty[$i],
                    'wastage'                                     => $request->wastage[$i],
                    'status'                                      => 1,
                    'insertdatetime'                              => Carbon::now(),
                    'tbl_user_idtbl_user'                         => Auth::id(),
                    'tbl_product_idtbl_product'                   => $request->finishgood,
                    'tbl_material_info_idtbl_material_info'       => $request->materialinfo[$i],
                    'tbl_product_bom_info_idtbl_product_bom_info' => $id,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'BOM updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /* ================= STATUS ================= */

    public function status(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $now = Carbon::now();

            ProductBomInfo::where('idtbl_product_bom_info', $id)->update([
                'status'         => $request->status,
                'updateuser'     => Auth::id(),
                'updatedatetime' => $now,
            ]);

            ProductBom::where('tbl_product_bom_info_idtbl_product_bom_info', $id)->update([
                'status'         => $request->status,
                'updateuser'     => Auth::id(),
                'updatedatetime' => $now,
            ]);

            DB::commit();

            $messages = [
                1 => 'BOM activated',
                2 => 'BOM deactivated',
                3 => 'BOM deleted'
            ];

            return response()->json([
                'message' => $messages[$request->status] ?? 'Status updated'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /* ================= BOM DETAILS ================= */

    public function bomDetails($id)
    {
        return DB::table('tbl_product_bom')
            ->join('tbl_material_info', 'tbl_material_info.idtbl_material_info', '=', 'tbl_product_bom.tbl_material_info_idtbl_material_info')
            ->join('tbl_material_category', 'tbl_material_category.idtbl_material_category', '=', 'tbl_material_info.tbl_material_category_idtbl_material_category')
            ->join('tbl_unit', 'tbl_unit.idtbl_unit', '=', 'tbl_material_info.tbl_unit_idtbl_unit')
            ->where('tbl_product_bom.tbl_product_bom_info_idtbl_product_bom_info', $id)
            ->where('tbl_product_bom.status', 1)
            ->select(
                'tbl_product_bom.idtbl_product_bom',
                'tbl_product_bom.qty',
                'tbl_product_bom.wastage',
                'tbl_material_category.categoryname',
                'tbl_material_info.materialname',
                'tbl_material_info.materialinfocode',
                'tbl_unit.unitcode'
            )
            ->get();
    }

    /* ================= ROW EDIT ================= */

    public function bomRowEdit($id)
    {
        return DB::table('tbl_product_bom')
            ->join('tbl_material_info', 'tbl_material_info.idtbl_material_info', '=', 'tbl_product_bom.tbl_material_info_idtbl_material_info')
            ->join('tbl_material_category', 'tbl_material_category.idtbl_material_category', '=', 'tbl_material_info.tbl_material_category_idtbl_material_category')
            ->where('tbl_product_bom.idtbl_product_bom', $id)
            ->where('tbl_product_bom.status', 1)
            ->select(
                'tbl_product_bom.idtbl_product_bom',
                'tbl_product_bom.qty',
                'tbl_product_bom.wastage',
                'tbl_product_bom.tbl_material_info_idtbl_material_info',
                'tbl_material_category.categoryname',
                'tbl_material_info.materialname'
            )
            ->first();
    }

    /* ================= ROW UPDATE ================= */

    public function bomRowUpdate(Request $request, $id)
    {
        $request->validate([
            'materialinfo'      => 'required',
            'quantity'          => 'required|numeric',
            'wastagepresentage' => 'required|numeric',
        ]);

        ProductBom::where('idtbl_product_bom', $id)->update([
            'tbl_material_info_idtbl_material_info' => $request->materialinfo,
            'qty'            => $request->quantity,
            'wastage'        => $request->wastagepresentage,
            'updateuser'     => Auth::id(),
            'updatedatetime' => Carbon::now(),
        ]);

        return response()->json(['message' => 'BOM row updated successfully']);
    }

    /* ================= ROW DELETE ================= */

    public function bomRowDelete($id)
    {
        ProductBom::where('idtbl_product_bom', $id)->update([
            'status'         => 3,
            'updateuser'     => Auth::id(),
            'updatedatetime' => Carbon::now(),
        ]);

        return response()->json(['message' => 'BOM row removed successfully']);
    }

    /* ================= FINISH GOOD LIST ================= */

    public function getFinishGoodList(Request $request)
    {
        $term = $request->get('term', '');

        return DB::table('tbl_product')
            ->where('status', 1)
            ->when($term, fn($q) => $q->where('product_code', 'like', "$term%"))
            ->limit(10)
            ->select(
                'idtbl_product as id',
                DB::raw("CONCAT(product_name, ' - ', product_code) as text")
            )
            ->get();
    }

    /* ================= MATERIAL BY CATEGORY ================= */

    public function getMaterialByCategory(Request $request)
    {
        return DB::table('tbl_material_info')
            ->join('tbl_unit', 'tbl_unit.idtbl_unit', '=', 'tbl_material_info.tbl_unit_idtbl_unit')
            ->where('tbl_material_info.tbl_material_category_idtbl_material_category', $request->category_id)
            ->where('tbl_material_info.status', 1)
            ->select(
                'tbl_material_info.idtbl_material_info',
                'tbl_material_info.materialinfocode',
                'tbl_material_info.materialname',
                'tbl_unit.unitcode'
            )
            ->get();
    }

    /* ================= VIEW ALL BOM ================= */

    public function viewAllBom()
    {
        $products = DB::table('tbl_product_bom')
            ->join('tbl_product', 'tbl_product.idtbl_product', '=', 'tbl_product_bom.tbl_product_idtbl_product')
            ->where('tbl_product.status', 1)
            ->groupBy(
                'tbl_product.idtbl_product',
                'tbl_product.product_code',
                'tbl_product.product_name'
            )
            ->select(
                'tbl_product.idtbl_product',
                'tbl_product.product_code',
                'tbl_product.product_name'
            )
            ->get();

        return $products->map(function ($product) {

            $boms = DB::table('tbl_product_bom')
                ->join('tbl_material_info', 'tbl_material_info.idtbl_material_info', '=', 'tbl_product_bom.tbl_material_info_idtbl_material_info')
                ->join('tbl_unit', 'tbl_unit.idtbl_unit', '=', 'tbl_material_info.tbl_unit_idtbl_unit')
                ->where('tbl_product_bom.tbl_product_idtbl_product', $product->idtbl_product)
                ->where('tbl_product_bom.status', 1)
                ->select(
                    'tbl_material_info.materialinfocode',
                    'tbl_material_info.materialname',
                    'tbl_product_bom.qty',
                    'tbl_unit.unitcode',
                    'tbl_product_bom.wastage'
                )
                ->get();

            return [
                'product' => $product,
                'boms'    => $boms
            ];
        });
    }
}