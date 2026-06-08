<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductionOrderController;

Route::prefix('production')->name('production.')->group(function () {
    Route::get('order', [ProductionOrderController::class, 'index'])
        ->name('order')->middleware('privilege:42');

    Route::get('order/data', [ProductionOrderController::class, 'data'])
        ->name('order.data');

    Route::post('order/check-machine', [ProductionOrderController::class, 'checkMachineAvailability'])
        ->name('order.check-machine');

    Route::post('order/details', [ProductionOrderController::class, 'productionDetailAccoProduction'])
        ->name('order.details');

    Route::post('order/qty-info', [ProductionOrderController::class, 'getQtyInfoAccoProductionDetail'])
        ->name('order.qty-info');

    Route::post('order/bom-list', [ProductionOrderController::class, 'productionBomListAccoFg'])
        ->name('order.bom-list');

    Route::post('order/production-info', [ProductionOrderController::class, 'getProductionInfo'])
        ->name('order.production-info');

    Route::post('order/issue-material', [ProductionOrderController::class, 'issueMaterialForProduction'])
        ->name('order.issue-material');

    Route::post('order/batch-list', [ProductionOrderController::class, 'getBatchNoListAccoMaterial'])
        ->name('order.batch-list');

    Route::match(['get', 'post'], 'order/sales-orders', [ProductionOrderController::class, 'getSalesOrders'])
        ->name('order.sales-orders');

    Route::match(['get', 'post'], 'order/sales-order-products', [ProductionOrderController::class, 'getSalesOrderProducts'])
        ->name('order.sales-order-products');

    Route::post('order/store', [ProductionOrderController::class, 'store'])
        ->name('order.store');

    Route::match(['get', 'post'], 'order/{id}/{status}/status', [ProductionOrderController::class, 'productionOrderStatus'])
        ->name('order.status');

    Route::get('packing-records', function () {
        return view('production.packing-records');
    })->name('packing.records')->middleware('privilege:57');

    Route::get('quality', function () {
        return view('production.quality');
    })->name('quality')->middleware('privilege:61');
});