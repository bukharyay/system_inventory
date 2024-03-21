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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignId('users_id')->constrained('users', 'id');
            $table->foreignId('kode_alat_id')->constrained('data_alat', 'id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            $table->string('status');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
