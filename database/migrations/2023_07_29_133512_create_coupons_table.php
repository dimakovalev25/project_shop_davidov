<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->double('value');
            $table->unsignedTinyInteger('type')->default(0);
            $table->unsignedTinyInteger('only_once')->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
