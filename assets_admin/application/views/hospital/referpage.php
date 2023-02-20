
					<!-- /Page Header -->
					<div class="col-md-7 col-lg-8 col-xl-9">
					<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart('hospital/refer_hos');?>
							<!-- Basic Information -->
							<?php $id = $this->session->userdata('userid');
								  $user = $this->db->get_where('hospital', array('id =' => $id))->row(); 
					?>
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
							
									<h4 class="card-title">Referring To </h4>
									<div class="row form-row">
										
											<div class="col-md-6">
											<div class="form-group">
												<label> Patient Name <span class="text-danger">*</span></label>
												<?php $id =$this->db->query('SELECT members.name as members,members.id as members_id from appointmentt 
																			join hospital on hospital.id=appointmentt.hospital_id
																			join members on members.id=appointmentt.member_id
																			where appointmentt.id="'.$this->uri->segment(3).'"')->row();
																			
												?>
												<input type="hidden" name="hidden_hos" value="<?php  echo $this->session->userdata('userid') ;?>">
												<input type="hidden" name="hidden_member" value="<?php echo $id->members_id ?>">
												<input type="text" value="<?php echo $id->members; ?>" class="form-control"  name="patient_name" readonly >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">  
												<label>Hospital Refer <span class="text-danger">*</span></label> 
												<input type="text" value="<?php echo  strtoupper($user->name); ?>" class="form-control" name="hos_refer"  readonly>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>To Hospital <span class="text-danger">*</span></label>
												<input type="text" value="" class="form-control" name="refer_to">
											</div>
										</div>
										
							</div>
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>	
						</div>
						</div>
										 
										
								
							<!-- /Basic Information -->
							
							<!-- About Me -->
							
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							
							<!-- /Education -->
						
							<!-- Experience -->
					
						</div>
					</div>	
				</div>	