<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductBomInfo extends Model
{
    use LogsActivity;

    protected $table      = 'tbl_product_bom_info';
    protected $primaryKey = 'idtbl_product_bom_info';
    public    $timestamps = false;

    protected $fillable = [
        'title',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
    ];

    public function boms()
    {
        return $this->hasMany(ProductBom::class,
            'tbl_product_bom_info_idtbl_product_bom_info',
            'idtbl_product_bom_info');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('product_bom_info')
            ->logOnly([
                'title',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Product BOM Info {$event}");
    }
}