<?php

namespace CyberDuck\LaravelQueueNotifier\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Events\LongWaitDetected;
use CyberDuck\LaravelQueueNotifier\Listeners\SendQueueDownNotification;

class LaravelQueueNotifierProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/laravel-queue-notifier.php' => config_path('laravel-queue-notifier.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../../config/laravel-queue-notifier.php', 'laravel-queue-notifier'
        );

        if (config('laravel-queue-notifier.enabled')) {
            Event::listen( LongWaitDetected::class, SendQueueDownNotification::class);
        }
    }
}
