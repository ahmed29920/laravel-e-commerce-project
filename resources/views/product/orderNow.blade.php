<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order Now</title>
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
<div class="">
    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- start table -->
    <table  class="table table-dark table-striped">
        <tr class="table-dark">
            <td  class="table-dark">Amount :</td>
            <td  class="table-dark">{{$total }} EGB</td>
        </tr>
        <tr class="table-dark">
            <td  class="table-dark">Tax :</td>
            <td  class="table-dark">0 EGB</td>
        </tr>
        <tr class="table-dark">
            <td  class="table-dark">Delivery :</td>
            <td  class="table-dark">20 EGB</td>
        </tr>
        <tr class="table-dark">
            <td  class="table-dark">Total price :</td>
            <td  class="table-dark">{{$total + 20}} EGB</td>
        </tr>
    </table>
    <!-- start form -->
    <form action="/order" method="post">
    @csrf
    <div class="mb-3 form-group">
        <textarea class="form-control" name="address" placeholder="enter your address" ></textarea>
    </div>
    <div class="mb-3 form-group">
        <input type="hidden" name="cost" value=" {{$total}}">
        <label for="exampleInputPassword1" class="form-label">Payment Method :</label>
        <input type="radio" name="payment" value="online"><span> Online Payment</span>
        <input type="radio" name="payment" value="cash"><span> Payment On Delivery </span>
    </div>

    <button type="submit" class="btn btn-success">BUY NOW</button>
    </form>

</div>
{{view('footer')}}   
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>    