<?php

namespace App\Http\Controllers;

use App\Models\IsiMateri;
use App\Models\Materi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminIsiMateriController extends Controller
{
    public function index()
    {
        $items = IsiMateri::paginate(10)->through(function ($item) {
            return [
            'id' => $item->id,
            'judul' => $item->judul->nama,
            'sub_bab' => $item->sub_bab,
            'isi' => $item->isi,
            // etc
                ];
        });

        return Inertia::render('AdminIsiMateri/Index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('AdminIsiMateri/Create', [
            'materis' => Materi::all(),
        ]);
    }

    public function edit(IsiMateri $isimateri)
    {
        return Inertia::render('AdminIsiMateri/Edit', [
            'materis' => Materi::all(),
             'isimateri' => [
                'id' => $isimateri->id,
                'sub_bab' => $isimateri->sub_bab,
                'isi' => $isimateri->isi,
                'id_materi' => $isimateri->id_materi,
                'image' => $isimateri->image,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $gambar = '';
        if ($request->file('gambar') != null) {
            $ttd = $request->file('gambar')->store('isimateri');
            $image = asset('storage/'.$ttd);

            $gambar = $image;
        }
        IsiMateri::create([
                'id_materi' => $request->id_materi,
                'sub_bab' => $request->sub_bab,
                'image' => $gambar,
                'isi' => $request->isi,
            ]);

        return redirect('isimateri');
    }

    public function update(Request $request)
    {
        IsiMateri::where('id', $request->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('isimateri');
    }

    public function destroy(IsiMateri $isimateri)
    {
        $isimateri->delete();
        sleep(1);

        return redirect('isimateri');
    }
}
