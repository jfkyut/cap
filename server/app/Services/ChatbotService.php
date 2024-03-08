<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ChatbotService
{
    public function initializeData(string $message): array
    {
        return [
            'model' => env('OPENAI_MODEL'),
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are ChatPAPI, Virtual Tourist Assistant Chatbot. Reply in a json format, make sure to always include whitespaces (\\n). format: ' . Storage::get("format.json"),
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
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
            : false;
    }
}