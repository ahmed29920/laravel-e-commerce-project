<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Str;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->role != 'user') {
            //haven't user role redirect to dashboard
            return redirect()->intended('dashboard'); 
        }elseif((Auth::attempt($credentials) && Auth::user()->role == 'user')){
            //have user role redirect to home page
            return redirect()->intended('/home');
        }
        return redirect("login")->with( 'status' ,  'Login details are not valid');
    }

    

    public function registration()
    {
        return view('auth.registration');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        $credentials = $request->only('email', 'password');
        //ensure that the user haven't user role 
        if (Auth::attempt($credentials) && Auth::user()->role != 'user') {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }else{
            return redirect()->intended('/')->withSuccess('Signed in');
        }
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => 'user',
      ]);
    }    
    

    public function dashboard()
    {
        //ensure that the user haven't user role 
        if(Auth::check()  && Auth::user()->role != 'user'){
            return view('dashboard');
        }
        return redirect("login")->with('status' , 'You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
   }

   public function github()
   {
       # code...
       return Socialite::driver('github')->redirect();
   }

   public function githubRedirect()
   {
       # code...
       $user = Socialite::driver('github')->stateless()->user();

       $user = User::firstOrCreate([
           'email' => $user->email
       ] , [
           'name' => $user->nickname,
           'password' => Hash::make(Str::random(24)),
           'role' => 'user'
       ]);
        Auth::login($user , true);
        return redirect('/home');
   }
}