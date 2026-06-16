<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialDetail extends Model
{
    use LogsActivity;

    protected $table      = 'tbl_material_info';
    protected $primaryKey = 'idtbl_material_info';
    public    $timestamps = false;

    protected $fillable = [
        'materialname',
        'materialinfocode',
        'unitperctn',
        'reorderlevel',
        'comment',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_material_category_idtbl_material_category',
        'tbl_unit_idtbl_unit',
    ];

    public function category()
    {
        return $this->belongsTo(MaterialCategory::class,
            'tbl_material_category_idtbl_material_category',
            'idtbl_material_category');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,
            'tbl_unit_idtbl_unit',
            'idtbl_unit');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_detail')
            ->logOnly([
                'materialname',
                'materialinfocode',
                'unitperctn',
                'reorderlevel',
                'comment',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_material_category_idtbl_material_category',
                'tbl_unit_idtbl_unit',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material Detail {$event}");
    }
}