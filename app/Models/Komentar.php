<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produk',
        'id_user',
        'komentar',
    ];

    public function produk(){
        return $this->hasOne(Produk::class,'id','id_produk');
    }

    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }

}
