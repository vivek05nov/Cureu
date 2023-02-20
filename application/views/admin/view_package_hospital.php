  	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Package For Hospital</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Package</a></li>
									<li class="breadcrumb-item active">Package </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-5">
							<!-- General -->
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Package</h4>
									</div>
									<div class="card-body">
										<form action="<?php echo base_url(); ?>admin/add_package_hospital" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Package Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="name">
													</div>
												</div>
												<!--div class="col-lg-3">
													<div class="form-group">
														<label>Image<span class="text-danger">*</span></label>
														<input type="file" class="form-control" name="package_image" >
													</div>
												</div-->
											</div>
											
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
											</div>
										</form>
									</div>
								</div>
							<!-- /General -->
						</div>
						
						<div class="col-sm-7">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Package Name</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
												foreach($package_for_hospital as $row){ ?>
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
																	<form method="post" action="<?php echo base_url('admin/delete_package'); ?>">
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
		
		
		
<script>
$(document).ready(function(){
	$('#btn_submit').click(function(){
		$.ajax ({
			url:'<?php echo base_url("admin/delete");?>',
			type: 'POST',
			data:
			
		});
	});
	
});

$(document).off('click','#btn_submit').on('click','#btn_submit',function(){
       	  // var x = $('#add').serialize();
		  var form_element = document.querySelector("form");
          var x  = new FormData(form_element);
          $.ajax({
            url: '<?php echo base_url('Admin/add_banner');?>',
            type:'POST',
            data:x,
            contentType:false,
            processData:false,
            cache:false,
            dataType:'json',
            success:function(data){
              console.log(data);
              if(data.result == false)
              {
                //alert(data.message);
				if(data.file_name_error != '')
				{
				  $('#file_name_error').html(data.file_name_error);
				}
              }
              else{
				 alert('okk');
                 location.reload();
              }
            },
            error:function(xhr)
            {
              console.log(xhr.status+' '+xhr.statusText);
            }

          });
    });
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
  $(document).off('change','#m_d').on('change','#m_d',function(){
      alert('okkk');
      $('#m_s_d').val('');
  });
  $(document).off('change','#m_s_d').on('change','#m_s_d',function(){
      alert('okkk');
      $('#m_d').val('');
  });
</script>