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
        Schema::create('toko_bukus', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade');
            $table->timestamps();
            $table->string('Nama_Toko');
            $table->json('Link_Marketplace');
            $table->string('Nama_Seller');
            $table->string('Alamat');
            $table->bigInteger('Kontak');
            $table->string('deskripsi_toko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_bukus');
    }
};
