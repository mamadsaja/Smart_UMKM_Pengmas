<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TokoBuku>
 */
class TokoBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gambar = [
            'asset/gambar1.jpeg',
            'asset/gambar2.jpeg',
            'asset/gambar3.jpeg',
            'asset/gambar4.jpg',
            'asset/gambar5.jpg',
            'asset/gambar6.webp'
        ];

        return [
            'Nama_Toko' => fake()->company() . ' Store',
            'Toko_Shopee' => 'https://shopee.co.id/' . fake()->userName(),
            'Toko_Tokopedia' => 'https://www.tokopedia.com/' . fake()->userName(),
            'Instagram' => 'https://www.instagram.com/' . fake()->userName(),
            'Facebook' => 'https://www.facebook.com/' . fake()->userName(),
            'Tiktok' => 'https://www.tiktok.com/@' . fake()->userName(),
            'Alamat' => fake()->address(),
            'deskripsi_toko' => fake()->paragraph(4),
            'gambar_toko' => $gambar[array_rand($gambar)],
            'banner' => $gambar[array_rand($gambar)],
        ];
    }
}
