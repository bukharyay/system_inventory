<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = ['userID'];

    public function peminjaman(){
        return $this->belongsTo("App\Models\User", "userID");
    }

    public function data_alat(){
        return $this->belongsTo("App\Models\data_alat", "kode_alat");
    }
}
