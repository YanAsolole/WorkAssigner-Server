<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_proyek');
            $table->integer('id_user');
            $table->string('nama_pekerjaan');
            $table->text('deskripsi');
            $table->enum('prioritas', [1,2,3]);
            $table->boolean('status');
            $table->date('tenggat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
