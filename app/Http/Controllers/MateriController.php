<?php

namespace App\Http\Controllers;

use App\Models\IsiMateri;
use App\Models\Materi;
use Inertia\Inertia;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::all();

        return Inertia::render('Materi/Index', [
            'materis' => $materis,
        ]);
    }

    // public function show($id)
    // {
    //     return view('users/isimateri', [
    // ]);
    // }
    public function isi($id_materi)
    {
        // $user = Isimateris::find($id);
        $prev = IsiMateri::where('id_materi', '<', $id_materi)->max('id_materi');
        $next = IsiMateri::where('id_materi', '>', $id_materi)->min('id_materi');
        $items = IsiMateri::where('id_materi', $id_materi)->paginate(1)->through(function ($item) {
            return [
            'id' => $item->id,
            'judul' => $item->judul->nama,
            'sub_bab' => $item->sub_bab,
            'image' => $item->image,
            'isi' => nl2br($item->isi),
            // etc
                ];
        });

        // $back = Isimateris::where('id', $user->id)->first();
        return Inertia::render('Materi/Isi', [
        'items' => $items,
        'list_materis' => IsiMateri::where('id_materi', $id_materi)->get(),
    ]
        );
    }
}
