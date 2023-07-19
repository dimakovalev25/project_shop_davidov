<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
