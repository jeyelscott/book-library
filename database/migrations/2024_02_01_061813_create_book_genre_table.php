<?php

declare(strict_types=1);

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
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->string('book_uuid');
            $table->string('genre_uuid');
            // $table->foreignUuid('book_uuid')
            //     ->references('id')
            //     ->on('books')
            //     ->cascadeOnDelete();
            // $table->foreignUuid('genre_uuid')
            //     ->references('id')
            //     ->on('genres')
            //     ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genre');
    }
};
