



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
<!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
						<div class="col-md-7 col-lg-8 col-xl-9">
						<?php echo form_open_multipart('hospital/update_profile');?>
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
														<img src="<?php echo base_url() ?>assets/img/hospital/<?php echo $user->image; ?>" alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="user_file">
															<input type="hidden" name="image" value="<?php echo $user->image; ?>">
															
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input type="text" value="<?php echo $user->name; ?>" class="form-control" name="name" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" value="<?php echo $user->email; ?>" class="form-control" name="email" readonly>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="number" value="<?php echo $user->phone_no; ?>" class="form-control" name="mobile" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Fee</label>
												<input type="number" name="hos_fee" class="form-control" value=<?php echo $user->fee; ?>>
											</div>
										</div>
										<!--<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth</label>
												<input type="date" value="" class="form-control" name="dob">
											</div>
										</div>--->
									</div>
								</div>
							</div>
						
							<!-- /Basic Information -->
							
							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										<textarea class="form-control" name="about" rows="5" ><?php echo $user->about_hos; ?></textarea>
                                     <script>
										CKEDITOR.replace( 'about' );
								     </script>
									</div>
								</div>
							</div>
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							<?php /*<div class="card">
								<div class="card-body">
									<h4 class="card-title">Hospital Info</h4>
									<div class="row form-row">
										<!---<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Name</label>
												<input type="text" name="clinic_name" value="" class="form-control">
											</div>
										</div>--->
										<div class="col-md-6">
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="form-group">
												<label>Hospital Images</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float: left;">
													<span><i class="fa fa-upload"></i> Hospital Images</span>
													<input type="file" class="upload" name="clinic_image[]">
												</div>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
											</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>*/?>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Contact Details</h4>
									<div class="row form-row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Address</label>
												<input type="text" name="address" value="<?php echo $user->hos_address; ?>" class="form-control">
											</div>
										</div>
										<!--div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State</label>
												<input type="text" name="state" value="" class="form-control">
											</div>
										</div-->
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">City</label>
												<select class="form-control js-example-tags" name="city" id="city" onchange="get_area(this.value)">
													<option selected="selected" value="-1"> -  Select City  -</option>
													<?php   foreach($cities as $row){ ?>
														<option <?php if($row->id == $user->city_id){ echo "selected";}   ?> value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
													<?php }  ?>
												</select>
											</div> 
										</div>
										<!--div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control">
											</div>
										</div-->
										<!--<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Area</label>
												<select class="form-control js-example-tags" name="area" id="area"> 
													<option value="">-  Select Area  -</option>
												</select>
											</div>
										</div>--->
									</div>
								</div>
							</div>
							<!-- /Contact Details -->
							
							<!-- Pricing -->
							<!--div class="card">
								<div class="card-body">
									<h4 class="card-title">Pricing</h4>
									<div class="form-group mb-0">
										<div id="pricing_select">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" checked>
												<label class="custom-control-label" for="price_free">Free</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
												<label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
											</div>
										</div>

									</div>
									
									<div class="row custom_price_cont" id="custom_price_cont" style="display: none;">
										<div class="col-md-4">
											<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="" placeholder="20">
											<small class="form-text text-muted">Custom price you can add</small>
										</div>
									</div>
									
								</div>
							</div-->
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							
							 <div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									<div class="form-group mb-5">  
										<label>Services</label>
										<?php $data=json_decode($user->hospital_facilities);
											
										if(!empty($data)){
										?>
										
										<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" id="services" 
									
										value="<?php foreach($data as $key=> $row):
										echo $data[$key];
										endforeach;
										?>">
										<?php }
										else
										{?>
											<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" id="services" value="">
										<?php 
										}
										
										?>
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									</div> 
									
									<!-- Pricing -->
							<div class="card"> 
								<div class="card-body">
									<h4 class="card-title">Facilities</h4> 
									<div id="field_wrapper4">
									<a href="javascript:void(0);"  id="add_button4" title="Add field"><i class="fa fa-plus"></i></a>
									<div class="form-group mb-3">
									<label>Facility Name</label>
									<input  class="form-control" type="text"  name="facility[]"  >
									</div>
									</div>
								</div>
									
								</div>
							
							<!-- /Pricing -->
							
							
								<!-- Services and Specialization -->
							<!-- <div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									
									<div class="form-group mb-0">
										<select class="form-control   js-example-basic-multiple" name="service[]" multiple="multiple" >
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
							</div> -->
							<!-- /Services and Specialization -->
							
							
														<!-- Experience -->
					<!-- <div class="card">
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
													</select> 
													</div>
													</div>
													
												<div class="col-md-4">
												<div class="form-group">
												<input  class="form-control "type="text" placeholder="Enter your Doctor" name="special_name[]" value=""/>
													
												</div>
												
												</div>
												<div class="col-md-4">
												<div class="form-group ">
												
												<div class="upload-img">  
												<div class="change-photo-btn" style="float:left;">
													<span><i class="fa fa-upload"></i> Gallery Images</span>
													<input type="file" class="upload" name="doctor_img[]" >
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
							</div> -->
							<!-- /Experience -->
									
									
									<?php /*
										<?php 
										$br=0;
										if(!empty($doc_special)){
										?>
										<div class="form-group mt-2 mb-o">
										<div class="row">
										&nbsp;&nbsp;&nbsp;&nbsp;<label>Specialization</label>
										&nbsp;&nbsp;
										
										<?php
										foreach($specialities as $row){
										if(!empty($doc_special)){
										for($i=$br;$i<count($doc_special);$i++){ 
										if($doc_special[$i]->specialites_id ==$row->id){
										?>
										<div class="col-3">
										&nbsp;&nbsp;
										<input  class="form-check-input"<?php if($doc_special[$i]->specialites_id ==$row->id){ echo "checked"; $br=$i+1;} ?>  type="checkbox" name="specialist[]"  value="<?php echo $row->id; ?>"   >
										<label for="<?php echo $row->service_name; ?>" class="mr-2"> <?php echo $row->service_name; ?></label>
										</div>
										<?php break;
										}
										}
										}
										}
										 ?>
										 
										 </div>
										</div> 
										<br>
										
									<?php
										}
										?>
										<!---selected Common Issues--->
										<?php 
										
										$br=0;
										?>
										<div class="form-group mt-2 mb-o">
										<div class="row">
										&nbsp;&nbsp;&nbsp;&nbsp;<label>Common Issues</label>
										&nbsp;&nbsp;
										
										<?php
										
										foreach($common_special as $row):

										foreach($common_service as $key=>$roww):

										if( $row->id == $common_service[$key])
										{
											?>
											&nbsp;&nbsp;
										<div class="col-3"><input  class="form-check-input"<?php if( $row->id == $common_service[$key]){ echo "checked";} ?>  type="checkbox" name="common_specialist[]"  value="<?php echo $row->id; ?>"   >
										<label  class="mr-2"> <?php echo $row->service_name; ?></label>
										</div>
											
											<?php
											//echo $common_service[$key];?>
											&nbsp;&nbsp;&nbsp;
											<?php
										}
											   
										endforeach;	
										endforeach;
										 ?>
										 
										 </div>
										</div> 
										<br>
										
									
										<!---selected Common Issues end--->
										
										
										
										<div class="form-group  mb-0">
										<label>Specialization </label> 
										
										<div class="row">
										<?php 
										
										foreach($specialities as $row){
										?>
										<div class="col-3">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input id="<?php  echo $row->service_name; ?>"  class="form-check-input"  type="checkbox"  value="<?php echo $row->id; ?>"  name="specialist[]"  >
										<label for="<?php  echo $row->service_name; ?>" class="mr-3"> <?php echo $row->service_name; ?></label>
										</div>
										<?php 
										}
										?>
										
										</div>
									</div> 
									
									<!----- common specialities-->
									<br>
									
									<div class="form-group  mb-0">
										<label>Common Issues </label> 
										
										<div class="row">
										<?php 
										
										foreach($common_special as $row){
										?>
										<div class="col-3">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input id="<?php  echo $row->service_name; ?>"  class="form-check-input"  type="checkbox"  value="<?php echo $row->id; ?>"  name="common_specialist[]"  >
										<label for="<?php  echo $row->service_name; ?>" class="mr-3"> <?php echo $row->service_name; ?></label>
										</div>
										<?php 
										}
										?>
										
										</div>
									</div> 
									<!----- common specialities end-->
						
								</div>              
							</div>*/?>
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							<?php /*<div class="card">
								<div class="card-body">
									<h4 class="card-title">Education</h4>
									<div class="education-info">
									<?php 
														$degree=explode(" ",$user->degree);
														 /* echo "<pre>";
														 print_r(array_keys($degree));die; 
														foreach($degree as $key=>$row):
																		
														?>
												<div class="row form-row education-cont">
												<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
												
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Degree</label>
															
															<input type="text" name="degree[]" class="form-control" value="<?php echo $degree[$key]; ?>">
															
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>College/Institute</label>
															<input type="text" name="college[]" class="form-control" value="<?php echo $user->college; ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Year of Completion</label>
															<div class="cal-icon">
																<input type="year" class="form-control datetimepicker" value="<?php echo $user->year; ?>" name="year[]">
															</div>
															
														</div> 
													</div>
													</div>
													</div>
													
													<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
												</div>
									
												<?php endforeach; ?>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								
							</div>
							</div>*/?>
							<!-- /Education -->
						
							<!-- Experience -->
							<?php /*<div class="card">
								<div class="card-body">
									<h4 class="card-title">Experience</h4>
									<div class="experience-info">
										<div class="row form-row experience-cont">
											<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Hospital Name</label>
															<input type="text" name="hospital[]" class="form-control" value="<?php echo $user->hospital; ?>"> 
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>From</label>
															<input type="text" name="from[]" class="form-control" value="<?php echo $user->from; ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>To</label>
															<input type="text" name="to[]" class="form-control" value="<?php echo $user->to; ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" name="dasignation[]" class="form-control" value="<?php echo $user->dasignation; ?>">
														</div> 
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>*/?>
							<!-- /Experience -->
							
							<!-- Awards -->
							<?php /*<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<div class="awards-info">
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input type="text" name="awards[]" class="form-control" value="<?php echo $user->awards; ?>">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="date" name="awards_year[]" class="form-control" value="<?php echo $user->awards_year; ?>">
												</div> 
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>*/?>
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

				</div>

			</div>		
            <!-- /Page Content -->
			</div>
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