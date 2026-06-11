<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialGrnReturn extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_material_grn_return';
    protected $primaryKey = 'idtbl_material_grn_return';
    public    $timestamps = false;

    protected $fillable = [
        'return_number',
        'date',
        'batchno',
        'reason',
        'total',
        'nettotal',
        'status',
        'confirm_status',
        'insertdatetime',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_material_grn_idtbl_material_grn',
        'tbl_location_idtbl_location',
    ];

    // ── Auto-generate return number on creating ──────────────────────
    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->return_number)) {
                $model->return_number = static::generateReturnNumber();
            }
        });
    }

    public static function generateReturnNumber(): string
    {
        $last = \Illuminate\Support\Facades\DB::table('tbl_material_grn_return')
            ->whereNotNull('return_number')
            ->orderByDesc('idtbl_material_grn_return')
            ->lockForUpdate()
            ->value('return_number');

        $next = 1;
        if ($last && preg_match('/(\d+)$/', $last, $m)) {
            $next = (int) $m[1] + 1;
        }

        return 'MGRNR-' . $next;
    }

    // ── Relationships ────────────────────────────────────────────────
    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function materialGrn()
    {
        return $this->belongsTo(MaterialGrn::class,
            'tbl_material_grn_idtbl_material_grn',
            'idtbl_material_grn');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,
            'tbl_location_idtbl_location',
            'idtbl_locations');
    }

    public function details()
    {
        return $this->hasMany(MaterialGrnReturnDetail::class,
            'tbl_material_grn_return_idtbl_material_grn_return',
            'idtbl_material_grn_return');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_grn_return')
            ->logOnly([
                'idtbl_material_grn_return',
                'return_number',
                'date',
                'batchno',
                'reason',
                'total',
                'nettotal',
                'status',
                'confirm_status',
                'tbl_user_idtbl_user',
                'tbl_material_grn_idtbl_material_grn',
                'tbl_location_idtbl_location',
                'insertdatetime',
                'updatedatetime',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material GRN Return {$event}");
    }
}