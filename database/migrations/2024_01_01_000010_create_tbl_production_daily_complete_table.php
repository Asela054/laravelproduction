<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_daily_complete', function (Blueprint $table) {
            $table->increments('idtbl_production_daily_complete');
            $table->date('comdate');
            $table->double('qty');
            $table->double('damageqty');
            $table->integer('checkstatus')->nullable();
            $table->integer('checkperson')->nullable();
            $table->date('mfdate')->nullable();
            $table->date('expdate')->nullable();
            $table->string('batchno', 45)->nullable();
            $table->double('unitprice');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pdc_idx_user');
            $table->integer('tbl_production_order_idtbl_production_order')->index('pdc_idx_prod_order');
            $table->integer('tbl_product_idtbl_product')->index('pdc_idx_product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_daily_complete');
    }
};
