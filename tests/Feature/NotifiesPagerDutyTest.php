<?php

namespace CyberDuck\LaravelQueueNotifier\Tests\Feature;


use Illuminate\Support\Facades\Http;
use Laravel\Horizon\Events\LongWaitDetected;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\AnonymousNotifiable;
use CyberDuck\LaravelQueueNotifier\Tests\TestCase;
use CyberDuck\LaravelQueueNotifier\Notifications\QueueDownNotification;

class NotifiesPagerDutyTest extends TestCase
{
    /** @test */
    public function when_horizon_identifies_a_long_wait_it_triggers_the_notification_to_pager_duty(): void
    {
        Notification::fake();

        event(new LongWaitDetected('redis', 'notifications', 131));

        Notification::assertSentTo(new AnonymousNotifiable(), QueueDownNotification::class);
    }
}
