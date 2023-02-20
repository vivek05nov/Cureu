<!DOCTYPE html>

<?php 
error_reporting(0);
?>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>cureu</title>
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
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/fullcalendar.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
		<style>
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
		</style>
    </head>
        <!-- Loader -->
	<!-- /Loader  -->
<div class="main-wrapper">
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="<?php echo base_url() ?>javascript:void(0);">
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
							<a href="<?php echo base_url() ?>index.html" class="menu-logo">
								<img src="<?php echo base_url() ?>assets/img/logo.png" class="img-fluid"  alt="Logo"> 
							</a>
							<a id="menu_close" class="menu-close" href="<?php echo base_url() ?>">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="<?php echo base_url('welcome/doctors') ?>">Doctors</a>
							</li>
							<!--li class="">
								<a href="<?php echo base_url() ?>">Patients</a>
							</li-->
							<li class="">
								<a href="<?php echo base_url('welcome/consultant') ?>">Consult</a>
							</li>
							<li class="">
								<a href="<?php echo base_url('welcome/treatment'); ?>">Treatment</a>
							</li>
							<li class="">
								<a href="<?php echo base_url() ?>">Diagnostic</a>
							</li>
							<!--<li class="has-submenu ">
								<a href="<?php echo base_url() ?>#">Doctors </a>
								 <ul class="submenu">
									<li class=""><a href="<?php echo base_url() ?>doctor-dashboard.html">Doctor Dashboard</a></li>
									<li class=""><a href="<?php echo base_url() ?>appointments.html">Appointments</a></li>
									<li class=""><a href="<?php echo base_url() ?>schedule-timings.html">Schedule Timing</a></li>
									<li class=""><a href="<?php echo base_url() ?>my-patients.html">Patients List</a></li>
									<li class=""><a href="<?php echo base_url() ?>patient-profile.html">Patients Profile</a></li>
									<li class=""><a href="<?php echo base_url() ?>chat-doctor.html">Chat</a></li>
									<li class=""><a href="<?php echo base_url() ?>invoices.html">Invoices</a></li>
									<li class=""><a href="<?php echo base_url() ?>doctor-profile-settings.html">Profile Settings</a></li>
									<li class=""><a href="<?php echo base_url() ?>reviews.html">Reviews</a></li>
									<li class=""><a href="<?php echo base_url() ?>doctor-register.html">Doctor Register</a></li>
									<li class="has-submenu ">
										<a href="<?php echo base_url() ?>doctor-blog.html">Blog</a>
										<ul class="submenu">
											<li class=""><a href="<?php echo base_url() ?>doctor-blog.html">Blog</a></li>
											<li><a href="<?php echo base_url() ?>blog-details.html">Blog view</a></li>
											<li class=""><a href="<?php echo base_url() ?>doctor-add-blog.html">Add Blog</a></li>
										</ul>
									</li>
								</ul> 
							</li>	
							
							<li class="has-submenu ">
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
								<!-- <ul class="submenu">
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
							</li>--> 
 


							
						
						<!-- <li>
								<a href="<?php echo base_url() ?>https://doccure-laravel.dreamguystech.com/template/public/admin/index_admin" target="_blank">Admin</a>
							</li> -->
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="fa fa-phone-square" aria-hidden="true" style="color: #087ca4;"></i>
								<!--i class="far fa-hospital"></i-->							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Support</p>
								<p class="contact-info-header"> +91 9999999999</p>
							</div>
							<li class="nav-item">
								<?php if($this->session->userdata('username') == ''){ ?>
								<a class="nav-link header-login" href="<?php echo base_url('login') ?>">login </a>
									&nbsp;&nbsp;
								<a class="nav-link header-login" href="<?php echo base_url('welcome/register') ?>"> Signup </a>
								<?php }else{ ?>
									<?php if($this->session->userdata('usertype') == 'doctors'){ ?>
										<a class="nav-link header-login" href="<?php echo base_url('doctors');?>"> My Account</a>&nbsp;&nbsp; 
									<?php } else{?>
										<a class="nav-link header-login" href="<?php echo base_url('welcome/dashboard') ?>"> My Account</a>&nbsp;&nbsp; 
									<?php } ?>
								
								<a class="nav-link header-login" href="<?php echo base_url('logout') ?>"> Logout</a>
								<?php } ?>
							</li>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
	<!-- Breadcrumb -->



    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('doctors');?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <?php $id = $this->session->userdata('userid');
					$user = $this->db->get_where('doctors', array('id =' => $id))->row(); 
					?>
                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="<?php echo base_url('doctors')?>" class="booking-doc-img">
                                    <img src="<?php echo base_url()?>assets/img/doctors/<?php echo $user->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><?php echo  strtoupper($user->name); ?></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0"><?php echo implode(',',json_decode($user->degree)); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
								<?php 
								if($this->uri->segment(2)=='')
								{
									$dashboard="class='active'";
								}
								else if($this->uri->segment(2)=='appointment')
								{
									$appointment="class='active'";
									
								}
								else if($this->uri->segment(2)=='my_patients')
								{
									
									$my_patients="class='active'";
								}
								else if($this->uri->segment(2)=='gallery')
								{
									
									$gallery="class='active'";
								}
								else if($this->uri->segment(2)=='chat')
								{
									
									$chat="class='active'";
								}
								else if($this->uri->segment(2)=='invoice')
								{
									
									$invoice="class='active'";
								}
								else if($this->uri->segment(2)=='view_profile')
								{
									
									$view_profile="class='active'";
								}
								else if($this->uri->segment(2)=='change_password')
								{
									
									$change_password="class='active'";
								}
								else if($this->uri->segment(2)=='ehr_doctor')
								{
									
									$ehr_doctor="class='active'";
								}
								
								?>
                                    <li <?php  if(isset($dashboard)){ echo $dashboard;}?>>
                                        <a href="<?php echo base_url('doctors');?>">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard </span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($appointment)){ echo $appointment;}?>>
                                        <a href="<?php echo base_url('doctors/appointment') ?>">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($my_patients)){ echo $my_patients;}?>>
                                        <a href="<?php echo base_url('doctors/my_patients') ?>">
                                            <i class="fas fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
									<li  <?php if(isset($chat)){ echo $chat;}?>>
                                        <a href="javascript:(0);" id="received">   <!-- base_url('doctors/chat')--->
                                            <i class="far fa-comment-alt"></i>
                                            <span>Chat</span>
											<small class="unread-msg" id="received_message"></small>
                                        </a>
                                    </li>
									<li  <?php if(isset($gallery)){ echo $gallery;}?>>
                                        <a href="<?php echo base_url('doctors/gallery') ?>">
                                            <i class="fab fa-envira"></i>
                                            <span>Gallery</span>
                                        </a>
                                    </li>
									<li <?php if(isset($ehr_doctor)){ echo $ehr_doctor;}?>>
                                        <a href="<?php echo base_url('doctors/ehr_doctor') ?>">
                                            <i class="fab fa-envira"></i>
                                            <span>Patients EHR</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="<?php echo base_url() ?>schedule-timings.html">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li> -->
                                    <li  <?php if(isset($invoice)){ echo $invoice;}?>>
                                        <a href="<?php echo base_url('doctors/invoice') ?>">
                                            <i class="fas fa-file-invoice"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="<?php echo base_url() ?>reviews.html">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>chat-doctor.html">
                                            <i class="fas fa-comments"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">23</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>doctor-profile-settings.html">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>social-media.html">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li> -->
									
									<li <?php if(isset($view_profile)){ echo $view_profile;}?> >
                                        <a href="<?php echo base_url('doctors/view_profile') ?>">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($change_password)){ echo $change_password;}?>>
                                        <a href="<?php echo base_url('doctors/change_password') ?>">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('logout')?>">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->
                    
                </div>