<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialGRN\MaterialGrnReturnController;

Route::prefix('materialgrnreturn')->name('materialgrnreturn.')->group(function () {

    Route::get('/',                    [MaterialGrnReturnController::class, 'index'])         ->name('index');

    Route::get('/data',                [MaterialGrnReturnController::class, 'getData'])       ->name('data');
    Route::get('/grn-list',            [MaterialGrnReturnController::class, 'listGrns'])      ->name('grn-list');
    Route::get('/grn/{id}',            [MaterialGrnReturnController::class, 'grnDetails'])    ->name('grn-details');
    Route::get('/next-return-number',  [MaterialGrnReturnController::class, 'nextReturnNumber'])->name('next-return-number');
    Route::post('/',                   [MaterialGrnReturnController::class, 'store'])         ->name('store');
    Route::get('/{id}',                [MaterialGrnReturnController::class, 'show'])          ->name('show');
    Route::delete('/{id}',             [MaterialGrnReturnController::class, 'destroy'])       ->name('destroy');
    Route::post('/{id}/confirm',       [MaterialGrnReturnController::class, 'confirm'])       ->name('confirm');
    Route::get('/{id}/pdf',            [MaterialGrnReturnController::class, 'pdf'])           ->name('pdf');
});