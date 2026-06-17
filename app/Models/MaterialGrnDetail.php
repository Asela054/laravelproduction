<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialGrnDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_material_grn_detail';
    protected $primaryKey = 'idtbl_material_grn_detail';
    public    $timestamps = false;

    protected $fillable = [
        'qty',
        'unitprice',
        'total',
        'status',
        'insertdatetime',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_material_grn_idtbl_material_grn',
        'tbl_material_info_idtbl_material_info',
    ];

    public function materialGrn()
    {
        return $this->belongsTo(MaterialGrn::class,
            'tbl_material_grn_idtbl_material_grn',
            'idtbl_material_grn');
    }

    public function material()
    {
        return $this->belongsTo(MaterialDetail::class,
            'tbl_material_info_idtbl_material_info',
            'idtbl_material_info');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_grn_detail')
            ->logOnly([
                'idtbl_material_grn_detail',
                'qty',
                'unitprice',
                'total',
                'status',
                'tbl_user_idtbl_user',
                'tbl_material_grn_idtbl_material_grn',
                'tbl_material_info_idtbl_material_info',
                'insertdatetime',
                'updatedatetime',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material GRN Detail {$event}");
    }
}