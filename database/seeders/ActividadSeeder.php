<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActividadSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('actividades')->insert([
            'name' => 'estudio'
        ]);

        DB::table('actividades')->insert([
            'name' => 'hacer tarea'
        ]);

        DB::table('actividades')->insert([
            'name' => 'consultar'
        ]);
    }
}
