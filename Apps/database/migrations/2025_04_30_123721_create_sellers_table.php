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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string(column: 'name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->bigInteger(column: 'Kontak');
            $table->string(column: 'banner')->nullable();
            $table->string(column: 'foto_profil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
