<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Carlos Alberto Martinez',
            'email' => 'devero@devero.com',
            'password' => bcrypt(123123123),
            'rol' => 1,
        ]);
    }
}
