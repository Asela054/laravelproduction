<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_material_info', function (Blueprint $table) {
            $table->increments('idtbl_material_info');
            $table->string('materialname', 45);
            $table->string('materialinfocode', 45);
            $table->double('unitperctn');
            $table->integer('reorderlevel');
            $table->mediumText('comment')->nullable();
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('mi_idx_user');
            $table->integer('tbl_material_category_idtbl_material_category')->index('mi_idx_category');
            $table->integer('tbl_unit_idtbl_unit')->nullable()->index('mi_idx_unit');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_material_info');
    }
};
