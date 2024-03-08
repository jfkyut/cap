<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Services\ChatService;
use App\Services\ChatbotService;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chat\ChatStoreRequest;
use App\Http\Requests\Chat\ChatUpdateRequest;

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
        return Auth::user()
                    ->chats()
                    ->latest()
                    ->get();
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

            return response($chat->find($chat->id)->load('messages'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return $chat->where('id', $chat->id)
                    ->with('messages')
                    ->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChatUpdateRequest $request, Chat $chat)
    {
        $chat->update($request->validated());
        $chat->save();

        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->noContent();
    }
}
