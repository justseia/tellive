<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    include __DIR__ . '/profile.php';
    include __DIR__ . '/history.php';
    include __DIR__ . '/video.php';
});
