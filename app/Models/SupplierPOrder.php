<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SupplierPOrder extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_supplier_porder';
    protected $primaryKey = 'idtbl_supplier_porder';
    public    $timestamps = false;

    protected $fillable = [
        'order_number',
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

    // ── Auto-generate order number on creating ──────────────────────────
    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->order_number)) {
                $model->order_number = static::generateOrderNumber();
            }
        });
    }

    public static function generateOrderNumber(): string
    {
        $prefix  = 'SPO-' . now()->format('Ym') . '-';   // e.g. SPO-202606-

        // Lock the row so concurrent requests don't generate duplicates
        $last = DB::table('tbl_supplier_porder')
            ->where('order_number', 'like', $prefix . '%')
            ->orderByDesc('order_number')
            ->lockForUpdate()
            ->value('order_number');

        $next = $last
            ? (int) substr($last, strrpos($last, '-') + 1) + 1
            : 1;

        return $prefix . str_pad($next, 4, '0', STR_PAD_LEFT);
    }
    // ────────────────────────────────────────────────────────────────────

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
                'order_number',
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