<?php

namespace CyberDuck\LaravelQueueNotifier\Listeners;

use Illuminate\Support\Facades\Notification;
use CyberDuck\LaravelQueueNotifier\Notifications\QueueDownNotification;

class SendQueueDownNotification
{
    public function handle($event)
    {
        if ($apiKey = config('laravel-queue-notifier.pager-duty.api-key')) {
            Notification::route('PagerDuty', $apiKey)
                ->notify(new QueueDownNotification($this->craftMessageFromEvent($event)));
        }
    }

    private function craftMessageFromEvent($event): string
    {
        return "A long wait has been detected for the queue '{$event->queue}' using {$event->connection}. currently been hung for {$event->seconds} seconds.";
    }
}
