<?php
    use App\Http\Controllers\productsController;
    $cart = 0 ;
    if(Auth::check()){
        $cart = productsController::cartItems();
        $orders = productsController::ordersNum();
        $likes = productsController::likedItems();
        $reviews =  productsController::reviewItems();

        $user = 1;
    }
    else{
        $user=0;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hello World</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">


    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>


    
</head>
<body>
<!--start header-->   
{{view('header')}}
<!-- profile card  -->
<div class="padding profile-card">
    <div class="row container d-flex justify-content-center">
        <div class="col-10 col-md-12">
            <!-- full card -->
            <div class="card user-card-full">
                <div class="row card-content">
                    <!-- image part -->
                    <div class="col-sm-4 image-card">
                        <div class="card-block text-center">
                            <div class="profile-img"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" alt="User-Profile-Image"> </div>
                            <h6 class="">{{Auth::user()->name}}</h6>
                            <p>{{Auth::user()->role}}</p> <i class="mdi mdi-square-edit-outline feather icon-edit"></i>
                        </div>
                    </div>
                    <!-- inforamtions part -->
                    <div class="col-sm-8">
                        <div class="card-block">
                            <h6 class="info-header ">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="info-key ">Email</p>
                                    <h6 class="info-data">{{Auth::user()->email}}</h6>
                                </div>
                            </div>
                            <h6 class="info-operations  ">Operations</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="info-key ">orders</p>                                            
                                    <h6 class="info-data "> ({{ $orders }}) </h6> 
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-key ">cart items</p>
                                    <h6 class="info-data ">({{$cart}})</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-key ">liked items</p>
                                    <h6 class="info-data ">({{$likes}})</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-key ">review items</p>
                                    <h6 class="info-data ">({{$reviews}})</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end infromatios -->
                </div>
            </div>
        </div>
    </div>
</div>

{{view('footer')}}