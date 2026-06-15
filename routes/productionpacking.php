<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductionPackingController;

/* ================= PRODUCTION PACKING ================= */
Route::prefix('productionpacking')->name('productionpacking.')->group(function () {

    Route::get('/', [ProductionPackingController::class, 'index'])
        ->name('index')
        ->middleware('privilege:12');   // adjust privilege number as needed

    Route::get('data', [ProductionPackingController::class, 'data'])
        ->name('data');

    Route::post('check-qty', [ProductionPackingController::class, 'checkQty'])
        ->name('checkqty');

    Route::post('complete', [ProductionPackingController::class, 'storeComplete'])
        ->name('complete');

    Route::post('daily-complete', [ProductionPackingController::class, 'viewDailyComplete'])
        ->name('dailycomplete');

    Route::post('approve', [ProductionPackingController::class, 'approveComplete'])
        ->name('approve');

    Route::post('reject-complete', [ProductionPackingController::class, 'rejectComplete'])
    ->name('reject');
});