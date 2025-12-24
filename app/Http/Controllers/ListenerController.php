<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Events\OrderCompletedEvent;
use App\Models\User;
use Illuminate\Http\Request;

class ListenerController extends Controller
{
    public function __invoke()
    {
        $user = User::factory()->create();
        $order = $user->orders()->create();

        $order->update(['status' => OrderStatusEnum::COMPLETED]);

        event(new OrderCompletedEvent($order));

        return $order->toArray();
    }
}
