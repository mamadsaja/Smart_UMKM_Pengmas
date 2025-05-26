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
            $table->foreignId('Id_seller')->constrained('sellers')->onDelete('cascade');
            $table->string('Nama_Toko');
            $table->string('Toko_Shopee')->nullable();
            $table->string('Toko_Tokopedia')->nullable();
            $table->string('name')->nullable();
            $table->string('Alamat');
            $table->bigInteger('Kontak');
            $table->longText('deskripsi_toko');
            $table->string('gambar_toko')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();
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
