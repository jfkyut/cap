<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;

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

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/profile', [ProfileController::class,'index']);
        Route::put('/profile', [ProfileController::class,'update']);
        Route::delete('/profile', [ProfileController::class,'destroy']);
        Route::put('/password', [PasswordController::class,'update']);

        Route::post('/chat', [ChatController::class, 'store']);
    });