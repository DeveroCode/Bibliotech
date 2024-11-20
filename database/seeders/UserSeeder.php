<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Maricruz',
            'apellido_paterno' => 'Sanchez',
            'apellido_materno' => 'Sanchez',
            'fecha' => date('Y-m-d H:i:s'),
            'email' => 'msanchez@code.com',
            'password' => Hash::make('msanchez98'),
            'genero' => 2,
            'rol' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'telefono' => '123123123',
        ]);

        DB::table('users')->insert([
            'name' => 'Melissa',
            'apellido_paterno' => 'Gameros',
            'apellido_materno' => 'Gameros',
            'fecha' => date('Y-m-d H:i:s'),
            'email' => 'gmeli@code.com',
            'password' => Hash::make('gmeli98'),
            'genero' => 2,
            'rol' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'telefono' => '123123123',
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos',
            'apellido_paterno' => 'Martinez',
            'apellido_materno' => 'Bautista',
            'fecha' => date('Y-m-d H:i:s'),
            'email' => 'devero@code.com',
            'genero' => 1,
            'rol' => 1,
            'password' => Hash::make('123123123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'telefono' => '123123123',
        ]);

        DB::table('users')->insert([
            'name' => 'Edgar',
            'apellido_paterno' => 'Bencomo',
            'apellido_materno' => 'Devero',
            'fecha' => date('Y-m-d H:i:s'),
            'email' => 'edgar@devero.com',
            'genero' => 1,
            'rol' => 2,
            'password' => Hash::make('123123123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'telefono' => '123123123',
        ]);
    }
}
