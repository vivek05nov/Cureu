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
								<h3 class="page-title">City</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">City</a></li>
									<li class="breadcrumb-item active">City</li>
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
										<h4 class="card-title">Add City</h4>
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
										<form action="<?php echo base_url(); ?>Admin/add_city" method="post">
											<div class="form-group">
												<label>Select Country</label>
												<?php
												$country=$this->db->get('countries')->result();	
												?>
												<?php if(!empty($country)): ?>
												<select type="text" name="country"  class="form-control">
												<option disabled value="-1"> Select Country</option>
												<?php foreach($country as $row): ?>
												<option value="<?php echo $row->id; ?>"  required><?php echo $row->name; ?></option>
												<?php endforeach; ?>
												</select>
												<?php endif; ?>
											</div> 
											
											<div class="form-group">
												<label>City </label>

												<input type="text" name="city" id="city" class="form-control" >
												<span id="span" style="color:red"></span>
											</div> 
										
										
											<button id="submit" type="submit" class="btn btn-primary float-right mt-2">Submit</button>
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
													<th>Country</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php 
												if(!empty($cities)){
													 
													$sr = 1; 
												foreach($cities as $row){ ?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td><?php echo $row->name; ?></td>
												
													<td class="text-right">
														<div class="actions">
															
															<a  data-id="<?php echo $row->id; ?>" class=" delete btn btn-sm bg-danger-light "  >
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
											<?php $sr++; }
											}	
											
											?>
												
													
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
																	<form method="post" action="<?php echo base_url('admin/delete_cities'); ?>">
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
		<script>
		
	
		$('#city').keyup(function(){ 
		count=$('#city').val();
		
		 $.ajax({url: "<?php echo base_url() ?>admin/check_city", 
				 method:"post",
				 data:{city:count},	
				 success: function(result){
					if(result!=' ')
					{
						$( "#submit" ).prop( "disabled", true );
						$("#span").html(result);
					}
					else
						{
							$( "#submit" ).prop( "disabled", false );
							$("#span").html(result);
						}
			//$("#div1").html(result);
				}});
						
			
			
		});
		
		
		
		
		
		</script>
      