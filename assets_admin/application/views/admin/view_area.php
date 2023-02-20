  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Area</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Area</a></li>
									<li class="breadcrumb-item active">Area</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-6">
							<!-- General -->
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Area</h4>
									</div>
									<div class="card-body">
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
										<form action="<?php echo base_url(); ?>Admin/add_area" method="post">
											<div class="form-group">
												<label>City</label>

												<select class="form-control js-example-tags" name="city" id="city">
													<option selected="selected" value="-1"> -  Select City  -</option>
													<?php   foreach($cities->result() as $row){ ?>
														<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
													<?php }  ?>
												</select>
											</div> 
										
											<div class="form-group">
												<label>Area Name</label>
												<input type="text" name="area_name" class="form-control">
												<?php  echo form_error('area_name'); ?>
											</div>
											<button type="submit" class="btn btn-primary float-right mt-2">Submit</button>
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
													<th>Area</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($area as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td><?php echo $row->name; ?></td>
												
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
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
																	<form method="post" action="<?php echo base_url('admin/delete_area'); ?>">
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
		
			
			<script>
			$(".js-example-tags").select2({
			  tags: true
			});
			</script>
		
      