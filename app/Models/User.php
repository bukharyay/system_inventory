<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'username',
        'password',
        'role',
    ];

    public function peminjaman(){
        return $this->hasMany("App\Models\Peminjaman", "userID");
    }
}

