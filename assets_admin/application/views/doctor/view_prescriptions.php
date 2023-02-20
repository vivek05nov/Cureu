
						<div class="col-md-7 col-lg-8 col-xl-9">
							 <div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
									<div class="card-header">
										<h4 class="card-title">Add Prescriptions</h4>
									</div>
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
										<div class="card-body">
											<form action="<?php echo base_url(); ?>doctors/add_prescriptions" method="post" enctype="multipart/form-data">
											<div class="row">
							<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment(3); ?>">
												<div class="col-lg-12">
													<div class="form-group">
														<label>File<span class="text-danger">*</span></label>
														<input type="file" class="form-control" name="file_name" >
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group">
														<label>Description <span class="text-danger">*</span></label>
														<textarea class="form-control" rows="7" name="desc"></textarea>
													</div>
												</div>
												
											</div>
											
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
											</div>
										</form>
										</div>
									</div>
								</div>
							 
							 
								<div class="col-md-12">
									<div class="card dash-card">'
									<div class="card-header">
										<h4 class="card-title">Prescriptions List</h4>
									</div>
										<div class="card-body">
											<div class="table-responsive">
												<table   class="datatable table table-hover table-center mb-0" >
													<thead>
														<tr>
															<th>#</th>
															<th>patient_id</th>
															<th>description</th>
															<th>file</th>
															<th>Created by</th>
															<!--th class="text-right">Actions</th-->
														</tr>
													</thead>
													<tbody>
													<?php $sr = 1; 
														foreach($prescriptions as $row){ ?>
														<tr>
															<td><?php echo $sr; ?></td>
															<td><?php echo $row->name; ?></td>
															<td>
																			
																			<div class="comment more">
																			<?php	if(strlen($row->description) > 50){
																				echo substr($row->description,0,50);    ?>
																				<span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
																				<span class="read-more-content"> <?php echo substr($row->description,50,strlen($row->description));  ?>
																				<span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
																			<?php } else {
																				echo $row->description; 
																				}
																				 ?>
																</td>
															<td><img src="<?php echo base_url()?>assets/img/prescriptions/<?php echo $row->file; ?>" style="width:50px; height:50px"></td>  
															<td> <?php echo  date("d M Y", strtotime("$row->created_at")) ?></td>
															<!--td class="text-right">
																<div class="actions">
																	<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																		<i class="fe fe-pencil"></i> Edit
																	</a>
																	<a  data-id="<?php echo $row->id; ?>" class=" delete btn btn-sm bg-danger-light "  >
																		<i class="fe fe-trash"></i> Delete
																	</a>
																</div>
															</td-->
														</tr>
													<?php $sr++; } ?>
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
			
			<script>
			$('.datatable').Datatable();
			
			
			</script>
			
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
