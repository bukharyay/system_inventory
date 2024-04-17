<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDelete extends Model
{
    protected $table = "history_delete";
    protected $primaryKey = 'id'; // Atur primary key ke kolom 'nim'
    public $incrementing = false; // Pastikan nilai primary key tidak secara otomatis bertambah
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nim',
        'nama_peminjam',
        'nama_alat',
        'dosen',
        'ruang',
        'mata_kuliah',
        'tanggal_peminjaman',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'keterangan',
    ];

}