<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_order', function (Blueprint $table) {
            $table->increments('idtbl_production_order');
            $table->date('prodate');
            $table->integer('procode');
            $table->date('prostartdate')->nullable();
            $table->date('proenddate')->nullable();
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('po_idx_user');
            $table->integer('tbl_customer_order_idtbl_customer_order')->nullable()->index('po_idx_customer_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_order');
    }
};
