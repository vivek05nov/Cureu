<head>
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head> 
<?php 
error_reporting(0);
/* echo "<pre>";
print_r($common_special);die; */
$count_special=count($common_special);

$common_service=explode(" ",$user->common_specialities_id);
$count_service=count($common_service);
 
/* foreach($common_special as $row):

foreach($common_service as $key=>$roww):

if( $row->id == $common_service[$key])
{
	echo $common_service[$key]."<br>";
}
	   
endforeach;	
endforeach; */


//die;
 ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
						<div class="col-md-7 col-lg-8 col-xl-9">
						<?php echo form_open_multipart('doctors/update_profile');?>
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
														<img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $user->image; ?>" alt="User Image">
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
												<input type="text" value="<?php echo $user->mobile; ?>" class="form-control" name="mobile" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control select" name="gender">
													<option value="<?php echo $user->gender; ?>"><?php echo $user->gender; ?></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Birth</label>
												<input type="date" id="datefield" value="<?php echo $user->dob; ?>" class="form-control" name="dob">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Fee</label>
												<input type="number" value="<?php echo $user->fee; ?>" class="form-control" name="fee">
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<!-- /Basic Information -->
							
							<script>
								// Use Javascript
									var today = new Date();
									var dd = today.getDate();
									var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
									var yyyy = today.getFullYear();
									if(dd<10){
									  dd='0'+dd
									} 
									if(mm<10){
									  mm='0'+mm
									} 

									today = yyyy+'-'+mm+'-'+dd;
									document.getElementById("datefield").setAttribute("max", today);
							</script>
							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										
										<div class="form-group">
												<label>About</label>
												<textarea class="form-control" name="about" required="" style="height: 150px;" value="<?php echo $user->about; ?>"><?php echo $user->about; ?></textarea>
				<script>
                        CKEDITOR.replace( 'about' );
                </script>
											</div>
										
										
										
									<!--	<textarea class="form-control" name="about" rows="5" value="<?php echo $user->about; ?>"><?php echo $user->about; ?></textarea> -->
										
									</div>
								</div>
							</div>
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Clinic Info</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Name</label>
												<input type="text" name="clinic_name" value="<?php echo $user->clinic_name; ?>" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<!--div class="form-group">
												<label>Clinic Address</label>
												<input type="text" name="address" class="form-control">
											</div-->
											<div class="form-group">
												<label>Clinic Images</label>
											<div class="upload-img">  
												<div class="change-photo-btn" style="float: left;">
													<span><i class="fa fa-upload"></i> Clinic Images</span>
													<input type="file" class="upload" name="clinic_image">
													<input type="hidden" name="c_image" value="<?php echo $user->clinic_image; ?>">
												</div><br/>
												<small class="form-text text-muted"> Allowed JPG, GIF or PNG. </small>
											</div>
											</div>
										</div>
										<div class="col-md-12">
											<!--div class="form-group">
												<label>Clinic Images</label>
												<form action="#" class="dropzone"></form>
											</div-->
											
											<!--<div class="upload-wrap">
												<div class="upload-images">
													<img src="<?php echo base_url() ?>assets/img/features/feature-01.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div> 
												<div class="upload-images">
													<img src="<?php echo base_url() ?>assets/img/features/feature-02.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div>
												<div class="upload-images">
													<img src="<?php echo base_url() ?>assets/img/features/feature-02.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div>
											</div>--->
										</div>
									</div>
								</div>
							</div>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Contact Details</h4>
									<div class="row form-row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Address</label>
												<input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control">
											</div>
										</div>
										<!--div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State</label>
												<input type="text" name="state" value="<?php echo $user->state_id; ?>" class="form-control">
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
										<!-- <div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Area</label>
												<select class="form-control js-example-tags" name="area" id="area"> 
													<option value="<?php echo $user->area ?>">-  Select Area  -</option>
												</select>
											</div>
										</div> --> 
										
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
										<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" id="services" value="<?php echo $user->services; ?>">
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									</div> 
									
										<?php 
										//$br=0;
										//if(!empty($doc_special)){
										?>
										<!--<div class="form-group mt-2 mb-o">
										<div class="row">
										&nbsp;&nbsp;&nbsp;&nbsp;<label>Specialization</label>
										&nbsp;&nbsp;
										
										<?php
										//foreach($specialities as $row){
										//if(!empty($doc_special)){
										//for($i=$br;$i<count($doc_special);$i++){ 
										//if($doc_special[$i]->specialites_id ==$row->id){
										?>
										<div class="col-3">
										&nbsp;&nbsp;
										<input  class="form-check-input"<?php //if($doc_special[$i]->specialites_id ==$row->id){ echo "checked"; $br=$i+1;} ?>  type="checkbox" name="specialist[]"  value="<?php //echo $row->id; ?>"   >
										<label for="<?php //echo $row->service_name; ?>" class="mr-2"> <?php //echo $row->service_name; ?></label>
										</div>
										<?php //break;
										//}
										///}
										//}
										//}
										 ?>
										 
										 </div>
										</div> 
										<br>-->
										
									<?php
										//}
										?>
										<!---selected Common Issues--->
										<?php 
										
										//$br=0;
										?>
										<!--<div class="form-group mt-2 mb-o">
										<div class="row">
										&nbsp;&nbsp;&nbsp;&nbsp;<label>Common Issues</label>
										&nbsp;&nbsp;
										
										<?php
										
										//foreach($common_special as $row):

										//foreach($common_service as $key=>$roww):

										//if( $row->id == $common_service[$key])
										//{
											?>
											&nbsp;&nbsp;
										<div class="col-3"><input  class="form-check-input"<?php //if( $row->id == $common_service[$key]){ echo "checked";} ?>  type="checkbox" name="common_specialist[]"  value="<?php //echo $row->id; ?>"   >
										<label  class="mr-2"> <?php //echo $row->service_name; ?></label>
										</div>
											
											<?php
											//echo $common_service[$key];?>
											&nbsp;&nbsp;&nbsp;
											<?php
										//}
											   
										//endforeach;	
										//endforeach;
										 ?>
										 
										 </div>
										</div>
										<br>--
										
									
										<!---selected Common Issues end--->
										
										
										
										<div class="form-group  mb-0">
										<label>Specialization </label> 
										
										<div class="row">
										<?php 
										
										foreach($specialities as $row){
										?>
										<div class="col-3">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input id="<?php  echo $row->service_name; ?>"  class="form-check-input"  type="checkbox"  value="<?php echo $row->id; ?>"  name="specialist[]" <?php if(in_array($row->id,json_decode($user->specialities_id))){ echo "checked"; }  ?> >
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
										<input id="<?php  echo $row->service_name; ?>"  class="form-check-input"  type="checkbox"  value="<?php echo $row->id; ?>"  name="common_specialist[]"  <?php if(in_array($row->id,json_decode($user->common_specialities_id))){ echo "checked"; }  ?> >
										<label for="<?php  echo $row->service_name; ?>" class="mr-3"> <?php echo $row->service_name; ?></label>
										</div>
										<?php 
										}
										?>
										
										</div>
									</div> 
									<!----- common specialities end-->
						
								</div>              
							</div>
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Education</h4>
									<div class="education-info">
									<?php 
														$degree=json_decode($user->degree);
														$college=json_decode($user->college);
														$year_edu=json_decode($user->year);
														 /* echo "<pre>";
														 print_r(array_keys($college));die; */
														 $i =0;
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
															<input type="text" name="college[]" class="form-control" value="<?php echo $college[$key]; ?>"> 
														</div>  
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Year of Completion</label>
															<!--<div class="cal-icon">-->
																<input type="text" class="form-control " value="<?php if(!empty($year_edu[$key])){ echo $year_edu[$key]; } ?>" name="year[]">
															<!--</div>-->  
															
														</div> 
													</div>
													</div>
													</div>
													
													<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
												</div>
									
												<?php 
												$i++;
												endforeach; ?>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								
							</div>
							</div>
							<!-- /Education -->
						
							<!-- Experience -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Experience</h4>
									<div class="experience-info">
									<?php 
														$hospital_name=json_decode($user->hospital);
														$from=json_decode($user->from);
														$to=json_decode($user->to);
														$dasignation=json_decode($user->dasignation);
														 /* echo "<pre>";
														 print_r(array_keys($degree));die; */
														foreach($hospital_name as $key=>$row):
																		
														?>
										<div class="row form-row experience-cont">
											<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Hospital Name</label>
															<input type="text" name="hospital[]" class="form-control" value="<?php echo $hospital_name[$key]; ?>"> 
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>From</label>
															<input type="text" name="from[]" class="form-control" value="<?php echo $from[$key]; ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>To</label>
															<input type="text" name="to[]" class="form-control" value="<?php echo $to[$key]; ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" name="dasignation[]" class="form-control" value="<?php echo $dasignation[$key]; ?>">
														</div> 
													</div>
												</div>
											</div>
										</div>
										<?php 
										endforeach; ?>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Experience -->
							
							<!-- Awards -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<div class="awards-info">
									<?php 
														$awards=json_decode($user->awards);
														$awards_year=json_decode($user->awards_year);
														foreach($awards as $key=>$row):
																		
														?>
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input type="text" name="awards[]" class="form-control" value="<?php echo $awards[$key]; ?>">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" name="awards_year[]" class="form-control" value="<?php echo $awards_year[$key]; ?>">
												</div> 
											</div>
										</div>
										<?php  endforeach; ?>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
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

				</div>

			</div>		
            <!-- /Page Content -->
			
<script>
$(".js-example-tags").select2({
  tags: true
});
//get Area
function get_area(cls)
{ 
    if(cls!='-1')
    {
        $.ajax(
        {
            type:"POST",
            url:"<?php echo base_url(); ?>welcome/get_area",
            dataType: "JSON",
            data:{'city':cls},
            success:function(data){
                $("#area").empty();
                $("#area").append("<option value=-1> ~~ Select Area ~~</option>");
                $.each(data,function(i,item)
                {
                    $("#area").append("<option value="+item.id+">"+item.name+"</option>");
                });
            }
        });
    }
    else
    {
        $("#area").empty();
        $("#area").append("<option value=-1> ~~ Select Section ~~</option>");
        alert("Please First Select The Nationality");
    }
}
</script>
<script>


</script>