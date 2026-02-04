<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->string('name');
            $table->decimal('price', 12, 2)->unsigned();
            $table->integer('view_count')->unsigned()->default(0);
        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
