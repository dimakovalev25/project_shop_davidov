<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('count')->default(0);
            $table->double('price')->default(0);
            $table->timestamps();

            $table->softDeletes();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
