<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_umkm',
        'nama',
        'deskripsi',
        'harga',
        'gambar',
    ];
    public function umkm(){
        return $this->hasOne(umkm::class,'id','id_umkm');
    }
}
