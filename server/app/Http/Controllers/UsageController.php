<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\NewUsageRequest;

class UsageController extends Controller
{
    public function store(NewUsageRequest $request)
    {
        return Usage::create([
            'name' => $request->validated('name'),
            'date' => Date::now()->format('Y-m-d'),
        ]);
    }
}
