<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Orders List</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
     
    <!-- <link rel="stylesheet" href="{{ asset('css/orderList.css') }}"> -->

</head>
<body>
<!--start header-->   
{{view('header')}}
<!-- end header  -->
<div class="">
@if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
@endif
    @foreach ($orders as $order)
    <!-- loop for all orders for the user -->
    <div class="row justify-content-around" id="search-row">
        <div class="col-md-1 col-6 search-product">
            <img src="{{ asset('upload/products/' . $order->image) }}"class="detailes-img">
        </div>
        <div class="col-md-5 col-6 prod-info">
            <h3> {{$order->name}}</h3>
            <h3> Price :  {{$order->price}}</h3>
            @foreach($reviews as $reviw)
            <!-- check if user rate this product or not-->
                @if(Auth::user()->id != $reviw->user_id || $reviw->product_id != $order->product_id)
                    <!-- check if the product is rated the get the avreage rate if exiset -->
                    <h3> Your did Not Rate It  </h3><br> 
                    @break
                @else
                <!-- the user have rate => dispaly the rate -->
                    <h3> Your Rate Is : </h3><br>
                    <!-- check the value for the rate -->
                    @if($reviw->rate == 1 && $reviw->product_id == $order->product_id)
                        <i class="fa fa-star" aria-hidden=""></i>                    
                    @elseif($reviw->rate == 2 && $reviw->product_id == $order->product_id)
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>@break
                    @elseif($reviw->rate == 3 && $reviw->product_id == $order->product_id)
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>@break
                    @elseif($reviw->rate == 4 && $reviw->product_id == $order->product_id)
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                    @elseif($reviw->rate == 5 && $reviw->product_id == $order->product_id)
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                        <i class="fa fa-star" aria-hidden=""></i>
                    @endif        
                    @break
                @endif
                @break    
            @endforeach
            <br><a class="btn btn-primary " href="{{ url('home') }}"> back </a>

        </div>
    </div>
    @endforeach
</div>
{{view('footer')}}  

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script>
    // $(document).ready(function () {
    //     $('.rateing').on('click' , function(event) {
    //     alert(productId)
    // })
    // var token = '{{Session::token()}}';
    // productId = event.target.parentNode.dataset['productid'];
    var ratedIndex = -1, uID = 0;

        $(document).ready(function () {
            resetStarColors();

            $('.fa-2x').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               saveToTheDB();
               alert(ratedIndex)
            });

            $('.fa-2x').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-2x').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });

        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-2x:eq('+i+')').css('color', '#555');
        }

        function resetStarColors() {
            $('.fa-2x').css('color', '#eee');
        }
})
</script> -->

</body>
</html>    