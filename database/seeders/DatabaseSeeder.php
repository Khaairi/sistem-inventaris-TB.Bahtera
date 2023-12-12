<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Stok;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Achmad Saepudin',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        Kategori::create([
            'kategori' => 'Paku',
            'banyak_barang' => 0
        ]);

        Kategori::create([
            'kategori' => 'Cat',
            'banyak_barang' => 0
        ]);
    }
}
