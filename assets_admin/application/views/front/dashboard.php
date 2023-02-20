<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
											</li>
											<?php /*<li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>*/?>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Hospital Appointments</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<?php if($this->session->flashdata('success')){
											?>
											<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?> </div>
											<?php 
										} ?>
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th class="text-center">Sr No</th>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<!--th>Booking Date</th-->
																	<!--th>Amount</th-->
																	<!--<th>Follow Up</th>--->
																	<th class="text-center">Status</th>
																	
																</tr>
															</thead>
															<tbody>
															<?php
															$sr = 1;
															foreach($appointment as $appointment){?>
																<tr>
																	<td class="text-center">
																		<a href="javascript:(0);"><?php  echo $sr; ?></a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="#" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/doctors/<?php echo $appointment->image;?>" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'" alt="User Image">
																			</a>
																			<a href="#"><?php echo $appointment->doctor;?> <span><?php echo $appointment->specialities;?></span></a>
																		</h2>
																	</td>
																	<td> <?php echo $appointment->appointment_date ?></td>
																	<!--td><?php// echo  date("d M Y", strtotime("$appointment->created_at")) ?></td-->
																	<!--td>$160</td-->
																	<!--<td>16 Nov 2019</td>--->
																	
																	<td class="text-center">
																	<?php 
																	if(($appointment->status)=='1'){
																	?>
																	<span class="badge badge-pill bg-warning-light">Pending</span>
																	<a href="javascript:(0);" id="reschedule" data-id="<?php echo $appointment->id ?>" data-member="<?php echo $appointment->mem_id ?>" data-appointment="<?php echo $appointment->appointment_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($appointment->appointment_date. ' + 7 days'));?>"><span class="badge badge-pill bg-primary-light ml-3">  
																			Reschedule  
                                                                        </span></a>
																	<?php 
																	}
																	else if(($appointment->status)=='2')
																	{?>
																		
																		<span class="badge badge-pill bg-success-light">Confirmed</span>
																		<?php  
																				$time=explode(":",$user->appointment_time);
																				if($time[0]>=12)
																				{
																					
																																							
																		?>
																		<span class="text text-primary ml-4"><?php  echo $user->appointment_time ." PM" ;?></span>
																		<?php
																				}
																				else
																				{
																				?>
																				<span class="text text-primary ml-4"><?php  echo $user->appointment_time ." AM" ;?></span>
																			<?php 
																			
																				}
																		?>
																	<?php 
																	}
																	else if($appointment->status==0)
																	{?>
																		<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<?php 
																	}
																	else
																	{
																		?>
																		<span class="badge badge-pill bg-info-light">Completed</span>
																		<?php
																	}
																	?>
																	</td>
																	<!--td class="text-right">
																		<div class="table-action">
																			
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<!--<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>>
																		</div>
																	</td-->
																</tr>
															<?php  $sr++; } ?>
																</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade show" id="pat_prescriptions">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th style="color:red;">Date </th>
																	<th>Name</th>									
																	<th>Created by </th>
																	<th>Description</th>
																	<th>Prescription Image</th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
															<?php
															$sr=1;
															foreach($prescriptions as $pre){?>
																<tr>
																	<td><?php echo  date("d M Y", strtotime("$pre->created_at")) ?></td>
																	<td>Prescription <?php echo $sr; ?></td>
																	<td>
																		<!--<h2 class="table-avatar">
																			<a href="#" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/doctors/<?php echo $pre->image ?>" alt="User Image">
																			</a>
																			
																		</h2>-->
																		<a href="#"><?php echo $pre->name ?> </a>
																	</td>
																	
																	
																	
																			
																	<div class="comment more">
																	<td>  <?php $des = wordwrap($pre->description,50,"<br>\n"); ?>  
																			<?php	if(strlen($des) > 50){
																				echo substr($des,0,50);    ?>
																				<span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
																				<span class="read-more-content"> <?php echo substr($des,50,strlen($des));  ?>
																				<span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
																			<?php } else {
																				echo $des; 
																				}
																				 ?>
																		
																	</td>
																	<td>
																	<img src="<?php echo base_url() ?>assets/img/pharmacy/<?php echo $pre->file;  ?>" style="width:90px; height:90px">
																	</td>
																	<td class="text-right">
																		<center>
																		<div class="table-action">
																			
																			<a target="_blank" href="<?php echo base_url()?>assets/img/pharmacy/<?php echo $pre->file; ?>" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			
																			<?php /*<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>*/?>
																		</div>
																		</center>
																	</td>
																</tr>
															<?php $sr++; } ?>
																</tbody>	
														</table>
													</div> 
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->
											
										<!-- Medical Records Tab -->
										
										<?php /*<div id="pat_medical_records" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>ID</th>
																	<th>Date </th>
																	<th>Description</th>
																	<th>Attachment</th>
																	<th>Created</th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0010</a></td>
																	<td>14 Nov 2019</td>
																	<td>Dental Filling</td>
																	<td><a href="#">dental-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0009</a></td>
																	<td>13 Nov 2019</td>
																	<td>Teeth Cleaning</td>
																	<td><a href="#">dental-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0008</a></td>
																	<td>12 Nov 2019</td>
																	<td>General Checkup</td>
																	<td><a href="#">cardio-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0007</a></td>
																	<td>11 Nov 2019</td>
																	<td>General Test</td>
																	<td><a href="#">general-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0006</a></td>
																	<td>10 Nov 2019</td>
																	<td>Eye Test</td>
																	<td><a href="#">eye-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Marvin Campbell <span>Ophthalmology</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0005</a></td>
																	<td>9 Nov 2019</td>
																	<td>Leg Pain</td>
																	<td><a href="#">ortho-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0004</a></td>
																	<td>8 Nov 2019</td>
																	<td>Head pain</td>
																	<td><a href="#">neuro-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0003</a></td>
																	<td>7 Nov 2019</td>
																	<td>Skin Alergy</td>
																	<td><a href="#">alergy-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0002</a></td>
																	<td>6 Nov 2019</td>
																	<td>Dental Removing</td>
																	<td><a href="#">dental-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0001</a></td>
																	<td>5 Nov 2019</td>
																	<td>Dental Filling</td>
																	<td><a href="#">dental-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Olga Barlow <span>Dental</span></a>
																		</h2>
																	</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>  	
														</table>
													</div>
												</div>
											</div>
										</div>*/?>
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										<div id="pat_billing" class="tab-pane fade show">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" style="color:red;">
															<thead>
																<tr>
																	<th class="text-center">Sr No</th>
																	<th class="text-center">Hospital</th>
																	<th class="text-center">Appointment Date</th>
																	<th class="text-center">Status</th>
																	
																</tr>
															</thead>
															<tbody>
															<?php
															$sr=1;
															foreach($appointmentt as $appointment):?>
																<tr>
																	<td class="text-center">
																		<a href="javascript:(0);"><?php  echo $sr; ?></a>
																	</td>
																	<td class="text-center">
																		<h2 class="table-avatar">
																			<a href="javascript:(0);" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'">
																			</a>
																			<a href="javascript:(0);"><?php echo $appointment->doctor; ?><span></span></a>
																		</h2>
																	</td>
																	<?php
																	$date = DateTime::createFromFormat('d/m/Y', $appointment->appointment_date);
																	$resh_date = $date->format('Y-m-d');
																	 ?>
																	<td class="text-center"><?php echo $resh_date  ?></td>
																	
																	<!--td class="text-right">
																		<div class="table-action">
																			<a href="javascript:(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td-->
																	<td class="text-center">
																	<?php 
																	if(($appointment->status)=='1'){
																	?>
																	<span class="badge badge-pill bg-warning-light">Pending</span>
																	
																	<a href="javascript:(0);" id="reschedule_hospital" data-id="<?php echo $appointment->id ?>" data-member="<?php echo $appointment->mem_id ?>" data-appointment="<?php echo $resh_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($resh_date. ' + 7 days'));?>"><span class="badge badge-pill bg-primary-light ml-3">  
																			Reschedule  
                                                                        </span></a>  
																	<?php 
																	}
																	else if(($appointment->status)=='2')
																	{?>
																		
																		<span class="badge badge-pill bg-success-light">Confirmed</span>
																		<?php  
																				$time=explode(":",$user->appointment_time);
																				if($time[0]>=12)
																				{
																					
																																							
																		?>
																		<span class="text text-primary ml-4"><?php  echo $user->appointment_time ." PM" ;?></span>
																		<?php
																				}
																				else
																				{
																				?>
																				<span class="text text-primary ml-4"><?php  echo $user->appointment_time ." AM" ;?></span>
																			<?php 
																			
																				}
																		?>
																	<?php 
																	}
																	else if($appointment->status==0)
																	{?>
																		<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<?php 
																	}
																	else
																	{
																		?>
																		<span class="badge badge-pill bg-info-light">Completed</span>
																		<?php
																	}
																	?>
																	</td>
																	
																</tr>
																<?php $sr++; endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Billing Tab -->
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
</div>			
			<!-- /Page Content -->
			
			<!----reschedule --->
			<div class="modal fade" id="reschedule_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Reschedule Date</h5>
						</div>
						 
						<div class="modal-body">
							<div class="form-content p-2">
							<form  action="<?php echo base_url('welcome/reschedule_date')?>" method="post">
							<div class="form-group">
							<input type="hidden" name="hidden_appointment" id="appoint_id"/>
							<input type="hidden" name="hidden_member" id="member_id"/>
							<label for="time">Reschedule Date</label>
							<input type="date" name="reschedule_date" id="appointment_user_date"  class="form-control" required />
							<span class="text text-danger">
							<?php  echo validation_errors();?>
							</span>
							<input class="btn btn-primary mt-2" type="submit" name="Submit" value="Save"/>
							</div>
							</form >
							</div>
						</div>
					</div>
				</div>
			</div>
			<!----reschedule --->
			
			<!--reschedulehos---->
			
			<div class="modal fade" id="reschedule_hos_modal" aria-hidden="true" role="dialog"> 
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Reschedule Date</h5>
						</div>
						
						<div class="modal-body">
							<div class="form-content p-2">
							<form  action="<?php echo base_url('welcome/reschedule_hospital_date')?>" method="post">
							<div class="form-group">
							<input type="hidden" name="hidden_appointmentt" id="appointt_id"/>
							<input type="hidden" name="hidden_memberr" id="memberr_id"/>
							<label for="time">Reschedule Date</label>
							<input type="date" name="reschedule_date" id="appointment_user_hos"  class="form-control" required />
							<span class="text text-danger">
							<?php  echo validation_errors();?>
							</span>
							<input class="btn btn-primary mt-2" type="submit" name="Submit" value="Save"/>
							</div>
							</form >
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
			<script type="text/javascript">
			// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
						$('.read-more-content').addClass('hide_content')
						$('.read-more-show, .read-more-hide').removeClass('hide_content')

						// Set up the toggle effect:
						$('.read-more-show').on('click', function(e) {
						  $(this).next('.read-more-content').removeClass('hide_content');
						  $(this).addClass('hide_content');
						  e.preventDefault();
						});

						// Changes contributed by @diego-rzg
						$('.read-more-hide').on('click', function(e) {
						  var p = $(this).parent('.read-more-content');
						  p.addClass('hide_content');
						  p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
						  e.preventDefault();
						});
			</script> 
			

			
			