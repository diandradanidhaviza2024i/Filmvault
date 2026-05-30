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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('synopsis');
            $table->decimal('rating', 3, 1); // Contoh: 8.5
            $table->year('release_year');
            $table->integer('duration'); // Dalam menit
            $table->string('country');
            $table->string('language');
            $table->string('cast');
            $table->string('director');
            $table->string('poster'); // Menyimpan path gambar
            $table->string('trailer_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};