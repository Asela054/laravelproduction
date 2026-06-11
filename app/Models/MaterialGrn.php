<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialGrn extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_material_grn';
    protected $primaryKey = 'idtbl_material_grn';
    public    $timestamps = false;

    protected $fillable = [
        'grn_number',
        'date',
        'invoicenum',
        'dispatchnum',
        'batchno',
        'total',
        'vatamount',
        'nettotal',
        'status',
        'confirm_status',
        'insertdatetime',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_supplier_porder_idtbl_supplier_porder',
        'tbl_location_idtbl_location',
    ];

    // ── Auto-generate GRN number on creating ────────────────────────────
    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->grn_number)) {
                $model->grn_number = static::generateGrnNumber();
            }
            if (empty($model->batchno)) {
                $model->batchno = static::generateBatchNumber();
            }
        });
    }

    public static function generateGrnNumber(): string
    {
        $last = \Illuminate\Support\Facades\DB::table('tbl_material_grn')
            ->whereNotNull('grn_number')
            ->orderByDesc('idtbl_material_grn')
            ->lockForUpdate()
            ->value('grn_number');

        $next = 1;
        if ($last && preg_match('/(\d+)$/', $last, $m)) {
            $next = (int) $m[1] + 1;
        }

        return 'MGRN-' . $next;
    }

    public static function generateBatchNumber(): string
    {
        $prefix = 'MBTH-' . now()->format('Ym') . '-';

        $last = \Illuminate\Support\Facades\DB::table('tbl_material_grn')
            ->where('batchno', 'like', $prefix . '%')
            ->orderByDesc('batchno')
            ->lockForUpdate()
            ->value('batchno');

        $next = $last
            ? (int) substr($last, strrpos($last, '-') + 1) + 1
            : 1;

        return $prefix . str_pad($next, 4, '0', STR_PAD_LEFT);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function supplierPOrder()
    {
        return $this->belongsTo(SupplierPOrder::class,
            'tbl_supplier_porder_idtbl_supplier_porder',
            'idtbl_supplier_porder');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,
            'tbl_location_idtbl_location',
            'idtbl_locations');
    }

    public function details()
    {
        return $this->hasMany(MaterialGrnDetail::class,
            'tbl_material_grn_idtbl_material_grn',
            'idtbl_material_grn');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_grn')
            ->logOnly([
                'idtbl_material_grn',
                'grn_number',
                'date',
                'invoicenum',
                'dispatchnum',
                'batchno',
                'total',
                'vatamount',
                'nettotal',
                'status',
                'confirm_status',
                'insertdatetime',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_supplier_porder_idtbl_supplier_porder',
                'tbl_location_idtbl_location',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material GRN {$event}");
    }
}