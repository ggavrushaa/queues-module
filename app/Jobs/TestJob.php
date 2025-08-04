<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestJob implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        info('TestJob');
        sleep(3);
        info('TestJob end');
    }
}
