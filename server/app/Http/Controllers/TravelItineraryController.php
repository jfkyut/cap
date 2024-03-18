<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelItinerary;
use App\Services\ChatbotService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Travel\GenerateItineraryRequest;

class TravelItineraryController extends Controller
{
    private $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }
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
        $places = implode(", ", $request->validated("places"));

        $activities = implode(", ", $request->validated("activities"));

        $accommodations = implode(", ", $request->validated("accommodations"));

        $message = [
            [
                'role' => 'user',
                'content' => 'Arrival date: ' . $request->validated('arrival') .  '. Departure date: ' . $request->validated('departure') . '. Barangays to visit: ' . $places . '. Activities to do: ' . $activities . '. Preferred accommodation type: ' . $accommodations
            ]
        ];

        $data = $this->chatbotService->initializeData($message, $this->chatbotService->travelGeneratorInitialMessage);

        $response = $this->chatbotService->generateResponse($data);

        $travelItinerary = Auth::user()->travelItineraries()->create([
            "title" => $response->title,
            "plan" => Crypt::encrypt($response->plan),
        ]);

        return response($travelItinerary);
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
