<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_alat extends Model
{
    use HasFactory;

    protected $table = 'jenis_alat';


    public function data_alat(){
        return $this->hasMany("App\Models\data_alat", "kode_jenis_alat");
    }
}
