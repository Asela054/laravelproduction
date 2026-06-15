<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_packing_quality', function (Blueprint $table) {
            $table->increments('idtbl_packing_quality');
            $table->double('examined_quantity');
            $table->double('net_weight');
            $table->double('gross_weight');
            $table->string('moisture', 45);
            $table->string('color', 45);
            $table->string('taste', 45);
            $table->integer('seal');
            $table->string('water_leakages', 45);
            $table->integer('statuspassfail');
            $table->mediumText('comments');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pk_idx_user');
            $table->integer('tbl_production_order_idtbl_production_order')->index('pk_idx_prod_order');
            $table->integer('tbl_product_idtbl_product')->index('pk_idx_product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_packing_quality');
    }
};
