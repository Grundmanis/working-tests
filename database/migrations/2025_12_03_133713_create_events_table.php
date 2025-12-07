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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('registration_start');
            $table->date('registration_end');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('secretary')->nullable();
            $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('discipline_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('discipline_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('event_judge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('judge_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline_event');
        Schema::dropIfExists('event_judge');
        Schema::dropIfExists('event_location');
        Schema::dropIfExists('events');
    }
};
