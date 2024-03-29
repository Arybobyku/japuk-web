<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminMateriController extends Controller
{
    public function index()
    {
        $materis = Materi::all();

        return Inertia::render('AdminMateri/Index', [
            'materis' => $materis,
        ]);
    }

    public function store(Request $request)
    {
        Materi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi');
    }

    public function edit(Request $request)
    {
        Materi::where('id', $request->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi');
    }

    public function destroy(Request $request)
    {
        Materi::destroy($request->id);
    }
}
