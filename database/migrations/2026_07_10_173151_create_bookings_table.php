<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke user (customer) yang sedang login
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Menghubungkan ke tempat yang dibooking
            $table->foreignId('place_id')->constrained()->cascadeOnDelete();
            
            // Data Inputan Form
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('total_guests');
            
            // Status booking (pending, approved, rejected)
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};