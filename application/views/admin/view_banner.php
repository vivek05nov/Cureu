  	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Banner</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Banner</a></li>
									<li class="breadcrumb-item active">Banner</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-6">
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
										<form action="add_banner" method="post" enctype="multipart/form-data">
									
											<div class="form-group">
												<label>Banner Name</label>
												<input type="text" name="banner_name" class="form-control">
											</div>
											<div class="form-group">
												<label>Banner Type</label>
												<select  name="banner_type" class="form-control">
<												<option value="-1">Select One</option>
												<option value="Home">Home</option>
												<option value="Consult"> Consult</option>
												<option value="Treatment">Treatment</option>
												</select>
											</div>
											<div class="form-group">
												<label>Banner Logo</label>
												<input type="file" name="banner_image" class="form-control"/> 
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<input  class="btn btn-primary" type="submit" name="submit" value="Submit"/>
											
										</form>
									</div>
								</div>
							<!-- /General -->
						</div>
						
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Banner</th>
													<th>Banner Type</th>
													
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($banner as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
																<img class="avatar-img" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $row->image ?>" alt="Banner">
															</a>
														</h2>
													</td>
													<td><?php echo $row->banner_type ?></td>
												
													<td class="text-right">
														<div class="actions">
															
															<a  data-id="<?php echo $row->id; ?>" class=" delete btn btn-sm bg-danger-light "  >
																<i class="fe fe-trash"></i> Delete
															</a>
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
		
      