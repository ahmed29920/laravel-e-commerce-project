<?php

namespace App\Http\Controllers;
use App\Http\Controllers\productsController;
use App\Models\Products;
use App\Models\featured;
use DB;
use Illuminate\Http\Request;

class featuredController extends Controller
{
    //display
    function index(){
        $features = featured::All();
        return view('featurd\index', ['features'=> $features]);
    }
    
    function create()
    {    
        $products = Products::all();
        return view('featurd\createFeature' , [ 'products'=>$products ]);        
    }
    
    
    function store(Request $request)
    {
        $feature = new featured;
        $feature->product_id = $request->input('product_id');

        $feature->save();
        return redirect()->back()->with('status' , ' feature add successfuly');        
    }

    function destroy($id) {
        DB::delete('delete from  featured where id = ?',[$id]);
        return redirect()->back()->with('status' , ' feature deleted successfuly');
    }
}
