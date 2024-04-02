<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BuffetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/customers', [CustomerController::class, 'index']);

Route::post('login', [AuthenticationController::class, 'login']);

Route::post('register', [AuthenticationController::class, 'register']);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('buffet', BuffetController::class);
