<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>
<body>
<!--start header-->   
{{view('header')}}
<!-- end header  -->
<div class="">
    @foreach ($products as $product)
    <!-- loop for all searched products -->
    <div class="row justify-content-around" id="search-row">
        <div class="col-md-1 col-6 search-product">
            <img src="{{ asset('upload/products/' . $product->image) }}" class="detailes-img">
        </div>
        <div class="col-md-5 col-6 prod-info">
            <a class="btn btn-primary butn" href="{{ url('home') }}"> back </a>
            <h2> {{$product->name}} </h3>
            <h3> Price :  {{$product->price}}</h3>
            <form action="{{url('add-to-cart')}}" method="post">
                @csrf 
                <input type="hidden" name="product_id" value=" {{$product->id}}">
                <button class="btn btn-warning butn" Type="submit"> ADD TO CART </button>
            </form>
            <a class="btn btn-success butn" href="#"> BUY NOW </a>
        </div>
    </div>
    @endforeach
</div>
{{view('footer')}}  
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>    