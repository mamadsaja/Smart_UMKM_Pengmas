<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil beberapa ID buku dan kategori
        $bukuIds = DB::table('bukus')->pluck('id');
        $kategoriIds = DB::table('kategori')->pluck('id');

        // Cek dulu apakah data tersedia
        if ($bukuIds->isEmpty() || $kategoriIds->isEmpty()) {
            return; // Tidak ada data buku atau kategori untuk dikaitkan
        }

        // Contoh: assign 5 genre dengan kombinasi random
        for ($i = 0; $i < 5; $i++) {
            DB::table('genre')->insert([
                'idBuku' => $bukuIds->random(),
                'idKategori' => $kategoriIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
