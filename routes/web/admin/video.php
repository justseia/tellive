<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Video\VideoController;

Route::prefix('video')->name('video.')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('index');
    Route::get('/create', [VideoController::class, 'create'])->name('create');
    Route::post('/create', [VideoController::class, 'store'])->name('store');
});
