<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Unit extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_unit';
    protected $primaryKey = 'idtbl_unit';
    public $timestamps = false;

    protected $fillable = [
        'unitname',
        'unitcode',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('unit')
            ->logOnly([
                'unitname',
                'unitcode',
                'status',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn($event) => "Unit {$event}");
    }
}