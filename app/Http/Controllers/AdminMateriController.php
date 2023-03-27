<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AdminMateriController extends Controller
{
    public function index()
    {

        $materis = Materi::with('umkm')->get();
        return Inertia::render('AdminMateri/Index', [
            'materis' => $materis
        ]);
    }
    public function edit(Request $request)
    {
        $materi = Materi::with('umkm')->where('id', $request->id)->first();
        return Inertia::render('AdminMateri/Edit', [
            'materi' => $materi
        ]);
    }
}
