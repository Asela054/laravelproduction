<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SupplierPOrder extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_supplier_porder';
    protected $primaryKey = 'idtbl_supplier_porder';
    public    $timestamps = false;

    protected $fillable = [
        'orderdate',
        'total',
        'vat',
        'nettotal',
        'vatpre',
        'remark',
        'confirmstatus',
        'status',
        'insertdatetime',
        'tbl_user_idtbl_user',
        'tbl_supplier_idtbl_supplier',
        'completestatus',
        'grnissuestatus',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'tbl_supplier_idtbl_supplier', 'idtbl_supplier');
    }

    public function details()
    {
        return $this->hasMany(SupplierPOrderDetail::class, 'tbl_supplier_porder_idtbl_supplier_porder', 'idtbl_supplier_porder');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('supplier_purchase_order')
            ->logOnly([
                'idtbl_supplier_porder',
                'orderdate',
                'total',
                'vat',
                'nettotal',
                'vatpre',
                'remark',
                'confirmstatus',
                'status',
                'insertdatetime',
                'tbl_user_idtbl_user',
                'tbl_supplier_idtbl_supplier',
                'completestatus',
                'grnissuestatus',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Supplier Purchase Order {$event}");
    }
}