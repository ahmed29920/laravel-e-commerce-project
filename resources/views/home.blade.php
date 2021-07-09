<?php 
    use App\Models\like; 
    use App\Models\User; 
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


    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>


    
</head>
<body>
<!--start header-->   
{{view('header')}}
<!-- end header  -->
<!-- start slider   -->
<div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner" >
        @foreach($sliders as $slider)
            <div class="carousel-item {{$slider['id']== 8 ?'active':' '}}"  >
                <img src="{{ asset('upload/slider/' . $slider->image) }}" class="d-block w-100"  alt="slider" style="hight: 400px ">
                <div class="carousel-caption d-none d-md-block">
                    <p>{{$slider->description}}</p>
                    <a href="#" class="slider-link"> view </a>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon slider-icon" aria-hidden="true">  </span>
        <span class="visually-hidden">Previous  </span>
    </button>
    <button class="carousel-control-next next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon slider-icon" aria-hidden="true">   </span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- end slider -->
<!-- start back-top-btn-->
<i class="fas fa-chevron-up back-top-btn"></i>
<!--end back-top-btn-->
<!-- start hot collections -->
<div class="container hot-collections">
    <div class="row justify-content-around">
        <!-- big section -->
        <div class="col-5 big-div" data-aos="fade-up">
            <img src="{{ asset('upload/hotCollection/hc.jpeg')}}"  style="width: 100%;">
            <div class="col-8 collection-descripe">
                <p>
                    <span> NEW HOT COLLECTION </span><br> 
                </p>
                <h2> New Trend For Women </h2>
                <p>
                    Take a look to the new collection and get sale up to 25%
                </p>
                <button type="button" class="view-collection-btn" >
                    view collections
                </button>
            </div>
        </div>
        <!-- small section -->
        <div class="col-4 small-div" data-aos="fade-down">
            <div class="col-12 collection-image" >
                <div class="collection-info" >
                    <button type="button" class="view-collection-btn" >
                        view collections
                    </button>   
                </div>
            </div>
            <div class="collection-image-2" >
                <div class="collection-info-2" >
                    <button type="button" class="view-collection-btn">
                        view collections
                    </button>   
                </div>
            </div>
        </div>
    </div>
</div>
<!--start features-->
<div class="our-Portfolio block " id="portfolio">
    <div class="container">    
        <div class="Portfolio-title">
            <h2>Fdeatred Items</h2>
        </div>
        <!-- start featues buttons -->
        <ul>
            <div class="row portfolio-links">
                <div class="col-6">
                    <div class="row links-container">
                        <div class="col-3 all-btn por-btn">
                            <li class="portfolio-link"><button id="all-button" class="portfolio-btn selcted-btn">All</button></li>
                        </div>
                        <div class="col-3 app-btn por-btn">
                            <li class="portfolio-link"><button id="men-button" class="portfolio-btn">Men</button></li>
                        </div>
                        <div class="col-3 card-btn por-btn">
                            <li class="portfolio-link"><button id="women-button" class="portfolio-btn">Women</button></li>
                        </div>
                        <div class="col-3 web-btn por-btn">
                            <li class="portfolio-link"><button id="children-button" class="portfolio-btn">Children</button></li>
                        </div>
                    </div>
                </div>    
            </div>
        </ul>
        <div class="portfolio-imgs">
            <!-- start all -->
            <div id="all">
                <div class="row" data-aos="fade-up-right" >
                @foreach($men as $man)
                    <div class="col-3" data-productid="{{$man->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $man->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                <h4>{{$man->price}} EGB</h4>
                                <a href="product-detailes/{{$man->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$man->name}} </h3>
                        @if(Auth::check())
                        <a href="#" class="like">
                            <i class="{{Auth::user()->likes()->where('product_id', $man->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a>
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach        
                </div>
                <div class="row" data-aos="fade-up-right" >
                @foreach($women as $woman)
                    <div class="col-3" data-productid="{{$woman->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $woman->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                
                                <h4>{{$woman->price}} EGB</h4>
                                <a href="product-detailes/{{$woman->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$woman->name}} </h3>
                        @if(Auth::check())    
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $woman->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a> 
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach
                </div>
                <div class="row" data-aos="fade-up-right" >
                @foreach($children as $child)
                    <div class="col-3" data-productid="{{$child->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $child->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                <h4>{{$child->price}} EGB</h4>
                                <a href="product-detailes/{{$child->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$child->name}} </h3>
                        @if(Auth::check())
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $child->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a> 
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach
                </div>
             </div>
    <!-- --- MEN ---- -->
    <div id="men">
        <div class="row" data-aos="fade-up-left" data-aos-delay="80">
            @foreach($men as $man)
                <div class="col-3" data-productid="{{$man->product_id}}"> 
                    <div class="portfolio-img">
                        <img src="{{asset('upload/products/' . $man->image)}}" alt="portfolio-image">
                        <div class="portfolio-info">
                            <h4>{{$man->price}} EGB</h4>
                            <a href="product-detailes/{{$man->product_id}}"><i class="far fa-eye"></i></a>
                        </div>
                    </div>    
                    <h3> {{$man->name}} </h3>
                    @if(Auth::check())
                    <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $man->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                    </a>
                    @else
                    <i class="far fa-heart gust-like like-i"></i>
                    @endif
                    <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                    <a href="#"><i class="fas fa-link"></i></a>    
                </div>
            @endforeach        
        </div>
    </div>
    <!-- women -->
    <div id="women">
        <div class="row" data-aos="fade-up-left" data-aos-delay="80">
            @foreach($women as $woman)
                    <div class="col-3" data-productid="{{$woman->product_id}}">  
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $woman->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                
                                <h4>{{$woman->price}} EGB</h4>
                                <a href="product-detailes/{{$woman->id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>   
                        <h3> {{$woman->name}} </h3> 
                                                @if(Auth::check())
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $woman->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a>
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
            @endforeach
        </div>
    </div>  
    <!-- childern -->
    <div id="children">
        <div class="row" data-aos="fade-up-left" data-aos-delay="80">
                @foreach($children as $child)
                    <div class="col-3" data-productid="{{$child->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $child->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                
                                <h4>{{$child->price}} EGB</h4>
                                <a href="product-detailes/{{$child->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$child->name}} </h3>
                        @if(Auth::check())
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $child->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a> 
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach
            </div>
        </div>
    </div> 
</div>
</div>    
<!-- start advertising -->
<div class="container-fluid">
    <div class=" advertising row">
        <div class="col-6 advertise-image" data-aos="fade-right" data-aos-delay="120">
            <div class="info">
                <div class="info-1">
                    <h1>info 1</h1>
                    <h3> detailes 1</h3>
                </div>
            </div>
        </div>
        <div class="col-6 advertise-image-2" data-aos="fade-left" data-aos-delay="120"> 
            
            <div class="info"> 
                <div class="info-2">
                    <h1>info 2</h1>
                    <h3> detailes 2 </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertising -->
<!-- start offers -->
<div class="our-Portfolio block " id="portfolio">
    <div class="container">    
        <div class="Portfolio-title">
            <h2>Offers Items</h2>
        </div>
        <div class="portfolio-imgs">
            <div class="row">
                @foreach($offers as $offer)
                    <div class="col-3" data-productid="{{$offer->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $offer->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                <h4>{{  $offer->price - ($offer->price * $offer->percentage)/100}} EGB</h4>
                                <a href="product-detailes/{{$offer->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$offer->name}} </h3>
                        <h3>Offer {{$offer->percentage}} %</h3>
                        @if(Auth::check())
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $offer->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a>
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach        
            </div>
            <div class="row more_offers more-offer">
                @foreach($more_offers as $offer)
                    <div class="col-3" data-productid="{{$offer->product_id}}"> 
                        <div class="portfolio-img">
                            <img src="{{asset('upload/products/' . $offer->image)}}" alt="portfolio-image">
                            <div class="portfolio-info">
                                <h4>{{  $offer->price - ($offer->price * $offer->percentage)/100}} EGB</h4>
                                <a href="product-detailes/{{$offer->product_id}}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>  
                        <h3> {{$offer->name}} </h3>
                        <h3>Offer {{$offer->percentage}} %</h3>
                        @if(Auth::check())
                        <a href="#" class="like">
                        <i class="{{Auth::user()->likes()->where('product_id', $offer->product_id)->first() ? 'fas' : 'far'}} fa-heart  like-i"></i>
                        </a>
                        @else
                        <i class="far fa-heart gust-like like-i"></i>
                        @endif
                        <a href="#" class="add"><i class="fas fa-cart-plus"></i></a>
                        <a href="#"><i class="fas fa-link"></i></a>    
                    </div>
                @endforeach        
            </div>
            <button class="view_more" > view more </button>
        </div>
    </div>
</div>
    
<!-- end offers -->
<!-- start wide advertise -->
<div class="container-fluid">
    <div class="row wide-advertise" data-aos="zoom-in" data-aos-delay="120">
        <div class="col-12 wide-advertise-image">
            <div class=" wide-advertise-info container">

                    <h3>’’ ’’ </h3>
                    <h4> 'Fashion e-store' it's an online store which is foundend at 2021 <br> <span> we sell men, women and childer clothes</span> </h4>
                    <img src="{{asset('upload/advertising/pexels-photo-634021.jpeg')}}" alt="profile img">
                    <p> Amit Student <br> <span> honer of the website </span></p>

            </div>
        </div>
        
    </div>
</div>
<!-- end wide advertise -->
<!--start our latest blog -->
<div class="our-latest blog" id="blog">
    <div class="container">
        <h3 class="text-center">OUR LATEST BLOG </h3>
        <div class="row d-flex justify-content-between services">
        @foreach($posts as $post)
            <div class="col-4 post">
                <article class="blog-post">
                    <div class="blog-img">
                        <img src="{{asset('upload/posts/'. $post->image )}}" class="img-thumbnail " alt="post img">
                    </div>
                    <h5>Post Content : </h5>
                    <p>{{$post->post_text}}</p>
                    <a href="#" class="post-read-more">read more  </a>
                </article>    
            </div>
        @endforeach    
        </div>
    </div>
</div>
<!--end our latest blog-->
<!---start our brands-->
<div class="container our-brands block"  id="">
    <h2>Shop My Brands</h2>
    <div class="brands row">

    <div class="col-3 brand">
            <div class="brand-icon"><i class="fab fa-adn"></i></i></div>
            <h3>ADIDAS</h3>
            
        </div>

        <div class="col-3 brand">
            <div class="brand-icon"><i class="fas fa-check"></i></i></div>
            <h3>NIKE</h3>
            
        </div>
        
        <div class="col-3 brand">
            <div class="brand-icon"><i class="fas fa-heading"></i></i></div>
            <h3>H & M</h3>
            
        </div>
        
        <div class="col-3 brand">
            <div class="brand-icon"><i class="fab fa-tumblr"></i></i></div>
            <h3>TOWN TEAM</h3>
            
        </div>
    
    </div>
</div>
<!--end brands--->
{{view('footer')}}
    
    
<script>
    var token = '{{Session::token()}}';
    var urlLike ='{{route('like')}}';
    var urlAdd = '{{route('add-to-card')}}'
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>  
<script src="js/jquery-3.5.1.min.js"></script>    
<script src="js/custom.js"></script>    
</body>
</html>    