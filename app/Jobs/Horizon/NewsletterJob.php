<?php

namespace App\Jobs\Horizon;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NewsletterJob implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        $this->onQueue('newsletter');
    }

    public function handle(): void
    {
        info('Newsletter job processed at ' . now());

        sleep(2);
    }
}
