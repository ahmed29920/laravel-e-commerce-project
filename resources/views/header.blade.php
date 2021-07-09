<?php
    use App\Http\Controllers\productsController;
    $cart = 0 ;
    if(Auth::check()){
        $cart = productsController::cartItems();
        $user = 1;
    }
    else{
        $user=0;
    }
?>
    
<!--start header-->   
<div class="header">
    <div class="container">
        <div class="row header-row d-flex justify-content-between">
            <div class=" col-lg-2 col-sm-3 contact-info ">
                <p> offers up to $75 </p>
            </div>
            <div class=" col-sm-7 col-lg-5  contact-logos">
                @if($user == 1)   
                    <a href="{{ url('profile') }}" class="contact-logo"> My Account </a>
                @endif
                     <a href="{{ url('cartList') }}" class="contact-logo cart-logo"><i class="fas fa-shopping-cart"></i> My Cart ({{ $cart }}) </a>
                @if($user == 1)
                    <a href="{{ url('my-orders') }}" class="contact-logo"><i class="fab fa-shopify"></i> My Orders</a>
                    <a href="{{ route('signout') }}" class="contact-logo"><i class="fas fa-sign-out-alt "></i> logout</a>
                @else
                    <a href="{{ route('login') }}" class="contact-logo"><i class="fas fa-sign-in-alt"></i> login</a>
                    <a href="/registration" class="contact-logo"><i class="fas fa-user-plus"></i></i> Sign in</a>
                @endif
            </div>
        </div>    
    </div>    
</div>
<!--end header-->
<!-- search -->
<div class="search">
    <div class="container">
        <div class="row  search-row justify-content-center" >
            <div class=" col-6 contact-info" style="text-align:center">
                <form action="/product-search" method="GET" role="search" autocomplete="off">
                    <div class="searchBox row justify-content-between">
                        <input class="searchInput col-11" type="text" name="search" placeholder="Search for prduct...">
                        <button class="searchButton col-1" href="#">
                            <i class="material-icons"> search  </i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
<!-- start nav  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <h1><a href="index.html" class="name">FASHION</a></h1>
        <button class="navbar-toggler tog" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <!-- start menu --> 
        <div class="collapse navbar-collapse nav-items" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link active-item"  aria-current="page" href="/home" data-scroll="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="" data-scroll="about">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-scroll="servicse">Women</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="" data-scroll="portfolio">FootWear</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="" data-scroll="team"> Accessories </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="" data-scroll="contact">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-scroll="contact">Blog</a>
                </li>
            </ul>
        </div>
        <!-- end menu -->
    </div>
</nav>   
<!-- end nav  -->


