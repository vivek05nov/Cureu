
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Specialities</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details12" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
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
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Specialities</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											if($specialities):
											$sr = 1; 
											foreach($specialities as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
																<img class="avatar-img"  src="<?php echo base_url(); ?>assets/img/specialities/<?php echo $row->image ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" alt="Speciality">
															</a>
															<a href="#" ><?php echo $row->service_name ?></a>
														</h2>
													</td>
												
													<td class="text-right">
														<div class="actions">
															<a data-image="<?php echo base_url(); ?>assets/img/specialities/<?php echo $row->image ?>"" data-name="<?php echo $row->service_name ?>" class="btn btn-sm bg-success-light" data-toggle="modal" id="edit_special" data-id="<?php echo $row->id;?>" href="#">
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
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details12" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Specialities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo  base_url('admin/add_special') ?>" enctype="multipart/form-data">
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" name="special_name" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file" name="special_img"  class="form-control">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Specialities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url('admin/edit_special'); ?>" enctype="multipart/form-data">
								<div class="row form-row">
								<input type="hidden" name="edit_special" id="edit_special_id" value="">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" class="form-control" id="special_name" name="special_name" value="">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<img style="margin-left:20px;margin-top:20px;width:100px; height:100px" id="image_view" src="">
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file"  class="form-control" name="special_img">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
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
																	<form method="post" action="<?php echo base_url('admin/delete_viewspecialities'); ?>">
																	 <input type="hidden" id="del_id" name="del" value=''>
																		<h4 class="modal-title" >Delete</h4>
																		<p class="mb-4">Are you sure want to delete?</p>
																		<input type="submit" value="Ok" class="btn btn-primary" name="submit">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<!-- /Delete Modal -->	
												
												
												<?php endif; ?>
    