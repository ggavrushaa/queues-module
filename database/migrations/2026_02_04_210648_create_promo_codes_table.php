<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->string('acrivation_code')->unique();
            $table->decimal('discount_percent', 5, 2)->unsigned();
            $table->decimal('discount_amount', 5, 2)->unsigned();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
