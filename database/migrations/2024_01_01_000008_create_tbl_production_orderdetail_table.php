<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_orderdetail', function (Blueprint $table) {
            $table->increments('idtbl_production_orderdetail');
            $table->double('qty');
            $table->double('issueqty');
            $table->double('unitprice');
            $table->double('total');
            $table->integer('materialissue');
            $table->integer('partialissued');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pod_idx_user');
            $table->integer('tbl_production_order_idtbl_production_order')->index('pod_idx_prod_order');
            $table->integer('tbl_product_idtbl_product')->index('pod_idx_product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_orderdetail');
    }
};
