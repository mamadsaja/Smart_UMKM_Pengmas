<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Fiksi',
            'Non-Fiksi',
            'Fantasi',
            'Romantis',
            'Sejarah',
            'Biografi',
            'Sains',
            'Horor',
            'Filsafat',
        ];

        foreach ($kategori as $item) {
            DB::table('kategori')->insert([
                'namaKategori' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
