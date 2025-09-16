<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;

class DoctorChatController extends Controller
{
    public function index(Request $request)
    {
        $doctorId = $request->user()->id;

        $chats = Chat::where('doctor_id', $doctorId)
                     ->with('user')
                     ->with('lastMessage')
                     ->get();

        return view('DocChats', compact('chats'));

    }

    public function show($chatId)
{
    $chat = Chat::with('messages')->findOrFail($chatId);
    $chat->messages()->where('receiver_id', auth()->id())->update(['seen' => true]);
    return view('chat_show', compact('chat'));

}
public function send(Request $request, $chatId)
{
    $request->validate(['message' => 'required|string|max:1000']);
    $chat = Chat::findOrFail($chatId);

    $message = Message::create([
        'chat_id' => $chat->id,
        'sender_id' => auth()->id(),
        'receiver_id' => $chat->user_id,
        'sender_role' => 'doctor',
        'message' => $request->message,
        'seen' => false,
    ]);

    return response()->json([
        'success' => true,
        'message' => $message
    ]);
}


// En DoctorChatController
public function getMessages(Request $request, Chat $chat)
{
    $afterId = $request->query('after', 0);

    $messages = $chat->messages()
        ->where('id', '>', $afterId)
        ->orderBy('id')
        ->get();

    return response()->json([
        'success' => true,
        'messages' => $messages
    ]);
}


public function refresh() {
    $chats = \App\Models\Chat::with(['user', 'lastMessage'])->get();

    $data = $chats->map(function($chat) {
        $unread = \App\Models\Message::where('chat_id', $chat->id)
                    ->where('receiver_id', auth()->id())
                    ->where('seen', false)->count();

        return [
            'id' => $chat->id,
            'name' => $chat->user->name,
            'avatar' => strtoupper(substr($chat->user->name, 0, 1)),
            'lastMessage' => $chat->lastMessage ? \Illuminate\Support\Str::limit($chat->lastMessage->message, 45) : null,
            'time' => $chat->lastMessage ? $chat->lastMessage->created_at->format('H:i') : '--:--',
            'unread' => $unread,
            'sentByMe' => $chat->lastMessage && $chat->lastMessage->sender_id == auth()->id(),
        ];
    });

    return response()->json($data);
}



}


