<?php

namespace App\Http\View\Composer;

use App\Service\MessageService;
use Illuminate\View\View;

class MessageComposer
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function compose(View $view)
    {
        $view->with('messages', $this->messageService->getMessageByUser());
    }
}
