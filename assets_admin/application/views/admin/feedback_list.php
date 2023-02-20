  	
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
						
						
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Sr No.</th>
													<th>Name</th>
													<th>Image</th>
													<th>Feedback</th>
													
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($all_feedback_list as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													
													<td><?php echo $row->name ?></td>

													<td> 
                             <?php if(!empty($row->image)){ ?>
                                    <img src="<?php echo base_url().$row->image; ?>" style="width:40px;height:40px;border-radius: 40px;object-fit: fill;" />
                                <?php }else{ ?>
                                    <img src="<?php echo base_url(); ?>uploads/product_default.jpg" style="width:40px;height:40px;border-radius: 40px;object-fit: fill;" />
                                <?php } ?></td>
												
													<td><?php echo $row->feedback ?></td>

													<td class="text-right">
														<div class="actions">
															
															<a href="<?php echo base_url(); ?>admin/delete_feedback/<?php echo $row->id; ?>" data-value="<?php echo $row->id; ?>"  class="btn btn-danger" ><i class="far fa-trash-alt"></i></a>
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
		
      