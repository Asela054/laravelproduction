<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UnitController extends Controller
{
    public function index()
    {
        return view('material.unit');
    }

    /* ================= DATATABLE ================= */
    public function data(Request $request)
    {
        $query = Unit::where('status', '!=', 3);

        return datatables($query)
            ->addIndexColumn()
            ->make(true);
    }

    /* ================= STORE ================= */
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required',
            'code' => 'required'
        ]);

        Unit::create([
            'unitname' => $request->unit,
            'unitcode' => $request->code,
            'status' => 1,
            'insertdatetime' => Carbon::now(),
            'tbl_user_idtbl_user' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Unit added successfully');
    }

    /* ================= EDIT ================= */
    public function edit($id)
    {
        $data = Unit::findOrFail($id);
        return response()->json($data);
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, $id)
    {
        $request->validate([
            'unit' => 'required',
            'code' => 'required'
        ]);

        $unit = Unit::findOrFail($id);

        $unit->update([
            'unitname' => $request->unit,
            'unitcode' => $request->code,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Unit updated successfully');
    }

    /* ================= DELETE (SOFT) ================= */
    public function delete($id)
    {
        $unit = Unit::findOrFail($id);

        $unit->update([
            'status' => 3,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Unit deleted successfully'
        ]);
    }

    /* ================= STATUS ================= */
    public function status(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->update([
            'status' => $request->status,
            'updateuser' => Auth::id(),
            'updatedatetime' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Status updated successfully'
        ]);
    }
}