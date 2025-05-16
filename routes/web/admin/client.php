<?php

use App\Http\Controllers\Admin\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::get('/{client}', [ClientController::class, 'show'])->name('show');
});
