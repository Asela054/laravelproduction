<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductionQualityMachinelist extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_production_quality_machinelist';
    protected $primaryKey = 'idtbl_production_quality_machinelist';
    public $timestamps = false;

    protected $fillable = [
        'mesh_size',
        'wastage',
        'status',
        'insertdatetime',
        'tbl_production_quality_idtbl_production_quality',
        'tbl_user_idtbl_user',
        'tbl_machine_idtbl_machine',
    ];

    public function productionQuality()
    {
        return $this->belongsTo(ProductionQuality::class, 'tbl_production_quality_idtbl_production_quality', 'idtbl_production_quality');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('production_quality_machinelist')
            ->logOnly([
                'mesh_size',
                'wastage',
                'status',
                'tbl_production_quality_idtbl_production_quality',
                'tbl_user_idtbl_user',
                'tbl_machine_idtbl_machine',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Production Quality Machinelist {$event}");
    }
}