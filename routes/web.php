<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminIsiMateriController;
use App\Http\Controllers\AdminMateriController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/news', [LandingController::class, 'news'])->name('news');
Route::get('/news/{news}', [LandingController::class, 'newsDetail'])->name('news.detail');
Route::get('/event', [LandingController::class, 'event'])->name('event');
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');
Route::get('/umkm/{id}', [UmkmController::class, 'produks'])->name('produkumkm');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/materiumkm', [MateriController::class, 'index'])->name('materiumkm');
    Route::get('/materiumkm/{id}', [MateriController::class, 'isi'])->name('isimateriumkm');
    // User
    // Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user${id}', [UserController::class, 'edit'])->name('user.edit');

    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::post('/produkEdit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produkDelete', [ProdukController::class, 'destroy'])->name('produk.delete');

    // Komentar
    Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar');
    Route::post('/komentar', [KomentarController::class, 'komentarSend'])->name('komentarSend');
    Route::get('/komentar/{id}', [KomentarController::class, 'komentarDetail'])->name('komentarDetail');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/userDelete', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/materi', [AdminMateriController::class, 'index'])->name('materi');
    Route::post('/materi', [AdminMateriController::class, 'store'])->name('materi.store');
    Route::post('/materiEdit', [AdminMateriController::class, 'edit'])->name('materi.edit');
    Route::post('/materiDelete', [AdminMateriController::class, 'destroy'])->name('materi.delete');

    Route::get('/isimateri', [AdminIsiMateriController::class, 'index'])->name('isimateri');
    Route::get('/isimateri/create', [AdminIsiMateriController::class, 'create'])->name('isimateri.create');
    Route::get('/isimateri/{isimateri}/edit', [AdminIsiMateriController::class, 'edit'])->name('isimateri.edit');
    Route::post('/isimateri', [AdminIsiMateriController::class, 'store'])->name('isimateri.store');
    Route::post('/isimateriEdit', [AdminIsiMateriController::class, 'update'])->name('isimateri.update');
    Route::delete('/isimateri/{isimateri}', [AdminIsiMateriController::class, 'destroy'])->name('isimateri.delete');

    Route::get('/adminnews', [AdminNewsController::class, 'index'])->name('adminnews');
    Route::post('/adminnews', [AdminNewsController::class, 'store'])->name('adminnews.store');
    Route::post('/adminnewsEdit', [AdminNewsController::class, 'edit'])->name('adminnews.edit');
    Route::delete('/adminnewsDelete', [AdminNewsController::class, 'destroy'])->name('adminnews.delete');

    Route::get('/adminevent', [AdminEventController::class, 'index'])->name('adminevent');
    Route::post('/adminevent', [AdminEventController::class, 'store'])->name('adminevent.store');
    Route::post('/admineventEdit', [AdminEventController::class, 'edit'])->name('adminevent.edit');
    Route::post('/admineventDelete', [AdminEventController::class, 'destroy'])->name('adminevent.delete');
});

require __DIR__.'/auth.php';
