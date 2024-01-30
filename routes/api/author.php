<?php

use App\HttpApi\V1\Controllers\Author\AuthorController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
});
