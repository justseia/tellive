<?php

use Illuminate\Support\Facades\Route;

Route::name('landing.')->group(function () {
    Route::get('/', function () {
        return view('landing.index');
    })->name('index');
});
