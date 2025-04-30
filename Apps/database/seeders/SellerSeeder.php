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
            'email' => 'seller1@gmail.com',
            'password' => bcrypt('password'), // Use bcrypt for hashing the password
        ]);
    }
}
