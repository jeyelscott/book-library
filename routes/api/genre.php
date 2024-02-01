<?php

use App\HttpApi\V1\Controllers\Genre\GenreController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
});
