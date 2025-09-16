<?php
namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $chats = Chat::where('user_id', $userId)
            ->orWhere('doctor_id', $userId)
            ->with('lastMessage')
            ->get()
            ->map(function($chat) use ($userId) {
                $unread = Message::where('chat_id', $chat->id)
                    ->where('receiver_id', $userId)
                    ->where('seen', false)
                    ->count();

                return [
                    'id' => $chat->id,
                    'user_id' => $chat->user_id,
                    'doctor_id' => $chat->doctor_id,
                    'last_message' => $chat->lastMessage ? $chat->lastMessage->message : null,
                    'last_message_at' => $chat->lastMessage ? $chat->lastMessage->created_at : null,
                    'unread_count' => $unread,
                ];
            });

        return response()->json(['chats' => $chats]);
    }

    public function messages(Request $request, $chatId)
{
    $userId = $request->user()->id;
    $chat = Chat::find($chatId);

    if (!$chat || !in_array($userId, [$chat->user_id, $chat->doctor_id])) {
        return response()->json(['error' => 'Chat no encontrado o acceso denegado'], 404);
    }

    $messages = $chat->messages()->orderBy('created_at', 'asc')->get();

    return response()->json([
        'messages' => $messages->map(function($m) {
            return [
                'id' => $m->id,
                'chat_id' => $m->chat_id,
                'sender_id' => $m->sender_id ?? 0,     
                'receiver_id' => $m->receiver_id ?? 0, 
                'message' => $m->message ?? '',       
                'seen' => $m->seen ?? false,
                'created_at' => $m->created_at->toDateTimeString(),
            ];
        }),
    ]);

}


    public function start(Request $request)
{
    $userId = $request->user()->id; // usuario autenticado
    $doctorId = $request->doctor_id;

    if (!$doctorId) {
        return response()->json(['message' => 'doctor_id es requerido'], 422);
    }

    //ver si ya hay chats entre ellos
    $chat = Chat::where('user_id', $userId)
        ->where('doctor_id', $doctorId)
        ->first();

    if (!$chat) {
        $chat = Chat::create([
            'user_id' => $userId,
            'doctor_id' => $doctorId,
        ]);
    }

    return response()->json([
        'chat_id' => $chat->id,
        'doctor' => [
            'id' => $doctorId,
            'name' => $chat->doctor->name ?? 'Doctor',
        ]
    ]);
}
public function startChat(Request $request)
{
    $userId = $request->user()->id;
    $doctorId = $request->doctor_id;

    // Validar que venga doctor_id
    if (!$doctorId) {
        return response()->json(['error' => 'doctor_id es requerido'], 400);
    }

    // Buscar chat existente
    $chat = Chat::where('user_id', $userId)
                ->where('doctor_id', $doctorId)
                ->first();

    // Si no existe, crearlo
    if (!$chat) {
        $chat = Chat::create([
            'user_id' => $userId,
            'doctor_id' => $doctorId,
        ]);
    }

    return response()->json([
    'chat_id' => $chat->id,
    'doctor' => [
        'id' => $doctorId,
        'name' => $chat->doctor->name ?? 'Doctor', 
    ]
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
            'lastMessage' => $chat->lastMessage ? Str::limit($chat->lastMessage->message, 45) : null,
            'time' => $chat->lastMessage ? $chat->lastMessage->created_at->format('H:i') : '--:--',
            'unread' => $unread,
            'sentByMe' => $chat->lastMessage && $chat->lastMessage->sender_id == auth()->id(),
        ];
    });

    return response()->json($data);
}



}
