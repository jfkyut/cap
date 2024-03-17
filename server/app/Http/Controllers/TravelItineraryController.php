<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelItinerary;
use App\Http\Requests\Travel\GenerateItineraryRequest;

class TravelItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenerateItineraryRequest $request)
    {
        return $request->validated();
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelItinerary $travelItinerary)
    {
        //
    }

    public function update(Request $request, TravelItinerary $travelItinerary)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelItinerary $travelItinerary)
    {
        //
    }
}
