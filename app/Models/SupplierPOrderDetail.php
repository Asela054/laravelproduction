<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SupplierPOrderDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_supplier_porder_detail';
    protected $primaryKey = 'idtbl_supplier_porder_detail';
    public    $timestamps = false;

    protected $fillable = [
        'qty',
        'unitprice',
        'total',
        'status',
        'tbl_user_idtbl_user',
        'tbl_material_info_idtbl_material_info',
        'tbl_supplier_porder_idtbl_supplier_porder',
        'insertdatetime',
        'updatedatetime',
    ];

    public function material()
    {
        return $this->belongsTo(MaterialDetail::class,
            'tbl_material_info_idtbl_material_info',
            'idtbl_material_info');
    }

    public function supplierPOrder()
    {
        return $this->belongsTo(SupplierPOrder::class,
            'tbl_supplier_porder_idtbl_supplier_porder',
            'idtbl_supplier_porder');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('supplier_purchase_order_detail')
            ->logOnly([
                'idtbl_supplier_porder_detail',
                'qty',
                'unitprice',
                'total',
                'status',
                'tbl_user_idtbl_user',
                'tbl_material_info_idtbl_material_info',
                'tbl_supplier_porder_idtbl_supplier_porder',
                'insertdatetime',
                'updatedatetime',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Supplier Purchase Order Detail {$event}");
    }
}