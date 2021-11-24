<?php

namespace CyberDuck\LaravelQueueNotifier\Tests;

use CyberDuck\LaravelQueueNotifier\Providers\LaravelQueueNotifierProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelQueueNotifierProvider::class
        ];
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('laravel-queue-notifier', [
            'enabled' => true,
            'pager-duty' => [
                'api-key' => 'test-123',
            ],
        ]);
    }
}
