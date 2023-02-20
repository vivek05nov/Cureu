<?php 
   // echo "<pre>";
   
   //  
   
   $gallery=json_decode($hospital['gallery']);
   
   
   
   $hotel_image=json_decode($hospital['hotel_image']);
   
   $hotel_name=json_decode($hospital['hotel_name']);
   
   $hospital_facilities=json_decode($hospital['hospital_facilities']); 
   
   $pharmacy_image=json_decode($hospital['pharmacy_image']);
   
   $pharmacy_name=json_decode($hospital['pharmacy_name']);
   
   $hos_doctor=json_decode($hospital['hos_doctor']);
   
   $has_doctors = json_decode($hospital['hos_doctor']);
   
   $has_doctor_img = json_decode($hospital['hos_doctor_image']);
   
   //print_r($specialities); die;  
   
   // echo "<pre>";
   
   // $doct_name = array();
   
   // foreach( $dataa as $row):
   
   // $doct_name['d_name'] = $row->hos_doctor;
   
   
   
   // $img = json_decode($row->hos_doctor_image);
   
   // foreach($img->file_name as $key=>$value): 
   
     // $doct_name['d_img'] = $img->file_name[$key];
   
   // endforeach; 
   
   
   
   // endforeach;
   
   // echo json_encode($doct_name['d_img']);
   
   // die; 
   
   ?> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hospital Profile</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Hospital Profile</h2>
         </div>
      </div>
   </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
   <div class="container">
      <!-- Doctor Widget -->
      <div class="card">
         <div class="card-body">
            <div class="doctor-widget">
               <div class="doc-info-left">
                  <div class="doctor-img">
                     <img src="<?php echo base_url() ?>assets/img/hospital/<?php echo $hospital['image']; ?>" class="img-fluid" alt="User Image" onerror="this.onerror=null; this.src='<?php echo base_url() ?>assets/img/HOSP_icon_flat.jpg'">
                  </div>
                  <div class="doc-info-cont">
                     <h4 class="doc-name"><?php echo $hospital['name'];?> </h4>
                     <!--<p class="doc-speciality"><?php// echo $hospital->degree;?></p>-->
                     <p class="doc-department">
                        <?php  foreach($specialities as $key => $row):?>
                        <?php echo $specialities[$key]->service_name; ?><span ><b>&nbsp;,</b></span>
                        <?php endforeach; ?>
                     </p>
                     <div class="rating">
                        <?php $sum=0; $rev=$this->db->select('rating')->where('hospital_id',$hospital['id'])->get('review_hospital')->result();
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
                        <span class="d-inline-block average-rating">(<?php echo count($review); ?>)</span>
                     </div>
                     <div class="clinic-details">
                        <p class="doc-location">
                           <i class="fas fa-map-marker-alt"></i> <?php echo  $hospital['hos_address'];?><!-- <a href="javascript:void(0);">Get Directions</a>---->
                        </p>
                        <ul class="clinic-gallery">
                           <?php 
                              if(!empty($gallery)):
                              
                              foreach($gallery->file_name as $key=>$value): ?>
                           <li>
                              <a href="<?php echo base_url() ?>assets/img/gallery/<?php echo $gallery->file_name[$key]; ?>" data-fancybox="gallery">
                              <img src="<?php echo base_url() ?>assets/img/gallery/<?php echo $gallery->file_name[$key]; ?>" alt="Feature">
                              </a>
                           </li>
                           <?php endforeach;
                              endif;
                              
                              ?>
                        </ul>
                     </div>
                     <!--<div class="clinic-services">
                        <span>Dental Fillings</span>
                        
                        <span>Teeth Whitneing</span>
                        
                        </div>--->
                  </div>
               </div>
               <div class="doc-info-right">
                  <div class="clini-infos">
                     <ul>
                        <!---<li><i class="far fa-comment"></i> 35 Feedback</li>
                           <li><i class="fas fa-map-marker-alt"></i></li>
                           
                           <li><i class="far fa-money-bill-alt"></i> $100 per hour </li>--->
                     </ul>
                  </div>
                  <div class="doctor-action">
                     <!--<a href="javascript:void(0)" class="btn btn-white fav-btn">
                        <i class="far fa-bookmark"></i>
                        
                        </a>--->
                     <?php if($this->session->userdata('username') == ''){?>
                     <a href="javascript:void(0)" class="btn btn-white msg-btn ml-2" data-toggle="modal" data-target="#like"  >
                     <i class="far fa-thumbs-up"></i>
                     </a>
                     <?php }else{ ?>
                     <input type="hidden" id="patient_name" name="patient_name" value="<?php echo $this->session->userdata('user_id');?>"> 
                     <input type="hidden" id="hos_name" name="hos_name" value="<?php echo $hospital['id'];?>">
                     <a href="javascript:void(0)" class=" btn btn-white msg-btn ml-2 like_onee"  data-id="<?php echo $hospital['id'];?>">
                     <i class="far fa-thumbs-up" id="count"><?php echo $like; ?></i>
                     </a>
                     <?php } ?>
                     <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                     <i class="fas fa-phone"></i>
                     </a>
                     <a href="#doc_reviews" data-toggle="tab" id="comment"  class="btn btn-white call-btn">
                     <i class="far fa-comment"></i>
                     </a>
                     <!--a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                        <i class="fas fa-video"></i>
                        
                        </a-->
                  </div>
                  <div class="clinic-booking">
                    <!--- <?php/* if($this->session->userdata('username') == ''){ ?>
                     <a class="apt-btn" id="login" href="#" data-toggle="modal" data-target="#like" >Book Appointment</a>
                     <?php }
                        else if($this->session->userdata('username') == 'admin')
                        
                        {
                        
                        	?>
                     <a class="apt-btn" href="<?php echo base_url()?>hospital-profile/<?php echo base64_encode($hospital['id']); ?>" data-toggle="modal" data-target="#admin">Book Appointment</a>   
                     <?php /*
                        }
                        
                        
                        
                        else{
                        
                        	//echo "vivek";
                        
                        	?>
                     <a class="apt-btn" href="<?php echo base_url()?>hospital-appointment/<?php echo base64_encode($hospital['id']); ?>">Book Appointment</a>   
                      <?php //} */?> ---->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /Doctor Widget -->
      <!-- Doctor Details Tab -->
      <div class="card">
         <div class="card-body pt-0">
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
               <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                  <li class="nav-item">
                     <a class="nav-link" id="overview" href="#doc_overview" data-toggle="tab">Overview</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="location" href="#doc_locations" data-toggle="tab">Locations</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="review"  href="#doc_reviews" data-toggle="tab">Reviews</a>
                  </li>
               </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="tab-content pt-0">
               <!-- Overview Content -->
               <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                  <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <!-- About Details -->
                        <div class="widget about-widget">
                           <h4 class="widget-title">About Me</h4>
                           <p><?php echo $hospital['about_hos'];?></p>
                        </div>
                        <!-- /About Details -->
                        <!----hospital Facilities--->
                        <div class="service-list">
                           <h4>Facilities</h4>
                           <ul class="clearfix" >
                              <?php 
                                 if(!empty($hospital_facilities)):
                                 
                                 foreach($hospital_facilities as $key => $row):?>
                              <li style="width:20%"><?php echo $hospital_facilities[$key]; ?></li>
                              <?php endforeach;
                                 endif;
                                 
                                 ?>
                           </ul>
                        </div>
                        <!----hospital Facilities end--->
                        <!-- Education Details -->
                        <div class="widget education-widget">
                           <h4 class="widget-title"> Nearby Hotel</h4>
                           <div class="experience-box">
                              <ul  id="menu">
                                 <?php if(!empty($hotel_image)): ?>
                                 <?php foreach( $hotel_image->file_name as $key =>$value):?>	
                                 <li>
                                    <div class="doctor-img">
                                       <a href="<?php echo base_url() ?>assets/img/hotel/<?php echo ($hotel_image->file_name[$key]); ?>" data-fancybox="gallery2">
                                       <img src="<?php echo base_url() ?>assets/img/hotel/<?php echo ($hotel_image->file_name[$key]); ?>" class="img-fluid" alt="User Image">
                                       </a>
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <a href="#/" class=" mt-5 name"><?php  echo ($hotel_name[$key]);?></a>
                                          <!--<span class="time">1998 - 2003</span>-->
                                       </div>
                                    </div>
                                 </li>
                                 <?php 
                                    endforeach;
                                    
                                    endif;
                                    
                                    ?>
                              </ul>
                           </div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-12" >
                        <!-- /Education Details -->
                        <div class="widget education-widget">
                           <h4 class="widget-title"> Nearby Pharmacy </h4>
                           <div class="experience-box">
                              <ul  id="menu">
                                 <?php
                                    if(!empty($pharmacy_image)){
                                    
                                    foreach( ($pharmacy_image->file_name) as $key =>$value):?>	
                                 <li>
                                    <div class="doctor-img">
                                       <img src="<?php echo base_url() ?>assets/img/pharmacy/<?php  echo ($pharmacy_image->file_name[$key]);  ?>" class="img-fluid" alt="User Image">
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <a href="#/" class="name"><?php  echo ($pharmacy_name[$key]);?></a>
                                          <!--<span class="time">1998 - 2003</span>-->
                                       </div>
                                    </div>
                                 </li>
                                 <?php endforeach;
                                    }
                                    
                                    		else
                                    
                                    		{
                                    
                                    			?>
                                 <li>
                                    <div class="doctor-img">
                                       <img src="" class="img-fluid" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image">
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <a href="#/" class="name"></a>
                                          <!--<span class="time">1998 - 2003</span>-->
                                       </div>
                                    </div>
                                 </li>
                                 <?php 	
                                    }
                                    
                                    	
                                    
                                    				
                                    
                                    	?>
                              </ul>
                           </div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <!-- Specializations List -->
                     <div class="col-md-12 col-lg-12">
                        <div class="service-list">
                           <h4>Specializations</h4>
                           <ul class="clearfix">
                              <?php if(!empty($specialities)): ?>
                              <?php  foreach($specialities as $key => $row):?>
                              <li><?php echo $specialities[$key]->service_name; ?></li>
                              <?php endforeach;
                                 endif;
                                 
                                 ?>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-12">
                        <div class="widget education-widget">
                           <h4 class="widget-title"> Doctors</h4>
                           <div class="experience-box">
                              <ul  id="menu">
                                 <?php 	if(!empty($has_doctor_img)):
                                    foreach($has_doctor_img->file_name as $key=>$value):  ?>
                                 <li>
                                    <div class="doctor-img">
                                       <img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $has_doctor_img->file_name[$key]; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" class="img-fluid" alt="User Image" style="width:100px; height:100px;">
                                       </a>
                                    </div>
                                 </li>
                                 <?php endforeach;
                                    endif;
                                    
                                    ?>      
                              </ul>
                           </div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-12">
                        <div class="widget education-widget">
                           <h4 class="widget-title"></h4>
                           <div class="experience-box">
                              <ul  id="menu">
                                 <?php 	if(!empty($has_doctors)):
                                    foreach( $has_doctors as $key =>$value):  ?>
                                 <li>
                                    <div class="doctor-img">
                                       <a href="#/" class=" mt-5 name"><?php echo $has_doctors[$key]; ?></a> 
                                    </div>
                                 </li>
                                 <?php endforeach;
                                    endif;
                                    
                                    ?>      
                              </ul>
                           </div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <!-- /Specializations List -->
                  </div>
               </div>
               <!-- /Overview Content -->
               <!-- Locations Content -->
               <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                  <!-- Location List -->
                  <div class="location-list">
                     <div class="row">
                        <!-- Clinic Content -->
                        <div class="col-md-6">
                           <div class="clinic-content">
                              <h4 class="clinic-name"><a href="#"><?php echo $hospital['name']; ?></a></h4>
                              <!---<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>---->
                              <div class="rating">
                                 <?php $sum=0; $rev=$this->db->select('rating')->where('hospital_id',$hospital['id'])->get('review_hospital')->result();
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
                                 <span class="d-inline-block average-rating">(<?php echo count($review); ?>)</span> 
                              </div>
                              <div class="clinic-details mb-0">
                                 <h5 class="clinic-direction">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo $hospital['hos_address']; ?> <br><!--<a href="javascript:void(0);">Get Directions</a>--->
                                 </h5>
                                 <ul>
                                    <?php
                                       if(!empty($gallery)):
                                       
                                       foreach($gallery->file_name as $key=>$value): ?>
                                    <li>
                                       <a href="<?php echo base_url() ?>assets/img/gallery/<?php echo $gallery->file_name[$key]; ?>" data-fancybox="gallery">
                                       <img src="<?php echo base_url() ?>assets/img/gallery/<?php echo $gallery->file_name[$key]; ?>" alt="Feature">
                                       </a>
                                    </li>
                                    <?php endforeach;
                                       endif;
                                       
                                       ?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <!-- /Clinic Content -->
                        <!-- Clinic Timing -->
                        <!--<div class="col-md-4">
                           <div class="clinic-timing">
                           
                           	<div>
                           
                           		<p class="timings-days">
                           
                           			<span> Mon - Sat </span>
                           
                           		</p>
                           
                           		<p class="timings-times">
                           
                           			<span>10:00 AM - 2:00 PM</span>
                           
                           			<span>4:00 PM - 9:00 PM</span>
                           
                           		</p>
                           
                           	</div>
                           
                           	<div>
                           
                           	<p class="timings-days">
                           
                           		<span>Sun</span>
                           
                           	</p>
                           
                           	<p class="timings-times">
                           
                           		<span>10:00 AM - 2:00 PM</span>
                           
                           	</p>
                           
                           	</div>
                           
                           </div>
                           
                           </div>---->
                        <!-- /Clinic Timing -->
                        <!--<div class="col-md-2">
                           <div class="consult-price">
                           
                           	$250
                           
                           </div>
                           
                           </div>--->
                     </div>
                  </div>
                  <!-- /Location List -->
                  <!-- Location List -->
                  <?php /*
                     <div class="location-list">
                     
                     	<div class="row">
                     
                     	
                     
                     		<!-- Clinic Content -->
                     
                     		<div class="col-md-6">
                     
                     			<div class="clinic-content">
                     
                     				<h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                     
                     				<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                     
                     				<div class="rating">
                     
                     					<i class="fas fa-star filled"></i>
                     
                     					<i class="fas fa-star filled"></i>
                     
                     					<i class="fas fa-star filled"></i>
                     
                     					<i class="fas fa-star filled"></i>
                     
                     					<i class="fas fa-star"></i>
                     
                     					<span class="d-inline-block average-rating">(4)</span>
                     
                     				</div>
                     
                     				<div class="clinic-details mb-0">
                     
                     					<p class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2883  University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
                     
                     					<ul>
                     
                     						<li>
                     
                     							<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                     
                     								<img src="assets/img/features/feature-01.jpg" alt="Feature Image">
                     
                     							</a>
                     
                     						</li>
                     
                     						<li>
                     
                     							<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                     
                     								<img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                     
                     							</a>
                     
                     						</li>
                     
                     						<li>
                     
                     							<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                     
                     								<img src="assets/img/features/feature-03.jpg" alt="Feature Image">
                     
                     							</a>
                     
                     						</li>
                     
                     						<li>
                     
                     							<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                     
                     								<img src="assets/img/features/feature-04.jpg" alt="Feature Image">
                     
                     							</a>
                     
                     						</li>
                     
                     					</ul>
                     
                     				</div>
                     
                     
                     
                     			</div>
                     
                     		</div>
                     
                     		<!-- /Clinic Content -->
                     
                     		
                     
                     		<!-- Clinic Timing -->
                     
                     		<div class="col-md-4"> 
                     
                     			<div class="clinic-timing">
                     
                     				<div>
                     
                     					<p class="timings-days">
                     
                     						<span> Tue - Fri </span>
                     
                     					</p>
                     
                     					<p class="timings-times">
                     
                     						<span>11:00 AM - 1:00 PM</span>
                     
                     						<span>6:00 PM - 11:00 PM</span>
                     
                     					</p>
                     
                     				</div>
                     
                     				<div>
                     
                     					<p class="timings-days">
                     
                     						<span>Sat - Sun</span>
                     
                     					</p>
                     
                     					<p class="timings-times">
                     
                     						<span>8:00 AM - 10:00 AM</span>
                     
                     						<span>3:00 PM - 7:00 PM</span>
                     
                     					</p>
                     
                     				</div>
                     
                     			</div>
                     
                     		</div>
                     
                     		<!-- /Clinic Timing -->
                     
                     		
                     
                     		<div class="col-md-2">
                     
                     			<div class="consult-price">
                     
                     				$350
                     
                     			</div>
                     
                     		</div>
                     
                     	</div>
                     
                     </div> */?>
                  <!-- /Location List -->
               </div>
               <!-- /Locations Content -->
               <!-- Reviews Content -->
               <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                  <!-- Review Listing -->
                  <div class="widget review-listing">
                     <ul class="comments-list">
                        <!-- Comment List -->
                        <?php foreach($review as $row): ?>
                        <li>
                           <div class="comment">
                              <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'">
                              <div class="comment-body">
                                 <div class="meta-data">
                                    <span class="comment-author"><?php echo $row->patient_id; ?></span>
                                    <span class="comment-date"><?php echo $row->created_at; ?></span>
                                 </div>
                                 <div class="review-count rating ">
                                    <?php for($i=1;$i<=5;$i++):
                                       if($i<=$row->rating){
                                       
                                       ?>
                                    <i class="fas fa-star filled"></i>
                                    <?php 
                                       }
                                       
                                       else
                                       
                                       {?>
                                    <i class="fas fa-star "></i>
                                    <?php 
                                       }
                                       
                                       
                                       
                                       endfor; ?>
                                 </div>
                                 <!---<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>--->
                                 <p class="comment-content">
                                    <?php echo $row->comment; ?>
                                 </p>
                                 <!---<div class="comment-reply">
                                    <a class="comment-btn" href="#">
                                    
                                    	<i class="fas fa-reply"></i> Reply
                                    
                                    </a>
                                    
                                      <p class="recommend-btn">
                                    
                                    <span>Recommend?</span>
                                    
                                    <a href="#" class="like-btn">
                                    
                                    	<i class="far fa-thumbs-up"></i> Yes
                                    
                                    </a>
                                    
                                    <a href="#" class="dislike-btn">
                                    
                                    	<i class="far fa-thumbs-down"></i> No
                                    
                                    </a>
                                    
                                    </p>
                                    
                                    </div>---->
                              </div>
                           </div>
                           <!-- Comment Reply -->
                           <!--<ul class="comments-reply">
                              <li>
                              
                              	<div class="comment">
                              
                              		<img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient1.jpg">
                              
                              		<div class="comment-body">
                              
                              			<div class="meta-data">
                              
                              				<span class="comment-author">Charlene Reed</span>
                              
                              				<span class="comment-date">Reviewed 3 Days ago</span>
                              
                              				<div class="review-count rating">
                              
                              					<i class="fas fa-star filled"></i>
                              
                              					<i class="fas fa-star filled"></i>
                              
                              					<i class="fas fa-star filled"></i>
                              
                              					<i class="fas fa-star filled"></i>
                              
                              					<i class="fas fa-star"></i>
                              
                              				</div>
                              
                              			</div>
                              
                              			<p class="comment-content">
                              
                              				Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                              
                              				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              
                              				Ut enim ad minim veniam.
                              
                              				Curabitur non nulla sit amet nisl tempus
                              
                              			</p>
                              
                              			<!----<div class="comment-reply">
                              
                              				<a class="comment-btn" href="#">
                              
                              					<i class="fas fa-reply"></i> Reply
                              
                              				</a>
                              
                              				<p class="recommend-btn">
                              
                              					<span>Recommend?</span>
                              
                              					<a href="#" class="like-btn">
                              
                              						<i class="far fa-thumbs-up"></i> Yes
                              
                              					</a>
                              
                              					<a href="#" class="dislike-btn">
                              
                              						<i class="far fa-thumbs-down"></i> No
                              
                              					</a>
                              
                              				</p>
                              
                              			</div>
                              
                              		</div>
                              
                              	</div>
                              
                              </li>
                              
                              </ul>---->
                           <!-- /Comment Reply -->
                        </li>
                        <?php endforeach; ?>
                        <!-- /Comment List -->
                        <!-- Comment List -->
                        <!-- /Comment List -->
                     </ul>
                     <!-- Show All -->
                     <!---<div class="all-feedback text-center">
                        <a href="#" class="btn btn-primary btn-sm">
                        
                        	Show all feedback <strong>(167)</strong>
                        
                        </a>
                        
                        </div>--->
                     <!-- /Show All -->
                  </div>
                  <!-- /Review Listing -->
                  <!-- Write Review -->
                  <div class="write-review">
                     <h4>Write a review for <strong><?php echo $hospital['name'];?></strong></h4>
                     <!-- Write Review Form -->
                     <form method="post" action="<?php echo base_url('welcome/review_hospital'); ?>">
                        <div class="form-group">
                           <input type="hidden" name="hidden_id" value="<?php echo $hospital['id'];?>">
                           <label>Review</label>
                           <div class="star-rating">
                              <input id="star-5" type="radio" name="rating" value="5">
                              <label for="star-5" title="5 stars">
                              <i class="active fa fa-star"></i>
                              </label>
                              <input id="star-4" type="radio" name="rating" value="4">
                              <label for="star-4" title="4 stars">
                              <i class="active fa fa-star"></i>
                              </label>
                              <input id="star-3" type="radio" name="rating" value="3">
                              <label for="star-3" title="3 stars">
                              <i class="active fa fa-star"></i>
                              </label>
                              <input id="star-2" type="radio" name="rating" value="2">
                              <label for="star-2" title="2 stars">
                              <i class="active fa fa-star"></i>
                              </label>
                              <input id="star-1" type="radio" name="rating" value="1">
                              <label for="star-1" title="1 star">
                              <i class="active fa fa-star"></i>
                              </label>
                           </div>
                        </div>
                        <!--<div class="form-group">
                           <label>Title of your review</label>
                           
                           <input class="form-control" name="title" type="text" placeholder="If you could say it in one sentence, what would you say?" required="Please Fill This Input">
                           
                           
                           
                           </div>--->
                        <div class="form-group">
                           <label>Your review</label>
                           <textarea id="review_desc" name="comment" maxlength="100" class="form-control" required="Please Fill This Input"></textarea>
                           <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                        </div>
                        <hr>
                        <div class="form-group">
                           <div class="terms-accept">
                              <div class="custom-checkbox">
                                 <input type="checkbox" id="terms_accept" required="Please accept Terms And Conditions ">
                                 <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                              </div>
                           </div>
                        </div>
                        <?php if(!empty($this->session->userdata('username'))){ ?>
                        <div class="submit-section">
                           <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                        </div>
                        <?php
                           }
                           
                           
                           
                           else
                           
                           {
                           
                           	?>
                        <div class="submit-section">
                           <button  disabled type="submit" class="btn btn-primary submit-btn">Add Review</button>
                        </div>
                        <?php 
                           }
                           
                           ?>
                     </form>
                     <!-- /Write Review Form -->
                  </div>
                  <!-- /Write Review -->
               </div>
               <!-- /Reviews Content -->
               <!-- Business Hours Content -->
               <!-- /Business Hours Content -->
            </div>
         </div>
      </div>
      <!-- /Doctor Details Tab -->
   </div>
</div>
<!-- /Page Content -->
</div>
<!-- Voice Call Modal -->
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
<!-- /Voice Call Modal -->
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
                  <a href="<?php echo base_url('login') ?>" class="btn btn-primary"  name="submit">Login</a>
                  <a href="<?php echo base_url('register') ?>" class="btn btn-danger" >SignUp</a>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Video Call Modal -->
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
<!-- Video Call Modal -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>