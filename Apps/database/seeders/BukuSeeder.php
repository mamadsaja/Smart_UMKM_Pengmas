<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan pengecekan foreign key untuk truncate
        Schema::disableForeignKeyConstraints();
        DB::table('bukus')->truncate();
        Schema::enableForeignKeyConstraints();

        $bukus = [];
        $penulis = ['Tere Liye', 'Andrea Hirata', 'Pramoedya Ananta Toer', 'Dee Lestari', 'Eka Kurniawan', 'Ahmad Tohari', 'Y.B. Mangunwijaya', 'Hamka'];
        $penerbit = ['Gramedia Pustaka Utama', 'Bentang Pustaka', 'Republika', 'Mizan', 'Pustaka Panjimas'];
        $gambar = [
            'asset/gambar1.jpeg',
            'asset/gambar2.jpeg',
            'asset/gambar3.jpeg',
            'asset/gambar4.jpg',
            'asset/gambar5.jpg',
            'asset/gambar6.webp'
        ];

        for ($i = 1; $i <= 100; $i++) {
            $judul = 'Buku Dami Edisi ke-' . $i;
            $bukus[] = [
                'toko_buku_id' => 1, // Asumsi semua buku milik toko dengan ID 1
                'judul' => $judul,
                'penulis' => $penulis[array_rand($penulis)],
                'penerbit' => $penerbit[array_rand($penerbit)],
                'tahun_terbit' => rand(2000, 2024),
                'harga' => rand(50, 250) * 1000, // Harga antara 50rb dan 250rb
                'stok' => rand(5, 100),
                'deskripsi' => "Ini adalah deskripsi untuk buku '$judul'. Sebuah karya fiksi yang memukau dengan alur cerita yang tak terduga dan karakter yang mendalam. Cocok untuk pembaca yang menyukai petualangan dan misteri.",
                'Link_Marketplace' => '#',
                'Link_Shopee' => '#',
                'Link_Tokopedia' => '#',
                'gambar' => $gambar[array_rand($gambar)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data ke database dalam chunk untuk efisiensi
        foreach (array_chunk($bukus, 50) as $chunk) {
            DB::table('bukus')->insert($chunk);
        }
    }
}
