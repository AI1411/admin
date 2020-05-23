<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Service\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        $messages = $this->messageService->getMessageByUser();

        return view('messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        $messages = $this->messageService->getMessageByUser();
        $detailMessage = $this->messageService->getMessage()->find($message->id);

        return view('messages.show', compact('detailMessage', 'messages'));
    }

    public function trashed()
    {
        $messages = $this->messageService->getMessageByUser();

        return view('messages.trashed', compact('messages'));
    }

    public function store(Request $request)
    {
        $this->messageService->createMessage($request);
    }
}
