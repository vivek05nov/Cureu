  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
	
	<script src="<?php echo base_url(); ?>assets/jss/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
      
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $AutoPlaySteps: 1,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
             
             
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    
<!-- /Header --><!-- Slider -->

			<section class="section full-slide-home">
			<div>
	
	
		
			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			  </ul>
			  
			  <!-- The slideshow -->
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="<?php echo base_url(); ?>assets/img/doc-slide-1.png" alt="Los Angeles" width="1100" height="500">
				</div>
				<div class="carousel-item">
				  <img src="<?php echo base_url(); ?>assets/img/doc-slide-1.png" alt="Chicago" width="1100" height="500">
				</div>
				<div class="carousel-item">
				  <img src="<?php echo base_url(); ?>assets/img/doc-slide-1.png" alt="New York" width="1100" height="500">
				</div>
			  </div>
			  
			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			</div>
	</div>	
</section>	 
<!-- Slider -->

<!-- Home Banner -->
<section class="section-search-pharmacy" style="background: #f7af3c;"> 
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<!--div class="banner-wrapper2"-->
					<div class="search-box1">
						<form method="post" action="<?php echo base_url('welcome/treatment'); ?>">
							<!--p class="mb-0 mr-3" >Find a Treatment</p-->
							<!--div class="form-group search-location1 postion-relative">
								<input type="text" class="form-control" placeholder="Enter your location / Pincode" style="padding-left:15px;">
							</div-->
							<div class="form-group ">
								<select class="form-control js-example-tags" name="countries" id="countries" onchange="get_state(this.value)">
									<option selected="selected" value="-1"> -  Select Country  -</option>
									<?php   foreach($countries->result() as $countries){ ?>
										<option value="<?php echo $countries->id;?>"><?php echo $countries->name;?></option>
									<?php }  ?>
								</select>
								<span class="form-text">Based on your Location</span>
							</div> &nbsp;&nbsp;&nbsp;
							<div class="form-group">
								<select class="form-control js-example-tags" name="state" id="state" onchange="get_city(this.value)"> 
									<option value="-1">-  Select State  -</option>
								</select> 
								<span class="form-text">Based on your Location</span>
							</div>  &nbsp;&nbsp;&nbsp;
							
							<div class="form-group search-location">
								<select class="form-control js-example-tags" name="city" id="city" onchange="get_specialitiess(this.value)"> 
									<option value="-1">-  Select City  -</option>
								</select> 
								<span class="form-text">Based on your Location</span>
							</div>
							<div class="form-group ">
								<select class="form-control js-example-tags" name="specialities_idd" id="specialities_idd" >
									<option selected="selected" value="-1"> -  Select Specialities  -</option>
									
								</select>
								<span class="form-text">Based on your Specialities</span>
							</div> &nbsp;&nbsp;&nbsp;
							
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary search-btn" style="margin-bottom: 22px;"><i class="fas fa-search"></i> <span>Search</span></button>
							</div>
						</form>
					</div>
					<!-- /Search -->
				<!--/div-->
			</div>
		</div>
	</div>
</section>
<!-- /Home Banner -->
<!---speciality section ----> 


			<!---->
				<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Top Specialities</h2>
						
					</div>
					<div class="row justify-content-center">
					
						<div class="col-md-12">
						
							<!-- Slider -->
							
					<!-- Loading Screen -->
					
					<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:210px;overflow:hidden;visibility:hidden;">
					<!-- Loading Screen -->
					<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
						<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
					</div>
					<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:210px;overflow:hidden;">
						
							<?php if(!empty($specialities)):
									 foreach($specialities as $row):
									 ?>
									
									 <div>
									<div class="speicality-item text-center">
										<div class="speicality-img ml-4">
										
											<img src="http://cureu.in/assets_admin/img/specialities/<?php echo $row->special_image;?>" class="img-fluid" alt="Speciality">
											<span><i class="fa fa-circle" aria-hidden="true"></i></span>
										</div>
										<p> <a href="<?php echo base_url('welcome/view_specialities_list/').$row->special_id ?>"><?php echo $row->service_name;?></a></p>
									</div>
									
									</div>
									
									
									<?php endforeach;
									
									endif;?>
						
					  
					
						</div>
				
						
														   
								
							<!-- /Slider -->
							
							</div>
							
						</div>
					</div>
					
					  
			</section>	
		
			
			
<!---speciality end--->

<div class="content">
	<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-lg-12 order-md-last order-sm-last order-last map-left">
			<div class="row align-items-center mb-4">
				<div class="col-md-6 col">
					<h4><?php echo count($search);?> Hospital found</h4>
				</div>

				<div class="col-md-6 col-auto">
					<!--div class="view-icons">
						<a href="map-grid.html" class="grid-view"><i class="fas fa-th-large"></i></a>
						<a href="map-list.html" class="list-view active"><i class="fas fa-bars"></i></a>
					</div-->
					<div class="sort-by d-sm-block d-none">
						<span class="sortby-fliter">
							<select class="select">
								<option>Sort by</option>
								<option class="sorting">Rating</option>
								<option class="sorting">Popular</option>
								<option class="sorting">Latest</option>
								<option class="sorting">Free</option>
							</select>
						</span>
					</div>
				</div>
			</div>
				<?php if(!empty($search)) :
						foreach($search as $hospital):
						?>
			<!-- Doctor Widget -->
			<div class="card">
				<div class="card-body">
					<div class="doctor-widget">
						<div class="doc-info-left">
							<div class="doctor-img">
								<a href="<?php echo base_url() ?>welcome/view_hospital_profile/<?php echo $hospital->id; ?>"> 
									<img src="<?php echo base_url() ?>assets/img/hospital/<?php echo $hospital->image; ?>" class="img-fluid" alt="User Image">
								</a>
							</div>
							<div class="doc-info-cont">
								<h4 class="doc-name"><a href="<?php echo base_url() ?>welcome/view_profile_hospital/<?php echo $hospital->id; ?>"><?php echo $hospital->hospital_name;?> </a></h4>
								<?php /*<p class="doc-speciality"><?php echo $hospital->service_name; ?></p>
								<<h5 class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality"><?php echo $hospital->service_name ?></h5>*/ ?>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(35)</span>
								</div>
								<div class="clinic-details">
									<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $hospital->hos_address;?></p>
									<ul class="clinic-gallery"> 
										<li>
											<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
												<img src="<?php echo base_url() ?>assets/img/features/feature-01.jpg" alt="Feature">
											</a>
										</li>
										<li>
											<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
												<img  src="<?php echo base_url() ?>assets/img/features/feature-02.jpg" alt="Feature">
											</a>
										</li>
										<li>
											<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
												<img src="<?php echo base_url() ?>assets/img/features/feature-03.jpg" alt="Feature">
											</a>
										</li>
										<li>
											<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
												<img src="<?php echo base_url() ?>assets/img/features/feature-04.jpg" alt="Feature">
											</a>
										</li>
									</ul>
								</div>
								<div class="clinic-services">
									<span>Dental Fillings</span>
									<span> Whitneing</span>
								</div>
							</div>
						</div>
						<div class="doc-info-right">
							<div class="clini-infos">
								<ul>
									<li><i class="far fa-thumbs-up"></i> 100%</li>
									<li><i class="far fa-comment"></i> 35 Feedback</li>
									<li><i class="fas fa-map-marker-alt"></i> <?php echo substr($hospital->hos_address, 0 ,20);?></li>
									<!--li><i class="far fa-money-bill-alt"></i> $50 - $300 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li-->
								</ul>
							</div>
							<div class="clinic-booking">
								<a class="view-pro-btn" href="<?php echo base_url() ?>welcome/view_hospital_profile/<?php echo $hospital->id; ?>">View Profile</a> 
								<?php if($this->session->userdata('username') == ''){?>
								<a class="apt-btn" id="login" href="#">Book Appointment</a>
								<?php }else{ ?>
								<a class="apt-btn" href="#">Book Appointment</a>   
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Doctor Widget -->
			<?php  endforeach;
			endif;?>
					
		<div class="load-more text-center">
			<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
		</div>
	</div>
	<!-- /content-left-->
	<!--div class="col-xl-5 col-lg-12 map-right">
		<div id="map" class="map-listing"></div>
	</div-->
	<!-- /map-right-->
</div>
<!-- /row-->

	</div>

</div>		
<!-- /Page Content -->
<script>
$(".js-example-tags").select2({
  tags: true
});
function get_state(cls)
{ 
    if(cls!='-1')
    {
        $.ajax(
        {
            type:"POST",
            url:"<?php echo base_url(); ?>welcome/get_state",
            dataType: "JSON",
            data:{'country':cls},
            success:function(data){
                $("#state").empty();
                $("#state").append("<option value=-1> ~~ Select State ~~</option>");
                $.each(data,function(i,item)
                {
                    $("#state").append("<option value="+item.id+">"+item.name+"</option>");
                });
            }
        });
    }
    else
    {
        $("#state").empty();
        $("#state").append("<option value=-1> ~~ Select Section ~~</option>");
        alert("Please First Select The Nationality");
    }
}
function get_city(cls)
{ 
    if(cls!='-1')
    {
        $.ajax(
        {
            type:"POST",
            url:"<?php echo base_url(); ?>welcome/get_city",
            dataType: "JSON",
            data:{'state':cls},
            success:function(data){
                $("#city").empty();
                $("#city").append("<option value=-1> ~~ Select City ~~</option>");
                $.each(data,function(i,item)
                {
                    $("#city").append("<option value="+item.id+">"+item.name+"</option>");
                });
            }
        });
    }
    else
    {
        $("#city").empty();
        $("#city").append("<option value=-1> ~~ Select Section ~~</option>");
        alert("Please First Select The Nationality");
    }
}

//get speciality
function get_specialitiess(cls)
{ 
    if(cls!='-1')
    {
		
        $.ajax(
        {
            type:"POST",
            url:"<?php echo base_url(); ?>welcome/get_specialities",
            dataType: "JSON",
            
            success:function(data){ 
			$("#specialities_idd").empty();
                $("#specialities_idd").append("<option value=-1> ~~ Select Specialities ~~</option>");
                $.each(data,function(i,item)
                {
                    $("#specialities_idd").append("<option value="+item.id+">"+item.service_name+"</option>");
                });
            }
        });
    }
    else
    {
        $("#specialities_idd").empty();
        $("#specialities_idd").append("<option value=-1> ~~ Select Section ~~</option>");
        alert("Please First Select The Nationality");
    }
}




</script>  
   <script type="text/javascript">
   jssor_1_slider_init();
    </script>




