<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        $events = Event::latest()->take(3)->get();

        return Inertia::render('Landing/Landing', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'news' => $news,
            'events' => $events,
        ]);
    }

    public function news()
    {
        $items = News::paginate(7)->through(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'excerpt' => $item->excerpt,
            'image' => $item->image,
            'isi' => $item->isi,
            'created_at' => $item->created_at->diffForHumans(),
            // etc
                ];
        });

        return Inertia::render('Landing/News', [
            'items' => $items,
        ]);
    }

    public function newsDetail(News $news)
    {
        return Inertia::render('Landing/NewsDetail', [
            'item' => [
            'id' => $news->id,
            'title' => $news->title,
            'image' => $news->image,
            'isi' => nl2br($news->isi),
            'created_at' => $news->created_at->diffForHumans(),
                ],
            ]);
    }

    public function event()
    {
        $items = Event::paginate(9)->through(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'excerpt' => $item->excerpt,
            'image' => $item->image,
            'isi' => $item->isi,
            // etc
                ];
        });

        return Inertia::render('Landing/Event', [
            'items' => $items,
        ]);
    }
}
