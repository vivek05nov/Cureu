
<link type="image/x-icon" href="<?php echo base_url() ?>assets_admin/img/logo-small.png" rel="icon">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/all.min.css">
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fancybox/jquery.fancybox.min.css">
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.min.css">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css">
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/fullcalendar.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
<!---end css\ -->
<!--extra script>-->
<!-- /Footer -->
		<!--<script src="<?php// echo base_url() ?>assets/js/jquery.min.js"></script>-->
		
		<!-- Bootstrap Core JS -->
		<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<!-- Datetimepicker JS -->
		<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Full Calendar JS -->
        <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		<!-- Sticky Sidebar JS -->
        <script src="<?php echo base_url() ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		<!-- Select2 JS -->
		<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
			<!-- Fancybox JS -->
			<script src="<?php echo base_url() ?>assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		<!-- Dropzone JS -->
		<script src="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="<?php echo base_url() ?>assets/js/profile-settings.js"></script>
		<!-- Circle Progress JS -->
		<script src="<?php echo base_url() ?>assets/js/circle-progress.min.js"></script>
		<!-- Slick JS -->
		<script src="<?php echo base_url() ?>assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<!----extra script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 


<div class="col-md-7 col-lg-8 col-xl-9">
							
								
								
							<div class="row">
							<div class="col-md-12">
								<div class="card">
								
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
									<h4 class="card-title">EHR Send Doctor</h4>
									<div class="hotels-info">
									<form method="POST" enctype='multipart/form-data' action="<?php echo base_url('welcome/add_ehr'); ?>"> 
									
									<div>
										<input type="submit" class="btn btn-info" value="Submit" name="submit">
									</div><br>
									<div class="form-group">
												<label>Select Doctor</label>
												<select  name="doctor_id" class="form-control">
												<?php foreach($doc_name as $drow): ?>
												<option value="<?php echo $drow->id; ?>"><?php echo $drow->name; ?></option>
												<?php endforeach; ?>
												</select>
									</div>
									<div class="row form-row hotels-cont">
										<div class="row form-row">
										<div id="field_wrapper1">
										<a href="javascript:void(0);"  id="add_button1" title="Add field"><i class="fa fa-plus"></i></a>
											<div class="row">
											<div class="col-md-6">
											<div class="form-group">
												<label>EHR</label>
												<input type="text" name="ehr_name[]" value="" class="form-control">
											</div>
											</div>
										
										
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="col-md-6">
											<div class="form-group">
												<label>EHR File</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i>EHR Image</span>
													<input type="file" class="upload " name="image_name[]"   >
												</div><br/></br>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
											</div>
											</div>
											
											</div>
											
										</div>
										</div>
									</div>
										
									</div>
								
									</form>
								</div>
								
								</div>
								</div>
							</div>
				
							
							</div>
						
									
            <!-- /Page Content -->
			
						<div class="col-md-12">
								<div class="card">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											
											<tbody>
												<h4 class="text-center">List OF EHR</h4>
											    <th>EHR Details</th>
												<th>EHR Download</th> 
												<tr>
												<?php 
																		
																		
  												foreach( $ehr_data as $row) {   
														$image_doc =  json_decode($row->image); 
														$ehr_name =  json_decode($row->ehr_name); 
														echo '<td>';
														foreach($ehr_name as $v)
														{
															
															    echo $v.'</br>';
																
														}
														echo '</td>';
														echo '<td>';
														foreach($image_doc->file_name as $v)
														{ ?>
															<a href="<?=base_url ()?>welcome/download/<?php echo $v ?>" class="btn btn-sm"  >
																<i class="fa fa-download"></i>
															</a></br>
												  <?php } echo '</td>&nbsp;';
														
													
												
											 ?>  
														
												</tr>
											
														
													
												<?php }   ?>
													
											</tbody>
										</table>
									</div>
								</div>
							</div>
			
			
</div>

</div>
				</div>

			</div>		
            <!-- /Page Content -->
</div>

<script type="text/javascript">
			$(document).ready(function(){
				///
				
				////
			  var maxField = 20; //Input fields increment limitation
			  var addButton = $('.add_button'); //Add button selector
			  var wrapper = $('.field_wrapper'); //Input field wrapper
			  
			  var x = 1; //Initial field counter is 1
			  var fieldHTML = '<div class="row"><div class="col-md-4"><div class="form-group"><select class="form-control specialities_name1"  name="field_name[]" ><option>Select One</option></select></div></div><div class="col-md-4"><div class="form-group"><input  class="form-control "type="text" placeholder="Enter your Doctor" name="special_name[]" value=""/></div></div><div class="col-md-3"><div class="form-group "><div class="upload-img">  <div class="change-photo-btn" style="float:left;"><span><i class="fa fa-upload"></i> Gallery Images</span><input type="file" class="upload" name="doctor_img[]" ></div><br/></br><small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small></div></div></div><a href="javascript:void(0);" class="remove_button pl-2">Remove</a></div>'; 
			  //Once add button is clicked
			  $(addButton).click(function(){
				//Check maximum number of input fields
				if(x < maxField){
				  x++; //Increment field counter
				  $(wrapper).append(fieldHTML); //Add field html
				}
			  });
			  //Once remove button is clicked
			  $(wrapper).on('click', '.remove_button', function(e){
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html 
				x--; //Decrement field counter
			  });
			  
			  ///
			  $('#specialities_name').on('click',function(){
								
								$.ajax({
									method:"POST",
									
									url:"<?php echo base_url(); ?>admin/get_specialities",
									
									dataType:"json",
									success:function(data){ 
										 $(".specialities_name1").empty();
							$(".specialities_name1").append("<option value=-1> ~~ Select Specialization ~~</option>");
							$.each(data,function(i,item)
							{
								$(".specialities_name1").append("<option value="+item.id+">"+item.service_name+"</option>");
							});
						}
					});
				
				});
				///hotel 
				$('#add_button1').click(function(){
				var maxField = 20; //Input fields increment limitation
		//	  var addButton1 = $('#add_button1'); //Add button selector
			 // var wrapper1 = $('#field_wrapper1'); //Input field wrapper
			  var fieldHTML = '<div class="row"><div class="col-md-6"><div class="form-group"><label>EHR</label><input class="form-control "  name="ehr_name[]" /></div></div><div class="col-md-4"><div class="form-group"><label>EHR File</label><div class="upload-img">  <div class="change-photo-btn" style="float:left;"><span><i class="fa fa-upload"></i> EHR File</span><input type="file" class="upload " name="image_name[]" multiple="mutliple"  ></div></div></div><div style="clear:both"></div></div><a href="javascript:void(0);" class="remove_button float-left  " style="padding-left:50px"><i class="fas fa-times"></i></a></div>';   
			  var x = 1; //Initial field counter is 1
			  //Once add button is clicked
			 
				 
				  $('#field_wrapper1').append(fieldHTML); //Add field html
				
			  });
			  //Once remove button is clicked
			  $('#field_wrapper1').on('click', '.remove_button', function(e){
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html
				x--; //Decrement field counter
			  });
				
			  ///end hotel
			  ///pharmacy 
			  $('#add_button2').click(function(){
			   //Input field wrapper
			   var maxField = 20;
			  var fieldHTML = '<div class="row"><div class="col-md-6"><div class="form-group"><label>Pharmacy Name</label><input class="form-control "  name="pharmacy_name[]" /></div></div><div class="col-md-4"><div class="form-group"><label>Pharmacy Images</label><div class="upload-img">  <div class="change-photo-btn" style="float:left;"><span><i class="fa fa-upload"></i> Pharmacy Images</span><input type="file" class="upload " name="imag_name[]" multiple="mutliple"  ></div></div></div><div style="clear:both"></div></div><a href="javascript:void(0);" class="remove_button float-left  " style="padding-left:50px"><i class="fas fa-times"></i></a></div>'; 
			  var x = 1; //Initial field counter is 1
			  //Once add button is clicked
			
				//Check maximum number of input fields
				//Increment field counter
				  $('#field_wrapper2').append(fieldHTML); //Add field html
				
			  });
			  //Once remove button is clicked
			  $('#field_wrapper2').on('click', '.remove_button', function(e){
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html
				x--; //Decrement field counter
			  });
			   ////end pharmacy
			   
			   ////gallery 
			    $('#add_button3').click(function(){
			   //Input field wrapper
			   var maxField = 20;
			  var fieldHTML = '<div class="row"><div class="col-6 mb-4 float-left"><div class="form-group"><label>Gallery Images</label><div class="upload-img">  <div class="change-photo-btn" style="float:left;"><span><i class="fa fa-upload"></i>  Images</span><input type="file" class="upload " name="imagee_name[]" multiple="mutliple"  ></div></div></div><div style="clear:both"></div></div><a href="javascript:void(0);" class="remove_button float-left  " style="padding-left:50px"><i class="fas fa-times"></i></a></div>'; 
			  var x = 1; //Initial field counter is 1
			  //Once add button is clicked
			
				//Check maximum number of input fields
				//Increment field counter
				  $('#field_wrapper3').append(fieldHTML); //Add field html
				
			  });
			  //Once remove button is clicked
			  $('#field_wrapper3').on('click', '.remove_button', function(e){
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html
				x--; //Decrement field counter 
			  });
			  
			  ///facility
			  $('#add_button4').click(function(){
			   //Input field wrapper
			   var maxField = 20;
			  var fieldHTML = '<div class="form-group mb-3"><a href="javascript:void(0);" class="remove_button float-right " style="padding-left:50px">Remove</a><label>Facility Name</label><input  class="form-control" type="text"  name="facility[]"  ></div><div style="clear:both"></div>'; 
			  var x = 1; //Initial field counter is 1
			  //Once add button is clicked
			
				//Check maximum number of input fields
				//Increment field counter
				  $('#field_wrapper4').append(fieldHTML); //Add field html
				
			  });
			  //Once remove button is clicked
			  $('#field_wrapper4').on('click', '.remove_button', function(e){
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html
				x--; //Decrement field counter 
			  });
			  //end facility
			   //
        });
				 $(document).on('click' , '.delete',function(){
					$id=$(this).attr('data-id');
					$('#del_id').val($id);
				$('#delete_modal').modal('show');
						
						
					//	$data=($tr).children('td').map(function(){
					//	return $(this).text();
					//}).get();
					//console.log($data);
					//$id=$('delete_id').val($data[0]);
					//console.log($id);
					
				});
    </script>
					<script>
					$(document).ready(function() {
					$('.js-example-basic-multiple').select2();
				});
			</script>
			
	<?php 
	//endif;
	?>