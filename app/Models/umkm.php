<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama',
        'logo',
        'alamat',
        'no_hp',
    ];
}
