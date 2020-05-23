<?php


namespace App\Service;


use App\Models\Message;
use Illuminate\Http\Request;

class MessageService
{
    public function getAllMessages()
    {
        return Message::with('user')
            ->where('to', auth()->id())
            ->latest()
            ->get();
    }

    public function getMessageByUser()
    {
        $data = [];

        $data['trashed'] = $this->getTrashedMessages();

        $data['allMessages'] = $this->getAllMessages();

        return $data;
    }

    public function getMessage()
    {
        return Message::with('user')
            ->where('to', auth()->id())
            ->latest()
            ->get();
    }

    public function getTrashedMessages()
    {
        return Message::with('user')
            ->onlyTrashed()
            ->where('to', auth()->id())
            ->latest()
            ->get();
    }

    public function createMessage(Request $request)
    {
        return Message::create($request->all());
    }
}
