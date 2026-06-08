<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialCategory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\MaterialDetail;
use App\Models\Unit;

class MaterialController extends Controller
{
    /* ================= CATEGORY ================= */

    public function category()
    {
        return view('material.materialcategory');
    }

    public function categoryData(Request $request)
    {
        $query = MaterialCategory::where('status', '!=', 3);

        return datatables($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'code' => 'required'
        ]);

        MaterialCategory::create([
            'categoryname' => $request->category,
            'categorycode' => $request->code,
            'status' => 1,
            'insertdatetime' => Carbon::now(),
            'tbl_user_idtbl_user' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function editCategory($id)
    {
        $category = MaterialCategory::findOrFail($id);

        return response()->json($category);
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'code' => 'required'
        ]);

        $category = MaterialCategory::findOrFail($id);

        $category->update([
            'categoryname' => $request->category,
            'categorycode' => $request->code,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id)
    {
        $category = MaterialCategory::findOrFail($id);

        $category->update([
            'status' => 3,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }

    public function categoryStatus(Request $request, $id)
    {
        $category = MaterialCategory::findOrFail($id);

        $category->update([
            'status' => $request->status,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Category status updated successfully'
        ]);
    }

    /* ================= DETAIL ================= */

    public function detail()
    {
        $categories = MaterialCategory::where('status', 1)->get();
        $units      = Unit::where('status', 1)->get();

        return view('material.materialdetail', compact('categories', 'units'));
    }

    public function detailData()
    {
        $query = MaterialDetail::with(['category', 'unit'])
            ->where('tbl_material_info.status', '!=', 3)
            ->select('tbl_material_info.*');

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('categoryname', fn ($row) => $row->category->categoryname ?? '-')
            ->addColumn('unitname',     fn ($row) => $row->unit->unitname ?? '-')
            ->make(true);
    }

    public function storeDetail(Request $request)
    {
        $request->validate([
            'materialname'     => 'required',
            'materialcode'     => 'required',
            'materialcategory' => 'required',
            'unit'             => 'required',
            'unitperctn'       => 'required|numeric',
            'reorder'          => 'required|numeric',
        ]);

        MaterialDetail::create([
            'materialname'                                  => $request->materialname,
            'materialinfocode'                              => $request->materialcode,
            'unitperctn'                                    => $request->unitperctn,
            'reorderlevel'                                  => $request->reorder,
            'comment'                                       => $request->comment,
            'status'                                        => 1,
            'insertdatetime'                                => Carbon::now(),
            'tbl_user_idtbl_user'                           => Auth::id(),
            'tbl_material_category_idtbl_material_category' => $request->materialcategory,
            'tbl_unit_idtbl_unit'                           => $request->unit,
        ]);

        return redirect()->back()->with('success', 'Material added successfully');
    }

    public function editDetail($id)
    {
        $detail = MaterialDetail::findOrFail($id);
        return response()->json($detail);
    }

    public function updateDetail(Request $request, $id)
    {
        $request->validate([
            'materialname'     => 'required',
            'materialcode'     => 'required',
            'materialcategory' => 'required',
            'unit'             => 'required',
            'unitperctn'       => 'required|numeric',
            'reorder'          => 'required|numeric',
        ]);

        $detail = MaterialDetail::findOrFail($id);

        $detail->update([
            'materialname'                                  => $request->materialname,
            'materialinfocode'                              => $request->materialcode,
            'unitperctn'                                    => $request->unitperctn,
            'reorderlevel'                                  => $request->reorder,
            'comment'                                       => $request->comment,
            'updateuser'                                    => Auth::id(),
            'updatedatetime'                                => Carbon::now(),
            'tbl_material_category_idtbl_material_category' => $request->materialcategory,
            'tbl_unit_idtbl_unit'                           => $request->unit,
        ]);

        return redirect()->back()->with('success', 'Material updated successfully');
    }

    public function deleteDetail($id)
    {
        $detail = MaterialDetail::findOrFail($id);

        $detail->update([
            'status'        => 3,
            'updateuser'    => Auth::id(),
            'updatedatetime'=> Carbon::now(),
        ]);

        return response()->json(['message' => 'Material deleted successfully']);
    }

    public function detailStatus(Request $request, $id)
    {
        $detail = MaterialDetail::findOrFail($id);

        $detail->update([
            'status'        => $request->status,
            'updateuser'    => Auth::id(),
            'updatedatetime'=> Carbon::now(),
        ]);

        return response()->json(['message' => 'Status updated successfully']);
    }
}