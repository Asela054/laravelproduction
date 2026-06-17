<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_material_category', function (Blueprint $table) {
            $table->increments('idtbl_material_category');
            $table->string('categoryname', 45);
            $table->string('categorycode', 10);
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_material_category');
    }
};
