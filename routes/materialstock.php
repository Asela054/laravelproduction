<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialStock\MaterialStockController;

Route::prefix('materialstock')->name('materialstock.')->middleware(['auth'])->group(function () {
    Route::get('/',                          [MaterialStockController::class, 'index'])->name('index');
    Route::get('/data',                      [MaterialStockController::class, 'getData'])->name('data');
    Route::get('/batch-details',             [MaterialStockController::class, 'batchDetails'])->name('batch-details');
    Route::patch('/{id}/toggle-status',      [MaterialStockController::class, 'toggleStatus'])->name('toggle-status');
});