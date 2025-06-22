<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            TokoBukuSeeder::class,
            BukuSeeder::class,
            KategoriSeeder::class,
            GenreSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
