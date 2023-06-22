<?php

namespace Arshadarshadli01\TelegramBot;
use Illuminate\Support\ServiceProvider;

class TelegramBotServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('telegram-bot.php')
        ], 'telegram-bot');
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'telegram-bot');
        $this->app->bind(ITelegramBot::class, TelegramBot::class);
    }

    /**
     * @return string
     */
    protected function configPath(): string
    {
        return __DIR__ .'/../config/telegram-bot.php';
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            TelegramBot::class
        ];
    }
}
