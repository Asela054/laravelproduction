<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductionOrderDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_production_orderdetail';
    protected $primaryKey = 'idtbl_production_orderdetail';
    public $timestamps = false;

    protected $fillable = [
        'qty',
        'issueqty',
        'unitprice',
        'total',
        'materialissue',
        'partialissued',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_production_order_idtbl_production_order',
        'tbl_product_idtbl_product',
    ];

    public function order()
    {
        return $this->belongsTo(ProductionOrder::class, 'tbl_production_order_idtbl_production_order', 'idtbl_production_order');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'tbl_product_idtbl_product', 'idtbl_product');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('production_order_detail')
            ->logOnly([
                'qty',
                'issueqty',
                'unitprice',
                'total',
                'materialissue',
                'partialissued',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_production_order_idtbl_production_order',
                'tbl_product_idtbl_product',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Production Order Detail {$event}");
    }
}