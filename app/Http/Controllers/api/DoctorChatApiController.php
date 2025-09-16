<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class DoctorChatApiController extends Controller
{
    public function send(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $chat = Chat::findOrFail($chatId);

        $message = Message::create([
            'chat_id' => $chat->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $chat->user_id, 
            'message' => $request->message,
            'seen' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}

