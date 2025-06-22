<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            'Fiksi', 'Non-Fiksi', 'Sains', 'Sejarah', 'Biografi', 
            'Anak-anak', 'Remaja', 'Misteri', 'Fantasi', 'Horor', 
            'Romansa', 'Pengembangan Diri', 'Bisnis', 'Teknologi', 'Seni'
        ];

        foreach ($kategoris as $namaKategori) {
            // Cek apakah kategori sudah ada sebelum membuat
            Kategori::firstOrCreate(['namaKategori' => $namaKategori]);
        }
    }
}
