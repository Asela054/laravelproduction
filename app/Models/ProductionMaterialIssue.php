<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionMaterialIssue extends Model
{
    use HasFactory;

    protected $table = 'tbl_production_material_issue';
    protected $primaryKey = 'idtbl_production_material_issue';
    public $timestamps = false;

    protected $fillable = [
        'qty',
        'batchno',
        'status',
        'insertdatetime',
        'updateuser',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_production_order_idtbl_production_order',
        'tbl_product_idtbl_product',
        'tbl_material_info_idtbl_material_info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'tbl_user_idtbl_user', 'idtbl_user');
    }

    public function order()
    {
        return $this->belongsTo(ProductionOrder::class, 'tbl_production_order_idtbl_production_order', 'idtbl_production_order');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'tbl_product_idtbl_product', 'idtbl_product');
    }
}
