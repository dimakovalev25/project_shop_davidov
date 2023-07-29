<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sku_property_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('property_option_id');
            $table->unsignedInteger('sku_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sku_property_option');
    }
};
