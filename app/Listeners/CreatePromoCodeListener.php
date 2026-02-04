<?php

namespace App\Listeners;

use App\Models\PromoCode;
use App\Events\OrderCompletedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use function Laravel\Prompts\info;

class CreatePromoCodeListener implements ShouldQueue
{
    public function handle(OrderCompletedEvent $event): void
    {
        $promoCode = PromoCode::query()->create([
            'discount_percent' => 10,
            'discount_amount' => 0
        ]);

        info('Promo code created: ', $promoCode->toArray());
    }
}
