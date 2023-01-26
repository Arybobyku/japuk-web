<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request){

        $user = User::with('umkm')->get();
        return Inertia::render('User/Index', [
            'users'=>$user
        ]);
    }
}
