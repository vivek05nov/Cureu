
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
                                                    <h3><?php echo count($total_appointment); ?></h3>
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
                                                    <h3><?php  echo count($today_appointment);?></h3>
                                                    <p class="text-muted">Till Today </p>
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
                                                    <h6>Appoinments</h6>
                                                    <h3><?php echo count($total_appointment) ?></h3>
                                                    <p class="text-muted">Till Today </p>
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
                                                                
                                                                <!--<th class="text-center">Paid Amount</th>-->
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $sr = 1; 
															foreach($upcoming_appointment as $upcoming){
																?>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/patients/patient.jpg" alt="User Image" onerror="this.onerror=null; this.src='<?php echo base_url() ?>assets/img/doctors/123.png'"></a>
                                                                        <a href="#"> <span><?php echo $upcoming->customer; ?></span></a>
                                                                    </h2>
                                                                </td>
                                                                <td> <span class="d-block text-info"><?php echo $upcoming->appointment_date ?></span></td>
                                                                <td><?php echo  $upcoming->service_name ?></td>
                                                                
                                                               <!-- <td class="text-center">₹150</td>--->
                                                                <td class="text-center">
                                                                    <div class="table-action">
                                                                        <!--a href="<?php echo base_url() ?>javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a-->
                                                                       <?php 
																	   if(($upcoming->status)==1)
																	   {
																		  ?>
																		<a href="<?php echo base_url() ?>hospital/accept/<?php echo $upcoming->id ?>" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>					
																		<a href="<?php echo base_url() ?>hospital/cancel/<?php echo $upcoming->id ?>" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
																	<?php 				
																	   }
																	   else if(($upcoming->status)==2)
																	   {
																	   ?>
                                                                        <a href="#" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accepted
                                                                        </a>
																		<?php 
																	   }
																		 else{ ?>
																		 <span class="btn btn-sm bg-danger-light">
																			Canceled
                                                                        </span>
																		<?php }
																		$sr++;
																		}
																		?>
                                                                    </div>
                                                                </td>
                                                            </tr>
															
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
                                                                
                                                                <!--<th class="text-center">Paid Amount</th>--->
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php $sr = 1; 
														foreach($today_appointment as $row){  ?>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="<?php echo base_url() ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url() ?>assets/img/patients/patient.jpg" alt="User Image" onerror="this.onerror=null; this.src='<?php echo base_url() ?>assets/img/doctors/123.png'"></a>
                                                                        <a href="<?php echo base_url() ?>"><?php echo $row->customer ?> <span></span></a>
                                                                    </h2>
                                                                </td> 
                                                                <td> <span class="d-block text-info"><?php  echo $row->appointment_date?></span></td>
                                                                <td><?php echo $row->specialities; ?></td>
                                                                
                                                                <!--<td class="text-center">$15000</td>--->
                                                                <td class="text-center">
                                                                    <div class="table-action">
                                                                        <!--a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a-->
                                                                        
                                                                       <?php 
																	   if($row->status==1)
																	   {
																		  ?>
																		<a href="<?php echo base_url() ?>hospital/accept/<?php echo $row->id ?>" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>					
																		<a href="<?php echo base_url() ?>hospital/cancel/<?php echo $row->id ?>" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
																	<?php 				
																	   }
																	   else if($row->status==2)
																	   {
																	   ?>
                                                                        <a href="#" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accepted
                                                                        </a>
																		<?php 
																	   }
																		 else{ ?>
																		 <span class="btn btn-sm bg-danger-light">
																			Canceled
                                                                        </span>
																		<?php }
																		$sr++;
																		}
																		?>
                                                                    </div>
                                                                </td>
                                                            </tr>
															
                                                           
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
    <!-- /Page Content -->
