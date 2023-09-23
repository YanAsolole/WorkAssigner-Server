<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LaporansTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DB::table('laporans')->insert([
         'id_tugas' => 1,
         'id_user' => 1,
         'nama_laporan' => 'Laporan Dashboard admin',
         'deskripsi' => 'Selesai membuat tampilan dashboard admin pada aplikasi WorkAssigner',
         'keluhan' => 'Susah bikin darkmode :)',
         'progres' => 100,
         'tgl_laporan' => '2023-09-17',
      ]);
      DB::table('laporans')->insert([
         'id_tugas' => 2,
         'id_user' => 2,
         'nama_laporan' => 'Laporan Dashboard user',
         'deskripsi' => 'Selesai membuat tampilan dashboard user pada aplikasi WorkAssigner',
         'keluhan' => 'Skill frontend terbatas)',
         'progres' => 95,
         'tgl_laporan' => '2023-09-18',
      ]);
   }
}
