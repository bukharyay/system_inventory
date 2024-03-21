<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = ['id_user','kode_alat','tanggal_peminjam','tanggal_kembali','status','kondisi'];

    public function peminjaman(){
        return $this->belongsTo("App\Models\User", "id_user");
    }

    public function data_alat(){
        return $this->belongsTo("App\Models\data_alat", "kode_alat");
    }
}
