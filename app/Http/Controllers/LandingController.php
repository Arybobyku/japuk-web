<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class LandingController extends Controller
{
    public function index(){
        $produks = Produk::with('umkm')->get();
        $umkms = umkm::all();
        return Inertia::render('Landing/Landing', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'umkms' => $umkms,
            'produks' => $produks,
        ]);
    }
}
