<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $trends = Event::query()->where('event_id')
        $latestevents = EventResource::collection(Event::orderByDesc('id')
            ->take(4)
            ->get());
        $trends = EventResource::collection(Event::query()
            ->withCount('reservations')
            ->orderByDesc('reservations_count')
            ->take(4)
            ->get());

        return response()->json([
            'latestevents' => $latestevents,
            'trends' => $trends,
        ]);
        // $mostpopular = OrderList::where('user_id', Auth::id())
        //     ->with([
        //         'event' => function ($query) {
        //             $query->with('event_id');
        //         }
        //     ])->take(4)->get();
        // $mostpopular::select('event_id', DB::raw('COUNT(event_id) as count'))
        //     ->groupBy('event_id')
        //     ->orderBy('count', 'desc')
        //     ->take(4);
        // return (EventResource::collection($mostpopular));
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
    public function show(string $id)
    {
        //
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
