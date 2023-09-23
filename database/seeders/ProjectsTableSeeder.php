<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DB::table('projects')->insert([
         'nama_project' => 'WorkAssigner',
         'deskripsi' => 'WokAssigner adalah sebuah aplikasi manajemen pekerjaan yang dirancang untuk membantu individu maupun tim dalam mengatur dan mengkoordinasikan berbagai tugas dan pekerjaan yang perlu diselesaikan. Dengan WokAssigner, pengguna dapat membuat daftar tugas, mengatur tenggat waktu, menetapkan prioritas, dan mengassign tugas kepada anggota tim atau diri sendiri. Aplikasi ini juga bisa membuat sebuah laporan ketika tugas sudah diselesaikan.',
         'tgl_mulai' => '2023-09-15',
         'tgl_selesai' => '2023-10-15'
      ]);
      DB::table('projects')->insert([
         'nama_project' => 'BulBul',
         'deskripsi' => 'Aplikasi E-Commerce kami adalah platform belanja online yang revolusioner, dirancang untuk memberikan pengalaman belanja yang lebih baik dan nyaman bagi pelanggan di seluruh dunia. Dengan antarmuka pengguna yang intuitif dan fitur-fitur canggih, kami memu',
         'tgl_mulai' => '2023-09-17',
         'tgl_selesai' => '2023-10-17'
      ]);
   }
}
