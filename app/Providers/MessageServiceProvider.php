<?php

namespace App\Providers;

use App\Http\View\Composer\MessageComposer;
use App\Service\MessageService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot(MessageService $messageService)
    {
        View::composer('messages.*', MessageComposer::class);
    }
}
