<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageService
{
	public function createMessages(string $userMessage, string $chatbotMessage, Chat $chat)
	{
		$message = new Message([
			'user_message' => $userMessage,
			'chatbot_message' => $chatbotMessage
		]);

		$message->user()->associate(Auth::user());
		$message->chat()->associate($chat);
		$message->save();

		return $message->where('id', $message->id)
                       ->without('user')
                       ->first();
	}
}