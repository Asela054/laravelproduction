<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_product';
    protected $primaryKey = 'idtbl_product';
    public $timestamps = false;

    protected $fillable = [
        'product_code',
        'barcode',
        'product_name',
        'common_name',
        'size',
        'unitprice',
        'saleprice',
        'dollarrate',
        'rol',
        'pices_per_box',
        'retail',
        'salediscount',
        'retaildiscount',
        'price_acceptable',
        'additional_discount',
        'starpoints',
        'uom',
        'productimagepath',
        'buying_qty',
        'free_qty',
        'status',
        'updatedatetime',
        'tbl_user_idtbl_user',
        'tbl_product_category_idtbl_product_category',
        'tbl_group_category_idtbl_group_category',
        'tbl_sub_product_category_idtbl_sub_product_category',
        'tbl_supplier_idtbl_supplier',
        'tbl_sizes_idtbl_sizes',
        'tbl_size_categories_idtbl_size_categories',
    ];
}