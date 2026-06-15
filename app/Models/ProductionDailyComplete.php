<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductionDailyComplete extends Model
{
    use LogsActivity;

    protected $table      = 'tbl_production_daily_complete';
    protected $primaryKey = 'idtbl_production_daily_complete';
    public    $timestamps = false;

    protected $fillable = [
        'comdate',
        'qty',
        'damageqty',
        'checkstatus',
        'checkperson',
        'mfdate',
        'expdate',
        'batchno',
        'unitprice',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_production_order_idtbl_production_order',
        'tbl_product_idtbl_product',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class,
            'tbl_product_idtbl_product',
            'idtbl_product');
    }

    public function approvedBy()
    {
        return $this->belongsTo(\App\Models\User::class,
            'checkperson',
            'idtbl_user');
    }

    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class,
            'tbl_user_idtbl_user',
            'idtbl_user');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('production_daily_complete')
            ->logOnly([
                'comdate',
                'qty',
                'damageqty',
                'checkstatus',
                'checkperson',
                'mfdate',
                'expdate',
                'batchno',
                'unitprice',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_production_order_idtbl_production_order',
                'tbl_product_idtbl_product',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Production Daily Complete {$event}");
    }
}