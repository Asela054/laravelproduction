<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductBom extends Model
{
    use LogsActivity;

    protected $table      = 'tbl_product_bom';
    protected $primaryKey = 'idtbl_product_bom';
    public    $timestamps = false;

    protected $fillable = [
        'qty',
        'wastage',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_product_idtbl_product',
        'tbl_material_info_idtbl_material_info',
        'tbl_product_bom_info_idtbl_product_bom_info',
    ];

    public function materialInfo()
    {
        return $this->belongsTo(MaterialDetail::class,
            'tbl_material_info_idtbl_material_info',
            'idtbl_material_info');
    }

    public function bomInfo()
    {
        return $this->belongsTo(ProductBomInfo::class,
            'tbl_product_bom_info_idtbl_product_bom_info',
            'idtbl_product_bom_info');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('product_bom')
            ->logOnly([
                'qty',
                'wastage',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_product_idtbl_product',
                'tbl_material_info_idtbl_material_info',
                'tbl_product_bom_info_idtbl_product_bom_info',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Product BOM {$event}");
    }
}