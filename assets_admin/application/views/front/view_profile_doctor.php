<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.8.1/sweetalert2.min.css">
<?php error_reporting(0);?>
<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Doctor Profile</h2>
         </div>
      </div>
   </div>
</div>
<!-- /Breadcrumb -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Page Content -->
<div class="content">
   <div class="container">
      <!-- Doctor Widget -->
      <div class="card">
         <div class="card-body">
            <div class="doctor-widget">
               <div class="doc-info-left">
                  <div class="doctor-img">
                     <img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $doctor->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" class="img-fluid" alt="User Image">
                  </div>
                  <div class="doc-info-cont">
                     <h4 class="doc-name"><?php echo $doctor->name;?> </h4>
                     <?php 
                        $degree = implode(',',json_decode($doctor->degree));
                        
                        									
                        ?>
                     <p class="doc-speciality"><?php echo $degree;?></p>
                     <p>
                        <span id="dots"></span>
                        <span id="more" >
                           <?php foreach($special as $row): ?>
                           <!--	<b class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/<?php echo $row->specialities_img; ?>"  onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality"> -->
                           <?php echo $row->service_name; ?>,</b> &nbsp;&nbsp;
                           <?php
                              endforeach;
                              ?>
                        </span>
                     </p>
                     <!--  <a onclick="myFunction()" id="myBtn" style="color: blue; font-size: 13px;">Read more</a>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   -->
                     <script type="text/javascript">
                        // function myFunction() { 
                          // var dots = document.getElementById("dots");
                          // var moreText = document.getElementById("more");
                          // var btnText = document.getElementById("myBtn");
                        
                          // if (dots.style.display === "none") {
                            // dots.style.display = "inline";
                            // btnText.innerHTML = "Read more";
                            // moreText.style.display = "none";
                          // } else {
                            // dots.style.display = "none";
                            // btnText.innerHTML = "Read less";
                            // moreText.style.display = "inline";
                          // }
                        // }
                     </script>
                     <div class="rating mt-3">
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
                        <?php }
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
                           <i class="fas fa-map-marker-alt"></i> <?php echo  $doctor->address;?> <!--<a href="javascript:void(0);">Get Directions</a>--->
                        </p>
                        <p class="doc-location" style="font-size:20px">
                           <b>Fee: <?php echo  $doctor->fee;?></b> <!--<a href="javascript:void(0);">Get Directions</a>--->
                        </p>
                        <ul class="clinic-gallery">
                           <?php foreach($gallery as $row): ?>
                           <li>
                              <a href="<?php echo base_url() ?>assets/img/features/feature-01.jpg" data-fancybox="gallery">
                              <img src="<?php echo base_url() ?>assets/doctor/gallery/<?php echo $row->gallery_photo; ?>"  onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" style="height:40px; width:40px;" alt="Speciality">
                              </a>
                           </li>
                           <?php endforeach; ?>	
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="doc-info-right">
                  <div class="clini-infos">
                     <ul>
                        <!--<li><i class="fas fa-map-marker-alt"></i-->
                           <!---<li><i class="far fa-money-bill-alt"></i>  ₹ &nbsp;100 per hour </li>--->
                     </ul>
                  </div>
                  <div class="doctor-action">
                     <?php 
                        $data=$this->db->where('member_id',$this->session->userdata('userid'))
                        
                        			   ->where('doctor_id',$doctor->id)
                        
                        			   ->get('appointment')->result();	
                        
                        ?>
                     <?php if($this->session->userdata('username') == ''){?>
                     <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#delete_modal">
                     <i class="far fa-comment-alt"></i>
                     </a>
                     <?php }
                        else if(empty($data))
                        
                        {
                        
                        ?>
                     <a href="javascript:void(0)" class="btn btn-white msg-btn" data-toggle="modal" data-target="#appointment">
                     <i class="far fa-comment-alt"></i>
                     </a>
                     <?php 
                        }else{ ?>
                     <a class="btn btn-white msg-btn" href="<?php echo base_url(); ?>welcome/chat/<?php echo $doctor->id;?>"><i class="far fa-comment-alt"></i></a>   
                     <?php } ?>
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
                     <a href="javascript:void(0)" class=" btn btn-white msg-btn ml-2 like_one"  data-id="<?php echo $doctor->id;?>">
                     <i class="far fa-thumbs-up" id="count"><?php echo $like; ?></i> 
                     </a>
                     <?php } ?>
                     <a  class="btn btn-white msg-btn" id="comment" href="#doc_reviews" data-toggle="tab" >
                     <i class="far fa-comment"></i>
                     </a>
                  </div>
                  <div class="clinic-booking">
                     <?php if($this->session->userdata('username') == ''){?>
                     <a class="apt-btn" href="javascript:void(0)" data-toggle="modal" data-target="#like" >Book Appointment</a>
                     <?php }
                        else if($this->session->userdata('username') == 'admin')
                        
                        {
                        
                        	?>
                     <a class="apt-btn" href="javascript:void(0)" data-toggle="modal" data-target="#admin" >Book Appointment</a>
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
                     <a class="nav-link"  id="review" href="#doc_reviews" data-toggle="tab">Reviews</a>
                  </li>
               </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="tab-content pt-0">
               <!-- Overview Content -->
               <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                  <div class="row">
                     <div class="col-md-12 col-lg-9">
                        <!-- About Details -->
                        <div class="widget about-widget">
                           <h4 class="widget-title">About Me</h4>
                           <p><?php echo $doctor->about;?></p>
                        </div>
                        <!-- /About Details -->
                        <!-- Education Details -->
                        <div class="widget education-widget">
                           <h4 class="widget-title">Education</h4>
                           <div class="experience-box">
                              <ul class="experience-list">
                                 <?php 
                                    $degree=json_decode($doctor->degree);
                                    
                                    $college=json_decode($doctor->college);
                                    
                                    $year_edu=json_decode($doctor->year);
                                    
                                     /* echo "<pre>";
                                    
                                     print_r(array_keys($degree));die; */
                                    
                                     $i =0;
                                    
                                    foreach($degree as $key=>$row):
                                    
                                    				
                                    
                                    ?>
                                 <li>
                                    <div class="experience-user">
                                       <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <a href="#/" class="name"><?php echo $college[$key]; ?></a>
                                          <div><?php echo $degree[$key].'-'.$year_edu[$key]; ?></div>
                                       </div>
                                    </div>
                                 </li>
                                 <?php  endforeach;  ?>
                              </ul>
                           </div>
                        </div>
                        <!-- /Education Details -->
                        <!-- Experience Details -->
                        <div class="widget experience-widget">
                           <h4 class="widget-title">Work & Experience</h4>
                           <div class="experience-box">
                              <ul class="experience-list">
                                 <?php 
                                    $hospital_name=json_decode($doctor->hospital);
                                    
                                    $from=json_decode($doctor->from);
                                    
                                    $to=json_decode($doctor->to);
                                    
                                    $dasignation=json_decode($doctor->dasignation);
                                    
                                     /* echo "<pre>";
                                    
                                     print_r(array_keys($degree));die; */
                                    
                                    foreach($hospital_name as $key=>$row):
                                    
                                    				
                                    
                                    ?>
                                 <li>
                                    <div class="experience-user">
                                       <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <a href="#/" class="name"><?php echo $dasignation[$key].'-'.$hospital_name[$key]; ?></a>
                                          <span class="time"><?php echo $from[$key]; ?> - <?php echo $to[$key]; ?></span>
                                       </div>
                                    </div>
                                 </li>
                                 <?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
                        <!-- /Experience Details -->
                        <!-- Awards Details -->
                        <div class="widget awards-widget">
                           <h4 class="widget-title">Awards</h4>
                           <div class="experience-box">
                              <ul class="experience-list">
                                 <?php 
                                    $awards=json_decode($doctor->awards);
                                    
                                    $awards_year=json_decode($doctor->awards_year);
                                    
                                    foreach($awards as $key=>$row):
                                    
                                    				
                                    
                                    ?>
                                 <li>
                                    <div class="experience-user">
                                       <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                       <div class="timeline-content">
                                          <p class="exp-year"><?php echo $awards_year[$key]; ?></p>
                                          <h4 class="exp-title"><?php echo $awards[$key]; ?></h4>
                                       </div>
                                    </div>
                                 </li>
                                 <?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
                        <!-- /Awards Details -->
                        <!-- Services List -->
                        <div class="service-list">
                           <h4>Services</h4>
                           <ul class="clearfix">
                              <?php $services=json_decode($doctor->common_specialities_id);?>
                              <?php foreach($services as $key=>$value):
                                 $data=$this->db->query('SELECT * from common_specialities
                                 
                                                   						where id='.$services[$key] .' ' )->result();
                                 
                                 	//$ad = $data->row();
                                 
                                 //print_r($data[0]);die;
                                 
                                 ?>
                              <li><?php echo $data[0]->service_name;?> </li>
                              <?php endforeach;
                                 ?>
                           </ul>
                        </div>
                        <!-- /Services List -->
                        <!-- Specializations List -->
                        <div class="service-list">
                           <h4>Specializations</h4>
                           <ul class="clearfix">
                              <?php foreach($special as $row): ?>
                              <li><?php echo $row->service_name; ?></li>
                              <?php endforeach; ?>
                           </ul>
                        </div>
                        <div class="service-list">
                           <h4>Clinic</h4>
                           <ul class="clearfix">
                              <li><?php echo $doctor->clinic_name; ?></li>
                              <li>
                                 <div class="doctor-img">
                                    <a href="<?php echo base_url() ?>assets/img/clinic/<?php echo $doctor->clinic_image; ?>" data-fancybox="gallery2">
                                    <img src="<?php echo base_url() ?>assets/img/clinic/<?php echo $doctor->clinic_image; ?>" class="img-fluid" alt="Clinic Image">
                                    </a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <!-- /Specializations List -->
                     </div>
                  </div>
               </div>
               <!-- /Overview Content -->
               <!-- Locations Content -->
               <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                  <!-- Location List -->
                  <div class="location-list">
                     <div class="row">
                        <!-- Clinic Content -->
                        <div class="col-md-8">
                           <div class="clinic-content">
                              <h4 class="clinic-name"><a href="#"><?php echo $doctor->name ?></a></h4>
                              <h1>doc_locations</h1>
                              <!-- <p class="doc-speciality">
                                 <?php foreach($special as $row): ?>
                                 <?php echo $row->service_name; ?>&nbsp;&nbsp; 
                                 <?php  endforeach;?>
                              </p>
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
                              </div> -->
                              <!-- <div class="clinic-details mb-0">
                                 <h5 class="clinic-direction">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo $doctor->address; ?> <br>
                                 </h5>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Location List -->
                  <!-- Location List -->
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
                                    <span class="comment-author"><?php echo $row->patient_name; ?></span>
                                    <?php
                                       $orderdate= $row->created_at;
                                       
                                       $orderdate = explode(' ', $orderdate);
                                       
                                       
                                       
                                       ?>
                                    <span class="comment-date"><?php echo $orderdate[0]; ?></span> 
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
                              
                              			</p-->
                              
                              			<!--<div class="comment-reply">
                              
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
                     <h4>Write a review for <strong><?php echo $doctor->name;?></strong></h4>
                     <!-- Write Review Form -->
                     <form method="post" action="<?php echo base_url('welcome/review'); ?>">
                        <div class="form-group">
                           <input type="hidden" name="hidden_id" value="<?php echo $doctor->id;?>">
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
<!-- Video Call Modal -->
<div class="modal fade call-modal" id="video_call" aria-hidden="true" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:50%">
         <div class="modal-body">
            <!-- Incoming Call -->
            <div class="call-box incoming-box">
               <div class="call-wrapper">
                  <div class="call-inner">
                     <div class="call-user">
                        <img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                        <h4>CureU</h4>
                        <span>9999999999999</span>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Incoming Call -->
         </div>
      </div>
   </div>
</div>
<!-- Video Call Modal -->
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
<!-- /Delete Modal -->	
<!----like--->
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
<!----like--->
<!--- book appointment-->
<div class="modal fade" id="login" aria-hidden="true" role="dialog">
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
<!--Start -->
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
<!--end-->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>