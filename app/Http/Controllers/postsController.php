<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use DB;
class postsController extends Controller
{
    //
    function index(){
        $posts = post::all();
        return view('posts\index', compact('posts',$posts));
    }
    
    function create()
    {
        return view('posts\create');        
    }
    
    function store(Request $request)
    {
        $post = new post;
        $post->user_id = Auth::user()->id;
        $post->is_active = 0 ;
        $post->post_text = $request->input('text');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/posts/' , $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect()->back()->with('status' , 'post add successfuly');        
    }

    function destroy($id) {
        DB::delete('delete from posts where id = ?',[$id]);
        return redirect()->back()->with('status' , 'post add successfuly');
    }   
    //dispaly befor editing
    function show($id) {
        $post = DB::select('select * from posts where id = ?',[$id]);
        return view('posts/postUpdate',['post'=>$post] );
    
    }   
    //save edites
    function edit(Request $request,$id) {
        $text = $request->input('text');
        if ( ! $request->has('is_active')) {
            $is_active = 0 ;
        }else
        {
            $is_active = 1 ;
        }
        DB::update("update posts set post_text = ? , is_active = ?  where id = ?",[$text,$is_active,$id]);
        
        return redirect()->back()->with('status' , 'post edited successfuly');
    }
}
