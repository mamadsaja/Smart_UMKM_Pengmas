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
            'Id_seller' => 1, // Assuming the seller with ID 1 exists
            'Nama_Toko' => 'Toko Buku',
            'name' => 'Seller1',
            'Link_Marketplace' => json_encode([
                'Bukalapak' => 'https://www.bukalapak.com/tokobuku',
            ]),
            'Link_Shopee' => json_encode([
                'Shopee' => 'https://shopee.co.id/tokobuku',
            ]),
            'Link_Tokopedia' => json_encode([
                'Tokopedia' => 'https://www.tokopedia.com/tokobuku',
            ]),
            'Alamat' => 'Jl. Contoh Alamat No. 123',
            'Kontak' => 1234567890,
            'deskripsi_toko' => 'Toko Buku Terpercaya',
        ]);
    }
    protected $casts = ['Link_Marketplace' => 'array'];
}
