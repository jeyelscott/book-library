<?php

use App\HttpApi\V1\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['guest'])
    ->group(function () {
        //
    });
foreach (glob(__DIR__ . '/api/*.php') as $routeFile) {
    include $routeFile;
}
