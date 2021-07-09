<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Session;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
class userCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth() && Auth::user()->role == 'user'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
