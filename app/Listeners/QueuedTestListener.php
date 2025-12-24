<?php

namespace App\Listeners;

use App\Events\OrderCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class QueuedTestListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrderCompletedEvent $event): void
    {
        info('Order completed event handled for order ID: ' . $event->order);
    }
}
