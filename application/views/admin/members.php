
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index') ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Patient</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
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
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Sr No.</th>
													<th>Patient Id</th>
													<th>Patient Name</th>
													<th>Email</th>
													<th>Address</th>
													<th>Phone</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php $sr=1;
												foreach($patient as $row):
												?>
												<tr>
													<td><?php echo $sr;?></td>
													<td><?php echo $row->user_id ;?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $row->image ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>
															<a href="#"><?php echo $row->name ?> </a>
														</h2>
													</td>
													<td><?php echo $row->email ;?></td> 
													<td><?php echo $row->address; ?></td>
													<td><?php echo $row->mobile_no; ?></td>
													<?php if($row->status=='1'){ ?>
													<td>
													<div class="actions">
															
															
															<a data-id="<?php  echo $row->id?>" class="  activate  btn btn-sm bg-danger-light ">
																<i class="fe fe-trash"></i> Deactivate
															</a>
															<a data-id="<?php  echo $row->id?>" class=" modals  btn btn-sm bg-info-light">
																<i class="fe fe-eye"></i> 
															</a>
													</div>
													</td>
													<?php }else if($row->status=='0'){ ?>
													<td>
													<div class="actions">
															<a data-id="<?php  echo $row->id?>" class=" delete  btn btn-sm bg-success-light ">
																<i class="fe fe-trash"></i> Activate
															</a>
															<a data-id="<?php  echo $row->id?>" class=" modals  btn btn-sm bg-info-light">
																<i class="fe fe-eye"></i> 
															</a>
													</div>
													</td>
													
													<?php }?>
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
			<!-- /Page Wrapper -->
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
																	<form method="post" action="<?php echo base_url('admin/delete_patient'); ?>">
																	 <input type="hidden" id="del_id" name="del" value=''>
																		<h4 class="modal-title" >Deactivate</h4>
																		<p class="mb-4">Are you sure want to Deactivate?</p>
																		<input type="submit" value="Ok" class="btn btn-primary" name="submit">
																		
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--start--->
													<div class="modal fade" id="activate" aria-hidden="true" role="dialog">
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
																	<form method="post" action="<?php echo base_url('admin/activate_patient'); ?>">
																	 <input type="hidden" id="del_idd" name="del" value=''>
																		<h4 class="modal-title" >Activate</h4> 
																		<p class="mb-4">Are you sure want to Activate?</p>
																		<input type="submit" value="Ok" class="btn btn-primary" name="submit">
																		
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--ensd--->
													
													
       
	   
									<div class="modal fade" id="show_profile" aria-hidden="true" role="dialog">
														<div class="modal-dialog  modal-dialog-centered" role="document" style="width:1200px !important; margin:70px !important">
															<div class="modal-content" style="width:1200px !important; margin-left:0px !important">
																<div class="modal-header" style="width:1200px !important; margin-left:0px !important">
																	<h5 class="modal-title">View Profile</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body" id="view_profile" style="width:1200px !important; margin-left:0px !important">
																	
																					

																	</div>

																</div>
															</div>
														</div>
													