<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class UserViewController extends Controller {
    //display
    function index(){
      $users = DB::select('select * from users');
      return view('UserView',['users'=>$users]);
    }

    function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);
        return redirect()->back()->with('status' , 'user add successfuly');
    }   
    //display that will be edited
    function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('UserUpadate',['users'=>$users]);
    
    }
    //save the editeds
    function edit(Request $request,$id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $role =  $request->input('role');
        DB::update('update users set name = ? , email=? , role = ? where id = ?',[$name,$email,$role,$id]);
        $users = DB::select('select * from users');
        return redirect()->back()->with('status' , 'user edited successfuly');
    }
}
