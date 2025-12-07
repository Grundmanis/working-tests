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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('registeredName')->unique();
            $table->string('homeName');
            $table->string('registrationNumber');
            $table->string('microchip');
            $table->string('dob');
            $table->enum('gender', ['m', 'f']);
            $table->enum('breed', [
                'LR',   // Labrador Retriever
                'GR',   // Golden Retriever
                'FCR',   // Flat-Coated Retriever
                'CBR',  // Chesapeake Bay Retriever
                'NSDTR',   // Nova Scotia Duck Tolling Retriever
                'CCR',   // Curly Coated Retriever
            ]);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
