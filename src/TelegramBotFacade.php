<?php

namespace Arshadarshadli01\TelegramBot;

use Illuminate\Support\Facades\Facade;

class TelegramBotFacade extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telegram-bot';
    }
}
