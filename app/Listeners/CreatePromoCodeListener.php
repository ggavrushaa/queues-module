<?php

namespace App\Listeners;

use App\Models\PromoCode;
use App\Events\OrderCompletedEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\PromoCodeNotification;

class CreatePromoCodeListener implements ShouldQueue
{
    public function handle(OrderCompletedEvent $event): void
    {
        $promoCode = PromoCode::query()->create([
            'discount_percent' => 10,
            'discount_amount' => 0
        ]);

        $event->order->user->notify(new PromoCodeNotification($promoCode));
    }
}
