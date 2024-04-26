<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchBuffetRequest;
use App\Http\Resources\BuffetResource;
use App\Models\Buffet;
use Illuminate\Http\Request;

class BuffetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchBuffetRequest $Request)
    {
        $buffets  = Buffet::query()
            ->where('category_id', $Request->category)
            //->where('type', $Request->type)
            ->when($Request->search, fn ($query, $search) => $query
                ->where('name', 'LIKE', '%' . $search . '%'))
            ->paginate(5);
        return BuffetResource::collection($buffets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $buffet = Buffet::create($request);

        // return BuffetResource::make($buffet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buffet $buffet)
    {
        return BuffetResource::make($buffet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buffet $buffet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buffet $buffet)
    {
        //
    }
}
