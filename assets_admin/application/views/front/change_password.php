<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
								<?php
									if($this->session->flashdata('info_success')){ ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?>
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
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
											<form action="<?php echo base_url() ?>welcome/update_password" method="post">
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name="old_password">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="new_password">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="con_password">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
            <!-- /Page Content -->
</div>