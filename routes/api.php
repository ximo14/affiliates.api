<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::prefix('affiliates')->group(function () {
    Route::get('/', [AffiliateController::class, 'index']);
    Route::get('/{uuid}', [AffiliateController::class, 'show']);
    Route::post('/', [AffiliateController::class, 'store']);
});
