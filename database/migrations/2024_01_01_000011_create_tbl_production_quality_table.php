<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_quality', function (Blueprint $table) {
            $table->increments('idtbl_production_quality');
            $table->double('examined_quantity');
            $table->double('washing_temperature');
            $table->string('washing_time', 45)->nullable();
            $table->double('drying_temperature');
            $table->string('drying_time', 45)->nullable();
            $table->double('aftrer_drying_moisture');
            $table->string('drying_cooling_time', 45)->nullable();
            $table->string('cut_size', 45);
            $table->double('cutting_wastage');
            $table->string('moisture_after_grinding', 45)->nullable();
            $table->string('roasting_temperature', 45)->nullable();
            $table->string('roasting_color', 45)->nullable();
            $table->string('roasting_time', 45)->nullable();
            $table->string('cooling_moisture', 45)->nullable();
            $table->string('cooling_time', 45)->nullable();
            $table->integer('magnet_verification');
            $table->mediumText('comments');
            $table->integer('status');
            $table->dateTime('insertdatetime');
            $table->integer('updateuser')->nullable();
            $table->dateTime('updatedatetime')->nullable();
            $table->integer('tbl_user_idtbl_user')->index('pq_idx_user');
            $table->integer('tbl_semi_production_idtbl_semi_production')->index('pq_idx_semi_prod');
            $table->integer('tbl_material_info_idtbl_material_info')->index('pq_idx_material');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_quality');
    }
};
