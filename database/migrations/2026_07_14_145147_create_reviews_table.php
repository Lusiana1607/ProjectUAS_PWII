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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');   // Siapa customer yang memberi review
            $table->unsignedBigInteger('place_id');  // Tempat/kafe mana yang diulas
            $table->unsignedBigInteger('booking_id'); // Menghubungkan ke transaksi booking tertentu
            $table->integer('rating');               // Nilai bintang (1 sampai 5)
            $table->text('comment')->nullable();     // Isi ulasan teks (opsional)
            $table->timestamps();

            // Hubungkan foreign key agar data sinkron dengan tabel users dan places
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
