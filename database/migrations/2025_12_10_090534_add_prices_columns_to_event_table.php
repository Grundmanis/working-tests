<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->decimal('prepayment_price')->nullable();
            $table->decimal('breakfast_price')->nullable();
            $table->decimal('lunch_price')->nullable();
            $table->decimal('dinner_price')->nullable();
            $table->decimal('accommodation_price')->nullable();
            $table->decimal('per_dog_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('prepayment_price');
            $table->dropColumn('breakfast_price');
            $table->dropColumn('lunch_price');
            $table->dropColumn('dinner_price');
            $table->dropColumn('accommodation_price');
            $table->dropColumn('per_dog_price');
        });
    }
};
