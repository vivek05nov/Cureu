  	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Testimonials</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Testimonials</a></li>
									<li class="breadcrumb-item active">Testimonials</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-12">
							<!-- General -->
								<div class="card">
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
								 <?php echo $this->session->flashdata('warning'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<?php } ?>
									<div class="card-header">
										<h4 class="card-title">General</h4>
									</div>
									<div class="card-body">
										<form action="<?php echo base_url('admin/feedback'); ?>" method="post" enctype="multipart/form-data">
									
											<div class="form-group">
												<label>Name</label>
												<input type="text" name="name" class="form-control" required="">
											</div>
											<div class="form-group">
												<label>Image</label>
												<input type="file" name="image" class="form-control" required="" /> 
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<div class="form-group">
												<label>Feedback</label>
												<textarea class="form-control" name="feedback" required="" style="height: 150px;"></textarea>
											</div>
											<input  class="btn btn-primary" type="submit" name="submit" value="Submit"/>
											
										</form>
									</div>
								</div>
							<!-- /General -->
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
					<!-- Delete Modal -->
													<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
														<div class="modal-dialog modal-dialog-centered" role="document" >
															<div class="modal-content">
															<!--	<div class="modal-header">
																	<h5 class="modal-title">Delete</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>-->
																<div class="modal-body">
																	<div class="form-content p-2">
																	<form method="post" action="<?php echo base_url('admin/delete_banner'); ?>">
																	 <input type="hidden" id="del_id" name="del" value=''>
																		<h4 class="modal-title" >Delete</h4>
																		<p class="mb-4">Are you sure want to delete?</p>
																		<input type="submit" value="Save" class="btn btn-primary" name="submit">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<!-- /Delete Modal -->		
		
      