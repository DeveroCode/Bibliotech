<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reportes')->insert([
            'meses' => json_encode(['inicio' => '01-01', 'fin' => '03-31']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reportes')->insert([
            'meses' => json_encode(['inicio' => '01-04', 'fin' => '06-30']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reportes')->insert([
            'meses' => json_encode(['inicio' => '01-07', 'fin' => '09-30']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reportes')->insert([
            'meses' => json_encode(['inicio' => '01-10', 'fin' => '12-31']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
