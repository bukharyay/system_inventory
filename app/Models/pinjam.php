<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    protected $table = "pinjams";
    protected $primaryKey = 'id'; // Atur primary key ke kolom 'nim'
    public $incrementing = false; // Pastikan nilai primary key tidak secara otomatis bertambah
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nim',
        'nama_peminjam',
        'nama_alat_1',
        'jumlah_alat_1',
        'id_alat_1',
        'nama_alat_2',
        'jumlah_alat_2',
        'id_alat_2',
        'nama_alat_3',
        'jumlah_alat_3',
        'id_alat_3',
        'nama_alat_4',
        'jumlah_alat_4',
        'id_alat_4',
        'nama_alat_5',
        'jumlah_alat_5',
        'id_alat_5',
        'dosen',
        'kelas',
        'ruang',
        'mata_kuliah',
        'tanggal_waktu_peminjaman',
        'waktu_pengembalian',
        'keterangan',
    ];

}
