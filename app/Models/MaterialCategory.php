<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MaterialCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_material_category';
    protected $primaryKey = 'idtbl_material_category';
    public $timestamps = false;

    protected $fillable = [
        'categoryname',
        'categorycode',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('material_category')
            ->logOnly([
                'categoryname',
                'categorycode',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Material Category {$event}");
    }
}