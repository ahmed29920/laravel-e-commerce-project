AOS.init();
//-------start nav 

$(function(){      
    $(window).scroll(function(){
      if($(window).scrollTop() > 48){
           $(".header").css("display","none");
           $(".search").css("display","none");
           $(".navbar").css("position","fixed");
           $(".navbar").css("top","0%");
      }else {
           $(".header").css("display","block");
           $(".search").css("display","block");
           $(".navbar").css("position","relative");
      }  
    });
});

$(function(){      
    $(".nav-link").click(function(){
        $(this).parent().siblings().find(".nav-link").removeClass("active-item");
        $(this).addClass("active-item")
    });
});



//--------end nav

//--------start back to top btn
$(function(){      
    $(window).scroll(function(){
      if($(window).scrollTop() > 300){
           $(".back-top-btn").css("display","block");
      }else{
          $(".back-top-btn").css("display","none");
      }  
    });
}); 


$(function(){      
    $(".back-top-btn").click(function(){ 
        $('html').animate({scrollTop:0}, 50);
    });
});
//------end back to top btn



//-------start portfolio
$(function(){
    $("#men-button").click(function(){
        
        $("#men").css("display" , "block");
        $("#men").siblings().css("display" , "none");
    }); 
});

$(function(){
    $("#women-button").click(function(){
        
        $("#women").css("display" , "block");
        $("#women").siblings().css("display" , "none");
    });
});

$(function(){    
    $("#children-button").click(function(){
        
        $("#children").css("display" , "block");
        $("#children").siblings().css("display" , "none");
    });    
});

$(function(){    
    $("#all-button").click(function(){
      

        $("#all").css("display" , "block");
        $("#all").siblings().css("display" , "none");

    });
});
//btn color
$(function(){    
    $(".portfolio-btn").click(function(){
        
       if(! $(this).hasClass("selcted-btn")){
           $(this).addClass("selcted-btn");
           $(this).parentsUntil(".links-container").siblings().find(".portfolio-btn").removeClass("selcted-btn");  
        }
    });
});

//info
$(function(){    
    $(".portfolio-img").mouseover(function(){  
        $(this).find(".portfolio-info").css("display" , "block");
    });
    
    $(".portfolio-img").mouseout(function(){  
        $(this).find(".portfolio-info").css("display" , "none");
    });
});


jQuery(document).ready(function($){
	    
	$(".btnrating").on('click',(function(e) {
	
	var previous_value = $("#selected_rating").val();
	
	var selected_value = $(this).attr("data-attr");
	$("#selected_rating").val(selected_value);
	
	$(".selected-rating").empty();
	$(".selected-rating").html(selected_value);
	
	for (i = 1; i <= selected_value; ++i) {
	$("#rating-star-"+i).toggleClass('btn-warning');
	$("#rating-star-"+i).toggleClass('btn-default');
	}
	
	for (ix = 1; ix <= previous_value; ++ix) {
	$("#rating-star-"+ix).toggleClass('btn-warning');
	$("#rating-star-"+ix).toggleClass('btn-default');
	}
	
	}));
			
});


$('.like').on('click', function(event) {
    event.preventDefault();
    productId = event.target.parentNode.parentNode.dataset['productid'];
    
    $.ajax({
        method: 'GET',
        url: urlLike,
        cache: false,
        data: {product_id: productId, _token: token}
    })
        .done(function() {
        
        }); 

});

$('.add').on('click', function(event) {
    event.preventDefault();
    productId = event.target.parentNode.parentNode.dataset['productid'];
    
    $.ajax({
        method: 'GET',
        url: urlAdd,
        cache: false,
        data: {product_id: productId, _token: token}
    })
        .done(function() {
        
        }); 
});
$('.fa-cart-plus').on('click' , function () {
    $(this).removeClass('fa-cart-plus');
    $(this).addClass('fa-shopping-cart')
})

$('.fa-heart').on('click',function (){
    if ($(this).hasClass('far')) {
        $(this).removeClass('far');
        $(this).addClass('fas');    
    } else if($(this).hasClass('fas')) {
        $(this).removeClass('fas');
        $(this).addClass('far');
    }
})



$('.view_more').on('click',function () {
    $('.more-offer').toggleClass('more_offers')
} )


$(document).ready(function () {
    resetStarColors();

    $('.fa-star').on('click', function (event) {
       event.preventDefault();
       ratedIndex = parseInt($(this).data('index'))+1;
       localStorage.setItem('ratedIndex', ratedIndex);
       productId = event.target.parentNode.parentNode.dataset['productid'];
       $.ajax({
        url: urlRate,
        method: "GEt",
        dataType: 'json',
        data: { product_id: productId, rate: ratedIndex, _token : token}
        });
    
    });

    $('.fa-star').mouseover(function () {
        resetStarColors();
        var currentIndex = parseInt($(this).data('index'));
        setStars(currentIndex);
    });

    $('.fa-star').mouseleave(function () {
        resetStarColors();

        if (ratedIndex != -1)
            setStars(ratedIndex);
    });
});

function setStars(max) {
    for (var i=0; i <= max; i++)
        $('.fa-star:eq('+i+')').css('color', 'pink');
}

function resetStarColors() {
    $('.fa-star').css('color', '#eee');
}
