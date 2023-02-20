
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
										<?php
											if($this->session->flashdata('success')){ ?>
											<div class="alert alert-success alert-dismissible fade show" role="alert">
												<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<?php }											
											if($this->session->flashdata('warning')){ ?>
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												 <?php echo $this->session->flashdata('warning'); ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
										<?php } ?>
											<!-- Change Password Form -->
											<form method="post" action="<?php echo base_url('doctors/change_passwordd'); ?>"> 
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name="old_pass">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="new_pass">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="con_pass">
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
