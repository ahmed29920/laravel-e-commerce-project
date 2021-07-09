<?php
namespace App\Http\Controllers;
use App\Models\categoriese;
use Illuminate\Http\Request;
use DB;
class CategriesController extends Controller
{
    //display all
    function index(){
        $categories = categoriese::all();
        return view('categories\index',['categories'=>$categories]);
    }
    
    function create()
    {
        return view('categories\create');        
    }

    function store(Request $request)
    {
        $category = new categoriese;
        $category->name = $request->input('name');
        $category->save();
        return redirect('add-category')->with('status' , 'category add successfuly');        
    }

    function destroy($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect()->back()->with('status' , 'category add successfuly');
    }   
    //show that will edited 
    function show($id) {
        $Categries = DB::select('select * from categories where id = ?',[$id]);
        return view('categories/CategoryUpdate', ['Categries' => $Categries] );
    }
    //save edits
    function edit(Request $request,$id) {
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        DB::update('update categories set name = ?  where id = ?',[$name,$id]);
        
        return redirect()->back()->with('status' , 'category edited successfuly');
    }
}

