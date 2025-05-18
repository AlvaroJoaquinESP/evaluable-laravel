<?php

use App\Http\Controllers\ControllerGeneral;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [JWTAuthController::class, 'register']);

Route::post('login', [JWTAuthController::class, 'login']);



Route::middleware([JwtMiddleware::class])->group(function () {

    Route::post('logout', [JWTAuthController::class, 'logout']);

    Route::post('/createOrder', [ControllerGeneral::class, 'create']);

    Route::post('/cancelOrder', [ControllerGeneral::class, 'cancel']);

    Route::get('/getAllByID/{id}', [ControllerGeneral::class, 'getAllByID']);

    Route::get('/getByID/{id}', [ControllerGeneral::class, 'getByID']);

    Route::get('user', [JWTAuthController::class, 'getUser']);
});
