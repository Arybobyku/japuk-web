<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminNewsController extends Controller
{
    public function index()
    {
        $items = News::paginate(10)->through(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'isi' => $item->isi,
            'image' => $item->image,
            'excerpt' => $item->excerpt,
            // etc
                ];
        });

        return Inertia::render('AdminNews/Index', [
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
        News::create([
                'title' => $request->title,
                'image' => $gambar,
                'isi' => $request->isi,
                'excerpt' => $excerpt,
            ]);

        return redirect('adminnews');
    }

    public function edit(Request $request)
    {
        $gambar = '';
        if ($request->file('gambar') != null) {
            $ttd = $request->file('gambar')->store('news');
            $image = asset('storage/'.$ttd);

            $gambar = $image;

            // unlink($request->gambarDummy);
        } else {
            $gambar = $request->gambarDummy;
        }
        $excerpt = Str::limit(strip_tags($request->isi, 20));
        News::where('id', $request->id)->update([
           'title' => $request->title,
                'image' => $gambar,
                'isi' => $request->isi,
                'excerpt' => $excerpt,
        ]);

        return redirect('adminnews');
    }

    public function destroy(Request $request)
    {
        if ($request->gambarDummy != null) {
            // @unlink($request->gambarDummy);
        }
        News::destroy($request->id);
    }
}
