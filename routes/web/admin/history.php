<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\History\HistoryController;

Route::prefix('history')->name('history.')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('index');
});
