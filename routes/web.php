<?php

use App\Http\Controllers\AdminMateriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user${id}', [UserController::class, 'edit'])->name('user.edit');

    Route::get('/materi', [AdminMateriController::class, 'index'])->name('materi');

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
});

require __DIR__ . '/auth.php';
