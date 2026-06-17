<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Supplier extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_supplier';
    protected $primaryKey = 'idtbl_supplier';
    public $timestamps = false;

    protected $fillable = [
        'suppliername',
        'supcode',
        'contactone',
        'contacttwo',
        'email',
        'address',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
    ];

    /**
     * Activity Log configuration
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('supplier')
            ->logOnly([
                'idtbl_supplier',
                'suppliername',
                'supcode',
                'contactone',
                'contacttwo',
                'email',
                'address',
                'status',
                'insertdatetime',
                'updateuser',
                'updatedatetime',
                'tbl_user_idtbl_user'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(
                fn($event) =>
                "Supplier {$event}"
            );
    }
}
