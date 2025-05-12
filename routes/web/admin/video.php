<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Video\VideoController;

Route::prefix('video')->name('video.')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('index');
});
