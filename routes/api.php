<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BuffetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\PhotographerController;
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

Route::apiResource('photographer', PhotographerController::class);

Route::apiResource('events', EventController::class);

Route::get('events/{event}', [EventController::class, 'show']);
