<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            'toko_buku_id' => 1, // Assuming the toko_buku with ID 1 exists
            'judul' => 'Judul Buku',
            'penulis' => 'Penulis Buku',
            'penerbit' => 'Penerbit Buku',
            'tahun_terbit' => 2023,
            'harga' => 100000,
            'stok' => 10,
            'deskripsi' => 'Deskripsi Buku',
            'gambar' => 'path/to/image.jpg', // Optional
        ]);
        DB::table('bukus')->insert([
            'toko_buku_id' => 1, // Assuming the toko_buku with ID 1 exists
            'judul' => 'Judul Buku 2',
            'penulis' => 'Penulis Buku 2',
            'penerbit' => 'Penerbit Buku 2',
            'tahun_terbit' => 2023,
            'harga' => 150000,
            'stok' => 5,
            'deskripsi' => 'Deskripsi Buku 2',
            'gambar' => 'path/to/image2.jpg', // Optional
        ]);
    }
}
//
