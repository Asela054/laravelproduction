<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PackingQuality extends Model
{
    use LogsActivity;

    protected $table = 'tbl_packing_quality';
    protected $primaryKey = 'idtbl_packing_quality';
    public $timestamps = false;

    protected $fillable = [
        'examined_quantity',
        'net_weight',
        'gross_weight',
        'moisture',
        'color',
        'taste',
        'seal',
        'water_leakages',
        'statuspassfail',
        'comments',
        'status',
        'insertdatetime',
        'tbl_user_idtbl_user',
        'tbl_production_order_idtbl_production_order',
        'tbl_product_idtbl_product',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('packing_quality')
            ->logOnly([
                'examined_quantity',
                'net_weight',
                'gross_weight',
                'moisture',
                'color',
                'taste',
                'seal',
                'water_leakages',
                'statuspassfail',
                'comments',
                'status',
                'tbl_user_idtbl_user',
                'tbl_production_order_idtbl_production_order',
                'tbl_product_idtbl_product',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Packing Quality {$event}");
    }
}