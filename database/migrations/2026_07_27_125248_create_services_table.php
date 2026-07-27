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
    Schema::create('services', function (Blueprint $table) {

        $table->id();

        // Tempat yang memiliki layanan
        $table->foreignId('place_id')
              ->constrained()
              ->cascadeOnDelete();

        // Nama layanan
        $table->string('name');

        // Penjelasan layanan
        $table->text('description')->nullable();

        // Harga layanan
        $table->decimal('price', 10, 2);

        // Durasi (menit)
        $table->integer('duration');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
