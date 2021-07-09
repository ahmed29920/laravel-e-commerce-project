<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart List</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">  
</head>
<body>
<!--start header-->   
{{view('header')}}
<!-- end header  -->
<div class="container">
@if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
@endif
    @foreach ($carts as $cart)
    <div class="row" style="margin-top:2rem; margin-left:25%; border-bottom: 1px solid #eee ; padding-bottom: 2rem">
        <div class="col-sm-6">
            <img src="{{ asset('upload/products/' . $cart->image) }}"class="detailes-img" style=" height:23rem ; width:20rem">
        </div>
        <div class="col-sm-6">
            <h2>    {{$cart->name}} </h3>
            <h3> Price :  {{$cart->price}}</h3>
            <a class="btn btn-danger" Type="submit" href="remove-cart/{{$cart->id}}">REMOVE FROM CART </a>
            
        </div>
    </div>
    @endforeach
    <a class="btn btn-success text-center" href="order-now"> BUY NOW </a>
</div>
{{view('footer')}}>    

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>    