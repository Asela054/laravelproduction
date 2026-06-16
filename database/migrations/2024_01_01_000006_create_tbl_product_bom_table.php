<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_product_bom', function (Blueprint $table) {
            $table->increments('idtbl_product_bom');
            $table->double('qty');
            $table->double('wastage');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pb_idx_user');
            $table->integer('tbl_product_idtbl_product')->index('pb_idx_product');
            $table->integer('tbl_material_info_idtbl_material_info')->index('pb_idx_material');
            $table->integer('tbl_product_bom_info_idtbl_product_bom_info')->index('pb_idx_bom_info');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_product_bom');
    }
};
