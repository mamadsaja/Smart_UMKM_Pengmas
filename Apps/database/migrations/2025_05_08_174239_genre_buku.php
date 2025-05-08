<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'idBuku')->constrained(table: 'bukus', indexName: 'fk_genre_buku');
            $table->foreignId(column: 'idKategori')->constrained(table: 'kategori', indexName: 'fk_genre_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre');
    }
};
