<!DOCTYPE html>

<html lang="en">

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

         <title>cureu - Dashboard</title>                                                          

         <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets_admin/img/logo-small.png">

		<!-- Bootstrap CSS -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap.min.css">

		

		<!-- Fontawesome CSS -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="https://doccure-laravel.dreamguystech.com/template/public/assets_admin/plugins/fontawesome/css/font-awesome.min.css"> -->

        		<!-- Feathericon CSS -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/feathericon.min.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/morris/morris.css">

        <!-- Select2 CSS -->

		<link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/select2.min.css">

        	<!-- Datetimepicker CSS -->

		<link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap-datetimepicker.min.css">

		

		<!-- Full Calander CSS -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/fullcalendar/fullcalendar.min.css">

        <!-- Datatables CSS -->

		<link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/datatables/datatables.min.css">

		

		

		<!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

		

		<!-- Main CSS -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/style.css">

		

		

		<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.min.css">

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fancybox/jquery.fancybox.min.css">

		

		

		<!-- For ivoice -->

		<link href="<?php echo base_url() ?>assets/img/favicon.png" rel="icon">

		

		<!-- Bootstrap CSS -->

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

		

		<!-- Fontawesome CSS -->

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/all.min.css">

		

		<!-- Main CSS -->

		

		</head>



  <body>

    <!-- Main Wrapper -->

	<div class="main-wrapper">

		

		<!-- Header -->

		<div class="header">

		

			<!-- Logo -->

			<div class="header-left">

				<a href="<?php echo base_url('admin/index') ?>" class="logo">

					<img src="<?php echo base_url() ?>assets_admin/img/logo.png" alt="Logo">

				</a>

				<a href="<?php echo base_url('admin/index') ?>" class="logo logo-small">

					<img src="<?php echo base_url() ?>assets_admin/img/logo-small.png" alt="Logo" width="30" height="30">

				</a>

			</div>

			<!-- /Logo -->

			

			<a href="javascript:void(0);" id="toggle_btn">

				<i class="fe fe-text-align-left"></i>

			</a>

			

			

			

			<!-- Mobile Menu Toggle -->

			<a class="mobile_btn" id="mobile_btn">

				<i class="fa fa-bars"></i>

			</a>

			<!-- /Mobile Menu Toggle -->

			

			<!-- Header Right Menu -->

			<ul class="nav user-menu">



				<!-- Notifications -->

				<!---<li class="nav-item dropdown noti-dropdown">

					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

						<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>

					</a>

					<div class="dropdown-menu notifications">

						<!---<div class="topnav-dropdown-header">

							<span class="notification-title">Notifications</span>

							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>

						</div>

						<div class="noti-content">

							<ul class="notification-list">

								<li class="notification-message">

									<a href="#">

										<div class="media">

											<span class="avatar avatar-sm">

												<img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() ?>assets_admin/img/doctors/doctor-thumb-01.jpg">

											</span>

											<div class="media-body">

												<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>

												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>

											</div>

										</div>

									</a>

								</li>

								<li class="notification-message">

									<a href="#">

										<div class="media">

											<span class="avatar avatar-sm">

												<img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() ?>assets_admin/img/patients/patient1.jpg">

											</span>

											<div class="media-body">

												<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>

												<p class="noti-time"><span class="notification-time">6 mins ago</span></p>

											</div>

										</div>

									</a>

								</li>

								<li class="notification-message">

									<a href="#">

										<div class="media">

											<span class="avatar avatar-sm">

												<img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() ?>assets_admin/img/patients/patient2.jpg">

											</span>

											<div class="media-body">

											<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>

											<p class="noti-time"><span class="notification-time">8 mins ago</span></p>

											</div>

										</div>

									</a>

								</li>

								<li class="notification-message">

									<a href="#">

										<div class="media">

											<span class="avatar avatar-sm">

												<img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() ?>assets_admin/img/patients/patient3.jpg">

											</span>

											<div class="media-body">

												<p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>

												<p class="noti-time"><span class="notification-time">12 mins ago</span></p>

											</div>

										</div>

									</a>

								</li>

							</ul>

						</div>

						<div class="topnav-dropdown-footer">

							<a href="#">View all Notifications</a>

						</div>

					</div>

				</li>---->

				<!-- /Notifications -->

				

				<!-- User Menu -->

				<li class="nav-item dropdown has-arrow">

					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

						<span class="user-img"><img class="rounded-circle" src="<?php echo base_url() ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/admin.jpg') ?>'" width="31" alt=""></span>

					</a>

					<div class="dropdown-menu">

						<div class="user-header">

							<div class="avatar avatar-sm">

								<img src="<?php echo base_url() ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/admin.jpg') ?>'" alt="User Image" class="avatar-img rounded-circle">

							</div>

							<div class="user-text">

								<p class="text-muted mb-0">Administrator</p>

							</div>

						</div>

						<a class="dropdown-item" href="<?php echo base_url('admin/change_password'); ?>">Change Password</a>

						<!--<a class="dropdown-item" href="settings.html">Settings</a>-->

						<a class="dropdown-item" href="<?php echo base_url('logout')?>">Logout</a>

					</div>

				</li>

				<!-- /User Menu -->

				

			</ul>

			<!-- /Header Right Menu -->

			

		</div>

		<!-- /Header --> <!-- Sidebar -->

		<?php 

								if($this->uri->segment(2)=='index')

								{

									$dashboard="class='active'";

								}

								else if($this->uri->segment(2)=='appointment')

								{

									$appointment="class='active'";

									

								}

								else if($this->uri->segment(2)=='treatment')

								{

									

									$treatment="class='active'";

								}

								else if($this->uri->segment(2)=='view_specialities')

								{

									

									$view_specialities="class='active'";

								}

								else if($this->uri->segment(2)=='common_specialities')

								{

									

									$common_specialities="class='active'";

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

<div class="sidebar" id="sidebar">

                <div class="sidebar-inner slimscroll">

					<div id="sidebar-menu" class="sidebar-menu">

						<ul>

							<li class="menu-title"> 

								<span>Main</span> 

							</li>

							<li <?php  if(isset($dashboard)){ echo $dashboard;}?>>  <!-- class="active"  -->

								<a style="text-decoration:none;" href="<?php echo base_url('admin/index');?>"><i class="fe fe-home"></i> <span>Dashboard</span></a>

							</li>

							<li  <?php  if(isset($appointment)){ echo $appointment;}?> >

								<a style="text-decoration:none;" href="<?php echo base_url('admin/appointment') ?>"><i class="fe fe-layout"></i> <span>Appointments</span></a>

							</li >

								<li <?php  if(isset($treatment)){ echo $treatment;}?>> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/treatment') ?>"><i class="fa fa-stethoscope"></i><span>Treatment</span></a>

							</li>

							<li  <?php  if(isset($view_specialities)){ echo $view_specialities;}?>> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/view_specialities');?>"><i class="fa fa-medkit"></i> <span> Top Specialities</span></a>

							</li>

							<li  <?php  if(isset($common_specialities)){ echo $common_specialities;}?>> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/common_specialities');?>"><i class="fa fa-user"></i> <span>Common Specialities</span></a>

							</li>

							<li  class="">  

								<a style="text-decoration:none;" href="<?php echo base_url('admin/doctors');?>"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
								
								<a style="text-decoration:none;" href="<?php echo base_url('admin/add-doctor');?>"><i class="fe fe-user-plus"></i> <span>Add Doctor</span></a> 
							
							</li>

							<li  class=""> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/hospital');?>"><i class="fe fe-user-plus"></i> <span>Hospital</span></a>

							</li>

							<li  class=""> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/members') ?>"><i class="fe fe-user"></i> <span>Patients</span></a>

							</li>

							<?php /*<li  class=""> 

								<a href="#"><i class="fe fe-star-o"></i> <span>Reviews</span></a>

							</li>*/?>

							<li  class=""> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/refer_doctor')?>"><i class="fa fa-user-md"></i> <span>Refer By Doctors</span></a>

							</li>

							<li  class=""> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/refer_hospital')?>"><i class="	fa fa-hospital-o"></i> <span>Refer By Hospital</span></a>

							</li>

							<li  class=""> 

								<a style="text-decoration:none;" href="<?php echo base_url('admin/transations')?>"><i class="fe fe-activity"></i> <span>Transactions</span></a>

							</li>

							<li class="submenu">

								<a href="#" style="text-decoration:none;"><i class="fa fa-area-chart"></i> <span> Add Areas</span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_country') ?>"> Add Country</a></li> 

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_city') ?>"> Add City</a></li> 

									

								</ul>

							</li>

							

							<li class="submenu">

								<a href="#" style="text-decoration:none;"><i class="fe fe-vector"></i> <span> Settings</span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<?php /*<li><a class="" href="<?php echo base_url('admin/view_area') ?>">Area</a></li> */?>

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_banner') ?>">Banner</a></li> 

									<?php /*<li><a class="" href="<?php echo base_url('admin/view_package') ?>">Package</a></li>*/?>

									<?php /*<li><a class="" href="<?php echo base_url('admin/view_package_hospital') ?>">Package For Hospital</a></li>*/?>

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_blog') ?>">Blog</a></li>

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/Contact_list') ?>">Contact List</a></li>

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/Enquiry') ?>">Enquiry List</a></li>

								</ul>

							</li>

							<li class="submenu">

								<a href="#" style="text-decoration:none;"><i class="fe fe-document"></i> <span>  Invoice Reports</span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

								

									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/invoice_report') ?>">Doctor Invoice</a></li> 

									

									

									</li>

								</ul>

							</li>

						<!-- 	<li class="submenu">
								<a href="#" style="text-decoration:none;"><i class="fa fa-area-chart"></i> <span>Stories</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_country') ?>"> Add Story</a></li> 
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/view_city') ?>">Story List</a></li> 
								</ul>
							</li> -->

							<li class="submenu">
								<a href="#" style="text-decoration:none;"><i class="fa fa-area-chart"></i> <span>Testimonials</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/feedback') ?>"> Add Testimonial</a></li> 
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/feedback_list') ?>">Testimonial list</a></li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#" style="text-decoration:none;"><i class="fa fa-area-chart"></i> <span>Stories</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/add_story') ?>"> Add Story</a></li> 
									<li><a class="" style="text-decoration:none;" href="<?php echo base_url('admin/story_list') ?>">Story list</a></li>
								</ul>
							</li>

							<li   class=""> 
								<a href="<?php echo base_url('logout')?>" style="text-decoration:none;"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
							</li>

							<!-- <li class="menu-title"> 

								<span>Pages</span>

							</li>

							<li class="submenu">

								<a href="#"><i class="fe fe-document"></i> <span> Blog </span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a class="" href="blog.html"> Blog </a></li>

									<li><a class="" href="blog-details.html"> Blog Details</a></li>

									<li><a class="" href="add-blog.html"> Add Blog </a></li>

									<li><a class="" href="edit-blog.html"> Edit Blog </a></li>

								</ul>

							</li>

							<li class=""><a href="product-list.html"><i class="fe fe-layout"></i> <span>Product List</span></a></li>

							<li class=""><a href="pharmacy-list.html"><i class="fe fe-vector"></i> <span>Pharmacy List</span></a></li>

							<li  class=""> 

								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>

							</li>

							<li class="submenu">

								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a  class="" href="login.html"> Login </a></li>

									<li><a  class="" href="register.html"> Register </a></li>

									<li><a  class="" href="forgot-password.html"> Forgot Password </a></li>

									<li><a  class="" href="lock-screen.html"> Lock Screen </a></li>

								</ul>

							</li>

							<li class="submenu">

								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a class="" href="error-404.html">404 Error </a></li>

									<li><a class="" href="error-500.html">500 Error </a></li>

								</ul>

							</li>

							<li  class=""> 

								<a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>

							</li>

							<li class="menu-title"> 

								<span>UI Interface</span>

							</li>

							<li class=""> 

								<a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>

							</li>

							<li class="submenu">

								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a class="" href="form-basic-inputs.html">Basic Inputs </a></li>

									<li><a class="" href="form-input-groups.html">Input Groups </a></li>

                                    <li><a class="" href="form-horizontal.html">Horizontal Form</a></li>

									<li><a class="" href="form-vertical.html"> Vertical Form </a></li>

									<li><a class="" href="form-mask.html"> Form Mask </a></li>

									<li><a class="" href="form-validation.html"> Form Validation </a></li>

								</ul>

							</li>

							<li class="submenu">

								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li><a class="" href="tables-basic.html">Basic Tables </a></li>

									<li><a class="" href="data-tables.html">Data Table </a></li>

								</ul>

							</li>

							<li class="submenu">

								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>

								<ul style="display: none;">

									<li class="submenu">

										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>

										<ul style="display: none;">

											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>

											<li class="submenu">

												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>

												<ul style="display: none;">

													<li><a href="javascript:void(0);">Level 3</a></li>

													<li><a href="javascript:void(0);">Level 3</a></li>

												</ul>

											</li>

											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>

										</ul>

									</li>

									<li>

										<a href="javascript:void(0);"> <span>Level 1</span></a>

									</li> -->

								</ul>

							</li>

						</ul>

					</div>

                </div>

            </div>

			<!-- /Sidebar --> 