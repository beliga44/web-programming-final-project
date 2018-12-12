<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessage;
use App\Services\MessageService;

class MessageController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function show($id) {
        $messages = $this->messageService
            ->getMessageByReceiver($id);

        return view('profile.inbox', ['messages' => $messages]);
    }

    public function sendMessage(SendMessage $request, $receiver_id) {
        $this->messageService
            ->sendMessage($request->all(), $receiver_id);

        return redirect()->route('profile.show', ['id' => $receiver_id]);
    }

    public function deleteMessage($messageId, $receiver_id) {
        $message = $this->messageService
            ->findMessageById($messageId);
        $this->messageService
            ->deleteMessage($message);

        return redirect()->route('inbox.show', ['user_id' => $receiver_id]);
    }
}
