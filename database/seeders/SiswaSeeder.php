<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nama' => 'dono',
            'nomor_induk' => '1000',
            'alamat' => 'bantul',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'herman',
            'nomor_induk' => '1001',
            'alamat' => 'jombang',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'putri',
            'nomor_induk' => '1002',
            'alamat' => 'lamongan',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
