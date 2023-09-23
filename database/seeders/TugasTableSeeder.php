<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TugasTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DB::table('tugas')->insert([
         'id_project' => 1,
         'id_user' => 1,
         'nama_tugas' => 'Dashboard Admin',
         'deskripsi' => 'Buatlah sebuah tampilan dashboard admin sesuai dengan UI/UX yg sudah diberikan',
         'status' => true,
         'tgl_mulai' => '2023-09-17',
         'tgl_selesai' => '2023-09-24'
      ]);
      DB::table('tugas')->insert([
         'id_project' => 1,
         'id_user' => 2,
         'nama_tugas' => 'Dashboard User',
         'deskripsi' => 'Buatlah sebuah tampilan dashboard User sesuai dengan UI/UX yg sudah diberikan',
         'status' => false,
         'tgl_mulai' => '2023-09-18',
         'tgl_selesai' => '2023-09-25'
      ]);
   }
}
