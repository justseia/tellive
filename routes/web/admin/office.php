<?php

use App\Http\Controllers\Admin\Office\OfficeController;
use Illuminate\Support\Facades\Route;

Route::prefix('office')->name('office.')->group(function () {
    Route::get('/', [OfficeController::class, 'index'])->name('index');
});
