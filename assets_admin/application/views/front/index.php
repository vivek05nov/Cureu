<style>
.select2-container { 
   width: 242px!important;
   }  
#feedback {
	height: 0px;
	width: 85px;
	position: fixed;
	right: 0;
	top: 60%;
	z-index: 1000;
	transform: rotate(-90deg);
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-o-transform: rotate(-90deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
#feedback a {
	display: block;
	background:#f6b14a;
	height: 52px;
	padding-top: 10px;
	width: 155px;
	text-align: center;
	color: #fff;
	font-family: Arial, sans-serif;
	font-size: 17px;
	font-weight: bold;
	text-decoration: none;
}
#feedback a:hover {
	background:#0d7e9e;
}
</style>

<?php error_reporting(0);?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--======== Home Banner Section Start==========-->
<div class="section bg-grey">
   <!--<div class="section-header text-center">
      <h2>Common Health Concern</h2>
      <p>Consult a doctor online for any health issue</p>
      </div>-->
   <?php $data=$this->db->select('image')
      ->where('banner_type',"home")
      ->order_by('id',"Desc")
      ->limit(2)
      ->get('banner')->result();		 
      ?>
   <div class="health slider">
      <?php foreach($data as $row): ?>
      <div class="card-boxs height-400">
         <img src="<?php echo base_url(); ?>assets/img/banner/<?php echo $row->image ?>" class="img-fluid" alt="Speciality">
      </div>
      <?php endforeach; ?>
   </div>
</div>
<!--========= Home Banner Section End===========-->

<div id="feedback">
	<a href="<?php echo base_url('enquiry') ?>">Quick Enquiry</a>
</div>



<section class="section home-tile-section" style="margin-top:-10px;">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-9 m-auto">
            <div class="section-header text_clr text-center" data-aos="fade-down">
               <h2>What are you looking for?</h2>
            </div>
            <div class="row"  data-aos="fade-up">
               <div class="col-lg-4 mb-3">
                  <div class=" text-center doctor-book-card">
                     <img src="assets/img/visit-doctor.jpg" alt="" class="img-fluid">
                     <div class="doctor-book-card-content tile-card-content-1">
                         <div>
                           <h3 class="card-title mb-0">Visit a Doctor</h3>
                           <a href="<?php echo base_url('all-doctors');  ?>" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 mb-3">
                  <div class=" text-center doctor-book-card">
                     <img src="assets/img/find-treatment.jpg" alt="" class="img-fluid">
                     <div class="doctor-book-card-content tile-card-content-1">
                        <div>
                           <h3 class="card-title mb-0">Find a Treatment</h3>
                           <a href="<?php echo base_url('treatment');  ?>" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 mb-3">
                  <div class=" text-center doctor-book-card">
                     <img src="assets/img/lab-image.jpg" alt="" class="img-fluid">
                     <div class="doctor-book-card-content tile-card-content-1">
                        <div>
                           <h3 class="card-title mb-0">Find a Lab</h3>
                           <a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Coming Soon</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Clinic and Specialities -->
<?php /*<section class="section section-specialities">
   <div class="container-fluid">
   	<div class="section-header text-center">
   		<h2>Clinic and Specialities</h2>
   		<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
   	</div>
   	<div class="row justify-content-center">
   		<div class="col-md-9">
   			<!-- Slider -->
   			<div class="mySlides specialities-slider slider">
   				<!-- Slider Item -->
   				<?php 
      // echo "<pre>";
      // print_r($specialities);
      ?>
<?php if(!empty($specialities)):
   foreach($specialities as $row):
   ?>
<div class="speicality-item text-center">
   <div class="speicality-img">
      <img src="http://cureu.in/assets_admin/img/specialities/<?php echo $row->image;?>" class="img-fluid" alt="Speciality">
      <span><i class="fa fa-circle" aria-hidden="true"></i></span>
   </div>
   <p><?php echo $row->service_name;?></p>
</div>
<?php endforeach;
   endif;?>
<!-- /Slider Item -->
<!-- Slider Item -->
<!--<div class="speicality-item text-center">
   <div class="speicality-img">
   	<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
   	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
   </div>
   <p>Neurology</p>	
   </div>							
   <!-- /Slider Item -->
<!-- Slider Item -->
<!--<div class="speicality-item text-center">
   <div class="speicality-img">
   	<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
   	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
   </div>	
   <p>Orthopedic</p>	
   </div>							
   <!-- /Slider Item -->
<!-- Slider Item -->
<!--<div class="speicality-item text-center">
   <div class="speicality-img">
   	<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
   	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
   </div>	
   <p>Cardiologist</p>	
   </div>							
   <!-- /Slider Item -->
<!-- Slider Item -->
<!--<div class="speicality-item text-center">
   <div class="speicality-img">
   	<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
   	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
   </div>	
   <p>Dentist</p>
   </div>							
   <!-- /Slider Item -->
</div>
<!-- /Slider -->
</div>
</div>
</div>   
</section>	*/?> 
<!-- Clinic and Specialities -->

<!--==== Clinic and Specialities Section Start=====-->
<div class="section-specialities container-fluid">
   <div class="section-header text-center">
      <h2>Clinic and Specialities</h2>
      <!--p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br> tempor incididunt ut labore et dolore magna aliqua.</p-->
   </div>
   <div class="autoplay slider" data-aos="fade-up" data-aos-duration="3000">
      <?php if(!empty($specialities)):
         foreach($specialities as $row):
         ?>
      <a href="<?php echo base_url('specialities/').base64_encode($row->id) ?>/#hospital">
         <div class="card-box">
            <img src="<?php echo base_url(); ?>assets/img/specialities/<?php echo $row->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality" style="width:130px !important; height:130px !important">
            <h5><?php echo $row->service_name; ?></h5>
         </div>
      </a>
      <?php endforeach;
         endif;
         ?>
   </div>
</div>
<!--===== Clinic and Specialities Section End======-->

<!-- Popular Section -->
<section class="section section-doctor">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-header text-center">
               <h2>Doctors</h2>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="doctor-slider slider" data-aos="zoom-in">
               <?php if(!empty($doctors)) :
					$d_id = '';
                  foreach($doctors as $doctor):  

                  if($d_id != $doctor->id):
                  ?>
               <!-- Doctor Widget -->
               <div class="profile-widget slick-active " style="height:380px;">
                  <div class="doc-img">
                     <a href="<?php echo base_url('doctor-profile/').base64_encode($doctor->id) ?>">
                     <img class="img-fluid radius_img" alt="User Image" src="<?php echo base_url(); ?>assets/img/doctors/<?php echo $doctor->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'">
                     </a>
                  </div>
                  <div class="pro-content">
                     <h3 class="title">
                        <a href="<?php echo base_url() ?>doctor-profile//<?php echo base64_encode($doctor->id); ?>"><?php echo $doctor->name;?></a> 
                        <i class="fas fa-check-circle verified"></i>
                     </h3>
					 <?php
						if(!empty($doctor->degree)){
							$degree = implode(',',json_decode($doctor->degree));
						}else{
							$degree = 'N/A';
						}
						
															
					?>
                     <p class="speciality"><?php echo $degree; ?></p>
                     <div class="rating">
                        <?php $sum=0; $rev=$this->db->select('rating')->where('doctor_id',$doctor->id)->get('review')->result(); 
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
                        <?php
                           }
                           else if($sum>=21 && $sum<=40){
                           
                           ?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <?php  }
                           else if($sum>=41  && $sum<=60)
                           {
                           	?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <?php 
                           }
                           else if($sum>=61 && $sum<=80){
                           	?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <?php 
                           }
                           else
                           {?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
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
                        <?php $data=$this->db->where('doctor_id',$doctor->id)->select('*')->get('review')->result(); ?>
                        <span class="d-inline-block average-rating">(<?php echo count($data); ?>)</span>
                     </div>
                     <ul class="available-info">
                        <li>
                           <i class="fas fa-map-marker-alt"></i> <?php echo substr($doctor->address,0,25);?>...
                        </li>
                        <?php  
                           $doctor_special=$this->db->query('select specialities.service_name from doctor_specialities
                           							join specialities on specialities.id=doctor_specialities.specialites_id
                           							where doctor_specialities.doctor_id="'.$doctor->id.'" limit 1')->row();
                           	//print_r($doctor_special);
                           if(empty($doctor_special))
                           { 
                           	?>
                        <li>
                           <i class="fab fa-medrt"></i> <?php echo " ";?>
                        </li>
                        <?php 
                           }
                           else
                           {
                           ?> 
                        <li>
                           <i class="fab fa-medrt"></i><?php echo $doctor_special->service_name;?>
                        </li>
                        <?php 
                           } ?>
                     </ul>
                     <div class="row row-sm">
                        <div class="col-6">
                           <a href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>" class="btn view-btn">View Profile</a>
                        </div>
                        <div class="col-6">
                           <?php if($this->session->userdata('username') == ''){?>
                           <a class="btn book-btn" id="login" href="#" data-toggle="modal" data-target="#delete_modal">Book Now</a> 
                           <?php }else if($this->session->userdata('username')=='admin'){
                              ?>
                           <a href="#" class="btn book-btn" data-toggle="modal" data-target="#admin">Book Now</a> 
                           <?php } 
                              else
                              {
                              ?>
                           <a href="<?php echo base_url() ?>doctor-appointment/<?php echo base64_encode($doctor->id); ?>" class="btn book-btn">Book Now</a> 
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /Doctor Widget -->
               <?php  
			   $d_id = $doctor->id;
//print_r($d_id);die('okk');
			   endif;
			   endforeach;
                  endif;?>
               <!-- Doctor Widget -->
               <!---<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-02.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Darren Elder</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(35)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Newyork, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $50 - $300 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!--<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-03.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Deborah Angel</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(27)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Georgia, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $100 - $400 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!--<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-04.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Sofia Brient</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(4)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Louisiana, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $150 - $250 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!--<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-05.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Marvin Campbell</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(66)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Michigan, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $50 - $700 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!--<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-06.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Katharine Berthold</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(52)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Texas, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $100 - $500 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!---<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-07.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Linda Tobin</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(43)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> Kansas, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $100 - $1000 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- /Doctor Widget -->
               <!-- Doctor Widget -->
               <!---<div class="profile-widget">
                  <div class="doc-img">
                  	<a href="doctor-profile.html">
                  		<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-08.jpg">
                  	</a>
                  	<a href="javascript:void(0)" class="fav-btn">
                  		<i class="far fa-bookmark"></i>
                  	</a>
                  </div>
                  <div class="pro-content">
                  	<h3 class="title">
                  		<a href="doctor-profile.html">Paul Richard</a> 
                  		<i class="fas fa-check-circle verified"></i>
                  	</h3>
                  	<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
                  	<div class="rating">
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star filled"></i>
                  		<i class="fas fa-star"></i>
                  		<span class="d-inline-block average-rating">(49)</span>
                  	</div>
                  	<ul class="available-info">
                  		<li>
                  			<i class="fas fa-map-marker-alt"></i> California, USA
                  		</li>
                  		<li>
                  			<i class="far fa-clock"></i> Available on Fri, 22 Mar
                  		</li>
                  		<li>
                  			<i class="far fa-money-bill-alt"></i> $100 - $400 
                  			<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                  		</li>
                  	</ul>
                  	<div class="row row-sm">
                  		<div class="col-6">
                  			<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                  		</div>
                  		<div class="col-6">
                  			<a href="booking.html" class="btn book-btn">Book Now</a>
                  		</div>
                  	</div>
                  </div>
                  </div>
                  <!-- Doctor Widget -->
            </div>
         </div>
      </div>
   </div>
</section>

<!-- /Popular Section -->
<!-- <section class="section section-doctor" style="padding-top:0px !important">
   <div class="marquee-title">
      <marquee attribute_name = "attribute_value"....more attributes>
         <strong>Note : </strong> One or more lines or text message.....
      </marquee>
   </div>
</section> -->

<!--hospital section --->
<section class="section section-doctor" style="padding-top:0px !important">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-header text-center">
               <h2>Hospitals</h2>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="doctor-slider slider" data-aos="flip-up">
               <?php
				//print_r($hospital);die;
				if(!empty($hospital)) :
                  foreach($hospital as $hospita):
                  ?>
               <!-- hospital Widget -->
               <div class="profile-widget">
                  <div class="doc-img">
                     <a href="<?php echo base_url('hospital-profile/').base64_encode($hospita->id) ?>">
                     <img class="img-fluid" alt="User Image" src="http://cureu.in/assets/img/hospital/<?php echo $hospita->image; ?>" style="height:158px" onerror="this.onerror=null; this.src='<?php echo base_url() ?>assets/img/HOSP_icon_flat.jpg'">
                     </a>
                     <!--<a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                        </a>--->
                  </div>
                  <div class="pro-content">
                     <h3 class="title">
                        <a href="<?php echo base_url() ?>hospital-profile/<?php echo base64_encode($hospita->id); ?>"><?php echo $hospita->hospital_name;?></a> 
                        <i class="fas fa-check-circle verified"></i>
                     </h3>
                     <div class="rating">
                        <?php $sum=0; $rev=$this->db->select('rating')->where('hospital_id',$hospita->id)->get('review_hospital')->result(); 
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
                        <?php
                           }
                           else if($sum>=21 && $sum<=40){
                           
                           ?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <?php  }
                           else if($sum>=41  && $sum<=60)
                           {
                           	?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <?php 
                           }
                           else if($sum>=61 && $sum<=80){
                           	?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star "></i>
                        <?php 
                           }
                           else
                           {?>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
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
                        <?php $data=$this->db->where('hospital_id',$hospita->id)->select('*')->get('review_hospital')->result();?>
                        <span class="d-inline-block average-rating">(<?php echo count($data); ?>)</span>
                     </div>
                     <ul class="available-info">
                        <li>
                           <i class="fas fa-map-marker-alt"></i> <?php echo substr($hospita->hos_address,0,25);?>...
                        </li>
                     </ul>
                     <div class="row row-sm">
                        <div class="col-6">
                           <a href="<?php echo base_url() ?>hospital-profile/<?php echo base64_encode($hospita->id); ?>" class="btn view-btn">View Profile</a>
                        </div> 
                        <div class="col-6">
                           <?php if($this->session->userdata('username') == ''){?>
                           <a class="btn book-btn" id="login" href="#" data-toggle="modal" data-target="#delete_modal">Book Now</a> 
                           <?php } 
                              else if($this->session->userdata('username')=='admin'){
                              ?> 
                           <a href="#" class="btn book-btn" data-toggle="modal" data-target="#admin">Book Now</a> 
                           <?php } 
                              else{ ?>
                           <a href="<?php echo base_url() ?>hospital-appointment/<?php echo base64_encode($hospita->id); ?>" class="btn book-btn">Book Now</a> 
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /hospital Widget -->
               <?php  endforeach;
                  endif;?>
               <!-- Doctor Widget -->
            </div>
         </div>
      </div>
   </div>
</section>
<!---end section -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>


<!-- Testimonials Start-->

<?php
//$products = array(); // Products retreived from database

$is_active = true; // Only true for the first iteration
$i = 0;
?>

<section class="testimonial text-center">
   <div class="container">
      <div class="heading white-heading">
          Testimonial
      </div>
      <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
       
          <div class="carousel-inner" role="listbox" data-aos="zoom-in">
		  
		  <?php foreach ($feedback as $feed) {  ?>
              <div class="carousel-item <?php if ($is_active) echo ' active'?>">
                  <div class="testimonial4_slide">
                      <img src="<?php echo $feed->image;?>" class="img-circle img-responsive" />
                      <p><?php echo $feed->feedback;?></p>
                      <h4><?php echo $feed->name;?></h4>
                  </div>
              </div>
		      <?php
     $i++; 
     if ($is_active) $is_active = false;
   } ?>
              
          </div>
          <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#testimonial4" data-slide="next">
              <span class="carousel-control-next-icon"></span>
          </a>
      </div>
   </div>
</section>
<!-- Testimonials End-->

<section class="planning-block"> 
   <div class="container-fluid"> 
      <div class="row"> 
         <div class="container planning-grids text-center no-padding section-header"> 
            <h2 class="planning-heading">Plan Travel to Treatment</h2> 
            <h4 class="sub-heading-block">Transparent - Without Hassles</h4>
            <div class="plantravel-block"> 
               <div class="welcome-grids"> 
                  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-6 welcome-grid text-center"> 
                     <div class="ih-item circle effect9 left_to_right"> 
                        <a href="#"> 
                           <div class="img">
                              <img src="assets/img/features/document-details.svg" alt="">
                           </div> 
                        </a> 
                     </div> 
                     <div class="content-part"> 
                        <p class="treatment-step">Send your reports and <br> preferences to us </p> 
                     </div> 
                  </div> 
                  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-6 welcome-grid text-center"> 
                     <div class="ih-item circle effect9 left_to_right"> 
                        <a href="#"> 
                           <div class="img">
                              <img src="assets/img/features/quotation.svg" alt="">
                           </div> 
                        </a> 
                     </div> 
                     <div class="content-part"> 
                        <p class="treatment-step">Receive quotation(s) <br> within 48 Hours </p> 
                     </div> 
                  </div> 
                  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-6 welcome-grid text-center"> 
                     <div class="ih-item circle effect9 left_to_right"> 
                        <a href="#"> 
                           <div class="img flyback">
                              <img src="assets/img/features/received-by-us.svg" alt="">
                           </div> 
                        </a> 
                     </div> 
                     <div class="content-part"> 
                        <p class="treatment-step">Get received by us</p> 
                     </div> 
                  </div> 
                  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-6 welcome-grid text-center"> 
                     <div class="ih-item circle effect9 left_to_right"> 
                        <a href="#"> 
                           <div class="img flyback">
                              <img src="assets/img/features/fly-back.svg" alt="">
                           </div> 
                        </a> 
                     </div> 
                     <div class="content-part"> 
                        <p class="treatment-step">Get treated and fly <br> back </p> 
                     </div> 
                  </div>
                  <div class="clearfix"></div> 
               </div>
            </div>
         </div> 
      </div> 
   </div> 
</section>

<!-- Availabe Features -->
<section class="section section-features">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5 features-img" data-aos="fade-right">
            <img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
         </div>
         <div class="col-md-7" data-aos="fade-left">
            <div class="section-header">
               <p>For Better Feature and Experience</p>
               <h2 class="mt-2">Download The App</h2>
               <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
            </div>
            <ul>
               <li>	Consult a Doctor over chat/call instantly.</li>
               <li>	Private and Sucure consultations.</li>
               <li>	Talk to the doctor in own language.</li>
               <li>	Symptoms covered over 20+ specialities.</li>
               <li>	Get Discount on Lab and Medicine.</li>
            </ul>
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <a href=""><img class="img-fluid small" alt="User Image" src="assets/img/play-store.png"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- /Availabe Features -->
<!-- Blog Section -->
<?php 	/*
   <section class="section section-blogs">
   <div class="container-fluid">
   
   <!-- Section Header -->
   <div class="section-header text-center">
   	<h2>Blogs and News</h2>
   	<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
   </div>
   <!-- /Section Header -->
   
   <div class="row blog-grid-row">
   	<div class="col-md-6 col-lg-3 col-sm-12">
   	
   		<!-- Blog Post -->
   		<div class="blog grid-blog">
   			<div class="blog-image">
   				<a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image"></a>
   			</div>
   			<div class="blog-content">
   				<ul class="entry-meta meta-item">
   					<li>
   						<div class="post-author">
   							<a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>Dr. Ruby Perrin</span></a>
   						</div>
   					</li>
   					<li><i class="far fa-clock"></i> 4 Dec 2019</li>
   				</ul>
   				<h3 class="blog-title"><a href="blog-details.html">Doccure – Making your clinic painless visit?</a></h3>
   				<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
   			</div>
   		</div>
   		<!-- /Blog Post -->
   		
   	</div>
   	<div class="col-md-6 col-lg-3 col-sm-12">
   	
   		<!-- Blog Post -->
   		<div class="blog grid-blog">
   			<div class="blog-image">
   				<a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-02.jpg" alt="Post Image"></a>
   			</div>
   			<div class="blog-content">
   				<ul class="entry-meta meta-item">
   					<li>
   						<div class="post-author">
   							<a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-02.jpg" alt="Post Author"> <span>Dr. Darren Elder</span></a>
   						</div>
   					</li>
   					<li><i class="far fa-clock"></i> 3 Dec 2019</li>
   				</ul>
   				<h3 class="blog-title"><a href="blog-details.html">What are the benefits of Online Doctor Booking?</a></h3>
   				<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
   			</div>
   		</div>
   		<!-- /Blog Post -->
   		
   	</div>
   	<div class="col-md-6 col-lg-3 col-sm-12">
   	
   		<!-- Blog Post -->
   		<div class="blog grid-blog">
   			<div class="blog-image">
   				<a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-03.jpg" alt="Post Image"></a>
   			</div>
   			<div class="blog-content">
   				<ul class="entry-meta meta-item">
   					<li>
   						<div class="post-author">
   							<a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-03.jpg" alt="Post Author"> <span>Dr. Deborah Angel</span></a>
   						</div>
   					</li>
   					<li><i class="far fa-clock"></i> 3 Dec 2019</li>
   				</ul>
   				<h3 class="blog-title"><a href="blog-details.html">Benefits of consulting with an Online Doctor</a></h3>
   				<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
   			</div>
   		</div>
   		<!-- /Blog Post -->
   		
   	</div>
   	<div class="col-md-6 col-lg-3 col-sm-12">
   	
   		<!-- Blog Post -->
   		<div class="blog grid-blog">
   			<div class="blog-image">
   				<a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-04.jpg" alt="Post Image"></a>
   			</div>
   			<div class="blog-content">
   				<ul class="entry-meta meta-item">
   					<li>
   						<div class="post-author">
   							<a href="doctor-profile.html"><img src="assets/img/doctors/doctor-thumb-04.jpg" alt="Post Author"> <span>Dr. Sofia Brient</span></a>
   						</div>
   					</li>
   					<li><i class="far fa-clock"></i> 2 Dec 2019</li>
   				</ul>
   				<h3 class="blog-title"><a href="blog-details.html">5 Great reasons to use an Online Doctor</a></h3>
   				<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
   			</div>
   		</div>
   		<!-- /Blog Post -->
   		
   	</div>
   </div>
   <div class="view-all text-center"> 
   	<a href="blog-list.html" class="btn btn-primary">View All</a>
   </div>
   </div>
   </section>
   */ ?>
<!-- /Blog Section -->	
</div>


<!-- <nav class="navbar navbar-inverse">
   <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed service_megamnu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">Services</span>
         </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li class="dropdown dropdown-megamenu">

               <div class="dropdown-container">
                  <div class="">
                     <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="media">
                              <div class="media-body">
                                 <ul class="list-links">
                                    <li><a href="#">Press Every Button</a></li>
                                    <li><a href="#">Smart Choice</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="media">
                              <div class="media-body">
                                 <ul class="list-links">
                                    <li><a href="#">Harley-Davidson</a></li>
                                    <li><a href="#">Will you be my Valentine?</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <ul>
                              <li>dsfdf</li>
                              <li>dsfdf</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
</nav> -->

<script>
   $(".js-example-tags").select2({
     tags: true
   });
   function get_city(cls)
   { 
       if(cls!='-1')
       {
           $.ajax(
           {
               type:"POST",
               url:"<?php echo base_url(); ?>welcome/get_city",
               dataType: "JSON",
               data:{'state':cls},
               success:function(data){
                   $("#city").empty();
                   $("#city").append("<option value=-1> ~~ Select City ~~</option>");
                   $.each(data,function(i,item)
                   {
                       $("#city").append("<option value="+item.id+">"+item.name+"</option>");
                   });
               }
           });
       }
       else
       {
           $("#city").empty();
           $("#city").append("<option value=-1> ~~ Select Section ~~</option>");
           alert("Please First Select The Nationality");
       }
   }
   
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
   
   ///get specialities
   function get_special()
   { 
       
           $.ajax(
           {
               
               url:"<?php echo base_url(); ?>welcome/get_special",
               dataType: "JSON",
               success:function(data){
                   $("#special").empty();
                   $("#special").append("<option value=-1> ~~ Select Area ~~</option>");
                   $.each(data,function(i,item)
                   {
                       $("#special").append("<option value="+item.id+">"+item.service_name+"</option>");
                   });
               }
           });
       
       
   }
</script>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<!--============= Css Section Start ==============-->
<style type="text/css">
   /*.slick-slide {margin: 0px 20px;}*/
   .slick-slide img {width: 100%;}
   .slick-prev:before,
   .slick-next:before {color: black;}
   .slick-slide {transition: all ease-in-out .3s;opacity: .2;}
   .slick-active {opacity: .5;}
   .slick-current {opacity: 1;}
   .card-box {margin: 3px 2px 10px;padding: 20px 20px 10px;text-align: center;}
   .card-box h5 {margin-top: 15px;font-size: 17px;}
   .card-box img {border-radius: 100px;margin: 0 auto;-webkit-box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);}
   .card-box p a {color: #15558d;font-weight: 500;}
   .price {font-size: 14px;}
   .slick-active {opacity: 1;}
   .text-center{text-align:center;}
   .height-400 img{height:430px;}
   @media only screen and (max-width:768px) {
   .card-box h5 {margin-top: 10px;font-size: 12px;}
   }
   @media only screen and (max-width:980px) {
   .height-400 img {height:130px;}
   }
</style>
<!--============== Css Section End ===============-->
<!-- Add the slick-.js if you want default styling -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--========== JavaScript Section Start ===========-->
<script type="text/javascript">
   $(document).on('ready', function() {
       $('.autoplay').slick({
           slidesToShow: 6,
           slidesToScroll: 1,
           autoplay: true,
           autoplaySpeed: 2000,
           responsive: [{
               breakpoint: 768,
               settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1
               }
           }]
       });
   });
   $(document).on('ready', function() {
       $('.health').slick({
           slidesToShow: 1,
           slidesToScroll: 1,
           autoplay: true,
           autoplaySpeed: 5000,
       });
   });
</script>

<!---ajaj--->
<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script> 
	<script> 
		$(window).ready(function() { 
		$("#form-id").on("keypress", function (event) { 
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
<!--=========== JavaScript Section End ============-->

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