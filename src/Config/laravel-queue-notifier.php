<?php

return [
    'enabled' => env('QUEUE_NOTIFIER_ENABLED', false),
    'pager-duty' => [
        'api-key' => env('PAGER_DUTY_API_KEY'),
    ],
];
