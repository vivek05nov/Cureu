<?php 
//echo"<pre>";
//print_r($gallery);die;
?>
						<div class="col-md-7 col-lg-8 col-xl-9">
							 <div class="row form-row">
							 <div class="col-md-12">
							 
										</div>
								<div class="col-md-12">
									<div class="card dash-card">
										
							<!-- Basic Information -->
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
										<div class="card-body">
											<div class="form-group">
												<div class="change-avatar">
													<form method="post" action="<?php echo base_url('doctors/add_gallery') ?>" enctype="multipart/form-data">
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Select Image</span>
															<input type="file" class="upload" name="gallery_photo">
															
															
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
													<input class="btn btn-primary btn-sm mt-3" type="submit" name="submit" value="Upload Image">
													</form >
												</div>
											</div>
											  <div class="table-responsive">
												<table   class="datatable table table-hover table-center mb-0" >
													<thead>
														<tr>
															<th>#</th>
															<th>Image</th>
															<th> Action</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$sr=1;
														foreach($gallery as $row):
														?>
														<tr>
															<td><?php echo $sr; ?></td>
															<td>
															<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo base_url();?>assets/doctor/gallery/<?php echo $row->gallery_photo;?>" alt="User Image" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'"></a>
															<a href="#"></a>
															</h2>
															</td>
															<td>
														<div class="actions">
															
															<a  data-id="<?php echo $row->id ?>" class=" delete btn btn-sm bg-danger-light "  >
																<i class="fe fe-trash" ></i> Delete
															</a>
															
															
															
															
															<!-- Button trigger modal -->
															</div>
													
														</td>
														
															
					
														</tr>
														<?php $sr++; endforeach; ?>
														
														
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
		</div>			
			<!-- /Page Content -->
			<!-- /Delete modal -->
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
							<form method="post" action="<?php echo base_url('doctors/delete_gallery'); ?>">
							 <input type="hidden" id="del_id" name="del" value=''>
								<h4 class="modal-title" >Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<input type="submit" value="Ok" class="btn btn-primary" name="submit">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
