<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPhotographerRequest;
use App\Http\Resources\PhotographerResource;
use App\Models\Photographer;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPhotographerRequest $Request)
    {
        $photographers = Photographer::query()
            // ->where('id', $Request->photographer)
            ->when($Request->search, fn ($query, $search) => $query
                ->where('name', 'LIKE', '%'.$search.'%'))
            ->paginate(5);

        return PhotographerResource::collection($photographers);
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
    public function show(Photographer $photographer)
    {
        return PhotographerResource::make($photographer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photographer $photographer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photographer $photographer)
    {
        //
    }
}
