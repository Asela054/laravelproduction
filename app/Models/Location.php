<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Location extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tbl_locations';
    protected $primaryKey = 'idtbl_locations';
    public $timestamps = false;

    protected $fillable = [
        'province',
        'district',
        'city',
        'locationname',
        'address',
        'contact1',
        'contact2',
        'contactperson',
        'email',
        'headperson',
        'tbl_bank_idtbl_bank',
        'accountowner',
        'accountnumber',
        'status',
        'updatedatetime',
        'tbl_user_idtbl_user',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'tbl_bank_idtbl_bank', 'idtbl_bank');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district', 'idtbl_district');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('location')
            ->logOnly([
                'idtbl_locations',
                'province',
                'district',
                'city',
                'locationname',
                'address',
                'contact1',
                'contact2',
                'contactperson',
                'email',
                'headperson',
                'tbl_bank_idtbl_bank',
                'accountowner',
                'accountnumber',
                'status',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(
                fn($event) => "Location {$event}"
            );
    }
}