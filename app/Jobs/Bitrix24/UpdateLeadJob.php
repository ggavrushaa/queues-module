<?php

namespace App\Jobs\Bitrix24;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateLeadJob implements ShouldQueue
{
    use Queueable;

    public $tries = 5;

    public function __construct(private User $user)
    {
        $this->user = $user->withoutRelations();
        $this->onQueue('bitrix24');
    }

    // public function backoff(): array
    // {
    //     return [3, 5, 10, 20];
    // }

    public function handle(): void
    {
        $response = Http::get(
            url: 'https://example.com',
            query: $this->user->only('name', 'email')
        );

        if($response->successful()) {
            return;
        }

        $this->retry();
    }

    private function retry(): void
    {
        $seconds = match ($this->attempts()) {
            1 => 3,
            2 => 5,
            3 => 10,
            default => 20,
        };

        $this->release($seconds);
    }
}
