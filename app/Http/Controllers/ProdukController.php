<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProdukController extends Controller
{
    public function index(Request $request){
        $produks = Produk::where('id_umkm',$request->id);
        
        return Inertia::render('Produk/Produk', [
            'produks'=>$produks
        ]);
    }
}
