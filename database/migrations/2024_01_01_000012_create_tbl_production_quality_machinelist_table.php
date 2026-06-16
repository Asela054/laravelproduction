<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_production_quality_machinelist', function (Blueprint $table) {
            $table->increments('idtbl_production_quality_machinelist');
            $table->string('mesh_size', 250)->nullable();
            $table->double('wastage')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('insertdatetime')->nullable();
            $table->integer('tbl_production_quality_idtbl_production_quality')->index('pqm_idx_quality');
            $table->integer('tbl_user_idtbl_user')->index('pqm_idx_user');
            $table->integer('tbl_machine_idtbl_machine')->index('pqm_idx_machine');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_production_quality_machinelist');
    }
};
