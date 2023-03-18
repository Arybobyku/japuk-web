<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class KomentarController extends Controller
{
    public function index()
    {
        $produks = Produk::with('umkm')->get();

        return Inertia::render('Komentar/Komentar', [
            'produks' => $produks
        ]);
    }

    public function komentarDetail(Request $request)
    {
        $produk = Produk::with('umkm')->where('id', $request->id)->first();
        $komentars = Komentar::with('user')->with('produk')->where('id_produk', $request->id)->get();

        return Inertia::render('Komentar/Detail/KomentarDetail', [
            'produk' => $produk,
            'komentars' => $komentars
        ]);
    }

    public function komentarSend(Request $request)
    {

        $idUser = Auth::user()->id;

        Komentar::create([
            'id_produk'=> $request->idProduk,
            'id_user'=> $idUser,
            'komentar'=> $request->komentar,
        ]);

        $produk = Produk::with('umkm')->where('id', $request->idProduk)->first();
        $komentars = Komentar::with('user')->with('produk')->where('id_produk', $request->idProduk)->get();

        return Inertia::render('Komentar/Detail/KomentarDetail', [
            'produk' => $produk,
            'komentars' => $komentars
        ]);
    }
}
