<?php error_reporting(0);?>

<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<style>
#btnsearch{
	    font-size: 0.7rem;
    line-height: .2;
}

.border-change {
	border-radius :30%;
}
</style>
<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-6 col-6 float-left">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Doctors</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Doctors List</h2> 
         </div>
         <div class="col-md-3 col-3 pt-3 form_div float-right">
            <select type="text" class="form-control" name="searched_item" style="width:80%">
               <option value="-1" id="filter">Filter Shorting</option>
               <option value="-3" id="price">Price</option>
               <option value="-2" id="location">Location</option>
               <option value="-4" id="high_low">High to low</option>
               <option value="-5" id="low_high">Low to high</option>
               <option value="-6" id="Popularity">Popularity</option>
            </select>
         </div>
         <div class="col-md-3 col-3 pt-3 form_div float-right">
		 <?php if(!$hos_active) {?>
            <form method="post" id="form_id" class="formid" action="<?php  echo base_url('result')?>">
               <div class="input-group ">
                  <select type="text" class="form-control" name="searched_item" style="width:80%">
                     <option value="-1" id="select_id">Select One</option>
                     <?php foreach($special as $row): ?>
                     <option value="<?php echo $row->special_id ;?>"><?php echo $row->service_name ;?></option>
                     <?php endforeach; ?>
                  </select>
                  <div class="input-group-btn" style="background-color:white;border-radius:2px !important">
                     <button type="submit" class="btn btn-default" name="doc_submit" value="doc_submit" onclick="submit()">
                     <i class="fas fa-search" id="btnsearch" style="color:#15558d;margin-top:8px "></i>
                     </button>
                  </div>
               </div>
            </form>
		 <?php }
					else {
			?> 
			<form method="post" id="form_id" class="formid" action="<?php  echo base_url('result')?>">
               <div class="input-group ">
                  <select type="text" class="form-control" name="searched_item" style="width:80%">
                     <option value="-1" id="select_id">Select One</option>
                     <?php foreach($special as $row): ?>
                     <option value="<?php echo $row->special_id ;?>"><?php echo $row->service_name ;?></option>
                     <?php endforeach; ?>
                  </select>
                  <div class="input-group-btn" style="background-color:white;border-radius:2px !important">
                     <button type="submit" class="btn btn-default" name="hos_submit" value="hos_submit" onclick="submit()">
                     <i class="fas fa-search" id="btnsearch" style="color:#15558d;margin-top:8px "></i>
                     </button>
                  </div>
               </div>
            </form> 
					<?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- /Breadcrumb -->
<?php
   if($this->session->flashdata('info_success')){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?>
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
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-8 col-md-12 m-auto order-md-last order-sm-last order-last map-left">
            <div class="row align-items-center mb-4"> 
               <div class="col-md-6 col">
			    <?php
					// $doc_user_count = 0;
					// $d_user = '';
					// if(!empty($doctors)) :
				   // foreach($doctors as $doctor):
				   // if($d_user != $doctor->user_id):
				   // $d_user = $doctor->user_id;
					// $doc_user_count++;
				   // endif;
				   // endforeach;
				   // endif;
			   // ?>
			   <hr>
			   <?php if($this->uri->segment(1)=='result'){ ?>
				<form method="post" action ="<?php echo base_url('result')?>">
				<input type ="hidden" name="searched_item" value ="<?php echo $seach_item?>"/>  
			   <button type="submit" name="doc_submit" class="btn btn-outline-success border-change pr-2 doctor_find <?php  echo $active?> "  value ="doc_submit">Doctors</button>
				
			   <button type="submit" name="hos_submit" class="btn btn-outline-success border-change  pl-2  hospital_find <?php  echo $hos_active?>" value="hos_submit">Hospitals</button>
			   </form>
			   
			   <?php }
						else
						{
			   ?>
			   <form method="post" action ="<?php echo base_url('all-doctors')?>">
			   <button type="submit" name="submit" class="btn btn-outline-success border-change pr-2 doctor_find <?php  echo $active?> "  value ="Doctor">Doctors</button>
			   
			   <button type="submit" name="hos_submit" class="btn btn-outline-success border-change  pl-2  hospital_find <?php  echo $hos_active?>" value="hospital">Hospitals</button>
			   </form>
						<?php } ?>
			   
			   <hr>
			   <?php if(!$hos_active) {?>
                  <h4><?php echo $total ?> Doctors found</h4>
               </div>
               <div class="col-md-6 col-auto">
                  <!--div class="view-icons">
                     <a href="map-grid.html" class="grid-view"><i class="fas fa-th-large"></i></a>
                     <a href="map-list.html" class="list-view active"><i class="fas fa-bars"></i></a>
                     </div-->
                  <!---<div class="sort-by d-sm-block d-none">
                     <span class="sortby-fliter">
                     	<select class="select">
                     		<option>Sort by</option>
                     		<option class="sorting">Rating</option>
                     		<option class="sorting">Popular</option>
                     		<option class="sorting">Latest</option>
                     		<option class="sorting">Free</option>
                     	</select>
                     </span>
                     </div>----->
               </div>
            </div>
            <?php 
				$doc_user_id = '';
			if(!empty($doctors)) :
               foreach($doctors as $doctor):
			   if($doc_user_id != $doctor->user_id):
               ?>
            <!-- Doctor Widget -->
            <div class="card">
               <div class="card-body cardHover">
                  <div class="doctor-widget">
                     <div class="doc-info-left">
                        <div class="doctor-img dctorPics">
                           <a href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>"> 
                           <img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $doctor->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" class="img-fluid" alt="User Image" style="border-radius:50%; height:150px; width:150px;">
                           </a>
                        </div>
                        <div class="doc-info-cont">
                           <h4 class="doc-name"><a href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>"><?php echo $doctor->name;?> </a></h4>
                           <p class="doc-speciality">
                              <?php
								$doc_user_id = $doctor->user_id;
                                if(!empty($doctor->degree)){
									$degree = implode(',',json_decode($doctor->degree));
								}else{
									$degree = 'N/A';
								}
                                 //echo "<pre>";
                                 //print_r($degree);
                                echo $degree;
                                  ?>
                           </p>
                           




<p><span id="dots"></span><span id="more" style="display: none;"><?php
                              $data=$this->db->query('SELECT specialities.image as special_img, specialities.service_name,specialities.id as special_id from doctor_specialities
                                          join specialities on specialities.id=doctor_specialities.specialites_id
                                          join doctors on doctors.id=doctor_specialities.doctor_id
                                          where doctors.id='.$doctor->id .' ' )->result();
                              foreach($data as $row):
                              ?>
                           <b class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/<?php echo $row->special_img ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality"><?php echo $row->service_name ?></b> &nbsp;&nbsp;
                           <?php
                              endforeach;
                              
                              ?></span></p>

<!-- <a onclick="myFunction()" id="myBtn">Read more</a>  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
</script>


                           <div class="clinic-details">
                              <p class="doc-location mt-2"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor->address;?></p>
							  
							                          <div class="rating mt-1">
                           <span>Rating: </span>
                           <?php $sum=0; $rev=$this->db->select('rating')->where('doctor_id',$doctor->id)->get('review')->result(); 
                              $review=$this->db->where('doctor_id',$doctor->id)->select('*')->get('review')->result();
                              
                              if(!empty($rev))
                              {
                              
                              $total=count($rev);
                              foreach ($rev as $row):
                              
                              $sum=$sum+$row->rating;
                              
                              endforeach;
                              $totalaverage=$sum;
                              $sum=($sum/(5*$total))*100 ;
                              
                              if( $sum<=20){
                              ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php
                              }
                              else if($sum>=21 && $sum<=40){
                              
                              ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php  }
                              else if($sum>=41  && $sum<=60)
                              {
                                 ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              else if($sum>=61 && $sum<=80){
                                 ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              else
                              {?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              }
                              else
                              {?>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i> 
                           <?php 
                              }
                              
                              ?>
                           <span class="d-inline-block average-rating">(<?php echo count($review); ?>)</span> 
                        </div>
							  
							  
                              <p class="doc-location " style="font-size:20px;"><B>Fee: Rs. <?php echo $doctor->fee;?></b></p>
                              <ul class="clinic-gallery"> 
                                 <?php 
                                    $data1=$this->db->query('SELECT specialities.image as special_img, specialities.service_name,specialities.id as special_id from doctor_specialities
                                    					join specialities on specialities.id=doctor_specialities.specialites_id
                                    					join doctors on doctors.id=doctor_specialities.doctor_id
                                    					where doctors.id='.$doctor->id .'  limit 3' )->result();
                                    ?>	
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="doc-info-right">
                        <!--<div class="clini-infos">
                           <ul>
                           	
                           	<!--<li><i class="fas fa-map-marker-alt"></i>
                           	<li><i class="far fa-money-bill-alt"></i>  </li>
                           </ul>
                           </div>--->


                        <div class="doctor-action">
                           <?php 
                              $data=$this->db->select('*')->where('member_id',$this->session->userdata('userid'))
                  			   ->where('doctor_id',$doctor->id)
                  			   ->where('status!=',3)
                  			   ->get('appointment')->result();
                           ?>
                           <?php if($this->session->userdata('username') == ''){?>
                              <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#like"><i class="far fa-comment-alt"></i></a>
                           <?php }
                              else if(empty($data))
                              {
                              	
                              ?>
                           <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#appointment">
                           <i class="far fa-comment-alt"></i>
                           </a>
                           <?php
                              }
                              else
                              { 
                              	?>
                           <a class="btn btn-white msg-btn" href="<?php echo base_url(); ?>welcome/chat/<?php echo $doctor->id;?>"><i class="far fa-comment-alt"></i></a>   
                           <?php 	
                              }
                              ?>
                           <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                           <i class="fas fa-phone"></i>
                           </a>
                           <!--a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                              <i class="fas fa-video"></i>
                              </a-->
                           <?php if($this->session->userdata('username') == ''){?>
                           <a href="javascript:void(0)" class="btn btn-white msg-btn ml-2" data-toggle="modal" data-target="#like"  >
                           <i class="far fa-thumbs-up"></i>
                           </a>
                           <?php }else{ ?>
                           <input type="hidden" id="patient_name" name="patient_name" value="<?php echo $this->session->userdata('user_id');?>"> 
                           <input type="hidden" id="doc_name" name="doc_name" value="">
                           <a href="javascript:void(0)" class=" btn btn-white msg-btn ml-2 like_one" data-id="<?php echo $doctor->id;?>">
                           <?php $like=count($this->db->get_where('likee', array('doc_id' =>$doctor->id ))->result());?>
                           <i class="far fa-thumbs-up"><?php echo $like; ?></i>
                           </a>
                           <?php } ?>
                           <!--<a href="javascript:void(0)" class="btn btn-white msg-btn"  >
                              <i class="far fa-comment"></i>
                              </a>--->
                        </div>
                        <div class="clinic-booking doctor_profle">
                           <a class="view-pro-btn" href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>">View Profile</a> 
                           <?php if($this->session->userdata('username') == ''){?>
                           <a class="apt-btn" id="login" href="#" data-toggle="modal" data-target="#delete_modal">Book Appointment</a>
                           <?php }
                              else if($this->session->userdata('username') == 'admin')
                              {
                              	?>
                           <a class="apt-btn"  href="<?php echo base_url()?>doctor-appointment/<?php echo base64_encode($doctor->id); ?>" data-toggle="modal" data-target="#admin">Book Appointment</a>
                           <?php 
                              }
                              
                              
                              
                              else{ ?>
                           <a class="apt-btn" href="<?php echo base_url()?>doctor-appointment/<?php echo base64_encode($doctor->id); ?>">Book Appointment</a>   
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Doctor Widget -->
            <?php 
				endif;
				endforeach;
               endif;?>
			   
			   <?php  }
			   
			   
			   else {
				   
				   ?>
				   
				   <h4><?php echo $total ?> Hospital found</h4>
               </div>
               <div class="col-md-6 col-auto">
                  <!--div class="view-icons">
                     <a href="map-grid.html" class="grid-view"><i class="fas fa-th-large"></i></a>
                     <a href="map-list.html" class="list-view active"><i class="fas fa-bars"></i></a>
                     </div-->
                  <!---<div class="sort-by d-sm-block d-none">
                     <span class="sortby-fliter">
                     	<select class="select">
                     		<option>Sort by</option>
                     		<option class="sorting">Rating</option>
                     		<option class="sorting">Popular</option>
                     		<option class="sorting">Latest</option>
                     		<option class="sorting">Free</option>
                     	</select>
                     </span>
                     </div>----->
               </div>
            </div>
            <?php 
				$doc_user_id = '';
		
			if(!empty($hospital)) :
               foreach($hospital as $doctor):
               ?>
            <!-- Doctor Widget -->
            <div class="card">
               <div class="card-body cardHover">
                  <div class="doctor-widget">
                     <div class="doc-info-left">
                        <div class="doctor-img dctorPics">
                           <a href="<?php echo base_url() ?>hospital-profile/<?php echo base64_encode($doctor->id); ?>"> 
                           <img src="<?php echo base_url() ?>assets/img/hospital/<?php echo $doctor->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/hospital/123.png') ?>'" class="img-fluid" alt="User Image" style="border-radius:50%; height:150px; width:150px;">
                           </a>
                        </div>
                        <div class="doc-info-cont">
                           <h4 class="doc-name"><a href="<?php echo base_url() ?>hospital-profile/<?php echo base64_encode($doctor->id); ?>"><?php echo $doctor->name;?> </a></h4>
                           <p class="doc-speciality">
                              <?php
								$doc_user_id = $doctor->user_id;
                                if(!empty($doctor->degree)){
									$degree = implode(',',json_decode($doctor->degree));
								}else{
									$degree = 'N/A';
								}
                                 //echo "<pre>";
                                 //print_r($degree);
                                echo $degree;
                                  ?>
                           </p>
                           




<p><span id="dots"></span><span id="more" style="display: none;"><?php
                              $data=$this->db->query('SELECT specialities.image as special_img, specialities.service_name,specialities.id as special_id from doctor_specialities
                                          join specialities on specialities.id=doctor_specialities.specialites_id
                                          join doctors on doctors.id=doctor_specialities.doctor_id
                                          where doctors.id='.$doctor->id .' ' )->result();
                              foreach($data as $row):
                              ?>
                           <b class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/<?php echo $row->special_img ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality"><?php echo $row->service_name ?></b> &nbsp;&nbsp;
                           <?php
                              endforeach;
                              
                              ?></span></p>

<!-- <a onclick="myFunction()" id="myBtn">Read more</a>  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
</script>


                           <div class="clinic-details">
                              <p class="doc-location mt-2"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor->address;?></p>
							  
							                          <div class="rating mt-1">
                           <span>Rating: </span>
                           <?php $sum=0; $rev=$this->db->select('rating')->where('doctor_id',$doctor->id)->get('review')->result(); 
                              $review=$this->db->where('doctor_id',$doctor->id)->select('*')->get('review')->result();
                              
                              if(!empty($rev))
                              {
                              
                              $total=count($rev);
                              foreach ($rev as $row):
                              
                              $sum=$sum+$row->rating;
                              
                              endforeach;
                              $totalaverage=$sum;
                              $sum=($sum/(5*$total))*100 ;
                              
                              if( $sum<=20){
                              ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php
                              }
                              else if($sum>=21 && $sum<=40){
                              
                              ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php  }
                              else if($sum>=41  && $sum<=60)
                              {
                                 ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              else if($sum>=61 && $sum<=80){
                                 ?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star "></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              else
                              {?>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <i class="fas fa-star filled"></i>
                           <span class="d-inline-block average-rating"></span>
                           <?php 
                              }
                              }
                              else
                              {?>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i>
                           <i class="fas fa-star "></i> 
                           <?php 
                              }
                              
                              ?>
                           <span class="d-inline-block average-rating">(<?php echo count($review); ?>)</span> 
                        </div>
							  
							  
                              <p class="doc-location " style="font-size:20px;"><B>Fee: Rs. <?php echo $doctor->fee;?></b></p>
                              <ul class="clinic-gallery"> 
                                 <?php 
                                    $data1=$this->db->query('SELECT specialities.image as special_img, specialities.service_name,specialities.id as special_id from doctor_specialities
                                    					join specialities on specialities.id=doctor_specialities.specialites_id
                                    					join doctors on doctors.id=doctor_specialities.doctor_id
                                    					where doctors.id='.$doctor->id .'  limit 3' )->result();
                                    ?>	
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="doc-info-right">
                        <!--<div class="clini-infos">
                           <ul>
                           	
                           	<!--<li><i class="fas fa-map-marker-alt"></i>
                           	<li><i class="far fa-money-bill-alt"></i>  </li>
                           </ul>
                           </div>--->


                        <div class="doctor-action">
                           <?php 
                              $data=$this->db->select('*')->where('member_id',$this->session->userdata('userid'))
                  			   ->where('doctor_id',$doctor->id)
                  			   ->where('status!=',3)
                  			   ->get('appointment')->result();
                           ?>
                           <?php if($this->session->userdata('username') == ''){?>
                             <!-- <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#like"><i class="far fa-comment-alt"></i></a>-->
                           <?php }
                              else if(empty($data))
                              {
                              	
                              ?>
                           <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#appointment">
                           <i class="far fa-comment-alt"></i>
                           </a>
                            <?php
                              }
                              else
                              { 
                              	?>
                          <!--<a class="btn btn-white msg-btn" href="<?php echo base_url(); ?>welcome/chat/<?php //echo $doctor->id;?>"><i class="far fa-comment-alt"></i></a>  -->
                           <?php 	
                               }
                               ?>
                           <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                           <i class="fas fa-phone"></i>
                           </a>
                           <!--a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                              <i class="fas fa-video"></i>
                              </a-->
                           <?php if($this->session->userdata('username') == ''){?>
                           <a href="javascript:void(0)" class="btn btn-white msg-btn ml-2" data-toggle="modal" data-target="#like"  >
                           <i class="far fa-thumbs-up"></i>
                           </a>
                           <?php }else{ ?>
                           <input type="hidden" id="patient_name" name="patient_name" value="<?php echo $this->session->userdata('user_id');?>"> 
                           <input type="hidden" id="doc_name" name="doc_name" value="">
                           <a href="javascript:void(0)" class=" btn btn-white msg-btn ml-2 like_one" data-id="<?php echo $doctor->id;?>">
                           <?php $like=count($this->db->get_where('likee', array('doc_id' =>$doctor->id ))->result());?>
                           <i class="far fa-thumbs-up"><?php echo $like; ?></i>
                           </a>
                           <?php } ?>
                           <!--<a href="javascript:void(0)" class="btn btn-white msg-btn"  >
                              <i class="far fa-comment"></i>
                              </a>--->
                        </div>
                        <div class="clinic-booking doctor_profle">
                           <a class="view-pro-btn" href="<?php echo base_url() ?>hospital-profile/<?php echo base64_encode($doctor->id); ?>">View Profile</a> 
                           <?php if($this->session->userdata('username') == ''){?>
                           <a class="apt-btn" id="login" href="#" data-toggle="modal" data-target="#delete_modal">Book Appointment</a>
                           <?php }
                              else if($this->session->userdata('username') == 'admin')
                              {
                              	?>
                           <a class="apt-btn"  href="<?php echo base_url()?>hospital-appointment/<?php echo base64_encode($doctor->id); ?>" data-toggle="modal" data-target="#admin">Book Appointment</a>
                           <?php 
                              }
                              
                              
                              
                              else{ ?>
                           <a class="apt-btn" href="<?php echo base_url()?>hospital-appointment/<?php echo base64_encode($doctor->id); ?>">Book Appointment</a>   
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Doctor Widget -->
            <?php 
				
				endforeach;
				endif;
               ?>
			   <?php } ?>
            <!----<div class="load-more text-center">
               <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
               </div>---->
         </div>
         <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script> 
         <script> 
            $(window).ready(function() { 
            $(".formid").on("keypress", function (event) { 
            	console.log("aaya"); 
            	var keyPressed = event.keyCode || event.which; 
            	if (keyPressed === 13) { 
            		//alert("You pressed the Enter key!!"); 
            		event.preventDefault(); 
            		$('form').submit(); 
            	} 
            }); 
            }); 
            
         </script>
         <!-- /content-left-->
         <!--div class="col-xl-5 col-lg-12 map-right">
            <div id="map" class="map-listing"></div>
            </div-->
         <!-- /map-right-->
      </div>
      <!-- /row-->
      <nav aria-label="Page navigation example" style="float: right;">
         <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
         </ul>
      </nav>
   </div>
</div>
</div>
</div>			
<!-- /Page Content -->
<!----delete model-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="like" aria-hidden="true" role="dialog">
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
               <input type="hidden" id="del_id" name="del" value=''>
               <h4 class="modal-title text-center" >Please Login</h4>
               <p class="mb-4"></p>
               <center>
                  <a href="<?php echo base_url('welcome/login') ?>" class="btn btn-primary"  name="submit">Login</a>
                  <a href="<?php echo base_url('welcome/register') ?>" class="btn btn-danger" >SignUp</a>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!--- voice call-->
<div class="modal fade call-modal" id="voice_call" aria-hidden="true" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
         <div class="modal-body">
            <!-- Outgoing Call -->
            <div class="call-box incoming-box">
               <div class="call-wrapper">
                  <div class="call-inner">
                     <div class="call-user">
                        <img alt="User Image" src="<?php echo base_url(); ?>assets_admin/img/logo-small.png" class="call-avatar">
                        <h4>CureU</h4>
                        <span>9999999999999</span>
                     </div>
                     <div class="call-items">
                        <a href="javascript:void(0);" class="btn btn-danger " data-dismiss="modal" style="background-color:#ff0100" >Close</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Outgoing Call -->
         </div>
      </div>
   </div>
</div>
<!--- voice call-->
<!--- book appointment-->
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
               <input type="hidden" id="del_id" name="del" value=''>
               <h4 class="modal-title text-center" >Please Login</h4>
               <p class="mb-4"></p>
               <center>
                  <a href="<?php echo base_url('welcome/login') ?>" class="btn btn-primary"  name="submit">Login</a>
                  <a href="<?php echo base_url('welcome/register') ?>" class="btn btn-danger" >SignUp</a>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!--- book appointment-->
<div class="modal fade" id="admin" aria-hidden="true" role="dialog">
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
               <h4 class="modal-title text-center" >Admin Cannot Book Appointment</h4>
            </div>
         </div>
      </div>
   </div>
</div>
<!---start-->
<div class="modal fade" id="appointment" aria-hidden="true" role="dialog">
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
               <input type="hidden" id="del_id" name="del" value=''>
               <center>
                  <img src="<?php echo base_url() ?>/assets/img/logo.png"/>
               </center>
               <h4 class="modal-title text-center" >Please Take Appointment</h4>
               <p class="mb-4">
               <center>
                  <a class="btn btn-primary" href="javascript:(0)" data-dismiss="modal">Cancel</a>
               </center>
               </p>
               <center>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!--enterkey-->											
<!---end-->