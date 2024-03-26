<?php

namespace App\Http\Controllers;

use App\Models\TravelItinerary;
use App\Services\ChatbotService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Services\TravelItineraryService;
use App\Http\Requests\Travel\TravelUpdateRequest;
use App\Http\Requests\Travel\GenerateItineraryRequest;

class TravelItineraryController extends Controller
{
    private $chatbotService;
    private $travelItineraryService;

    public function __construct(ChatbotService $chatbotService, TravelItineraryService $travelItineraryService)
    {
        $this->chatbotService = $chatbotService;
        $this->travelItineraryService = $travelItineraryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->travelItineraryService->getTravelItineraries());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenerateItineraryRequest $request)
    {
        $message = $this->travelItineraryService->initializeMessage($request->validated());

        $data = $this->chatbotService->initializeData($message, $this->chatbotService->travelGeneratorInitialMessage);

        $response = $this->chatbotService->generateResponse($data);

        $travelItinerary = $this->travelItineraryService->createTravelItinerary($response);

        $travelItinerary['plan'] = Crypt::decrypt($travelItinerary['plan']);

        return response($travelItinerary, 201);
    }

    public function update(TravelUpdateRequest $request, TravelItinerary $travelItinerary)
    {
        $travelItinerary->update($request->validated());
        $travelItinerary->save();

        $travelItinerary['plan'] = Crypt::decrypt($travelItinerary['plan']);

        return response($travelItinerary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelItinerary $travelItinerary)
    {
        $travelItinerary->delete();

        return response()->noContent();
    }

    public function destroyAll()
    {
        Auth::user()->chats()->delete();

        return response()->noContent();
    }
}
