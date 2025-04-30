<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('toko_bukus')->insert([
            'seller_id' => 1, // Assuming the seller with ID 1 exists
            'Nama_Toko' => 'Toko Buku',
            'Marketplace' => 'Tokopedia',
            'Nama_Seller' => 'Seller1',
            'Alamat' => 'Jl. Contoh Alamat No. 123',
            'Kontak' => 1234567890,
            'deskripsi_toko' => 'Toko Buku Terpercaya',
        ]);
    }
}
