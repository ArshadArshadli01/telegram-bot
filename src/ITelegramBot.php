<?php

namespace Arshadarshadli01\TelegramBot;

interface ITelegramBot
{
    public function sendMessage(string $message): bool;
}
