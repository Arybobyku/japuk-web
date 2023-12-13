<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\umkm;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('12345678'),
        ]);

        umkm::create([
            'id_user' => 1,
            'nama' => 'dartdroid',
            'logo' => 'logo.png',
            'alamat' => 'Medan',
            'no_hp' => '081176354179',
        ]);

        User::create([
            'id' => 2,
            'name' => 'yudha',
            'email' => 'yudha@gmail.com',
            'role' => '0',
            'password' => bcrypt('12345678'),
        ]);

        umkm::create([
            'id_user' => 2,
            'nama' => 'Parfum',
            'logo' => 'http://127.0.0.1:8000/storage/umkm/MDfa5LwMapEWfc5dyZNmJJSNyznO63IoW7BhWL15.png',
            'alamat' => 'Binjai',
            'no_hp' => '081260991252',
        ]);
    }
}
