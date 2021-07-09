<?php

namespace App\Http\Middleware;

use Session;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;



class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    

    public function login(Request $request)
    {   
        $input = $request->all();
        $role =  Auth::user()->role;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth() && Auth::user()->role != 'user' ) {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('status','Email-Address And Password Are Wrong.');
        }
          
    }
}
