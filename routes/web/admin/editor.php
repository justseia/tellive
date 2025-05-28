<?php

use App\Http\Controllers\Admin\Editor\BannerController;
use App\Http\Controllers\Admin\Editor\EditorController;
use App\Http\Controllers\Admin\Editor\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('editor')->name('editor.')->group(function () {
    Route::get('/', [EditorController::class, 'index'])->name('index');
    Route::post('/', [EditorController::class, 'update'])->name('update');

    Route::prefix('review')->name('review.')->group(function () {
        Route::get('/', [ReviewController::class, 'create'])->name('create');
        Route::post('/', [ReviewController::class, 'store'])->name('store');
        Route::get('/{review}', [ReviewController::class, 'edit'])->name('edit');
        Route::post('/{review}', [ReviewController::class, 'update'])->name('update');
        Route::delete('/{review}', [ReviewController::class, 'delete'])->name('delete');
    });

    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [BannerController::class, 'create'])->name('create');
        Route::post('/', [BannerController::class, 'store'])->name('store');
        Route::get('/{banner}', [BannerController::class, 'edit'])->name('edit');
        Route::post('/{banner}', [BannerController::class, 'update'])->name('update');
        Route::delete('/{banner}', [BannerController::class, 'delete'])->name('delete');
    });

});
