<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialStock extends Model
{
    use HasFactory;

    protected $table      = 'tbl_material_stock';
    protected $primaryKey = 'idtbl_material_stock';
    public    $timestamps = false;

    protected $fillable = [
        'batchno',
        'qty',
        'unitprice',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_material_info_idtbl_material_info',
        'tbl_location_idtbl_location',
    ];

    public function material()
    {
        return $this->belongsTo(MaterialDetail::class,
            'tbl_material_info_idtbl_material_info',
            'idtbl_material_info');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,
            'tbl_location_idtbl_location',
            'idtbl_locations');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }
}