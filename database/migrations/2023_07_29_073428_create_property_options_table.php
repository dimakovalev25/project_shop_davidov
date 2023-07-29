<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('property_id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_options');
    }
};
