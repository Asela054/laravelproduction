<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Material GRN header ──────────────────────────────────────────
        Schema::create('tbl_material_grn', function (Blueprint $table) {
            $table->increments('idtbl_material_grn');
            $table->string('grn_number', 30)->unique();
            $table->date('date');
            $table->string('invoicenum', 255);
            $table->string('dispatchnum', 255);
            $table->string('batchno', 100)->nullable();
            $table->double('total');
            $table->double('vatamount')->default(0);
            $table->double('nettotal');
            $table->integer('status')->default(1);
            $table->tinyInteger('confirm_status')->default(0);
            $table->datetime('insertdatetime');
            $table->datetime('updatedatetime')->nullable();

            $table->unsignedInteger('tbl_user_idtbl_user');
            $table->unsignedInteger('tbl_supplier_porder_idtbl_supplier_porder');
            $table->unsignedInteger('tbl_location_idtbl_location');

            $table->foreign('tbl_user_idtbl_user')
                ->references('idtbl_user')->on('tbl_user');
            $table->foreign('tbl_supplier_porder_idtbl_supplier_porder')
                ->references('idtbl_supplier_porder')->on('tbl_supplier_porder');
            $table->foreign('tbl_location_idtbl_location')
                ->references('idtbl_locations')->on('tbl_locations');
        });

        // ── Material GRN detail lines ────────────────────────────────────
        Schema::create('tbl_material_grn_detail', function (Blueprint $table) {
            $table->increments('idtbl_material_grn_detail');
            $table->double('qty');
            $table->double('unitprice');
            $table->double('total');
            $table->integer('status')->default(1);
            $table->datetime('insertdatetime');
            $table->datetime('updatedatetime')->nullable();

            $table->unsignedInteger('tbl_user_idtbl_user');
            $table->unsignedInteger('tbl_material_grn_idtbl_material_grn');
            $table->unsignedInteger('tbl_material_info_idtbl_material_info');

            $table->foreign('tbl_user_idtbl_user')
                ->references('idtbl_user')->on('tbl_user');
            $table->foreign('tbl_material_grn_idtbl_material_grn')
                ->references('idtbl_material_grn')->on('tbl_material_grn');
            $table->foreign('tbl_material_info_idtbl_material_info')
                ->references('idtbl_material_info')->on('tbl_material_info');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_material_grn_detail');
        Schema::dropIfExists('tbl_material_grn');
    }
};