<?php

namespace App\Listeners;

use Exception;
use App\Events\OrderCompletedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueuedTestListener implements ShouldQueue
{
    // public $queue = 'test';
    public function handle(OrderCompletedEvent $event): void
    {
        throw new Exception('Test exception');
        // info('Order completed event handled for order ID: ' . $event->order);
    }

    public function failed(OrderCompletedEvent $event, \Throwable $exception): void
    {
        info($exception->getMessage());
    }
}
