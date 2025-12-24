<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
