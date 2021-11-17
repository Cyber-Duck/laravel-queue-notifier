## Laravel Queue Notifier
Supports PagerDuty notifications through the Events v2 API.
## Installation
```
composer require cyber-duck/laravel-queue-notifier
```
_This package is not installable via Composer 1.x, please make sure you upgrade to Composer 2+._

Add the Following environment variables and you're good to go.
```dotenv
PAGER_DUTY_API_KEY=YOUR_INTEGRATION_KEY
QUEUE_NOTIFIER_ENABLED=false
```

## Trigger 
Inside Horizon an event gets fired `LongWaitDetected` in horizon it's currently only able to trigger events to Sms, Slack or Email. This package also listens to that event and creates an event in PagerDuty.

## Requirements
- Laravel Horizon
- PagerDuty
- Laravel 8+
