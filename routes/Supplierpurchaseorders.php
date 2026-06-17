<?php


use App\Http\Controllers\SupplierPOrder\SupplierPOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('supplierpurchaseorders')->name('supplierpurchaseorders.')->group(function () {
 
    Route::get('/',                 [SupplierPOrderController::class, 'index'])             ->name('index');
    Route::get('/data',             [SupplierPOrderController::class, 'getData'])            ->name('data');
    Route::get('/suppliers',        [SupplierPOrderController::class, 'getSupplierDetails']) ->name('getsuppliersdetails');
    Route::get('/materials',        [SupplierPOrderController::class, 'getMaterialDetails']) ->name('getmaterialsdetails');
    Route::post('/',                [SupplierPOrderController::class, 'store'])              ->name('store');
    Route::get('/{id}',             [SupplierPOrderController::class, 'show'])               ->name('show');
    Route::put('/{id}',             [SupplierPOrderController::class, 'update'])             ->name('update');
    Route::post('/status/{id}',     [SupplierPOrderController::class, 'updateStatus'])       ->name('status');
    Route::get('/pdf/{id}',         [SupplierPOrderController::class, 'pdf'])                ->name('pdf');
 
});