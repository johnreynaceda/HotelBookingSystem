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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('address');
            $table->string('contact');
            $table->string('email');
            $table->string('social_media');
            $table->date('date_from');
            $table->date('date_to');
            $table->foreignId('room_id');
            $table->string('mode_of_payment');
            $table->string('payment_proof')->nullable();
            $table->string('status_of_payment');
            $table->string('amount')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
