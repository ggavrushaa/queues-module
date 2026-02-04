<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Jobs\IncrementProductViewCountJob;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
         error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        $this->registerEvents();
        $this->rateLimit();
    }

    protected function registerEvents(): void
    {
        Event::listen(
            \App\Events\OrderCompletedEvent::class,
            \App\Listeners\CreatePromoCodeListener::class
        );
    }

    protected function rateLimit(): void
    {
        RateLimiter::for('products:views', function (IncrementProductViewCountJob $job) {
            $key = $job->ip . '|' . $job->productId;

            return Limit::perDay(1)->by(md5($key));
        });
    }
}
