<?php
namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageController extends Controller
{
    // Enviar mensaje (POST /api/chats/{chat}/messages)
    public function store(Request $request, $chatId)
{
    $userId = $request->user()->id;
    $chat = Chat::find($chatId);

    if (!$chat || !in_array($userId, [$chat->user_id, $chat->doctor_id])) {
        return response()->json(['error' => 'Chat no encontrado o acceso denegado'], 404);
    }

    $receiverId = ($chat->user_id == $userId) ? $chat->doctor_id : $chat->user_id;

    $message = Message::create([
        'chat_id' => $chat->id,
        'sender_id' => $userId,
        'receiver_id' => $receiverId,
        'message' => $request->message,
        'seen' => false,
    ]);

    $chat->update(['last_message_at' => now()]);

    return response()->json($message, 201);
}


    // Marcar como leídos todos los mensajes del chat para el usuario autenticado
    public function markRead(Request $request, Chat $chat)
    {
        $userId = $request->user()->id;
        if (!in_array($userId, [$chat->user_id, $chat->doctor_id])) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        Message::where('chat_id', $chat->id)
            ->where('receiver_id', $userId)
            ->where('seen', false)
            ->update(['seen' => true]);

        return response()->json(['ok' => true]);
    }
}
