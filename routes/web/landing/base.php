<?php

use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::name('landing.')->group(function () {
    Route::middleware('subdomainCheck')->group(function () {
        Route::get('/', [LandingController::class, 'index'])->name('index');
    });
});
