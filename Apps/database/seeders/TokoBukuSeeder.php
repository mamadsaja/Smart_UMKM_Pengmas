<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\TokoBuku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TokoBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks untuk truncate
        Schema::disableForeignKeyConstraints();
        TokoBuku::truncate();
        Seller::truncate();
        Schema::enableForeignKeyConstraints();

        // Buat 100 seller, dan untuk setiap seller, buatkan satu toko buku
        Seller::factory(100)->create()->each(function ($seller) {
            $seller->tokoBuku()->create(
                TokoBuku::factory()->make([
                    'name' => $seller->name,    // Ambil nama dari seller
                    'Kontak' => $seller->Kontak, // Ambil kontak dari seller
                ])->toArray()
            );
        });
    }
}
