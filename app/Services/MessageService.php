<?php

namespace App\Services;

use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    public function findMessageById($messageId) {
        return Message::find($messageId);
    }

    public function getMessageByReceiver($receiver_id) {
        $messages = Message::with('senderUser','receiverUser')
            ->where('receiver_id', $receiver_id)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return $messages;
    }

    public function sendMessage(array $data, $receiver_id) {
        $sender_id = Auth::id();

        Message::create([
            'content' => $data['message'],
            'receiver_id' => $receiver_id,
            'sender_id' => $sender_id
        ]);
    }

    public function deleteMessage(Message $message) {
        $message->delete();
    }
}
