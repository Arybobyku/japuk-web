<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\umkm;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('umkm')->get();

        return Inertia::render('User/Index', [
            'users' => $user,
        ]);
    }

    public function edit(Request $request)
    {
        $user = User::with('umkm')->where('id', $request->id)->first();

        return Inertia::render('User/Edit', [
            'users' => $user,
        ]);
    }

    public function destroy(Request $request)
    {
        Produk::join('umkms', 'umkms.id', '=', 'produks.id_umkm')->where('id_user', $request->id)->forceDelete();
        User::destroy($request->id);
        umkm::where('id_user', $request->id)->delete();
    }
}
