<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_material_issue', function (Blueprint $table) {
            $table->increments('idtbl_production_material_issue');
            $table->double('qty');
            $table->string('batchno', 300);
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pmi_idx_user');
            $table->integer('tbl_production_order_idtbl_production_order')->index('pmi_idx_prod_order');
            $table->integer('tbl_product_idtbl_product')->index('pmi_idx_product');
            $table->integer('tbl_material_info_idtbl_material_info')->index('pmi_idx_material');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_material_issue');
    }
};
