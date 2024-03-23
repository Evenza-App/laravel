<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/customers', [CustomerController::class, 'get_all_customers']);

Route::post('Login', [AuthenticationController::class, 'login']);

Route::post('Register', [AuthenticationController::class, 'register']);
