<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdatePairJob implements ShouldQueue
{
    use Queueable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->onQueue('pairs');
    }

    public function uniqid(): string
    {
        return $this->data['symbol'];
    }


    public function handle(): void
    {
        //
    }
}
