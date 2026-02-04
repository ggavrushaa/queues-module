<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\Attributes\WithoutRelations;
use Illuminate\Queue\Middleware\RateLimited;

#[WithoutRelations]
class IncrementProductViewCountJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int  $productId,
        public string $ip
    )
    {
        $this->onQueue('products');
    }

    public function middleware(): array
    {
        return [(new RateLimited('products:views'))->dontRelease()];
    }

    public function handle(): void
    {
        DB::table('products')
            ->where('id', $this->productId)
            ->increment('view_count');
    }
}
