<?php

use App\HttpApi\V1\Controllers\Book\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('books', BookController::class)->only(['index', 'show']);
});
