<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Service\MessageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(Request $request)
    {
        $messages = $this->messageService->getMessageByUser();

        $this->messageService->messageToFavorite($request);

        return view('messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        $detailMessage = $this->messageService->getMessage()->find($message->id);

        if (is_null($message->read_at)) {
            $message->read_at = Carbon::now();
            $message->update();
        }

        return view('messages.show', compact('detailMessage'));
    }

    public function favorite(Request $request)
    {
        $messages = $this->messageService->getFavoriteMessages();

        $this->messageService->removeMessageFromFavorite($request);

        return view('messages.favorite_message', compact('messages'));
    }

    public function trashed()
    {
        return view('messages.trashed');
    }

    public function sentMessage()
    {
        $sentMessages = $this->messageService->getSentMessage();

        return view('messages.sent_message', compact('sentMessages'));
    }

    public function create()
    {
        $contacts = $this->messageService->getContactAddress();

        return view('messages.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        $this->messageService->createMessage($request);

        return redirect()->route('messages.index')->with('success', 'メッセージを送信しました');
    }

    public function destroy(Message $message)
    {
        $this->messageService->deleteMessage($message);

        return redirect()->back()->with('success', 'メッセージを削除しました');
    }

    public function restore(Message $message)
    {
        $message->restore();

        return redirect()->route('messages.index')->with('success', 'ゴミ箱から戻しました');
    }
}
