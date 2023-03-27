<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $user = User::with('umkm')->get();
        return Inertia::render('User/Index', [
            'users' => $user
        ]);
    }
    public function edit(Request $request)
    {
        $user = User::with('umkm')->where('id', $request->id)->first();
        return Inertia::render('User/Edit', [
            'users' => $user
        ]);
    }
}
