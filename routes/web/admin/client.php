<?php

use App\Http\Controllers\Admin\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
});
