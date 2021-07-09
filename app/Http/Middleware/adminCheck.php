<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Session;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class adminCheck
{
    public function handle(Request $request, Closure $next)
    {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    if(auth() && Auth::user()->role == 'admin'){
        return $next($request);
    }elseif(auth() && Auth::user()->role == 'user'){
        return redirect()->route('home');
    }else{
        return redirect()->route('admin.home');
    }
    }
}

    
