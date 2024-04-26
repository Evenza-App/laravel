<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BuffetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyEventController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\ReservationController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('customer', CustomerController::class);

// Route::get('customer/{customer}', [CustomerController::class, 'show']);

Route::Put('customer/{customer}', [CustomerController::class, 'update']);

Route::post('login', [AuthenticationController::class, 'login']);

Route::post('register', [AuthenticationController::class, 'register']);

Route::post('logout', [AuthenticationController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::apiResource('categories', CategoryController::class);

Route::apiResource('buffet', BuffetController::class);

Route::apiResource('photographer', PhotographerController::class);

Route::apiResource('events', EventController::class);

Route::get('events/{event}', [EventController::class, 'show']);

Route::apiResource('reservations', ReservationController::class)
    ->middleware('auth:sanctum');

Route::apiResource('home', HomeController::class);

Route::apiResource('myevents', MyEventController::class)
    ->middleware('auth:sanctum');

// Route::get('popular', function () {
//     $popular = Event::query()
//         ->join('order_items', 'order_items.event_id', '=', 'events.id')
//         ->selectRaw('events.*, SUM(order_items.quantity) AS event_popular')
//         ->groupBy(['events.id'])
//         ->orderByDesc('event_popular')
//         ->take(4)
//         ->get();

//     return $popular;
// });
