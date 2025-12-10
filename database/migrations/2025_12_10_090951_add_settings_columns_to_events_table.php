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
            $table->boolean('has_club_discount')->default(false);
            $table->boolean('is_breakfast_included')->default(false);
            $table->boolean('is_prepayment_required')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('has_club_discount');
            $table->dropColumn('is_breakfast_included');
            $table->dropColumn('is_prepayment_required');
        });
    }
};
