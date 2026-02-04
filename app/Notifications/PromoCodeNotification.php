<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\PromoCode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PromoCodeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public PromoCode $promoCode
    ) {
        $this->onQueue('notifications');
    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Промо-код на скидку')
            ->greeting($this->promoCode->activation_code)
            ->line("Скидка: {$this->promoCode->discount_percent}%");
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
