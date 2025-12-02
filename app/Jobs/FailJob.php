<?php

namespace App\Jobs;

use App\Exceptions\JobException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FailJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public int $backoff = 5;

    public function __construct()
    {
        //
    }

    public function handle(): void
    {
        throw new JobException('Test');

        // info('ok');
    }
}
