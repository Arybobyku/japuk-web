<?php

namespace App\Http\Controllers;

use App\Models\IsiMateri;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminIsiMateriController extends Controller
{
    public function index()
    {
        $materis = IsiMateri::all();

        return Inertia::render('AdminMateri/Index', [
            'materis' => $materis,
        ]);
    }

    public function store(Request $request)
    {
        IsiMateri::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi');
    }

    public function edit(Request $request)
    {
        IsiMateri::where('id', $request->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi');
    }

    public function destroy(Request $request)
    {
        IsiMateri::destroy($request->id);
    }
}
