<?php

namespace CyberDuck\LaravelQueueNotifier\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\PagerDuty\PagerDutyMessage;
use NotificationChannels\PagerDuty\PagerDutyChannel;

class QueueDownNotification extends Notification
{
    protected string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function via()
    {
        return [PagerDutyChannel::class];
    }

    public function toPagerDuty($notifiable)
    {
        return PagerDutyMessage::create()
            ->setSummary($this->message);
    }
}
