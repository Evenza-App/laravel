<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyEventDetailsResource;
use App\Http\Resources\MyEventResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $reservations = $user->reservations;

        // return response()->json($reservations);
        // $events = Event::paginate();

        return MyEventResource::collection($reservations);
        // $events = Event::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        // $reservation = Reservation::findOrFail($reservation);
        // return response()->json($reservation);
        //  return MyEventResource::make($request);
        // $reservation->load('details');
        //return new EventDetailResource($event->details());
        //   $reservation->load('reservation');
        return MyEventDetailsResource::make($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
