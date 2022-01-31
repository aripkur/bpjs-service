<?php

use App\Http\Controllers\AntreanController;
use App\Http\Controllers\AuthController;
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

Route::get('/token/create', [AuthController::class, 'createToken']);

Route::middleware(['bpjs_token'])->group(function () {
    Route::get('/a', function () {
        return "asd";
    });
    Route::get('/antrean/status', [AntreanController::class, 'status']);
});