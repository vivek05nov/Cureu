
/*****Fixed Header*********/
$(window).scroll(function () {

    var scroll = $(window).scrollTop();

    if (scroll > 50) {

        $(".tob-bar-fix").addClass('stick_header_cl')

    } else {

        $(".tob-bar-fix").removeClass('stick_header_cl');

    }

});


/*****slider*****/
$('.banner_slider').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navigation:true,
    dots:true,
     singleItem:true,
    animateOut: 'fadeOut',
    autoplay:true,
   navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
   autoplaySpeed: 4000,
   autoplayTimeout:5000,
    
   //smartSpeed:2000,
    //center:true,
    responsiveClass:true,	
    responsive:{
        0:{
            items:1,
            nav:true,
            loop:true,
             margin:0,
        },
        600:{
            items:1,
            nav:true,
            loop:true,
             margin:0,
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
    }
});


/*****Popular cat*****/
$('#popular_cat').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navigation:true,
    dots:true,
     singleItem:true,
    animateOut: 'fadeOut',
    autoplay:true,
   navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
   autoplaySpeed: 4000,
   autoplayTimeout:5000,
    
   //smartSpeed:2000,
    //center:true,
    responsiveClass:true,	
    responsive:{
        0:{
            items:2,
            nav:true,
            loop:true
        },
        600:{
            items:3,
            nav:true,
            loop:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
});

/*****festive_exchange*****/
$('#festive_exchange').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navigation:true,
    dots:true,
     singleItem:true,
    animateOut: 'fadeOut',
    autoplay:true,
   navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
   autoplaySpeed: 4000,
   autoplayTimeout:5000,
    
   //smartSpeed:2000,
    //center:true,
    responsiveClass:true,	
    responsive:{
        0:{
            items:2,
            nav:true,
            loop:true
        },
        600:{
            items:3,
            nav:true,
            loop:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
});


/*****best_seller*****/
$('.best_sellers').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navigation:true,
    dots:true,
     singleItem:true,
    animateOut: 'fadeOut',
    autoplay:true,
   navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
   autoplaySpeed: 4000,
   autoplayTimeout:5000,
    
   //smartSpeed:2000,
    //center:true,
    responsiveClass:true,	
    responsive:{
        0:{
            items:1,
            nav:true,
            loop:true
        },
        600:{
            items:2,
            nav:true,
            loop:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
});



/*****Mobile Store*****/
$('.mobile_store_slider').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navigation:true,
    dots:true,
     singleItem:true,
   
    autoplay:false,
   navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
   autoplaySpeed: 4000,
   autoplayTimeout:5000,
    
   //smartSpeed:2000,
    //center:true,
    responsiveClass:true,	
    responsive:{
        0:{
            items:1,
            nav:true,
            loop:true
        },
        600:{
            items:1,
            nav:true,
            loop:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true
        }
    }
});
