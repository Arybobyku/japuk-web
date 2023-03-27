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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('12345678'),
        ]);

        umkm::create([
            'id_user'=>1,
            'nama'=>'dartdroid',
            'logo'=>'logo.png',
            'alamat'=>'Medan',
            'no_hp'=>'081176354179',

        ]);
    }
}
