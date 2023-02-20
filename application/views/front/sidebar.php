<!-- Breadcrumb -->
<?php error_reporting(0);?>
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
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
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<?php if($user->image){ ?>
												<img src="<?php echo base_url() ?><?= $user->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image">
										<?php	}else { ?>
												<img src="" onerror="this.onerror=null; this.src='<?= $user->picture; ?>'" alt="User Image">
										<?php } ?>
											
										</a>
										<div class="profile-det-info">
											<h3><?= $user->name; ?></h3> 
											<div class="patient-details">
												<!--<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>--->
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?= $user->address; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<?php 
								if($this->uri->segment(2)=='dashboard')
								{
									$dashboard="class='active'";
								}
								else if($this->uri->segment(2)=='favourites')
								{
									$favourites="class='active'";
									
								}
								else if($this->uri->segment(2)=='view_profile_user')
								{
									
									$view_profile_user="class='active'";
								}
								else if($this->uri->segment(2)=='view_ehr_doctor')
								{
									
									$view_ehr_doctor="class='active'";
								}
								else if($this->uri->segment(2)=='view_ehr_hospital')
								{
									
									$view_ehr_hospital="class='active'";
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
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li <?php  if(isset($dashboard)){ echo $dashboard;}?>>
												<a href="<?php echo base_url('dashboard') ?>">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<!--<li>
												<a href="<?php// echo base_url('welcome/favourites') ?>">
													<i class="fas fa-bookmark"></i>
													<span>Favourites</span>
												</a>
											</li>--->
											<li <?php  if(isset($favourites)){ echo $favourites;}?>>
												<a href="<?php echo base_url('message') ?>">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<!--<small class="unread-msg">23</small>--->
												</a>
											</li >
											<li <?php  if(isset($view_profile_user)){ echo $view_profile_user;}?>>
												<a href="<?php echo base_url('user-profile') ?>">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li >
											<li <?php  if(isset($view_ehr_doctor)){ echo $view_ehr_doctor;}?>>
												<a href="<?php echo base_url('EHR-Doctor') ?>">
													<i class="fas fa-user-cog"></i>
													<span>EHR Doctor</span>
												</a>
											</li>
											<li <?php  if(isset($view_ehr_hospital)){ echo $view_ehr_hospital;}?>>
												<a href="<?php echo base_url('EHR-hospital') ?>">
													<i class="fas fa-user-cog"></i>
													<span>EHR Hospital</span>
												</a>
											</li>
											
											<li <?php  if(isset($change_password)){ echo $change_password;}?>>
												<a href="<?php echo base_url('change-password') ?>">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li <?php // if(isset($dashboard)){ echo $dashboard;}?>>
												<a href="<?php echo base_url('logout') ?>">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->