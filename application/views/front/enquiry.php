

		<!-- style -->
		<style type="text/css">
			i#icon {
    font-size: 40px;
    color: red;
    color: #087ca4;
}

			.side {
    position: relative;
    left: 20%;
    bottom: 39px;
}
		</style>
    

<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12"> 
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Enquiry</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Enquiry</h2>
						</div>
					</div>
				</div>
			</div>

			  <!-- Page Content -->
			<div class="content" style="min-height:200px;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-5 col-lg-5 login-left">
										<div class="row">
											<div class="col-12">
												<ul style="list-style-type: none;">
													<li>
														<a href="tel:+91-7704888444">
															<i class="fa fa-phone-square" aria-hidden="true" id="icon"></i>
															<div class="side">
																<h4 class="change"> Contact Us  </h4>
																<span class="spancontact">+91-999999999</span><br>
																<span class="spancontact">+91-999999999</span>
															</div>
														</a>
													</li>

													<li>
														<a href="mailto:info@exoticcarcare.in">

															<i class="fa fa-envelope" aria-hidden="true" id="icon"></i>
															<div class="side">
																<h4 class="change"> E-Mail  </h4>
																<span class="spancontact">info@demo.in</span><br>
																
															</div>
														</a>
													</li>
													<li>
														<a href="">

															<i class="fa fa-map-marker" aria-hidden="true" id="icon"></i>
															<div class="side">
																<h4 class="change">Address </h4>
																<span class="spancontact"> B4/91, Vineet Khand,<br>
								                                 Lucknow -226010</span>
															</div>
														</a>
													</li>
												</ul>
											</div>
											
										</div>	
									</div>
									<div class="col-md-7 col-lg-7 login-right">
										<div class="login-header">
											<h3 class="text-center">SEND US AN EMAIL</h3> 
										</div>
										
										<!-- Register Form -->
										<?php echo form_open('Welcome/add_enquiry') ?>
										<?php
								if($this->session->flashdata('info_success')){ ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?> 
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<?php }											
								if($this->session->flashdata('warning')){ ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									 <?php echo $this->session->flashdata('Warning'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php } ?>
										<?php echo form_error('name', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="name" required>
												<label class="focus-label">Name</label>
												
											</div> 
											<?php echo form_error('Email', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="Email" required>
												<label class="focus-label">Email</label>
											</div>
											<?php echo form_error('Mob_no', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<input type="number" class="form-control floating mobileeeee"  name="Mob_no" required >
												<label class="focus-label">Mobile Number</label>
												<span class="text text-success mobillllee"></span>	
												<span class="text text-danger mobilllle"></span>	
											</div>
											<div class="form-group" style="margin-bottom: 0.25rem;">
												<input type="radio" value="Male" name="gender"value="<?php echo set_value('gender')?>" required> 
												<label style="color: #b8b8b8;">&nbsp;Male</label> &nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" value="Female" name="gender"value="<?php echo set_value('gender')?>" > 
												<label style="color: #b8b8b8;">&nbsp; Female</label>
												<?php echo form_error('gender',"<div class='text-danger'>","</div>")?>
											</div>
											<?php echo form_error('age', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="age" required >
												<label class="focus-label">Age</label>
											</div>
											<?php echo form_error('country', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="country" required >
												<label class="focus-label">Country</label>
											</div>
											<?php echo form_error('message', '<div class="error">', '</div>'); ?>
											<div class="form-group form-focus">
												<textarea class="form-control" name="message" rows="10" > </textarea>
												<label class="focus-label">Message</label>
											</div>

											
											<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary btn-block btn-lg login-btn submit_listtt','value'=>'Submit']);?> 
											<!-- <div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> -->
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>
					<!-- map -->
					

				</div>

				<div class="container-fluid pt-5">
						<div class="row">
							<div class="col-md-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14238.426899481221!2d81.02025255!3d26.852458199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1599639692230!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</div>
						</div>
				</div>

			</div>		
			<!-- /Page Content -->
</div>
	
	