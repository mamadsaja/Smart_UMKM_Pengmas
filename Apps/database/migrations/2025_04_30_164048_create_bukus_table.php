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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toko_buku_id')->nullable()->constrained('toko_bukus');
            $table->string(column: 'judul');
            $table->string('penulis');
            $table->string(column: 'penerbit');
            $table->year(column: 'tahun_terbit');
            $table->integer(column: 'harga');
            $table->integer(column: 'stok');
            $table->text(column: 'deskripsi');
            $table->string(column: 'gambar')->nullable();
            $table->string(column: 'kategori')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
