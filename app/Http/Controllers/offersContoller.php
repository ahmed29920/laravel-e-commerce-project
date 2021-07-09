<?php

namespace App\Http\Controllers;
use App\Models\offer;
use App\Models\Products;
use Illuminate\Http\Request;
use DB;
class offersContoller extends Controller
{
    //display
    function index(){
        $offers = offer::all();
        $products = Products::all();
        return view('offers\index', ['products' => $products , 'offers'=>$offers]);
    }
    
    function create()
    {
        $products = Products::all();
        return view('offers\create' , compact( 'products',$products ));        
    }
    
    function store(Request $request)
    {
        $offer = new offer;
        $offer->product_id = $request->input('product_id');
        $offer->percentage = $request->input('percentage');
        $offer->save();
        return redirect()->back()->with('status' , 'offer added successfuly');        
    }
    
    function destroy($id) {
        DB::delete('delete from offers where id = ?',[$id]);
        return redirect()->back()->with('status' , 'offer deleted successfuly');
    }   
    //display befor editing
    function show($id) {
        $products = Products::all();
        $offers = DB::select('select * from offers where id = ?',[$id]); 
        return view('offers/offerUpdate',['offers'=>$offers , 'products'=>$products]);
    }
    //save edites
    function edit(Request $request,$id) {
        $percentage = $request->input('percentage');
        DB::update('update offers set percentage = ? where id = ?',[$percentage , $id]);
        return redirect()->back()->with('status' , 'offer edited successfuly');
    }
}
