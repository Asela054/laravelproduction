<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductionPackingQualityController;

/* ================= PRODUCTION PACKING QUALITY ================= */
Route::prefix('productionpackingquality')->name('productionpackingquality.')->group(function () {

    Route::get('/', [ProductionPackingQualityController::class, 'index'])
        ->name('index')
        ->middleware('privilege:6');

    Route::get('data', [ProductionPackingQualityController::class, 'data'])
        ->name('data');

    Route::post('semi-production-details', [ProductionPackingQualityController::class, 'semiProductionDetails'])
        ->name('semidetails');

    Route::post('quality-form', [ProductionPackingQualityController::class, 'qualityForm'])
        ->name('qualityform');

    Route::post('bom-materials', [ProductionPackingQualityController::class, 'bomMaterials'])
        ->name('bommaterials');

    Route::post('store-quality', [ProductionPackingQualityController::class, 'storeQuality'])
        ->name('store');

    Route::post('quality-view-description', [ProductionPackingQualityController::class, 'qualityViewDescription'])
        ->name('viewdescription');

    Route::post('edit-quality-info', [ProductionPackingQualityController::class, 'editQualityInfo'])
        ->name('editinfo');

    Route::post('update-quality', [ProductionPackingQualityController::class, 'updateQuality'])
        ->name('update');
});