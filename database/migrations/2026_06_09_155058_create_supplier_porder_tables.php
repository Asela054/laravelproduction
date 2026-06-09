<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── tbl_supplier_porder ───────────────────────────────────────────────
        Schema::create('tbl_supplier_porder', function (Blueprint $table) {
            $table->increments('idtbl_supplier_porder');
            $table->date('orderdate')->nullable();
            $table->decimal('total',    15, 2)->default(0);
            $table->decimal('vat',      15, 2)->default(0);
            $table->decimal('nettotal', 15, 2)->default(0);
            $table->decimal('vatpre',   10, 2)->default(0);
            $table->text('remark')->nullable();
            $table->tinyInteger('confirmstatus')->default(0); // 0=pending, 1=confirmed
            $table->tinyInteger('status')->default(1);        // 1=active, 3=deleted
            $table->datetime('insertdatetime')->nullable();
            $table->tinyInteger('completestatus')->default(0);
            $table->tinyInteger('grnissuestatus')->default(0);

            $table->unsignedInteger('tbl_user_idtbl_user');
            $table->unsignedInteger('tbl_supplier_idtbl_supplier');

            $table->foreign('tbl_user_idtbl_user')
                  ->references('idtbl_user')->on('tbl_user');

            $table->foreign('tbl_supplier_idtbl_supplier')
                  ->references('idtbl_supplier')->on('tbl_supplier');
        });

        // ── tbl_supplier_porder_detail ────────────────────────────────────────
        Schema::create('tbl_supplier_porder_detail', function (Blueprint $table) {
            $table->increments('idtbl_supplier_porder_detail');
            $table->date('date')->nullable();
            $table->string('type', 50)->nullable();
            $table->decimal('qty',         15, 2)->default(0);
            $table->decimal('unitprice',   15, 2)->default(0);
            $table->decimal('saleprice',   15, 2)->default(0);
            $table->decimal('retailprice', 15, 2)->default(0);
            $table->decimal('total',       15, 2)->default(0);
            $table->tinyInteger('status')->default(1);
            $table->datetime('insertdatetime')->nullable();
            $table->datetime('updatedatetime')->nullable();

            $table->unsignedInteger('tbl_user_idtbl_user');
            $table->unsignedInteger('tbl_material_info_idtbl_material_info');
            $table->unsignedInteger('tbl_supplier_porder_idtbl_supplier_porder');

            $table->foreign('tbl_user_idtbl_user')
                  ->references('idtbl_user')->on('tbl_user');

            $table->foreign('tbl_material_info_idtbl_material_info')
                  ->references('idtbl_material_info')->on('tbl_material_info');

            $table->foreign('tbl_supplier_porder_idtbl_supplier_porder')
                  ->references('idtbl_supplier_porder')->on('tbl_supplier_porder');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_supplier_porder_detail');
        Schema::dropIfExists('tbl_supplier_porder');
    }
};