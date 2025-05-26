<?php


use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

include __DIR__ . '/web/admin/base.php';
include __DIR__ . '/web/landing/base.php';

Route::middleware('authCheck')->get('/', function () {
    abort(Response::HTTP_NOT_FOUND);
});
