<?php

namespace App\Http\Controllers\MaterialStock;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\MaterialStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialStockController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('privilege:14')->only(['index', 'getData', 'batchDetails']);
    //     $this->middleware('privilege:14,edit')->only(['toggleStatus']);
    // }

    // Index
    public function index()
    {
        $locations = Location::select(['idtbl_locations', 'locationname'])
            ->where('status', 1)
            ->get();

        return view('materialstock.index', compact('locations'));
    }

    // get data 
    public function getData(Request $request)
    {
        $locationId = $request->input('location_id');

        $query = DB::table('tbl_material_stock as s')
            ->join('tbl_material_info as m', 'm.idtbl_material_info', '=', 's.tbl_material_info_idtbl_material_info')
            ->join('tbl_locations as l', 'l.idtbl_locations', '=', 's.tbl_location_idtbl_location')
            ->select([
                's.tbl_material_info_idtbl_material_info',
                's.tbl_location_idtbl_location',
                DB::raw('SUM(s.qty) as total_qty'),
                'm.materialname',
                'm.materialinfocode',
                'l.locationname',
            ])
            ->groupBy(
                's.tbl_material_info_idtbl_material_info',
                's.tbl_location_idtbl_location',
                'm.materialname',
                'm.materialinfocode',
                'l.locationname'
            );

        if ($locationId) {
            $query->where('s.tbl_location_idtbl_location', $locationId);
        }

        return datatables()->of($query)
            ->addIndexColumn()
            ->make(true);
    }

    // Batch-wise detail for a material at a location 
    public function batchDetails(Request $request)
    {
        $materialId = $request->input('material_id');
        $locationId = $request->input('location_id');

        $query = DB::table('tbl_material_stock as s')
            ->join('tbl_material_info as m', 'm.idtbl_material_info', '=', 's.tbl_material_info_idtbl_material_info')
            ->join('tbl_locations as l', 'l.idtbl_locations', '=', 's.tbl_location_idtbl_location')
            ->where('s.tbl_material_info_idtbl_material_info', $materialId)
            ->where('s.tbl_location_idtbl_location', $locationId)
            ->select([
                's.idtbl_material_stock',
                's.batchno',
                's.qty',
                's.unitprice',
                's.status',
                DB::raw('(s.qty * s.unitprice) as total_cost_value'),
                'm.materialname',
                'm.materialinfocode',
                'l.locationname',
            ]);

        return datatables()->of($query)
            ->addIndexColumn()
            ->make(true);
    }

    //  Toggle active / inactive for a single stock batch 
    public function toggleStatus($id)
    {
        $stock = MaterialStock::findOrFail($id);
        $newStatus = (int) $stock->status === 1 ? 0 : 1;

        $stock->update([
            'status'         => $newStatus,
            'updatedatetime' => now(),
        ]);

        return response()->json([
            'message' => $newStatus === 1 ? 'Batch activated' : 'Batch deactivated',
            'status'  => $newStatus,
        ]);
    }
}