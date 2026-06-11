<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialGrnReturnDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $table      = 'tbl_material_grn_return_detail';
    protected $primaryKey = 'idtbl_material_grn_return_detail';
    public    $timestamps = false;

    protected $fillable = [
        'qty',
        'unitprice',
        'total',
        'status',
        'insertdatetime',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_material_grn_return_idtbl_material_grn_return',
        'tbl_material_info_idtbl_material_info',
    ];

    // ── Relationships ────────────────────────────────────────────────
    public function materialGrnReturn()
    {
        return $this->belongsTo(MaterialGrnReturn::class,
            'tbl_material_grn_return_idtbl_material_grn_return',
            'idtbl_material_grn_return');
    }

    public function material()
    {
        return $this->belongsTo(MaterialDetail::class,
            'tbl_material_info_idtbl_material_info',
            'idtbl_material_info');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_grn_return_detail')
            ->logOnly([
                'idtbl_material_grn_return_detail',
                'qty',
                'unitprice',
                'total',
                'status',
                'tbl_user_idtbl_user',
                'tbl_material_grn_return_idtbl_material_grn_return',
                'tbl_material_info_idtbl_material_info',
                'insertdatetime',
                'updatedatetime',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material GRN Return Detail {$event}");
    }
}