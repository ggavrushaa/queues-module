<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerEvents();
    }

    protected function registerEvents(): void
    {
        Event::listen(
            \App\Events\OrderCompletedEvent::class,
            \App\Listeners\QueuedTestListener::class
        );
    }
}
