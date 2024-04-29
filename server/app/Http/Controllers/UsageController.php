<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
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
        $nthDays = Date::now()->subDays($request->validated('days'));

        return [
            'chatbot' => Usage::where('date', '>=', $nthDays)->where('name', 'chatbot')->latest()->count(),
            'travel' => Usage::where('date', '>=', $nthDays)->where('name', 'travel')->latest()->count()
        ];
    }
}
