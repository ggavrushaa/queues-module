<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $table = 'promo_codes';

    protected $fillable = [
        'acrivation_code',
        'discount_percent',
        'discount_amount',
    ];

    public static function booted()
    {
        self::creating(function (PromoCode $model) {
            $model->fillActivationCode();
        });
    }

    public function fillActivationCode(): self
    {
        $this->acrivation_code = strtoupper(Str::random(10));

        return $this;
    }

}