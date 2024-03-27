<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = ['users_id','kode_alat_id','tanggal_peminjaman','tanggal_kembali','status','kondisi'];

    public function peminjaman(){
        return $this->belongsTo("App\Models\User", "id");
    }

    public function data_alat(){
        return $this->belongsTo("App\Models\data_alat", "kode_alat");
    }
}
