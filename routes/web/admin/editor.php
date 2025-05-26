<?php

use App\Http\Controllers\Admin\Editor\EditorController;
use Illuminate\Support\Facades\Route;

Route::prefix('editor')->name('editor.')->group(function () {
    Route::get('/', [EditorController::class, 'index'])->name('index');
    Route::post('/', [EditorController::class, 'update'])->name('update');
    Route::prefix('review')->name('review.')->group(function () {
        Route::get('/', [EditorController::class, 'createReview'])->name('create');
        Route::post('/', [EditorController::class, 'storeReview'])->name('store');
        Route::get('/{review}', [EditorController::class, 'editReview'])->name('edit');
        Route::post('/{review}', [EditorController::class, 'updateReview'])->name('update');
        Route::delete('/{review}', [EditorController::class, 'deleteReview'])->name('delete');
    });
    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [EditorController::class, 'createBanner'])->name('create');
        Route::post('/', [EditorController::class, 'storeBanner'])->name('store');
        Route::get('/{banner}', [EditorController::class, 'editBanner'])->name('edit');
        Route::post('/{banner}', [EditorController::class, 'updateBanner'])->name('update');
        Route::delete('/{banner}', [EditorController::class, 'deleteBanner'])->name('delete');
    });
});
