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
        Schema::table('discipline_event', function (Blueprint $table) {
            $table->decimal('price')->nullable();
            $table->decimal('member_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discipline_event', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('member_price');
        });
    }
};
