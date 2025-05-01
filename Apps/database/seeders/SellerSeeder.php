<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sellers')->insert([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'Kontak' => '081208896',
            'password' => bcrypt('password'),
        ]);
    }
}
