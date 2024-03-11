<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ChatbotService
{
    public function initializeData(array $messages): array
    {
        $allMessages = [
            [
                'role' => 'system',
                'content' => 'You are ChadGPT, Virtual Tourist Assistant Chatbot. Reply in a json format, make sure to always include whitespaces (\\n). format: ' . Storage::get("format.json"),
            ]
        ];

        return [
            'model' => env('OPENAI_MODEL'),
            'messages' => array_merge($allMessages, $messages),
            "response_format" => [
                "type" => "json_object"
            ]
        ];
    }

    public function generateResponse(array $data)
    {
        $response = Http::withHeaders([
            "Content-type" => "application/json",
            "Authorization" => "Bearer " . env('OPENAI_KEY'),
        ])->post(env("OPENAI_ENDPOINT"), $data);

        return $response->ok()
            ? json_decode($response->json()['choices'][0]['message']['content'])
            : abort(500, 'Somewthing went wrong.');
    }
}