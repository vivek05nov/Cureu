<?$this->db->order_by("id", "desc");?>
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header  datatable-->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
												    <th>Appointments Id</th>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Date</th>
													<th>Contact</th>
													<th>Process</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
											
											foreach($appointment as $row){ ?>
												<tr>
												<td><?php echo $row->appointment_id  ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url(); ?>../assets/img/doctors/<?php echo $row->doctor_img; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $row->doctor ?></a>
														</h2>
													</td>
													<td><?php echo $row->specialities ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url(); ?>../assets/img/patients/<?php echo $row->patient_img; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $row->customer ?> </a>
														</h2>
													</td>
													<td><?php echo  $row->appointment_date; ?> &nbsp;&nbsp;<span class="text-primary d-block"><?php echo $row->appointment_time ?></span></td>
													<td><?php echo $row->contact; ?></td>
													<td>
													<?php 
																	if(($row->status)=='1'){
																	?>
																	<span class="badge badge-pill bg-warning-light">Pending</span>
																	<?php 
																	}
																	else if(($row->status)=='2')
																	{?>
																		<span class="badge badge-pill bg-success-light">Confirmed</span>
																	<?php 
																	}
																	else if($row->status=='0')
																	{?>
																		<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<?php 
																	}
																	else{
																		?>
																		<span class="badge badge-pill bg-info-light">Completed</span>
																		<?php
																	}
																	?>
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
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
       