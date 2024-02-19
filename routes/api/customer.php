<?php

use App\HttpApi\V1\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function () {
        Route::prefix('customer')
            ->name('customer.')
            ->group(function () {
                Route::post('verify-email', [CustomerController::class, 'verifyEmail'])->name('verifyEmail');
                Route::post('verify-account', [CustomerController::class, 'verifyAccount'])->name('verifyAccount');
            });
    });
