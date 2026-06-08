<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UnitController;

/* ================= MATERIALS ================= */
Route::prefix('materials')->name('materials.')->group(function () {

    /* ================= CATEGORY ================= */
    Route::get('category', [MaterialController::class, 'category'])
        ->name('category')
        ->middleware('privilege:8');

    Route::get('category/data', [MaterialController::class, 'categoryData'])
        ->name('category.data');

    Route::post('category/store', [MaterialController::class, 'storeCategory'])
        ->name('category.store');

    Route::get('category/{id}/edit', [MaterialController::class, 'editCategory'])
        ->name('category.edit');

    Route::put('category/{id}', [MaterialController::class, 'updateCategory'])
        ->name('category.update');

    Route::delete('category/{id}', [MaterialController::class, 'deleteCategory'])
        ->name('category.delete');

    Route::post('category/{id}/status', [MaterialController::class, 'categoryStatus'])
        ->name('category.status');


    /* ================= DETAIL ================= */
    Route::get('detail', [MaterialController::class, 'detail'])
        ->name('detail')->middleware('privilege:9');

    Route::get('detail/data', [MaterialController::class, 'detailData'])
        ->name('detail.data');

    Route::post('detail/store', [MaterialController::class, 'storeDetail'])
        ->name('detail.store');

    Route::get('detail/{id}/edit', [MaterialController::class, 'editDetail'])
        ->name('detail.edit');

    Route::put('detail/{id}', [MaterialController::class, 'updateDetail'])
        ->name('detail.update');

    Route::delete('detail/{id}', [MaterialController::class, 'deleteDetail'])
        ->name('detail.delete');

    Route::post('detail/{id}/status', [MaterialController::class, 'detailStatus'])
        ->name('detail.status');


    /* ================= UNIT (FIXED SAME STYLE) ================= */
    Route::get('unit', [UnitController::class, 'index'])
        ->name('unit')
        ->middleware('privilege:10');

    Route::get('unit/data', [UnitController::class, 'data'])
        ->name('unit.data');

    Route::post('unit/store', [UnitController::class, 'store'])
        ->name('unit.store');

    Route::get('unit/{id}/edit', [UnitController::class, 'edit'])
        ->name('unit.edit');

    Route::put('unit/{id}', [UnitController::class, 'update'])
        ->name('unit.update');

    Route::delete('unit/{id}', [UnitController::class, 'delete'])
        ->name('unit.delete');

    Route::post('unit/{id}/status', [UnitController::class, 'status'])
        ->name('unit.status');
});