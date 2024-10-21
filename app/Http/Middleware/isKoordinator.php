<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isKoordinator
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->level != 0){
            return redirect('/')->with('error',"Anda tidak memiliki akses sebagai Koordinator");
        }
        return $next($request);
    }
}
