<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\Products;
use Illuminate\Http\Request;
use DB;
class ordersContoller extends Controller
{
    //
    function index(){
        $orders = DB::select('select * FROM `orders` ');
        $products = Products::all();
        return view('orders\index', ['orders'=> $orders , 'products'=>$products]);
    }
    
    function show($id) {
        $order = DB::select('select * FROM `orders` where id = ?',[$id]);    
        return view('orders/orderUpdate',['order'=>$order] );
    }

    function edit(Request $request,$id) {
        $status = $request->input('status');
        $payment_status  = $request->input('paymentStatus');
        DB::update('update orders set status = ? , payment_status=?  where id = ?',[$status,$payment_status,$id]);    
        return redirect()->back()->with('status' , 'order edited successfuly');
    }

}
