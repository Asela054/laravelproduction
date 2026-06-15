<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_unit', function (Blueprint $table) {
            $table->increments('idtbl_unit');
            $table->string('unitname', 45);
            $table->string('unitcode', 10)->unique();
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_unit');
    }
};
