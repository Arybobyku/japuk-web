<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminEventController extends Controller
{
    public function index()
    {
        $items = Event::paginate(10)->through(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'excerpt' => $item->excerpt,
            'image' => $item->image,
            'isi' => $item->isi,
            // etc
                ];
        });

        return Inertia::render('AdminEvent/Index', [
            'items' => $items,
        ]);
    }

    public function store(Request $request)
    {
        $gambar = '';
        if ($request->file('image') != null) {
            $ttd = $request->file('image')->store('news');
            $image = asset('storage/'.$ttd);

            $gambar = $image;
        }
        $excerpt = Str::limit(strip_tags($request->isi, 20));
        Event::create([
                'title' => $request->title,
                'image' => $gambar,
                'isi' => $request->isi,
                'excerpt' => $excerpt,
            ]);

        return redirect('adminevent');
    }

    public function edit(Request $request)
    {
        $gambar = '';
        if ($request->file('image') != null) {
            $ttd = $request->file('image')->store('produk');
            $image = asset('storage/'.$ttd);

            $gambar = $image;

            unlink($request->gambarDummy);
        } else {
            $gambar = $request->gambarDummy;
        }
        $excerpt = Str::limit(strip_tags($request->isi, 20));
        Event::where('id', $request->id)->update([
           'title' => $request->title,
                'image' => $gambar,
                'isi' => $request->isi,
                'excerpt' => $excerpt,
        ]);

        return redirect('adminevent');
    }

    public function destroy(Request $request)
    {
        if ($request->gambarDummy != null) {
            @unlink($request->gambarDummy);
        }
        Event::destroy($request->id);
    }
}
