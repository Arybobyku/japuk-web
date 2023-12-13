<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\umkm;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = umkm::latest()->get();

        return Inertia::render('Landing/Umkm', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'umkms' => $umkms,
        ]);
    }

    public function produks(Request $request)
    {
        $produk = Produk::latest()->where('id_umkm', $request->id)->get();
        $umkm = umkm::where('id', $request->id)->get();

        return Inertia::render('Landing/Produk', [
              'produks' => $produk,
              'umkm' => $umkm,
         ]);
    }
}
