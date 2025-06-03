<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['authCheck'])->name('admin.')->group(function () {
    include __DIR__ . '/auth.php';
    Route::middleware(['subdomainCheck'])->group(function () {
        include __DIR__ . '/profile.php';
        include __DIR__ . '/history.php';
        include __DIR__ . '/video.php';
        include __DIR__ . '/review.php';
        include __DIR__ . '/office.php';
        include __DIR__ . '/client.php';
        include __DIR__ . '/editor.php';
    });
});
