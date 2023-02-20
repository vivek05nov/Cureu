<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<!-- Home Banner --> 
	<section class="section section-search">
		<div class="container-fluid">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-3 col-lg-3 col-sm-12"></div>
                	<div class="col-md-6 col-lg-3 col-sm-12">
                		<img src="http://cureu.in/assets/img/comingsoon.jpg" alt="Coming Soon">
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-12"></div>
                </div>
             </div>
		</div>
	</section>
<!-- /Home Banner -->

<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<!--============= Css Section Start ==============-->
<style type="text/css">
    .slick-slide {margin: 0px 20px;}
    .slick-slide img {width: 100%;}
    .slick-prev:before,
    .slick-next:before {color: black;}
    .slick-slide {transition: all ease-in-out .3s;opacity: .2;}
    .slick-active {opacity: .5;}
    .slick-current {opacity: 1;}
    .card-box {margin: 3px 2px 26px;padding: 20px 20px 10px;text-align: center;}
    .card-box h5 {margin-top: 15px;font-size: 17px;}
    .card-box img {border-radius: 100px;padding: 8px;margin: 0 auto;-webkit-box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);}
    .card-box p a {color: #15558d;font-weight: 500;}
    .price {font-size: 14px;}
    .slick-active {opacity: 1;}
    .text-center{text-align:center;}
    
    @media only screen and (max-width:768px) {
        .card-box h5 {margin-top: 10px;font-size: 12px;}
    }
</style>
<!--============== Css Section End ===============-->


<!-- Add the slick-.js if you want default styling -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--========== JavaScript Section Start ===========-->
<script type="text/javascript">
    $(document).on('ready', function() {
        $('.autoplay').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }]
        });
    });
</script>
<!--=========== JavaScript Section End ============-->



