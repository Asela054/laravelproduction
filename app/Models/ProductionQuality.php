<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProductionQuality extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_production_quality';
    protected $primaryKey = 'idtbl_production_quality';
    public $timestamps = false;

    protected $fillable = [
        'examined_quantity',
        'washing_temperature',
        'washing_time',
        'drying_temperature',
        'drying_time',
        'aftrer_drying_moisture',
        'drying_cooling_time',
        'cut_size',
        'cutting_wastage',
        'moisture_after_grinding',
        'roasting_temperature',
        'roasting_color',
        'roasting_time',
        'cooling_moisture',
        'cooling_time',
        'magnet_verification',
        'comments',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_semi_production_idtbl_semi_production',
        'tbl_material_info_idtbl_material_info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function material()
    {
        return $this->belongsTo(MaterialDetail::class, 'tbl_material_info_idtbl_material_info', 'idtbl_material_info');
    }

    public function machineList()
    {
        return $this->hasMany(ProductionQualityMachinelist::class, 'tbl_production_quality_idtbl_production_quality', 'idtbl_production_quality');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('production_quality')
            ->logOnly([
                'examined_quantity',
                'washing_temperature',
                'washing_time',
                'drying_temperature',
                'drying_time',
                'aftrer_drying_moisture',
                'drying_cooling_time',
                'cut_size',
                'cutting_wastage',
                'moisture_after_grinding',
                'roasting_temperature',
                'roasting_color',
                'roasting_time',
                'cooling_moisture',
                'cooling_time',
                'magnet_verification',
                'comments',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user',
                'tbl_semi_production_idtbl_semi_production',
                'tbl_material_info_idtbl_material_info',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Production Quality {$event}");
    }
}