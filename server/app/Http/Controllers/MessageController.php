<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\Chat\ChatStoreRequest;
use App\Services\ChatbotService;
use App\Services\MessageService;

class MessageController extends Controller
{
    private $chatbotService;
    private $messageService;

    public function __construct(ChatbotService $chatbotService, MessageService $messageService)
    {
        $this->chatbotService = $chatbotService;
        $this->messageService = $messageService;
    }

    public function store(ChatStoreRequest $request, Chat $chat)
    {
        $data = $this->chatbotService->initializeData($request->validated('message'));

        $response = $this->chatbotService->generateResponse($data);

        if (! $response) {
            return abort(500, 'Something went wrong.');
        } else {
            $message = $this->messageService->createMessages(
                $request->validated('message'),
                $response->content,
                $chat
            );
        }

        return response([
            'chat_id' => $chat->id,
            'messages' => $message
        ]);
    }
}
