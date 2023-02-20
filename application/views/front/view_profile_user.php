

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
									<!-- Profile Settings Form -->
									<form action="<?php echo base_url() ?>welcome/update_profile" method="post" enctype="multipart/form-data"> 
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="<?php echo base_url() ?><?= $user->image; ?>" onerror="this.onerror=null; this.src='<?= $user->picture; ?>'" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="file_name" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" class="form-control" name="id" value="<?= $user->id;?>">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="firstname" value="<?= $user->name;?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" name="dob" class="form-control datetimepicker" value="<?= $user->dob;?>"> 
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select name="blood" class="form-control select">
														<?php foreach($blood as $row): ?>
														<option <?php if($row->blood==$user->blood) echo "selected" ?> value="<?php echo $row->blood ?>"><?php echo $row->blood; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email"  class="form-control" name="email" value="<?= $user->email;?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<input type="text" name="gender" value="<?= $user->gender;?>" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" name="phone" value="<?= $user->mobile_no;?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control" name="address" value="<?= $user->address;?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" name="state" value="<?= $user->state;?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" name="city" value="<?= $user->city;?>">
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" class="form-control" name="pincode" value="<?php echo $user->pincode ?>">
												</div>
											</div>
											
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
            <!-- /Page Content -->
</div>