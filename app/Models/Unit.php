<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'tbl_unit';

    protected $primaryKey = 'idtbl_unit';

    public $timestamps = false;

    protected $fillable = [
        'unitname',
        'unitcode',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user'
    ];
}
