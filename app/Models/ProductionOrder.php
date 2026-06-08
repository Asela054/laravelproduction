<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    use HasFactory;

    protected $table = 'tbl_production_order';
    protected $primaryKey = 'idtbl_production_order';
    public $timestamps = false;

    protected $fillable = [
        'prodate',
        'procode',
        'prostartdate',
        'proenddate',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_customer_porder_idtbl_customer_porder',
        'tbl_company_idtbl_company',
        'tbl_company_branch_idtbl_company_branch',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function details()
    {
        return $this->hasMany(ProductionOrderDetail::class, 'tbl_production_order_idtbl_production_order', 'idtbl_production_order');
    }

    public function dailyCompletes()
    {
        return $this->hasMany(ProductionDailyComplete::class, 'tbl_production_order_idtbl_production_order', 'idtbl_production_order');
    }

    public function materialIssues()
    {
        return $this->hasMany(ProductionMaterialIssue::class, 'tbl_production_order_idtbl_production_order', 'idtbl_production_order');
    }
}
