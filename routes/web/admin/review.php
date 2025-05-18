<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Review\ReviewController;

Route::prefix('review')->name('review.')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('index');
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/create', [ReviewController::class, 'store'])->name('store');
});
