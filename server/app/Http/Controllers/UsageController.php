<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\Usage\ChartRequest;
use App\Http\Requests\Usage\NewUsageRequest;

class UsageController extends Controller
{
    public function store(NewUsageRequest $request)
    {
        Usage::create([
            'name' => $request->validated('name'),
            'date' => Date::now()->format('Y-m-d'),
        ]);

        return response()->noContent();
    }

    public function pie(ChartRequest $request)
    {
        $nthDays = Date::now()->subDays($request->validated('days') - 1);

        return [
            'chatbot' => Usage::where('date', '>=', $nthDays)->where('name', 'chatbot')->latest()->count(),
            'travel' => Usage::where('date', '>=', $nthDays)->where('name', 'travel')->latest()->count(),
            'start_date' => $nthDays->format('j M'),
            'end_date' => Date::now()->format('j M')
        ];
    }

    public function daily(ChartRequest $request, Date $date)
    {
        $dates = Date::now()->subDays($request->validated('days') - 1)->toPeriod($request->validated('days'));
        $formattedDates = [];

        foreach ($dates as $date) {
            $formattedDates[] = Date::parse($date)->format('d M');
        }

        $chatbotCounts = [];
        $travelCounts = [];

        foreach ($dates as $date) {
            $chatbotCounts[] = Usage::where('name', 'chatbot')
                                    ->whereDate('date', $date)
                                    ->count();
                                    
            $travelCounts[] = Usage::where('name', 'travel')
                                    ->whereDate('date', $date)
                                    ->count(); 
        }

        return [
            'dates' => $formattedDates,
            'series' => [
                [
                    'name' => 'chatbot',
                    'data' => $chatbotCounts
                ],
                [
                    'name' => 'travel',
                    'data' => $travelCounts,
                ],
            ],
            'start_date' => Date::now()->subDays($request->validated('days') - 1)->format('j M'),
            'end_date' => Date::today()->format('j M')
        ];
    }
}
