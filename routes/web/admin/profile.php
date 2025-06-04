<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Profile\ProfileController;

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/edit', [ProfileController::class, 'update'])->name('update');
    Route::post('/info', [ProfileController::class, 'info'])->name('info');
});
