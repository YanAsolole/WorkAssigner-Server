<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DB::table('users')->insert([
         'name' => 'Fadli Ismail',
         'username' => 'fadli',
         'password' => bcrypt('123'),
         'role' => 'karyawan'
      ]);
      DB::table('users')->insert([
         'name' => 'Yusril Nanditama',
         'username' => 'yusril',
         'password' => bcrypt('123'),
         'role' => 'karyawan'
      ]);
      DB::table('users')->insert([
         'name' => 'Alfian Dwi Anggoro',
         'username' => 'alfian',
         'password' => bcrypt('123'),
         'role' => 'karyawan'
      ]);
      DB::table('users')->insert([
         'name' => 'Admin',
         'username' => 'admin',
         'password' => bcrypt('321'),
         'role' => 'admin'
      ]);
   }
}
