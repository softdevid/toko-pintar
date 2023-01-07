<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Toko 1',
            'email' => 'toko@gmail.com',
            'password' => Hash::make('toko'),
            'level' => 'toko1',
        ]);

        User::create([
            'name' => 'Toko 2',
            'email' => 'toko2@gmail.com',
            'password' => Hash::make('toko2'),
            'level' => 'toko2',
        ]);
    }
}
