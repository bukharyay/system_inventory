<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_alat extends Model
{
    use HasFactory;

    protected $table = 'data_alat';

    protected $fillable = ['kode_alat'];

    public function peminjaman(){
        return $this->hasMany("App\Models\Peminjaman", "kode_alat");
    }

    public function jenis_alat(){
        return $this->belongsTo("App\Models\jenis_alat", "kode_jenis_alat");
    }
}
