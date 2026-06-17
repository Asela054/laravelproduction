<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_material_stock', function (Blueprint $table) {
            $table->increments('idtbl_material_stock');
            $table->string('batchno', 45);
            $table->double('qty');
            $table->double('unitprice');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('ms_idx_user');
            $table->integer('tbl_material_info_idtbl_material_info')->index('ms_idx_material');
            $table->integer('tbl_location_idtbl_location')->index('ms_idx_location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_material_stock');
    }
};
