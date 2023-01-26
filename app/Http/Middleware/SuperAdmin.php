<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuperAdmin {

    public function handle($request, Closure $next)
    {

        if ( Auth::check() && Auth::user()->isSuperAdmin() )
        {
            return $next($request);
        }

        return redirect('/');

    }

}