<?php

use App\Http\Controllers\Admin\History\HistoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('history')->name('history.')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('index');
    Route::get('/search', [HistoryController::class, 'search'])->name('search');
    Route::get('/create', [HistoryController::class, 'create'])->name('create');
    Route::post('/create', [HistoryController::class, 'store'])->name('store');
    Route::get('/{history}', [HistoryController::class, 'show'])->name('show');
    Route::post('/like/{history}', [HistoryController::class, 'like'])->name('like');
});
