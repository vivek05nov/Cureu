  	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Enquiry</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Enquiry</a></li>
									<li class="breadcrumb-item active">Enquiry  </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
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
					<div class="row">
						<!--<div class="col-5">
							<!-- General -->
								<!--<div class="card">
									<div class="card-header">
										<h4 class="card-title">General</h4>
									</div>
									<div class="card-body">
										<?php// echo form_open_multipart('admin/add_blog');?>
									
											<div class="form-group">
												<label>Blog Title</label>
												<input type="text" class="form-control" name="blog_name">
											</div>
											<div class="form-group">
												<label>Blog Logo</label>
												<input type="file" class="form-control" name="blog_image">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<div class="form-group">
												<label>Description</label>
												<input type="textarea" class="form-control" name="blog_description">
											</div>
											
											<div class="form-group">
												
												<?php// echo  form_submit(['type'=>'submit','value'=>'Submit','class'=>'btn btn-primary']);?>
											</div>
											
										</form>
									</div>
								</div>
							<!-- /General 
						</div>-->
						
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile Number</th>
													
													<th>Country</th>
													<th>Message</th>
													<th>Date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($enquiries as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td><?php echo $row->name; ?></td>
													
														
															<td><?php echo $row->email; ?></td>
													
													<td>
													<?php echo  $row->phone;?>
													</td>
													
													<td>
													<?php echo  $row->country;?>
													</td>
													<td>
													<?php echo  wordwrap($row->message,40,"<br>\n");?>
													</td>
													<td>
													<?php echo  date('d-m-Y',strtotime($row->created_at));?>  
													</td>
												
													<td class="text-right">
														<div class="actions">
															
															<a data-id="<?php echo  $row->id;  ?>" data-toggle="modal" href="#delete_modal" class="delete btn btn-sm bg-danger-light">
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
																	<form method="post" action="<?php echo base_url('admin/delete_enquiry'); ?>">
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
      