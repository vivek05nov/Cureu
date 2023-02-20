<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>cureu</title>
		<!--owl carosuel--->
		
		<!-- Favicons -->
		<link type="image/x-icon" href="<?php echo base_url() ?>assets_admin/img/logo-small.png" rel="icon">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/all.min.css">
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fancybox/jquery.fancybox.min.css">
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.min.css">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css">
		
		
		<!--<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />-->

		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/fullcalendar.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">


<!-- load jQuery UI CSS theme -->


	<style>
		 #menu li
		 {
			 display:inline;
		float:left;
		margin-right:10px !important;
		 }
		.slick-slide {
			opacity: 1.2!important;
		}
		body
		{
			scroll-behavior: smooth;
		}
		
		.read-more-show{
			  cursor:pointer;
			  color: #ed8323;
			}
			.read-more-hide{
			  cursor:pointer;
			  color: #ed8323;
			}

			.hide_content{
			  display: none;
			}
			header.header {
			    position: -webkit-sticky;
			    position: sticky;
			    top: 0;
			    padding: 0;
			    z-index: 9999;
			    box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
			}
		</style>
		
		
		<style>
.ms-n5 {
    margin-left: -40px;
}
</style>
		
    </head>
	
 <body class="account-page">
<!-- Loader -->
<form>
	<input type="hidden" name="xlatitude" id="xlatitude">
  	<input type="hidden"  name="ylongitude" id="ylongitude" />
</form>
<!-- /Loader  -->
<div class="main-wrapper">
<!-- Header -->
<header class="header">
	<section class="section" style="padding-top:0px !important">
		<div class="row">
	  		<div class="col-sm-10 col-md-10 pdr-0">
		   	<div class="marquee-title">
		      	<marquee attribute_name = "attribute_value"....more attributes>
		         	<strong>Note : </strong> One or more lines or text message.....
		      	</marquee>
		   	</div>
	   	</div>
	   	<div class="col-sm-2 col-md-2 pdl-0">
	   		<div class="top_calling">
					<div class="header-contact-detail contact_detls">
						<p class="contact-info-header"> <a href="tel:+91 9999999999" alt="phone"><i class="fa fa-phone-square" aria-hidden="true" style="color: #333;"></i> +91 9999999999</a></p>
					</div>
				</div>
			</div>

	</section>

	<nav class="navbar navbar-expand-lg header-nav">
		<div class="navbar-header">
			<a id="mobile_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<a href="<?php echo base_url() ?>" class="navbar-brand logo">
				<img src="<?php echo base_url() ?>assets/img/logo.png" class="img-fluid" alt="Logo">
			</a>
		</div>
		<div class="main-menu-wrapper">
			<div class="menu-header">
				<a href="<?php echo base_url() ?>" class="menu-logo">
					<img src="<?php echo base_url() ?>assets/img/logo.png" class="img-fluid" alt="Logo">
				</a>
				<a id="menu_close" class="menu-close" href="<?php echo base_url() ?>">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<ul class="main-nav">
				<li class=""> 
					<a href="<?php echo base_url('all-doctors') ?>">Doctors</a>
				</li>
			<!--	<li class="">
					<a href="<?php echo base_url('consultant') ?>">Consult</a>
				</li> -->
				<!--li class="">
					<a href="<?php echo base_url() ?>">Patients</a>
				</li-->
				<li class="">
					<a href="<?php echo base_url('treatment'); ?>">Treatment</a>
				</li>
			<!--	<li class="">
					<a href="<?php echo base_url('Diagnostic') ?>">Diagnostic</a>
				</li>  -->
				
				<li class="d-md-none d-lg-none">
					<?php if($this->session->userdata('usertype') == '' ){ ?>
					<a class="" href="<?php echo base_url('login') ?>">Login </a>
					<?php }else{ ?>
					
						<?php if($this->session->userdata('usertype') == 'doctors'){ ?>
							<a class="" href="<?php echo base_url('doctors');?>"> My Account</a>
						<?php } else if($this->session->userdata('usertype') == 'Admin'){
							
							//echo "vivek" ;die;
							?>
							<a class="" href="<?php echo base_url('Admin/index') ?>"> My Account</a> 
						<?php }
							else if($this->session->userdata('usertype') == 'Hospital'){
								?>
								<a class="" href="<?php echo base_url('hospital/index') ?>"> My Account</a>
							<?php }
								else 
								{// echo $this->session->userdata('usertype');die;
									?>
									<a class="" href="<?php echo base_url('dashboard') ?>"> My Account</a>
									<?php 
								}
							?>
						
					<?php } ?>
				</li>
				<li class="d-md-none d-lg-none">
				<?php if($this->session->userdata('usertype') == ''){ ?>
				<a class="" href="<?php echo base_url('register') ?>"> Signup </a>
				<?php }
				else{ 
				?>
				<a class="" href="<?php echo base_url('logout') ?>"> Logout</a>
				<?php }?>
				</li>
				
				<li class="">
					<a href="<?php echo base_url('blog') ?>">Blogs</a>
				</li>
				<li>
				<div class="social_icons display-none" style="border: 2px solid #007ca3!important; border-radius: 4px;">
					<form action="<?php echo base_url(); ?>searching" method="post">
			            <div class="input-group">
			                <input class="form-control border-end-0 border" type="text" name="city" id="example-search-input" style="height:44px;width:240px;" placeholder="Search Here.." required>
			                <span class="input-group-append">
			                    <button type="submit" class="btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5" type="button" style="z-index: 9999;"><i class="fa fa-search"></i> </button>
			                </span>
			            </div>
					</form>
				</div>
				</li>
				<!--li class="has-submenu">
					<a href="#" class="dropdown-toggle">Services </a>
				 	<ul class="submenu">
	            	<div class="row">
					  		<div class="col-sm-6 col-md-4">
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Tele/Video Consultation</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Talk to medical expert</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Home Care</a></li>
							</div>
							<div class="col-sm-6 col-md-4">
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Medical Loan</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Treatment Cost</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Order Medicine</a></li>
							</div>
							<div class="col-sm-6 col-md-4">
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Book Diagnostic Test</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Second Option</a></li>
								<li><a href="#"><img src="<?php echo base_url('assets/img/features/homecare.png');?>" height="30px;"> Health Blog</a></li>
							</div>
						</div>
					</ul>
				</li-->	
				
				<!--li class="has-submenu ">
					<a href="<?php echo base_url() ?>#">Patients </a>
					 <ul class="submenu">
						<li class="has-submenu ">
							<a href="<?php echo base_url() ?>#">Doctors</a>
							<ul class="submenu">
								<li class=""><a href="<?php echo base_url() ?>map-grid.html">Map Grid</a></li>
								<li class=""><a href="<?php echo base_url() ?>map-list.html">Map List</a></li>
							</ul>
						</li>
						<li class=""><a href="<?php echo base_url() ?>search.html">Search Doctor</a></li>
						<li class=""><a href="<?php echo base_url() ?>doctor-profile.html">Doctor Profile</a></li>
						<li class=""><a href="<?php echo base_url() ?>booking.html">Booking</a></li>
						<li class=""><a href="<?php echo base_url() ?>checkout.html">Checkout</a></li>
						<li class=""><a href="<?php echo base_url() ?>booking-success.html">Booking Success</a></li>
						<li class=""><a href="<?php echo base_url() ?>patient-dashboard.html">Patient Dashboard</a></li>
						<li class=""><a href="<?php echo base_url() ?>favourites.html">Favourites</a></li>
						<li class=""><a href="<?php echo base_url() ?>chat.html">Chat</a></li>
						<li class=""><a href="<?php echo base_url() ?>profile-settings.html">Profile Settings</a></li>
						<li class=""><a href="<?php echo base_url() ?>change-password.html">Change Password</a></li>
					</ul> 
				</li>
				<li class="has-submenu ">
					<a href="<?php echo base_url() ?>#">Pharmacy </a>
					<ul class="submenu">
						<li class=""><a href="<?php echo base_url() ?>pharmacy-index.html">Pharmacy</a></li>
						<li class=""><a href="<?php echo base_url() ?>pharmacy-details.html">Pharmacy Details</a></li>
						<li class=""><a href="<?php echo base_url() ?>pharmacy-search.html">Pharmacy Search</a></li>
						<li class=""><a href="<?php echo base_url() ?>product-all.html">Product</a></li>
						<li class=""><a href="<?php echo base_url() ?>product-description.html">Product Description</a></li>
						<li class=""><a href="<?php echo base_url() ?>cart.html">Cart</a></li>
						<li  class=""><a href="<?php echo base_url() ?>product-checkout.html">Product Checkout</a></li>
						<li class=""><a href="<?php echo base_url() ?>payment-success.html">Payment Success</a></li>
						<li class=""><a href="<?php echo base_url() ?>product-healthcare.html">Product Healthcare</a></li>
					</ul> 
				</li-->
				<!-- <nav class="navbar navbar-inverse">
				   <div class="container">
				      <div class="navbar-header">
				         <button type="button" class="navbar-toggle collapsed service_megamnu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar">Services</span>
				         </button>
				      </div>
				      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				         <ul class="nav navbar-nav">
				            <li class="dropdown dropdown-megamenu">

				               <div class="dropdown-container">
				                  <div class="">
				                     <div class="row">
				                        <div class="col-sm-6 col-md-4">
				                           <div class="media">
				                              <div class="media-body">
				                                 <ul class="list-links">
				                                    <li><a href="#">Press Every Button</a></li>
				                                    <li><a href="#">Smart Choice</a></li>
				                                 </ul>
				                              </div>
				                           </div>
				                        </div>
				                        <div class="col-sm-6 col-md-4">
				                           <div class="media">
				                              <div class="media-body">
				                                 <ul class="list-links">
				                                    <li><a href="#">Harley-Davidson</a></li>
				                                    <li><a href="#">Will you be my Valentine?</a></li>
				                                 </ul>
				                              </div>
				                           </div>
				                        </div>
				                        <div class="col-sm-6 col-md-4">
				                           <ul>
				                              <li>dsfdf</li>
				                              <li>dsfdf</li>
				                           </ul>
				                        </div>
				                     </div>
				                  </div>
				               </div>
				            </li>
				         </ul>
				      </div>
				   </div>
				</nav> -->
				<!--<li>
					<a href="<?php echo base_url() ?>https://doccure-laravel.dreamguystech.com/template/public/admin/index_admin" target="_blank">Admin</a>
				</li> -->

			</ul>		 
		</div>		 
		<ul class="nav header-navbar-rht">
			<li class="nav-item contact-item">
				<!-- <div class="header-contact-img">
					<i class="fa fa-phone-square" aria-hidden="true" style="color: #333;"></i>
				</div>
				<div class="header-contact-detail contact_detls">
					<p class="contact-info-header"> <a href="tel:+91 9999999999" alt="phone">+91 9999999999</a></p>
				</div> --> 
				<li class="nav-item">
					<?php if($this->session->userdata('usertype') == ''){ ?>
					<a class="nav-link header-login" href="<?php echo base_url('login') ?>">login </a>
						&nbsp;&nbsp;
					<a class="nav-link header-login" href="<?php echo base_url('register') ?>"> Signup </a>
					<?php }else{ ?>
					
						<?php if($this->session->userdata('usertype') == 'doctors'){ ?>
							<a class="nav-link header-login" href="<?php echo base_url('doctors');?>"> My Account</a>&nbsp;&nbsp; 
						<?php } else if($this->session->userdata('usertype') == 'Admin'){
							
							//echo "vivek" ;die;
							?>
							<a class="nav-link header-login" href="<?php echo base_url('Admin/index') ?>"> My Account</a>&nbsp;&nbsp; 
						<?php } 
							else if($this->session->userdata('usertype') == 'Hospital'){
								?>
								<a class="nav-link header-login" href="<?php echo base_url('hospital/index') ?>"> My Account</a>&nbsp;&nbsp; 
							<?php }
								else 
								{// echo $this->session->userdata('usertype');die;
									?>
									<a class="nav-link header-login" href="<?php echo base_url('dashboard') ?>"> My Account</a>&nbsp;&nbsp; 
									<?php 
								}
							?>
						
					
					<a class="nav-link header-login" href="<?php echo base_url('logout') ?>"> Logout</a>
					<?php } ?>
				</li>
				
				<div class="social_icons" style="border: 2px solid #007ca3!important; border-radius: 4px;">
					<form action="<?php echo base_url(); ?>searching" method="post">
			            <div class="input-group">
			                <input class="form-control border-end-0 border" type="text" name="city" id="example-search-input" style="height:44px;width:240px;" placeholder="Search Here.." required>
			                <span class="input-group-append">
			                    <button type="submit" class="btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5" type="button" style="z-index: 9999;"><i class="fa fa-search"></i> </button>
			                </span>
			            </div>
					</form>
				</div>


			
				
			</li>
		</ul>
	</nav>
</header>
		
<!-- /Header -->

<script>
	var xlatitude = document.getElementById("xlatitude");
	    var ylongitude = document.getElementById("ylongitude");
        
		
		function getLocation() {
		  if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		  } else { 
			alert("Geolocation is not supported by this browser.");
		  }
		}

		function showPosition(position) {
		  xlatitude.value = position.coords.latitude;
		  ylongitude.value = position.coords.longitude;
		}
		getLocation();
</script>


