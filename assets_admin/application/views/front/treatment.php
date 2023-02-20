<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>


<!--======== Home Banner Section Start==========-->
<div class="section bg-grey">
   <!--<div class="section-header text-center">
      <h2>Common Health Concern</h2>
      <p>Consult a doctor online for any health issue</p>
      </div>-->
   <?php $data=$this->db->select('image')
      ->where('banner_type',"treatment")
      ->order_by('id',"Desc")
      ->limit(2)
      ->get('banner')->result();		 
      ?>
   <div class="health slider">
      <?php foreach($data as $row): ?>
      <div class="card-boxs height-400">
         <img src="<?php echo base_url(); ?>assets/img/banner/<?php echo $row->image ?>" class="img-fluid" alt="Speciality" style="width:100%;">
      </div>
      <?php endforeach; ?>
   </div>
</div>
<!--========= Home Banner Section End===========-->

<div class="bbbootstrap">
   <div class="container">
      <form action="<?php echo base_url(); ?>searching" id="form-id" class="info" method="post">
         <h4>Search Doctor, Make an Appointments</h4>
         <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
         <input type="text" name="city" id="Form_Search" placeholder="Search for Procedures, Hospitals, Doctors..." role="searchbox" class="InputBox " autocomplete="off" required>
		 <input type="submit" id="Form_Go" class="Button" value="Search">
         <small>FIND BEST HOSPITALS & DOCTORS</small>
      </form>
   </div>
</div>



<!---speciality section ----> 
<div id="sticky"></div>

<script type="text/javascript">
   $(function(){
    	var stickyHeaderTop = $('#landing-form').offset().top;
    	$(window).scroll(function(){
        	if( $(window).scrollTop() > stickyHeaderTop ) {
            $('#landing-form').css({position: 'fixed', top: '150px',});
            $('#sticky').css('display', 'block');
        	} else 
        	{
            $('#landing-form').css({position: 'static', top: '0px'});
            $('#sticky').css('display', 'none');
        	}
    	});
 	});
</script>

<!--========== Clinic and Specialities start ============-->
<section class="section section-specialities">
   <div class="container-fluid">
      <div class="section-header text-center">
         <h2>Clinic and Specialities</h2>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-12">
            <!-- Slider -->
            <div class="specialities-slider slider">
               <!-- Slider Item -->
               <?php 
                  // echo "<pre>";
                  // print_r($specialities);
                  ?>
               <?php 
                  if (!empty($treatment_spec1)) {
                      $sr = 1;
                      foreach ($treatment_spec1 as $row) {
                          ?>
               <a  href="#hospital">
                  <div class="speicality-item text-center">
                     <div class="speicality-img">
                        <img src="<?php 
                           echo base_url();
                           ?>assets/img/specialities/<?php 
                           echo $row->image;
                           ?>" onerror="this.onerror=null; this.src='<?php 
                           echo base_url('assets/img/HOSP_icon_flat.jpg');
                           ?>'" class="img-fluid" alt="Speciality" style="">
                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                     </div>
                     <p><?php 
                        echo $row->service_name;
                        ?></p>
                  </div>
               </a>
               <?php 
                  }
                  }
                  ?>
               <!-- /Slider Item -->
               <!-- Slider Item -->
               <!--<div class="speicality-item text-center">
                  <div class="speicality-img">
                  	<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
                  	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
                  </div>
                  <p>Neurology</p>	
                  </div-->							
               <!-- /Slider Item -->
               <!-- Slider Item -->
               <!--<div class="speicality-item text-center">
                  <div class="speicality-img">
                  	<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
                  	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
                  </div>	
                  <p>Orthopedic</p>	
                  </div-->							
               <!-- /Slider Item -->
               <!-- Slider Item -->
               <!--<div class="speicality-item text-center">
                  <div class="speicality-img">
                  	<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
                  	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
                  </div>	
                  <p>Cardiologist</p>	
                  </div-->							
               <!-- /Slider Item -->
               <!-- Slider Item -->
               <!--<div class="speicality-item text-center">
                  <div class="speicality-img">
                  	<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
                  	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
                  </div>	
                  <p>Dentist</p>
                  </div-->							
               <!-- /Slider Item -->
            </div>
            <!-- /Slider -->
         </div>
      </div>
   </div>
</section>
<!--========== //Clinic and Specialities end ============-->

<!--========= Main Hospital found section start =========-->
<div class="content top" id="hospital">
	<div class="container-fluid">
		<div class="row">
		   <div class="col-xl-10 col-md-12 m-auto">
		   	<!--====== Hospital found section start =====-->
		      <div class="col-xl-9 col-lg-9 order-md-last order-sm-last order-last map-left">
		         <div class="row align-items-center mb-4">
		            <div class="col-md-6 col">
		               <h4><?php echo count($search);?> Hospital found</h4>
		            </div>
		            <div class="col-md-6 col-auto">
		               <!--div class="view-icons">
		                  <a href="map-grid.html" class="grid-view"><i class="fas fa-th-large"></i></a>
		                  <a href="map-list.html" class="list-view active"><i class="fas fa-bars"></i></a>
		               </div>
		               <div class="sort-by d-sm-block d-none">
		                  <span class="sortby-fliter">
		                  	<select class="select">
		                  		<option>Sort by</option>
		                  		<option class="sorting">Rating</option>
		                  		<option class="sorting">Popular</option>
		                  		<option class="sorting">Latest</option>
		                  		<option class="sorting">Free</option>
		                  	</select>
		                  </span>
		               </div-->
		            </div>
		         </div>
		         <?php 
		            if (!empty($search)) {
		             	$hospital_id = '';
		             	foreach ($search as $hospital) {
		                 	if ($hospital->id != $hospital_id) {
		          		?>
				         <!-- Doctor Widget -->
				         <div class="card">
				            <div class="card-body cardHover">
				               <div class="doctor-widget">
				                  <div class="doc-info-left">
				                     <div class="doctor-img">
				                        <a href="<?php 
				                           echo base_url();
				                           ?>hospital-profile/<?php 
				                           echo base64_encode($hospital->id);
				                           ?>"> 
				                        <img src="<?php 
				                           echo base_url();
				                           ?>assets/img/hospital/<?php 
				                           echo $hospital->image;
				                           ?>" class="img-fluid" alt="User Image" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/HOSP_icon_flat.jpg'">
				                        </a>
				                     </div>
				                     <div class="doc-info-cont">
				                        <h4 class="doc-name"><a href="<?php 
				                           echo base_url();
				                           ?>hospital-profile/<?php 
				                           echo base64_encode($hospital->id);
				                           ?>"><?php 
				                           echo $hospital->hospital_name;
				                           ?> </a></h4>
				                        <?php 
				                        /*<p class="doc-speciality"><?php echo $hospital->service_name; ?></p>
				                        <
				                        	<h5 class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality"><?php echo $hospital->service_name ?></h5>
				                        */
				                        ?>
				                        <div class="rating">
				                           <?php 
				                              $sum = 0;
				                              $rev = $this->db->select('rating')->where('hospital_id', $hospital->id)->get('review_hospital')->result();
				                              if (!empty($rev)) {
				                                  $total = count($rev);
				                                  foreach ($rev as $row) {
				                                      $sum = $sum + $row->rating;
				                                  }
				                                  $totalaverage = $sum;
				                                  $sum = $sum / (5 * $total) * 100;
				                                  if ($sum <= 20) {
				                                      ?>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <?php 
				                              } else {
				                                  if ($sum >= 21 && $sum <= 40) {
				                                      ?>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <?php 
				                              } else {
				                                  if ($sum >= 41 && $sum <= 60) {
				                                      ?>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <?php 
				                              } else {
				                                  if ($sum >= 61 && $sum <= 80) {
				                                      ?>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star "></i>
				                           <?php 
				                              } else {
				                                  ?>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <i class="fas fa-star filled"></i>
				                           <?php 
				                              }
				                              }
				                              }
				                              }
				                              } else {
				                              ?>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <i class="fas fa-star "></i>
				                           <?php 
				                              }
				                              ?>
				                           <?php 
				                              $data = $this->db->where('hospital_id', $hospital->id)->select('*')->get('review_hospital')->result();
				                              ?>
				                           <span class="d-inline-block average-rating">(<?php 
				                              echo count($data);
				                              ?>)</span>
				                        </div>
				                        <div class="clinic-details">
				                           <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php 
				                              echo $hospital->hos_address;
				                              ?></p>
				                           <p></p>
				                           <ul class="clinic-gallery">
				                              <li>
				                                 <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
				                                 <img src="<?php 
				                                    echo base_url();
				                                    ?>assets/img/features/feature-01.jpg" alt="Feature">
				                                 </a>
				                              </li>
				                              <li>
				                                 <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
				                                 <img  src="<?php 
				                                    echo base_url();
				                                    ?>assets/img/features/feature-02.jpg" alt="Feature">
				                                 </a>
				                              </li>
				                              <li>
				                                 <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
				                                 <img src="<?php 
				                                    echo base_url();
				                                    ?>assets/img/features/feature-03.jpg" alt="Feature">
				                                 </a>
				                              </li>
				                              <li>
				                                 <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
				                                 <img src="<?php 
				                                    echo base_url();
				                                    ?>assets/img/features/feature-04.jpg" alt="Feature">
				                                 </a>
				                              </li>
				                           </ul>
				                        </div>
				                        <div class="clinic-services">
				                           <span>Dental Fillings</span>
				                           <span> Whitneing</span>
				                        </div>
				                     </div>
				                  </div>
				                  <div class="doc-info-right">
				                     <div class="clini-infos">
				                        <ul>
				                           <?php 
				                              $data = $this->db->where('hospital_id', $hospital->id)->select('*')->get('hospital_likee')->result();
				                              ?>
				                           <li><i class="far fa-thumbs-up"></i><?php 
				                              echo count($data);
				                              ?></li>
				                           <?php 
				                              $data = $this->db->where('hospital_id', $hospital->id)->select('*')->get('review_hospital')->result();
				                              ?>
				                           <li><i class="far fa-comment"></i><?php 
				                              echo count($data);
				                              ?> feedbacks</li>
				                           <!--<li><i class="fas fa-map-marker-alt"></i> <?php 
				                              ?><?php// echo substr($hospital->hos_address, 0 ,20);?></li-->
				                           <!--li><i class="far fa-money-bill-alt"></i> $50 - $300 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li-->
				                        </ul>
				                     </div>
				                     <div class="doctor-action">
				                        <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
				                        <i class="fas fa-phone"></i>
				                        </a>
				                        <?php 
				                           if ($this->session->userdata('username') == '') {
				                               ?>
				                        <a href="javascript:void(0)" class="btn btn-white msg-btn ml-2" data-toggle="modal" data-target="#like"  >
				                        <i class="far fa-thumbs-up"></i>
				                        </a>
				                        <a href="javascript:void(0)" class="btn btn-white fav-btn">
				                        <i class="far fa-bookmark"></i>
				                        </a>
				                        <?php 
				                           } else {
				                               ?>
				                        <input type="hidden" id="patient_name" name="patient_name" value="<?php 
				                           echo $this->session->userdata('user_id');
				                           ?>"> 
				                        <input type="hidden" class="hos_name" name="hos_name[]" value="">
				                        <a href="javascript:void(0)" class=" btn btn-white msg-btn ml-2 like_onee" data-id="<?php 
				                           echo $hospital->id;
				                           ?>" >
				                        <?php 
				                           $like = count($this->db->get_where('hospital_likee', array('hospital_id' => $hospital->id))->result());
				                           ?>
				                        <i class="far fa-thumbs-up"><?php 
				                           echo $like;
				                           ?></i>
				                        </a>
				                        <?php 
				                           }
				                           ?>
				                     </div>
				                  </div>
				               </div><hr>
				               <div class="clinic-booking bookAppointmnt">
				                  <a class="view-pro-btn" href="<?php 
				                     echo base_url();
				                     ?>hospital-profile/<?php 
				                     echo base64_encode($hospital->id);
				                     ?>">View Profile</a> 
				                  <?php 
				                     if ($this->session->userdata('username') == '') {
				                         ?>
				                  <a class="apt-btn" id="login" href="#" data-toggle="modal" data-target="#like">Book Appointment</a>
				                  <?php 
				                     } else {
				                         if ($this->session->userdata('username') == 'admin') {
				                             ?>
				                  <a class="apt-btn"  href="<?php 
				                     echo base_url('hospital-appointment/');
				                     echo base64_encode($hospital->id);
				                     ?>" data-toggle="modal" data-target="#admin">Book Appointment</a>
				                  <?php 
				                     } else {
				                         ?>
				                  <a class="apt-btn" href="<?php 
				                     echo base_url('hospital-appointment/');
				                     echo base64_encode($hospital->id);
				                     ?>" >Book Appointment</a>   
				                  <?php 
				                     }
				                     }
				                     ?>
				               </div>
				            </div>
				         </div>
				         <!-- /Doctor Widget -->
		         <?php 
		            $hospital_id = $hospital->id;}}}
		         ?>

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
		      <!--====== //Hospital found section end =====-->

		      <!--========= Get a Free Quote start ========-->
		      <div class="col-xl-3 col-lg-12 map-right">
		         <!-- <div id="map" class="map-listing"></div> -->
		         <div class="sidebar-right mobile-lady is-finona-fix" id="landing-form">
		            <div class="col-12">
		               <p class="bg-orange col-12 text-center">Get a Free Quote</p>
		               <div class="remove-sidebar position-absolute"><i class="fa fa-remove" aria-hidden="true"></i></div>
		            </div>
		            <div class="col-12 d-flex">
		               <div class="asma-chat-img">
		                  <span><img src="https://static.medmonks.com/home/img/managers/lady.jpg" alt="Managers"></span>
		                  <h5>Priya</h5>
		               </div>
		               <div class="asma-chat-message">
		                  <ul>
		                     <li><i class="fa fa-check"></i> Free screening by Doctor</li>
		                     <li><i class="fa fa-check"></i> Free treatment plan</li>
		                  </ul>
		               </div>
		            </div>
		            <div class="col-12 sidebar-query-form">
		               <div class="full-width">
		                  <form id="sideBarForm" action="#!" method="post" class="">
		                  	<input type="hidden" name="_token" value="">
			                  <div class="form-group">
			                     <input type="text" data-validation="email" name="email" class="form-control" id="email" placeholder="Enter email" required="">
			                     <input type="hidden" name="url" id="" value="">
			                  </div>
			                  <div class="row">
			                     <div class="form-group col-4" style="padding-right:0px;">
			                        <select data-validation="required" required="required" class="form-control" id="country" name="countryCode">
			                           <option value="">Code</option>
			                           <option value="93">USA (93)</option>
			                           <option value="91">INDIA (91)</option>
			                        </select>
			                     </div>
			                     <div class="form-group col-8">
					                  <input type="text" data-validation="number" name="contact_phone" class="form-control " required="" id="phone" placeholder="Enter Phone">
					               </div>
			                     <div class="col-12 form-detail">
					                  <div class="form-group">
					                     <textarea class="form-control" required="" name="description" placeholder="Clinical details..."></textarea>
					                  </div>
					                  <div class="col-12">
					                     <span style="color: red;" id="errorSidbar"></span>
					                  </div>
					               </div>
			                     <div class="form-group col-12">
			                        <button type="submit" class="form-control">Submit</button>
			                     </div>
			                  </div>
			               </form>
		               </div>
		            </div>
		         </div>
		      </div>
		      <!--========= //Get a Free Quote end ========-->
		   </div>
		</div>
	</div>
</div>
<!--========= //Main Hospital found section end =========-->



<!--============ Success story section start ============-->
<section class="storyMain">
	<div class="main section-header text-center">
		<h2 class="white-text">Success Story</h2>
	  	<div class="slider slider-nav">
		
		 <?php if(!empty($story_details)){ ?>
                    <?php $a=1; foreach($story_details as $story){ ?>
		
		
	    	<div class="successStory">
	    		<?php if(!empty($story->image)){ ?>
									<a href="<?php echo base_url('story-details/').base64_encode($story->id);?>">
                                    <img src="<?php echo base_url().$story->image; ?>" alt="" class="img-fluid" style="height:200px; width:100%;"/>
									</a>
                                <?php }else{ ?>
                                    <img src="<?php echo base_url(); ?>uploads/product_default.jpg" alt="" class="img-fluid" />
                                <?php } ?> 

	    		<p>
				<a href="<?php echo base_url('story-details/').base64_encode($story->id);?>"><?php echo $story->title; ?></a>
				</p>
	    	</div>
			
			
			
			
			
					<?php $a++; } ?>
                <?php } ?>
	    	
	  	</div>
	 <!-- 	<a href="#!" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">View More</a>  -->
	</div>
</section>
<!--============ //Success story section end ============-->

<script>
 	$('.slider-nav').slick({
	   slidesToShow: 3,
	   slidesToScroll: 1,
	   asNavFor: '.slider-for',
	   dots: true,
	   focusOnSelect: true
 	});
</script>

<!--=============== Modal form section start ============-->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document" >
      <div class="modal-content">
         <!--<div class="modal-header">
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
                  <a href="<?php 
                     echo base_url('welcome/login');
                     ?>" class="btn btn-primary"  name="submit">Login</a>
                  <a href="<?php 
                     echo base_url('welcome/register');
                     ?>" class="btn btn-danger" >SignUp</a>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<!--=============== //Modal form section end ============-->

<!--=============== Voice call section start ============-->
<div class="modal fade call-modal" id="voice_call" aria-hidden="true" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
         <div class="modal-body">
            <!-- Outgoing Call -->
            <div class="call-box incoming-box">
               <div class="call-wrapper">
                  <div class="call-inner">
                     <div class="call-user">
                        <img alt="User Image" src="<?php 
                           echo base_url();
                           ?>assets_admin/img/logo-small.png" class="call-avatar">
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
<!--=============== //Voice call section end ============-->

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
                  <a href="<?php 
                     echo base_url('welcome/login');
                     ?>" class="btn btn-primary"  name="submit">Login</a>
                  <a href="<?php 
                     echo base_url('welcome/register');
                     ?>" class="btn btn-danger" >SignUp</a>
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

<!--============= Testimonials section start ============-->
<!--section class="testimonial text-center">
   <div class="container">
      <div class="heading white-heading">
         Testimonial
      </div>
      <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
         <div class="carousel-inner" role="listbox" data-aos="zoom-in">
            <div class="carousel-item active">
               <div class="testimonial4_slide">
                  <img src="https://cureu.in/assets/img/doctor1.png" class="img-circle img-responsive" />
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  <h4>Doctor 1</h4>
               </div>
            </div>
            <div class="carousel-item">
               <div class="testimonial4_slide">
                  <img src="assets/img/doctor2.png" class="img-circle img-responsive" />
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  <h4>Doctor 2</h4>
               </div>
            </div>
            <div class="carousel-item">
               <div class="testimonial4_slide">
                  <img src="assets/img/doctor3.png" class="img-circle img-responsive" />
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  <h4>Doctor 3</h4>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
         </a>
         <a class="carousel-control-next" href="#testimonial4" data-slide="next">
         <span class="carousel-control-next-icon"></span>
         </a>
      </div>
   </div>
</section-->
<!--============= //Testimonials section end ============-->	

<!--============ Plan to Travel section start ===========-->
<section class="planning-block">
   <div class="col-sm-9 mx-auto">
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
                              <img src="https://cureu.in/assets/img/features/document-details.svg" alt="">
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
                              <img src="https://cureu.in/assets/img/features/quotation.svg" alt="">
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
                              <img src="https://cureu.in/assets/img/features/received-by-us.svg" alt="">
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
                              <img src="https://cureu.in/assets/img/features/fly-back.svg" alt="">
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
<!--============ Plan to Travel section start ===========-->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 

<script> 
   $(window).ready(function() { 
	   $("#form-id").on("keypress", function (event) { 
	   	//console.log("aaya"); 
	   	var keyPressed = event.keyCode || event.which; 
	   	if (keyPressed === 13) { 
	   		//alert("You pressed the Enter key!!"); 
	   		event.preventDefault(); 
	   		$('form').submit(); 
	   	} 
	   }); 
   }); 
</script>

<script>
   $(".js-example-tags").select2({
	     tags: true
	   });
   	function get_state(cls)
   	{ 
       if(cls!='-1')
       {
           $.ajax(
           {
               type:"POST",
               url:"<?php 
      echo base_url();
      ?>welcome/get_state",
               dataType: "JSON",
               data:{'country':cls},
               success:function(data){
                   $("#state").empty();
                   $("#state").append("<option value=-1> ~~ Select State ~~</option>");
                   $.each(data,function(i,item)
                   {
                       $("#state").append("<option value="+item.id+">"+item.name+"</option>");
                   });
               }
           });
       }
       else
       {
           $("#state").empty();
           $("#state").append("<option value=-1> ~~ Select Section ~~</option>");
           alert("Please First Select The Nationality");
       }
   }
   function get_city(cls)
   { 
       if(cls!='-1')
       {
           $.ajax(
           {
               type:"POST",
               url:"<?php 
      echo base_url();
      ?>welcome/get_city",
               dataType: "JSON",
               data:{'country':cls},
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
   
   //get speciality
   function get_specialitiess(cls)
   { 
       if(cls!='-1')
       {
   		
           $.ajax(
           {
               type:"POST",
               url:"<?php 
      echo base_url();
      ?>welcome/get_specialities",
               dataType: "JSON",
               
               success:function(data){ 
   			$("#specialities_idd").empty();
                   $("#specialities_idd").append("<option value=-1> ~~ Select Specialities ~~</option>");
                   $.each(data,function(i,item)
                   {
                       $("#specialities_idd").append("<option value="+item.id+">"+item.service_name+"</option>");
                   });
               }
           });
       }
       else
       {
           $("#specialities_idd").empty();
           $("#specialities_idd").append("<option value=-1> ~~ Select Section ~~</option>");
           alert("Please First Select The Nationality");
       }
   }
</script>