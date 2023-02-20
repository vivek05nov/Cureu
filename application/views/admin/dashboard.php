

 			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $total_doctors->doctor; ?></h3> 
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Doctors</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $total_members->members; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Patients</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo count($appointment1); ?></h3> 
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>Rs. <?php echo $total_revenue->revenue; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fa fa-medkit"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $total_treatment->appointment; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Treatments</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fa fa-hospital-o"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $total_hospital->hospital; ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Hospitals</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
						<!--<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3><?php //echo $total_appointment->appointment; ?></h3> 
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>$62523</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>-->
					<!--div class="row" style="width:100%;">
						<div class="col-md-12 col-lg-6">
						
							
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							
							
						</div>	
					</div>-->
					<!--<div class="row">
						<div class="col-md-12 col-lg-6">
						
							
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
						
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							 /Invoice Chart 
							
						</div>	
					</div>-->
					
					<div class="row">
						<div class="col-md-6"> 
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Doctors List</h4>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													
												</tr>
											</thead>
											<tbody>
											<?php
												foreach($doctors_list as $doctor):

											?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/doctors/<?php echo $doctor->image;?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $doctor->name; ?></a>
														</h2>
													</td>   
													<?php 
													$s_name = '';
													 $special=$this->db->query('SELECT specialities.service_name,specialities.image as specialities_img from `doctor_specialities`
													join specialities on specialities.id=doctor_specialities.specialites_id  
													WHERE doctor_specialities.doctor_id ='.$doctor->id.'' )->result(); 
													foreach($special as $s){
														$s_name .= $s->service_name.',';
													}
													?>
													<td><?php echo substr($s_name,0,-1); ?></td>
													
													<?php /*<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
													</td>*/?>
												</tr>
												<?php endforeach;?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Last Visit</th>
																										
												</tr>
											</thead> 
											<tbody>
											<?php foreach($patient_list as $patient):?>
											
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/patients/<?php echo $patient->image;?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $patient->name;?> </a>
														</h2>
													</td>
													<td><?php echo $patient->mobile_no?></td>
													<td><?php echo date("Y-m-d",strtotime($patient->created_at)); ?></td>
													
												</tr>
												<?php endforeach;
												?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					
						<div class="row">
						<div class="col-md-6"> 
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Contact Details list</h4>
								</div>
								<div class="card-body">
								
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile Number</th>
													<th>Date</th>
												
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($contact_details as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td><?php echo $row->name; ?></td>
													
														
															<td><?php echo $row->Email; ?></td>
													
													<td>
													<?php echo  $row->Mob_no;?>
													</td>
													<?php 
													$orderdate=$row->created_at;
													$orderdate = explode(' ', $orderdate);
													
													?>
													<td>
													<?php echo $orderdate[0];?>
													</td>
													
												</tr>
											<?php $sr++; } ?>
												
													
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Transations</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Name</th>
													<th>Email</th>
													<th>Payment_id</th>
													<th>Amount</th>													
												</tr>
											</thead> 
											<tbody>
											<?php foreach($transation as $transation_data):?> 
											
												<tr>
													<td>
														<?php echo $transation_data->name;?>
													</td>
													<td><?php echo $transation_data->email?></td>
													<td><?php echo $transation_data->payment_id?></td>
													<td class="text-right">Rs. <?php echo $transation_data->amount?></td>
												</tr>
												<?php endforeach;
												?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
									<div class="card-header">
										<h4 class="card-title">Appointment List</h4>
									</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
											
											foreach($appointment1 as $appointment):?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/doctors/<?php echo $appointment->image;?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'"  alt="User Image"></a>
															<a href="#"><?php echo $appointment->doctor;?></a>
														</h2>
													</td>
													<td><?php echo $appointment->specialities; ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/patients/patient1.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $appointment->customer;?> </a>
														</h2>
													</td>
													<td><?php echo $appointment->appointment_date;?></td>
													
													<td class="text-right">
														Rs. <?php echo $appointment->doctor_fee;?>
													</td>
												</tr>
												<?php 
												endforeach;
												?>
												
											</tbody>
											
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
					