
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card dash-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar1">
                                                    <div class="circle-graph1" data-percent="75">
                                                        <img src="<?php echo base_url() ?>assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Total Patient</h6>
                                                    <h3><?php echo $total_members->members; ?></h3>
                                                    <p class="text-muted">Till Today</p>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar2">
                                                    <div class="circle-graph2" data-percent="65">
                                                        <img src="<?php echo base_url() ?>assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Today Patient</h6>
                                                    <h3><?php echo count($today_appointment); ?></h3>
                                                    <p class="text-muted"><?php echo date('d'); ?>, <?php echo date('M'); ?> <?php echo date('Y'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget">
                                                <div class="circle-bar circle-bar3">
                                                    <div class="circle-graph3" data-percent="50">
                                                        <img src="<?php echo base_url() ?>assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Appoinments</h6>
                                                    <h3><?php echo count($appointment1); ?></h3>
                                                    <p class="text-muted"><?php echo date('d'); ?>, <?php echo date('M'); ?> <?php echo date('Y'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Patient Appoinment</h4>
                            <div class="appointment-tab">
                            
                                <!-- Appointment Tab -->
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                    </li> 
                                </ul>
                                <!-- /Appointment Tab -->
                                
                                <div class="tab-content">
                                
                                    <!-- Upcoming Appointment Tab -->
                                    <div class="tab-pane show active" id="upcoming-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
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
													<strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<?php } ?>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Patient Name</th>
                                                                <th>Appointment Date</th>
                                                                <th>Purpose</th>
                                                               
                                                                <th class="text-center">Paid Amount</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $sr = 1;
														
														foreach($upcoming_appointment as $row){ ?>
														
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="#" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
                                                                        <a href="#"><?php echo $row->customer ?> </a>
                                                                    </h2>
                                                                </td>
                                                                <td><?php echo $row->appointment_date; ?> <span class="d-block text-info"><?php echo $row->appointment_time; ?></span></td>
                                                                <td><?php echo $row->specialities; ?></td>
                                                                
																<?php $data=$this->db->query('SELECT doctors.fee as fee from doctors
																								join appointment on appointment.doctor_id=doctors.id
																								where appointment.doctor_id="'.$this->session->userdata("userid").'"')->row(); ?>
                                                                <td class="text-center">₹<?php  echo $data->fee ?></td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <!--a href="<?php echo base_url() ?>javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a-->
                                                                        <?php if(($row->status == 1)){ ?>
                                                                        <a href="javascript:(0);" id="accepted" class="btn btn-sm bg-success-light" data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member; ?>">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
																		<a href="<?php echo base_url() ?>doctors/cancel/<?php echo $row->id ?>" class="btn btn-sm bg-danger-light" >
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
																		<a href="javascript:(0);" id="reschedule" data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member ?>" data-appointment="<?php echo $row->appointment_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($row->appointment_date. ' + 7 days'));?>"><span class="btn btn-sm bg-primary-light">  
																			Reschedule  
                                                                        </span></a>
																		<?php }
																		else  if($row->status==2)
																		
																		{ ?>
																		 <span class="btn btn-sm bg-success-light">
																			Accepted
                                                                        </span>
																		<a href="javascript:(0);" id="reschedule" data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member ?>" data-appointment="<?php echo $row->appointment_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($row->appointment_date. ' + 7 days'));?>"><span class="btn btn-sm bg-primary-light">
																			Reschedule 
                                                                        </span></a>
																		
																		<?php } 
																		else if($row->status==0){ ?> 
																		 <span class="btn btn-sm bg-danger-light">
																			Cancelled
                                                                        </span>
																		<?php }
																			else{  
																				?>
																				 <span class="btn btn-sm bg-info-light">
																			Completed
                                                                        </span>
																				<?php
																			}
																			?>
                                                                    </div>
                                                                </td>
                                                            </tr>
															<?php $sr++; } ?>
                                                        </tbody>
                                                    </table>		
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Upcoming Appointment Tab -->
                               
                                    <!-- Today Appointment Tab -->
                                    <div class="tab-pane" id="today-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Patient Name</th>
                                                                <th>Appt Date</th>
                                                                <th>Purpose</th>
                                                                
                                                                <th class="text-center">Paid Amount</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php $sr = 1; 
														
														foreach($today_appointment as $row){ ?>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/patients/patient.jpg" alt="User Image" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'"></a>
                                                                        <a href="#"><?php echo $row->customer ?> </a>
                                                                    </h2>
                                                                </td>
                                                                <td><?php echo $row->appointment_date; ?> <span class="d-block text-info"><?php echo $row->appointment_time ?></span></td>
                                                                <td><?php echo $row->specialities ?></td>  
                                                                
																
																<?php $data=$this->db->query('SELECT doctors.fee as fee from doctors
																								join appointment on appointment.doctor_id=doctors.id
																								where appointment.doctor_id="'.$this->session->userdata("userid").'"')->row(); ?>
                                                                <td class="text-center"><?php  echo $data->fee; ?></td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <!--a href="<?php echo base_url() ?>javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a-->
                                                                       
                                                                        <?php if(($row->status == 1)){ ?>
                                                                        <a href="javascript:(0);" id="accepted" class="btn btn-sm bg-success-light"  data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member; ?>">  
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
																		<a href="<?php echo base_url() ?>doctors/cancel/<?php echo $row->id ?>" class="btn btn-sm bg-danger-light" >
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
																		<a href="javascript:(0);" id="reschedule" data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member ?>" data-appointment="<?php echo $row->appointment_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($row->appointment_date. ' + 7 days'));?>"><span class="btn btn-sm bg-primary-light">
																			Reschedule 
                                                                        </span></a>
																		<?php }
																		else  if($row->status==2)
																		
																		{ ?>
																		 <span class="btn btn-sm bg-success-light">
																			Accepted
                                                                        </span>
																		<a href="javascript:(0);" id="reschedule" data-id="<?php echo $row->id ?>" data-member="<?php echo $row->member ?>" data-appointment="<?php echo $row->appointment_date ?>" data-userdate="<?php echo  date('Y-m-d', strtotime($row->appointment_date. ' + 7 days'));?>"><span class="btn btn-sm bg-primary-light">
																			Reschedule 
                                                                        </span></a>
																		
																		<?php }
																		else if($row->status==0){ ?> 
																		 <span class="btn btn-sm bg-danger-light">
																			Cancelled
                                                                        </span>
																		<?php }
																			else{
																				?>
																				 <span class="btn btn-sm bg-info-light">
																			Completed
                                                                        </span>
																				<?php
																			}
																			?>
                                                                    </div>
                                                                </td>
                                                            </tr>
															<?php $sr++; } ?>
                                                           
                                                        </tbody>
                                                    </table>		
                                                </div>	
                                            </div>	
                                        </div>	
                                    </div>
                                    <!-- /Today Appointment Tab -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>	
</div>	
    <!-- /Page Content -->
	
	<!---modal--->
	<div class="modal fade" id="date_time" aria-hidden="true" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document" >
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Appoinment Time</h5>
									</div>
									
									<div class="modal-body">
										<div class="form-content p-2">
										<form  action="<?php echo base_url('doctors/appointment_time') ?>" method="post">
										<div class="form-group">
										<input type="hidden" name="hidden_id" id="appointment_id"/>
										<input type="hidden" name="hidden_member" id="user_id"/>
										<label for="time">Appoinment Time</label>
										<input type="time" name="time"  class="form-control" required />
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

	
	<!---modal--->
	<!--reschedule-->
	<div class="modal fade" id="reschedule_modal" aria-hidden="true" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document" >
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Reschedule Date</h5>
									</div>
									
									<div class="modal-body">
										<div class="form-content p-2">
										<form  action="<?php echo base_url('doctors/reschedule_date')?>" method="post">
										<div class="form-group">
										<input type="hidden" name="hidden_appointment" id="appoint_id"/>
										<input type="hidden" name="hidden_member" id="member_id"/>
										<label for="time">Reschedule Date</label>
										<input type="date" name="reschedule_date" id="appointment_user_date" value="<?php echo $row->appointment_date ?>"  class="form-control" required /> 
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
	<!--reschedule-->
