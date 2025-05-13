<?php

use App\Http\Controllers\Admin\Editor\EditorController;
use Illuminate\Support\Facades\Route;

Route::prefix('editor')->name('editor.')->group(function () {
    Route::get('/', [EditorController::class, 'index'])->name('index');
});
