<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinishGoodBomController;

/* ================= FINISH GOOD BOM ================= */
Route::prefix('finishgoodbom')->name('finishgoodbom.')->group(function () {

    Route::get('/', [FinishGoodBomController::class, 'index'])
        ->name('index')
        ->middleware('privilege:11');  // adjust privilege number as needed

    Route::get('data', [FinishGoodBomController::class, 'data'])
        ->name('data');

    Route::post('store', [FinishGoodBomController::class, 'store'])
        ->name('store');

    Route::get('{id}/edit', [FinishGoodBomController::class, 'edit'])
        ->name('edit');

    Route::put('{id}', [FinishGoodBomController::class, 'update'])
        ->name('update');

    Route::post('{id}/status', [FinishGoodBomController::class, 'status'])
        ->name('status');

    // BOM detail rows (view / edit / delete inline)
    Route::get('{id}/details', [FinishGoodBomController::class, 'bomDetails'])
        ->name('details');

    Route::get('row/{id}/edit', [FinishGoodBomController::class, 'bomRowEdit'])
        ->name('row.edit');

    Route::post('row/{id}/update', [FinishGoodBomController::class, 'bomRowUpdate'])
        ->name('row.update');

    Route::post('row/{id}/delete', [FinishGoodBomController::class, 'bomRowDelete'])
        ->name('row.delete');

    // AJAX helpers
    Route::get('ajax/finish-goods', [FinishGoodBomController::class, 'getFinishGoodList'])
        ->name('ajax.finishgoods');

    Route::get('ajax/materials-by-category', [FinishGoodBomController::class, 'getMaterialByCategory'])
        ->name('ajax.materials');

    Route::get('ajax/view-all', [FinishGoodBomController::class, 'viewAllBom'])
        ->name('ajax.viewall');
});