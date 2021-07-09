<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategriesController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\categoriese;
use App\Models\Products;
use App\Models\slider;
use App\Models\offer;
use App\Models\cart;
use App\Models\post;
use App\Models\like;
use Session;
use DB;

class homeController extends Controller
{
    //

    function index(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $likes = DB::select('select * from likes where user_id = '.$user_id);
        } else{

            $likes = DB::select('select * from likes');
        }
        $men = DB::select('select * FROM `products` 
        INNER JOIN `featured` ON `products`.`id` = `featured`.`product_id` WHERE category_id = 1 LIMIT 4' );
        
        $women = DB::select('select * FROM `products` 
        INNER JOIN `featured` ON `products`.`id` = `featured`.`product_id` WHERE category_id = 2 LIMIT 4' );
       
        $children = DB::select('select * FROM `products` 
        INNER JOIN `featured` ON `products`.`id` = `featured`.`product_id` WHERE category_id = 3 LIMIT 4' );
        
        $sliders = slider::all();

        $offers = DB::select('select  * FROM `offers` INNER JOIN `products` ON offers.product_id = products.id LIMIT 8');

        $more_offers = DB::select('select * FROM `offers` INNER JOIN `products` ON offers.product_id = products.id ORDER BY offers.created_at DESC LIMIT 4');

        $posts = post::where('is_active' , '=' , 1)->orderBy('created_at' , 'DESC')->take(3)->get();
        

        return view('home', ['men'=>$men  , 'women' => $women  , 'sliders' => $sliders ,
         'children' => $children , 'offers'=>$offers , 'more_offers'=>$more_offers , 'posts'=> $posts , 'likes' => $likes] );

        
    }
}
