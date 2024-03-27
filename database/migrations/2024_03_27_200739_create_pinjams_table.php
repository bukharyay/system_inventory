<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
          $table->integer("nim");
          $table->unique("nim");
          $table->string("nama_peminjam");
          $table->string("dosen");
          $table->string("ruang");
          $table->string("mata_kuliah");
          $table->date("tanggal_peminjaman"); // Mengubah tipe kolom menjadi date
          $table->date("waktu_peminjaman");   // Mengubah tipe kolom menjadi date
          $table->date("waktu_pengembalian"); // Mengubah tipe kolom menjadi date
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
};
