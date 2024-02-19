<?php

use App\HttpApi\V1\Controllers\Customer\CustomerAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function () {
        Route::post('login', [CustomerAuthController::class, 'login'])->name('login');
    });
