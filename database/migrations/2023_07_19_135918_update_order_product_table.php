<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('order_product', function (Blueprint $table) {

            $table->integer('count')->default(1);

        });
    }

    public function down(): void
    {
        Schema::table('order_product', function (Blueprint $table) {

            $table->dropColumn('count');

        });
    }
};
