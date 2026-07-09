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
    Schema::create('places', function (Blueprint $table) {
        $table->id();

        // Owner tempat
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        // Kategori (Coffee Shop, Salon, Rental Alat)
        $table->foreignId('category_id')->constrained()->cascadeOnDelete();

        // Informasi tempat
        $table->string('name');
        $table->text('description');
        $table->text('address');
        $table->string('phone');

        // Jam operasional
        $table->time('open_time');
        $table->time('close_time');

        // Foto utama
        $table->string('image')->nullable();

        // Status tempat
        $table->enum('status', [
            'pending',
            'approved',
            'rejected'
        ])->default('pending');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
