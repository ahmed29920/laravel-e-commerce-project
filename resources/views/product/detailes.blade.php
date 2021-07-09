<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detailes</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
<div class="container">
    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <div class="row"  id="search-row">
    @foreach($product as  $prod)

        <div class="col-sm-6">
            <img src="{{ asset('upload/products/' . $prod->image) }}"class="detailes-img">
        </div>
        <div class="col-sm-6 prod-info" data-productid="{{$prod->id}}">
            <a class="btn btn-primary " href="{{ url('home') }}"> back </a>
            <h2>    {{$prod->name}} </h3>
            <h3> Price :  {{$prod->price}}</h3>
            @if(Auth::check())
            <div align="center" style="color:#eee;">
                <i class="fa fa-star fa-2x" data-index="0"></i>
                <i class="fa fa-star fa-2x" data-index="1"></i>
                <i class="fa fa-star fa-2x" data-index="2"></i>
                <i class="fa fa-star fa-2x" data-index="3"></i>
                <i class="fa fa-star fa-2x" data-index="4"></i>
                <br><br>
            </div>
            @endif
            <form action="{{url('add-to-cart')}}" method="post">
                    @csrf 
                    <input type="hidden" name="product_id" value=" {{$prod->id}}">
                    <button class="btn btn-warning butn" Type="submit"> ADD TO CART </button>
            </form>
            <a class="btn btn-success butn" href="#"> BUY NOW </a>
        </div>
        @endforeach
    </div>
</div>
{{view('footer')}}  

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    var ratedIndex = -1, uID = 0;
    var urlRate = '{{route('rate')}}';
    var token = '{{Session::token()}}';

</script>
<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
</body>
</html>    