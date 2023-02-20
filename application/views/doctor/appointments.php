 
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">
							
								<!-- Appointment List -->
								<?php $sr = 1; 
								
									foreach($appointment1 as $row){
										 	
													?>
													
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="#" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="#"><?php echo $row->customer ?></a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i><?php echo $row->appointment_date; ?></h5>
												<h5><i class="fas fa-map-marker-alt"></i> <?php echo $row->address ?></h5>
												<h5><i class="fas fa-envelope"></i> <?php echo $row->email ?></h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i><?php echo $row->mobile ?></h5> 
											</div>
										</div>
									</div>
									<div class="appointment-action">
									<!--<a href="<?php echo base_url('doctors/refer_to/').$row->id?>" class="btn btn-sm bg-info-light" >
											<i class="fas fa-location-arrow"></i> Refer To
										</a>--> 
										<!--a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a-->
										<a href="<?php echo base_url(); ?>doctors/view_prescriptions/<?php echo $row->id ?>" class="btn btn-sm bg-success-light">
											<i class="fas fa-plus"></i> Add Prescriptions
										</a>  
										<!--a href="javascript:void(0);" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a-->
									</div>
								</div>
								<?php $sr++; } ?>
								<!-- /Appointment List -->
								
							</div>
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>

		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT0001</span>
											<span class="text">21 Oct 2019 10:00 AM</span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text">Completed</span>
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">29 Jun 2019</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">$450</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
