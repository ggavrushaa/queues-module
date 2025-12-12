<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use function Laravel\Prompts\info;

class FastJob implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        info('FastJob initialized');
    }

    public function handle(): void
    {
        
        info('FastJob handled');
    }
}
