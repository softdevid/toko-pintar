<?php

namespace Database\Seeders;

use App\Models\Toko;
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

        //akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
        ]);

        //akun toko 1
        User::create([
            'name' => 'Toko 1',
            'email' => 'toko@gmail.com',
            'password' => Hash::make('toko'),
            'level' => 'toko1',
        ]);

        // akun toko 2
        User::create([
            'name' => 'Toko 2',
            'email' => 'toko2@gmail.com',
            'password' => Hash::make('toko2'),
            'level' => 'toko2',
        ]);

        //toko 1
        Toko::create([
            'idUser' => 2,
            'namaToko' => 'Toko 1',
            'namaPengelola' => 'Ardianto',
            'email' => 'toko@gmail.com',
            'password' => Hash::make('toko'),
        ]);

        //toko 2
        Toko::create([
            'idUser' => 3,
            'namaToko' => 'Toko 2',
            'namaPengelola' => 'Putra',
            'email' => 'toko2@gmail.com',
            'password' => Hash::make('toko2'),
        ]);
    }
}
