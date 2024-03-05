<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Services\ChatbotService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Chat\ChatStoreRequest;
use App\Services\MessageService;
use App\Services\ChatService;

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
     * Show the form for creating a new resource.
     */
    public function create()
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

            $message = $this->messageService->createMessages(
                $request->validated('message'), 
                $response->content, 
                $chat
            );

            return response([
                'chat_id' => $chat->id,
                'title' => $chat->title,
                'messages' => [
                    'user_message' => $message['user_message'],
                    'chatbot_message' => $message['chatbot_message'],
                ]
            ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
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
