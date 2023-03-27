<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProdukController extends Controller
{
    public function index()
    {
        $id = Auth::user()->umkm->id;
        $produks = Produk::where('id_umkm', $id)->get();

        return Inertia::render('Produk/Produk', [
            'produks' => $produks
        ]);
    }

    public function store(Request $request)
    {
        $id = Auth::user()->umkm->id;

        $gambar = '';
        if ($request->file('gambar') != null) {
            $ttd = $request->file('gambar')->store('produk');
            $image = asset('storage/' . $ttd);

            $gambar = $image;
        }

        Produk::create([
            'id_umkm' => $id,
            'nama' => $request->nama,
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect('produk');
    }

    public function edit(Request $request)
    {

        $gambar = '';
        if ($request->file('gambar') != null) {
            $ttd = $request->file('gambar')->store('produk');
            $image = asset('storage/' . $ttd);

            $gambar = $image;

            unlink($request->gambarDummy);
        }else{
           $gambar = $request->gambarDummy;
        }

        Produk::where('id', $request->id)->update([
            'nama' => $request->nama,
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect('produk');
    }

    public function destroy(Request $request){
        if ($request->gambarDummy!=null) {
            @unlink($request->gambarDummy);
        }
        Produk::destroy($request->id);
    }
}
