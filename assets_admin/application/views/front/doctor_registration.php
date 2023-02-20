<div class="content" style="min-height:205px;"> 
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?php echo base_url() ?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="<?php echo base_url() ?>welcome/register">Are you a Patient?</a></h3>
										</div> 
										 <?php
									if($this->session->flashdata('info_success')){ ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?> <strong> &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>welcome/login">Login Now</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<?php }											
									if($this->session->flashdata('Warning')){ ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										 <?php echo $this->session->flashdata('Warning'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<?php } ?>
										<!-- Register Form -->
										<form action="<?php echo base_url() ?>welcome/add_doctor" method="post">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="name"value="<?php echo set_value('name')?>">
												<label class="focus-label">Name</label>
												<?php echo form_error('name',"<div class='text-danger'>","</div>")?>
											</div> 
											<div class="form-group form-focus">
												<input type="Email" class="form-control floating" id="emaill" name="email"value="<?php echo set_value('email')?>">
												<label class="focus-label">Email</label>
												<span id="email_registerr" style="color:red; font-size:15px;margin:5px !important"></span>
												<?php echo form_error('email',"<div class='text-danger'>","</div>")?>
											</div>
											<div class="form-group form-focus">
												<input type="number" class="mobile form-control floating" name="mobile" id="mobilee" value="<?php echo set_value('mobile')?>">
												<label class="focus-label">Mobile Number</label>
												<span class="text text-success" id="spann"></span>
												<span class="text text-danger" id="span"></span>
												<span id="mobile_registerr" style="color:red; font-size:15px;margin:5px !important"></span>
												<?php echo form_error('mobile',"<div class='text-danger'>","</div>")?>
											</div>
											<div class="form-group" style="margin-bottom: 0.25rem;">
												<input type="radio" value="Male" name="gender"value="<?php echo set_value('gender')?>"> 
												<label style="color: #b8b8b8;">&nbsp;Male</label> &nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" value="Female" name="gender"value="<?php echo set_value('gender')?>"> 
												<label style="color: #b8b8b8;">&nbsp; Female</label>
												<?php echo form_error('gender',"<div class='text-danger'>","</div>")?>
											</div>
											
											<div class="form-group">
												<label style="color: #b8babf;">Date of Birth</label>
												<div class="cal-icon">
													<input type="text" class="form-control datetimepicker"name="dob" style="color: #b8babf;"value="<?php echo set_value('dob')?>">
													<?php echo form_error('dob',"<div class='text-danger'>","</div>")?>
												</div>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password"value="<?php echo set_value('password')?>">
												<label class="focus-label">Create Password</label>
												<?php echo form_error('password',"<div class='text-danger'>","</div>")?>
											</div>
											<div class="form-group form-focus">
												<textarea class="form-control floating" name="address"value="<?php echo set_value('address')?>"><?php echo set_value('address')?></textarea>
												<label class="focus-label">Address</label> 
												<?php echo form_error('address',"<div class='text-danger'>","</div>")?>
											</div>
											<div class="form-group">
												<div class="terms-accept">
													<div class="custom-checkbox">
													   <input type="checkbox" id="terms_accept" required="Please Check it">
													   <label for="terms_accept">I have read and accept <a href="<?php echo base_url('welcome/terms_condition') ?>">Terms &amp; Conditions</a></label> 
													</div>
												</div>
											</div>
											<div class="text-right"> 
												<a class="forgot-link" href="<?php echo base_url() ?>doctor">Already have an account?</a>
											</div>
											<button id="submit_list" class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
