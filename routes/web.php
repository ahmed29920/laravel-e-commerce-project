<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\controllers\laravelCrud;
use App\Http\controllers\productsController;
use App\Http\controllers\UserViewController;
use App\Http\controllers\CategriesController;
use App\Http\controllers\sliderController;
use App\Http\controllers\featuredController;
use App\Http\controllers\ordersContoller;
use App\Http\controllers\offersContoller;
use App\Http\controllers\postsController;
use App\Http\controllers\profileContoller;
use App\Http\controllers\homeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('admin.home'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/sign-in/github', [CustomAuthController::class, 'github'])->name('github');

Route::get('/sign-in/github/redirect', [CustomAuthController::class, 'githubRedirect'])->name('github-redirect');


Route::group( ['middleware' => ['userCheck']] , function(){
    
    Route::get('viewUsers',[UserViewController::class ,  'index' ])->name('viewUsers');
    
    Route::get('products' , [productsController::class ,  'index' ]);
    Route::get('add-product' , [productsController::class ,  'create' ]);
    Route::post('add-product' , [productsController::class ,  'store' ]);
    Route::get('likes',[productsController::class ,  'likes' ]);
    Route::get('rates',[productsController::class ,  'rates' ]);
    

    Route::get('offers' , [offersContoller::class ,  'index' ]);
    Route::get('add-offer' , [offersContoller::class ,  'create' ]);
    Route::post('add-offer' , [offersContoller::class ,  'store' ]);
    Route::get('delete-offer/{id}',[offersContoller::class ,  'destroy' ]);
    Route::get('edit-offer/{id}',[offersContoller::class ,  'show' ]);
    Route::post('edit-offer/{id}',[offersContoller::class ,  'edit' ]);
    
    Route::get('category' , [CategriesController::class ,  'index' ]);
    Route::get('add-category' , [CategriesController::class ,  'create' ])->name('add-category');
    Route::post('add-category' , [CategriesController::class ,  'store' ]);
    
    Route::get('sliders' , [sliderController::class ,  'sliderIndex' ]);
    Route::get('add-slider' , [sliderController::class ,  'create' ])->name('add-slider');
    Route::post('add-slider' , [sliderController::class ,  'store' ]);
    Route::get('delete-slider/{id}',[sliderController::class ,  'destroy' ]);
    Route::get('edit-slider/{id}',[sliderController::class ,  'show' ]);
    Route::post('edit-slider/{id}',[sliderController::class ,  'edit' ]);

    Route::get('features' , [featuredController::class ,  'index' ]);
    Route::get('show-feature' , [featuredController::class ,  'show' ]);
    Route::get('add-feature' , [featuredController::class ,  'create' ]);
    Route::post('add-feature' , [featuredController::class ,  'store' ]);
    Route::get('delete-feature/{id}',[featuredController::class ,  'destroy' ]);
    
    Route::get('orders' , [ordersContoller::class ,  'index' ]);
    Route::get('edit-order/{id}',[ordersContoller::class ,  'show' ]);
    Route::post('edit-order/{id}',[ordersContoller::class ,  'edit' ]);


    Route::get('posts' , [postsController::class ,  'index' ]);
    Route::get('add-post' , [postsController::class ,  'create' ]);
    Route::post('add-post' , [postsController::class ,  'store' ]);
 

});

Route::group( ['middleware' => ['adminCheck']] , function(){

    Route::get('delete-product/{id}',[productsController::class ,  'destroy' ]);
    Route::get('edit-product/{id}',[productsController::class ,  'show' ]);
    Route::post('edit-product/{id}',[productsController::class ,  'edit' ]);
    
    Route::get('delete-category/{id}',[CategriesController::class ,  'destroy' ]);
    Route::get('edit-category/{id}',[CategriesController::class ,  'show' ]);
    Route::post('edit-category/{id}',[CategriesController::class ,  'edit' ]);
    
    Route::get('delete/{id}',[UserViewController::class ,  'destroy' ]);
    Route::get('edit/{id}',[UserViewController::class ,  'show' ]);
    Route::post('edit/{id}',[UserViewController::class ,  'edit' ]);

    Route::get('delete-post/{id}',[postsController::class ,  'destroy' ]);
    Route::get('edit-post/{id}',[postsController::class ,  'show' ]);
    Route::post('edit-post/{id}',[postsController::class ,  'edit' ]);
});

Route::get('/home',[homeController::class ,  'index' ]);

Route::get('product-detailes/{id}',[productsController::class ,  'detailes' ]);
Route::get('product-search',[productsController::class ,  'search' ]);


Route::get('like',[productsController::class ,  'like' ])->name('like');

Route::get('profile',[profileContoller::class ,  'index' ]);


Route::post('add-to-cart',[productsController::class ,  'addToCart' ]);

Route::get('add-to-cart',[productsController::class ,  'addToCartInHome' ])->name('add-to-card');

Route::get('cartList',[productsController::class ,  'cartList' ]);
Route::get('remove-cart/{id}',[productsController::class ,  'removeCart' ]);
Route::get('order-now',[productsController::class ,  'orderNow' ]);
Route::post('order',[productsController::class ,  'order' ]);


Route::get('rate-product',[productsController::class ,  'rateProduct' ])->name('rate');


Route::get('my-orders',[productsController::class ,  'ordersList' ]);



