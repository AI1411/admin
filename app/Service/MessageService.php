<?php


namespace App\Service;


use App\Models\Message;
use App\Models\User;
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
        return $data = [
            'trashed' => $this->getTrashedMessages(),
            'allMessages' => $this->getAllMessages(),
            'unreadMessages' => $this->getUnReadMessageCount(),
            'favoriteMessages' => $this->getFavoriteMessages(),
        ];
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

    public function getSentMessage()
    {
        return Message::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
    }

    public function createMessage(Request $request)
    {
        return Message::create($request->all());
    }

    public function getContactAddress()
    {
        return User::with('follows', 'followers')
            ->find(auth()->id())
            ->follows;
    }

    public function deleteMessage(Message $message)
    {
        return $message->delete();
    }

    public function restore(Message $message)
    {
        return $message->restore();
    }

    public function getUnReadMessageCount()
    {
        return Message::where('to', auth()->id())
            ->where('read_at', null)
            ->get()
            ->count();
    }

    public function getFavoriteMessages()
    {
        return Message::where('to', auth()->id())
            ->where('is_favorite', true)
            ->get();
    }

    public function messageToFavorite(Request $request)
    {
        $messageId = $request->input('favorite');
        $message = Message::find($messageId);
        if ($messageId) {
            $message->is_favorite = true;
            $message->update();
        }
    }
}
