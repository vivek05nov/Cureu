
<!---embedded css-->
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
		<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<!----extra script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Hospital</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Hospital</a></li>
									<li class="breadcrumb-item active">Hospital</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-7 col-lg-8 col-xl-12">
						<?php echo form_open_multipart('admin/add_hospital');?>
							<!-- Basic Information -->
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
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img src="" onerror="if (this.src != 'error.jpg') this.src = 'https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg';">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="user_image">
															
															
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input type="text" value="" class="form-control" name="hospital_name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" value="" class="form-control" name="email" required>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="number" value="" class="form-control" name="phone_no" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">   
												<label>Password <span class="text-danger">*</span></label>
												<input type="password" value="" class="form-control" name="password" required>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
						
							<!-- /Basic Information -->
							
							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Hospital</h4>
									<div class="form-group mb-0">
										
										<textarea class="form-control" name="about" rows="5" value="" required></textarea>
								<script>
										CKEDITOR.replace( 'about' );
								</script>
									</div>
								</div>
							</div>
							
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Near Hotels</h4>
									<div class="hotels-info">
									<div class="row form-row hotels-cont">
										<div class="row form-row">
										<div id="field_wrapper1">
										<a href="javascript:void(0);"  id="add_button1" title="Add field"><i class="fa fa-plus"></i></a>
											<div class="row">
											<div class="col-md-6">
											<div class="form-group">
												<label>Hotel Name</label>
												<input type="text" name="hotel_name[]" value="" class="form-control" required>
											</div>
											</div>
										
										
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="col-md-6">
											<div class="form-group">
												<label>Hotel Images</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i> Hotel Images</span>
													<input type="file" class="upload " name="image_name[]"   required>
												</div><br/></br>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
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
							<div style="clear:both"></div>
							<!-- /Clinic Info -->
						
								<!---pharmacy details-->
								<div class="col-8 col-xs-12 float-left">
									<div class="card ">
								<div class="card-body">
									<h4 class="card-title">Nearby Pharmacy</h4>
									<div class="hotel-info">
									<div class="row form-row hotel-cont">
										<div class="col-md-12">
										<div class="row form-row">
										<div id="field_wrapper2">
										<a href="javascript:void(0);"  id="add_button2" title="Add field"><i class="fa fa-plus"></i></a>
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Pharmacy Name</label>
												<input type="text" name="pharmacy_name[]" value="" class="form-control" required>
											</div>
											</div>
										
										
										
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="col-md-6">
											<div class="form-group ">
												<label>Pharmacy Images</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i> Pharmacy Images</span>
													<input type="file" class="upload" name="imag_name[]" required>
												</div><br/></br>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
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
							</div>
							</div>
							
							
								<!--pharmacy end-->
								<!---gallery section--->
								<div class="col-4 col-xs-12 float-left">
								<div class="card ">
								<div class="card-body">
									<h4 class="card-title"> Hospital Gallery</h4>
									<div class="hotel-info">
									<div class="row form-row hotel-cont">
										<div class="col-md-12">
										<div class="row form-row">
										<div id="field_wrapper3">
										<a href="javascript:void(0);"  id="add_button3" title="Add field"><i class="fa fa-plus"></i></a>
										<div class="row">
										
										
										
										
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="col-md-12">
											<div class="form-group ">
												<label> Images</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i> Gallery Images</span>
													<input type="file" class="upload" name="imagee_name[]" required>
												</div><br/></br>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
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
							</div>
							</div>
							<div style="clear:both"></div>
								<!--gallery end-->
							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Hospital Details</h4>
									<div class="row form-row">
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Country</label>
												<div></div>
												<select class="form-control js-example-tags" name="country" id="country"> 
													<option>-  Select Country  -</option>
													<?php foreach($countries as $count):
														?>
														<option value="<?php  echo $count->id ;?>"><?php echo $count->name; ?></option>
														<?php
														endforeach;
													?>
												</select>
											</div>
										</div>
										<!--div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State</label>
												<input type="text" name="state" value=" //echo $user->state_id; ?>" class="form-control">
											</div>
										</div-->
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">City</label>
												<div></div>
												
												<select class="form-control js-example-tags" name="city" id="state" >
													<option>-  Select City  -</option>
													<?php foreach($city as $citydata):
														?>
														<option value="<?php  echo $citydata->country_id ;?>"><?php echo $citydata->name; ?></option>
														<?php
														endforeach;
													?>
												</select>
											</div> 
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Address</label>
												<div></div> 
												<input type="text" class="form-control " name="address"  >
													
												
											</div> 
										</div>
										<!--div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control">
											</div>
										</div-->
										
									</div>
								</div>
							</div>
							<!-- /Contact Details -->
							
							<!-- Pricing -->
							<div class="card"> 
								<div class="card-body">
									<h4 class="card-title">Facilities</h4> 
									<div id="field_wrapper4">
									<a href="javascript:void(0);"  id="add_button4" title="Add field"><i class="fa fa-plus"></i></a>
									<div class="form-group mb-3">
									<label>Facility Name</label>
									<input  class="form-control" type="text"  name="facility[]" required >
									</div>
									</div>
								</div>
									
									
								</div>
							
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									
									<div class="form-group mb-0">
										<select class="form-control   js-example-basic-multiple" name="service[]" multiple="multiple" required>
										<option> Select One</option>
										<?php foreach($services as $row):
											
										?>
										<option value="<?php echo $row->id ;?>"><?php echo $row->service_name; ?></option>
										<?php
										endforeach;
										?>
										</select>
									</div> 
								</div>              
							</div>
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							
							<!-- /Education -->
						
							<!-- Experience -->
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Doctors</h4>
							<div class="experience-info">
								<div class="row form-row experience-cont">
									<div class="col-12 col-md-10 col-lg-11">
										
											<div class="col-12 col-md-6 col-lg-12">
											
											
											
												 <div class="field_wrapper">
												 <a href="javascript:void(0);" id="specialities_name" class="add_button" title="Add field"><i class="fa fa-plus"></i></a>
												 <div class="row">
												<div class="col-md-4">
												<div class="form-group"> 
													<select class="form-control"   name="field_name[]"   >
													<option>Select One</option>
													<?php if(!empty($services)):
														foreach( $services as $row):?>
													
													<option value="<?php echo $row->id ?>"><?php echo $row->service_name;?>
													
													</option>
													<?php
													endforeach;
												
														?>
													</select>
													</div>
													</div>
													
												<div class="col-md-4">
												<div class="form-group">
												<input  class="form-control "type="text" placeholder="Enter your Doctor" name="special_name[]" value="" required/>
													
												</div>
												
												</div>
												<div class="col-md-4">
												<div class="form-group ">
												
												<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i> Gallery Images</span>
													<input type="file" class="upload" name="doctor_img[]" required>
												</div><br/></br>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
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
							</div>
							<!-- /Experience -->
							
							<!-- Awards -->
							<!--<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<div class="awards-info">
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input type="text" name="awards" class="form-control" value="">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" name="awards_year" class="form-control" value="">
												</div> 
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<!-- /Awards -->
							
							<!-- Memberships -->
							<!--div class="card">
								<div class="card-body">
									<h4 class="card-title">Memberships</h4>
									<div class="membership-info">
										<div class="row form-row membership-cont">
											<div class="col-12 col-md-10 col-lg-5">
												<div class="form-group">
													<label>Memberships</label>
													<input type="text" name="memberships" class="form-control">
												</div> 
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div-->
							<!-- /Memberships -->
							
							<!-- Registrations -->
							<!--div class="card">
								<div class="card-body">
									<h4 class="card-title">Registrations</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Registrations</label>
													<input type="text" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control">
												</div> 
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div-->
							<!-- /Registrations -->
							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>	
						</div>
						</div>
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Hospital</th>
													<th>Image</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Address</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $sr = 1; 
											foreach($hospitall as $row): ?>
												<tr>
													<input type="hidden" value="<?php echo $row->id; ?>">
													<td><?php echo $sr; ?></td>
													<td><?php echo $row->name; ?></td>
													<td>
													<a href="#"  >
														<img class="avatar-img"  src="<?php echo base_url(); ?>assets/img/hospital/<?php echo $row->image ?>" alt="Banner" style="width:200px ;height:100px">
													</a>
													</td>
													</td>
													<td><?php echo $row->email; ?></td>
													<td><?php echo $row->phone_no; ?></td>
													<td><?php echo $row->hos_address; ?></td>
													<td class="text-right"> 
														<div class="actions">
															<a class="btn btn-sm bg-success-light"  href="<?php echo base_url('Admin/edit_hospital/').$row->id;?>">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-id="<?php echo $row->id; ?>" class=" delete btn btn-sm bg-danger-light "  >
																<i class="fe fe-trash"></i> Delete
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
							<form method="post" action="<?php echo base_url('admin/delete_hospital'); ?>">
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
	<script type="text/javascript">
			$(document).ready(function(){
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
			  var fieldHTML = '<div class="row"><div class="col-md-6"><div class="form-group"><label>Hotel Name</label><input class="form-control "  name="hotel_name[]" /></div></div><div class="col-md-4"><div class="form-group"><label>Hotel Images</label><div class="upload-img">  <div class="change-photo-btn" style="float:left;"><span><i class="fa fa-upload"></i> Hotel Images</span><input type="file" class="upload " name="image_name[]" multiple="mutliple"  ></div></div></div><div style="clear:both"></div></div><a href="javascript:void(0);" class="remove_button float-left  " style="padding-left:50px"><i class="fas fa-times"></i></a></div>';  
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
				
    </script>
					<script>
					$(document).ready(function() {
					$('.js-example-basic-multiple').select2();
				});
			</script>
	<?php 
	endif;
	?>