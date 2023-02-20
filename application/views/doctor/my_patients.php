
						<div class="col-md-7 col-lg-8 col-xl-9">
							 <div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
							
										<div class="card-body">
											
											<div class="table-responsive">
												<table   class="datatable table table-hover table-center mb-0" >
													<thead>
														<tr>
															<th>#</th>
															<th>Patient Name</th>
															<th>Address</th>
															<th>Mob No</th>
															<th>Email</th>
															<th>DOB</th>
															<th>Gender</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$sr = 1;
														foreach($memers as $row){
													?>
														<tr>
															<td><?php echo $sr ;?></td>
															<td>
															<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="#" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $row->name  ?></a>
														</h2>
														</td>
															<td><?php echo $row->address  ?> </td>
															<td><?php echo  $row->mobile_no  ?> </td>
															<td><?php echo $row->email ?> </td>
															<td> <?php echo $row->dob;  ?></td>
															<td> <?php  echo $row->gender?></td>
													
					
														</tr>
														<?php $sr++; }	?>
														
													</tbody>
												</table>
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
			
			
