<?php

namespace Arshadarshadli01\TelegramBot;

use Illuminate\Support\Facades\Facade;

class TelegramBot implements ITelegramBot
{

    public function sendMessage(string $message): bool
    {
        $tg_users = explode(',', config('telegram-bot.telegram_chat_id'));
        $bot_token = config('telegram-bot.telegram_bot_token');
        $textTelegram = $message;

        foreach ($tg_users as $tg_user) {

            $params = array(
                'chat_id' => $tg_user,
                'text' => $textTelegram,
                'parse_mode' => 'HTML',
            );

            if (!$curl = curl_init()) {
                exit();
            }
            curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $bot_token . '/sendMessage');
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);
            $result2 = json_decode($result);
        }
        return true;
    }
}
