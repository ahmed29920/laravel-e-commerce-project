<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategriesController;
use App\Models\categoriese;
use App\Models\Products;
use App\Models\cart;
use App\Models\like;
use App\Models\order;
use App\Models\review;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;

use DB;
class productsController extends Controller
{
    //
    function index(){
        $products = Products::all();
        return view('product\index', compact('products',$products));
    }
    
    function create()
    {
        $Categries = categoriese::all();
        return view('product\create' , compact( 'Categries',$Categries ));        
    }
    
    function store(Request $request)
    {
        $product = new Products;
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/products/' , $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->back()->with('status' , 'product add successfuly');        
    }

    function destroy($id) {
        DB::delete('delete from products where id = ?',[$id]);
        return redirect()->back()->with('status' , 'product add successfuly');
    }   
    //dispaly befor editing
    function show($id) {
        $product = DB::select('select * from products where id = ?',[$id]);
        $Categries = categoriese::all(); 
        return view('product/ProductUpdate',['product'=>$product] , compact( 'Categries',$Categries ) );
    }
    //save edites
    function edit(Request $request,$id) {
        $name = $request->input('name');
        $code = $request->input('code');
        $price =  $request->input('price');
        $category_id = $request->input('category_id');
        DB::update('update products set name = ? , code=? , price = ? , category_id = ?  where id = ?',[$name,$code,$price,$category_id,$id]);
        return redirect()->back()->with('status' , 'product edited successfuly');
    }
    //display detailes
    function detailes($id){
        $avrg_rats = $users = DB::table('reviews')->where('product_id' , $id)->avg('rate');
        $rated_products = DB::select('select * from reviews');
        $product = DB::select('select * from products where id = ?',[$id]);
        return view('product/detailes', ['product' => $product  , 'avrg'=>$avrg_rats , 'rated_products'=>$rated_products]);
    }
    //search products
    function search(Request $request){
        $products = Products::where('name', 'like' , '%' . $request->input('search').'%')->get();
        return view('product/search', ['products' => $products]);
    }

    function addToCart(Request $request)
    {
        if(Auth::check() )
        {   
            $cart = new cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->input('product_id');
            $cart->save(); 
            return redirect()->back()->with('status' , 'product added to cart successfuly');
        } else {
            return redirect('/login');
        }            
    }

    function addToCartInHome(Request $request)
    {
        if(Auth::check() )
        {   
            $cart = new cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->input('product_id');
            $cart->save(); 
            return redirect()->back()->with('status' , 'product added to cart successfuly');
        } else {
            return redirect('/login');
        }            
    }

    //get num of items in thev cart
    static function cartItems()
    {
        $user_id = Auth::user()->id;
        $cart = cart::where('user_id' , $user_id)->count();
        return $cart;
    }
    //display cart items
    function cartList()
    {
        $user_id = Auth::user()->id;
        $carts = DB::select('select * FROM `products` INNER JOIN `carts` ON products.id = `product_id` WHERE user_id = ' . $user_id );
        return view('product/cartList' , ['carts'=>$carts]);
    }
    //remove product from cart
    function removeCart($id)
    {
        cart::destroy($id);
        return redirect()->back()->with('status' , 'product removed from cart successfuly');
    }
    //dispaly numof orders
    static function ordersNum()
    {
        $user_id = Auth::user()->id;
        $order = order::where('user_id' , $user_id)->count();
        return $order;
    }    
    //dsipaly the cart items to confirm ordering
    function orderNow()
    {
        $user_id = Auth::user()->id;
        $total = DB::table('carts')
        ->join('products' , 'carts.product_id' , '=' , 'products.id' )
        ->where('carts.user_id' , $user_id )
        ->sum('products.price');
        return  view('product/orderNow' , ['total'=>$total]);
    }
    //confirm order
    function order(Request $request)
    {
        $user_id = Auth::user()->id;
        $allCarts = cart::where('user_id' , $user_id)->get();
        foreach($allCarts as $cart)
        {
            $order = new order;
            $product = Products::where('id' , '=' , $cart['product_id'])->get();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->cost = $product[0]->price;
            $order->status = 'pending';
            $order->payment_status = 'pending';
            $order->address = $request->input('address');
            $order->payment_method = $request->input('payment');
            $order->save();
            cart::where('user_id' , $user_id)->delete();
        }
        return redirect('/home');
    }
    //display oredered items
    function ordersList()
    {
        $user_id = Auth::user()->id;
        $orders = DB::select('select * FROM `products` INNER JOIN `orders` ON products.id = `product_id` WHERE user_id = ' . $user_id );
        $reviews = review::all();
        $review_users = DB::table('reviews')->pluck('user_id');
        return view('product/ordersList' , ['orders'=>$orders , 'reviews'=>$reviews , 'review_users' => $review_users]);
    }
    
    

    function rateProduct(Request $request)
    {
        $reviews = review::all() ;
        $user_id = Auth::user()->id;
        $product_id = $request->input('product_id');
        $rate = $request->input('rate');

        //check if the user already rated the product
        $already_rate = false;
        foreach($reviews as $review){
            if($review->user_id == $user_id && $review->product_id == $product_id){
                $already_rate = true;
                break;
            }
        }
        //if the user already rated => update the rate
        if ($already_rate) {
            DB::update('update reviews set rate = ? where user_id = ? and product_id = ? ' , [$rate , $user_id , $product_id]);
            return null;
        }else{
            $review = new review ;
            $review->user_id = $user_id;
            $review->product_id = $product_id;
            $review->rate = $rate;;
            $review->save();
            return null;
        }
    }

   public function like(Request $request)
    {
        $product_id = $request['product_id'];
        $user_id = Auth::user()->id;
        $likes = like::all();
        //check if the user already liked the product
        $already_liked = false;
        foreach($likes as $like){
            if($like->user_id == $user_id && $like->product_id == $product_id){
                $already_liked = true;
                break;
            }
        }
        //if the user already liked => delete the like
        if ($already_liked) {
            DB::delete('delete from likes where user_id = ? and product_id = ? ' , [$user_id , $product_id]);
            return null;
        }else{
            $like = new like;
            $like->user_id = $user_id;
            $like->product_id = $product_id;
            $like->save();
            return null;
        }
    }
    //display liked items
    static function likedItems()
    {
        $user_id = Auth::user()->id;
        $likeItems = like::where('user_id' , $user_id)->count();
        return $likeItems;
    }
    //display reviewed items
    static function reviewItems()
    {
        $user_id = Auth::user()->id;
        $reviewItems = review::where('user_id' , $user_id)->count();
        return $reviewItems;
    }
    //dispaly all likes
    function likes()
    {
        $likes = like::all();
        return  view('product/likes' , ['likes'=>$likes]);
    }
//dispaly all  ratess
    function rates()
    {
        $rates = review::all();
        return  view('product/rates' , ['rates'=>$rates]);
    }


}
