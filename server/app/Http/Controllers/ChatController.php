<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Services\ChatbotService;
use App\Http\Requests\Chat\ChatStoreRequest;
use App\Services\MessageService;
use App\Services\ChatService;
use App\Http\Resources\Chat\ChatResource;

class ChatController extends Controller
{
    private $chatbotService;
    private $messageService;
    private $chatService;

    public function __construct(
        ChatbotService $chatbotService, 
        MessageService $messageService,
        ChatService $chatService
    )
    {
        $this->chatbotService = $chatbotService;
        $this->messageService = $messageService;
        $this->chatService = $chatService;
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
    public function store(ChatStoreRequest $request)
    {
        $data = $this->chatbotService->initializeData($request->validated('message'));
        $response = $this->chatbotService->generateResponse($data);

        if (!$response) {
            return abort(500, 'Something went wrong.');

        } else {
            $chat = $this->chatService->createChat($response->title);

            $this->messageService->createMessages(
                $request->validated('message'), 
                $response->content, 
                $chat
            );

            return new ChatResource($chat->find($chat->id)->load('messages'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
