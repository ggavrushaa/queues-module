<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UniqueJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    public function __construct(
        private string $value
    ) {}

    public function uniqueId(): string
    {
        return $this->value;
    }
    
    public function handle(): void
    {
        //
    }
}
