<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialGRN\MaterialGrnController;

Route::prefix('materialgrn')->name('materialgrn.')->middleware(['auth'])->group(function () {
    Route::get('/',                     [MaterialGrnController::class, 'index'])->name('index');
    Route::get('/data',                 [MaterialGrnController::class, 'getData'])->name('data');
    Route::get('/spo-list',             [MaterialGrnController::class, 'listSupplierPOrders'])->name('spo-list');
    Route::get('/spo/{id}',             [MaterialGrnController::class, 'supplierPOrderDetails'])->name('spo.details');
    Route::post('/',                    [MaterialGrnController::class, 'store'])->name('store');
    Route::get('/{id}',                 [MaterialGrnController::class, 'show'])->name('show');
    Route::post('/{id}/confirm',        [MaterialGrnController::class, 'confirm'])->name('confirm');
    Route::get('/{id}/pdf',             [MaterialGrnController::class, 'pdf'])->name('pdf');
    Route::get('materialgrn/next-grn-number', [MaterialGrnController::class, 'nextGrnNumber'])->name('next-grn-number');
    Route::delete('/{id}',                   [MaterialGrnController::class, 'destroy'])->name('destroy');
});