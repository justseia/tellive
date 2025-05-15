<?php

use App\Http\Controllers\Admin\History\HistoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('history')->name('history.')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('index');
    Route::get('/create', [HistoryController::class, 'create'])->name('create');
    Route::get('/create', [HistoryController::class, 'store'])->name('store');
    Route::get('/{history}', [HistoryController::class, 'show'])->name('show');
});
