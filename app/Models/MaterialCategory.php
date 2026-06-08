<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_material_category';

    protected $primaryKey = 'idtbl_material_category';

    public $timestamps = false;

    protected $fillable = [
        'categoryname',
        'categorycode',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user'
    ];
}