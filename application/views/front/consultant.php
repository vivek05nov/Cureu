<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<!-- Home Banner -->
<?php /*
   <!--<section class="section-search-pharmacy" style="background: #f7af3c;"> 
   
   	<div class="container-fluid">
   
   		<div class="row justify-content-center">
   
   			<div class="col-md-12">
   
   				<!--div class="banner-wrapper2"-->
   
   					<div class="search-box1">
   
   						<form method="post" action="<?php echo base_url('welcome/treatment'); ?>">
<!--p class="mb-0 mr-3" >Find a Treatment</p-->
<!--div class="form-group search-location1 postion-relative">
   <input type="text" class="form-control" placeholder="Enter your location / Pincode" style="padding-left:15px;">
   
   </div-->
<div class="form-group ">
   <select class="form-control js-example-tags" name="countries" id="countries" onchange="get_state(this.value)">
      <option selected="selected" value="-1"> -  Select Country  -</option>
      <?php   foreach($countries->result() as $countries){ ?>
      <option value="<?php echo $countries->id;?>"><?php echo $countries->name;?></option>
      <?php }  ?>
   </select>
   <span class="form-text">Based on your Location</span>
</div>
&nbsp;&nbsp;&nbsp;
<div class="form-group">
   <select class="form-control js-example-tags" name="state" id="state" onchange="get_city(this.value)">
      <option value="-1">-  Select State  -</option>
   </select>
   <span class="form-text">Based on your Location</span>
</div>
&nbsp;&nbsp;&nbsp;
<div class="form-group search-location">
   <select class="form-control js-example-tags" name="city" id="city" onchange="get_specialitiess(this.value)">
      <option value="-1">-  Select City  -</option>
   </select>
   <span class="form-text">Based on your Location</span>
</div>
<div class="form-group ">
   <select class="form-control js-example-tags" name="specialities_idd" id="specialities_idd" >
      <option selected="selected" value="-1"> -  Select Specialities  -</option>
   </select>
   <span class="form-text">Based on your Specialities</span>
</div>
&nbsp;&nbsp;&nbsp;
<div class="form-group">
   <button type="submit" class="btn btn-primary search-btn" style="margin-bottom: 22px;"><i class="fas fa-search"></i> <span>Search</span></button>
</div>
</form>
</div>
<!-- /Search -->
<!--/div-->
</div>
</div>
</div>
</section>-->*/
error_reporting(0);
?>
<!-- /Home Banner -->
<!---speciality section ----> 
<!--<section class="section section-specialities">
   <div class="container-fluid">
   
   	<div class="section-header text-center">
   
   		<h2>Top Specialities</h2>
   
   	</div>
   
   	<div class="row justify-content-center">
   
   		<div class="col-md-9">
   
   			<div class="specialities-slider slider">
   
   				<?php /*
      // echo "<pre>";
      
      // print_r($specialities);
      
      ?>
   
   					<?php if(!empty($specialities)):
      foreach($specialities as $row):
      
      ?>
   
   					<div class="speicality-item text-center">
   
   						<div class="speicality-img">
   
   							<img src="<?php echo base_url(); ?>assets/img/specialities/<?php echo $row->special_image;?>" class="img-fluid" alt="Speciality">
   
   							<span><i class="fa fa-circle" aria-hidden="true"></i></span>
   
   						</div> 
   
   						<p><?php echo $row->service_name;?></p>
   
   					</div>
   
   					<?php endforeach;
      endif; */?>
   
   					
   
   			</div>
   
   			
   
   		</div>
   
   	</div>
   
   </div>   
   
   </section>	-->
<!---speciality end--->
<!-- /Page Content -->
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
   
               url:"<?php echo base_url(); ?>welcome/get_state",
   
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
   
   
   
   //get speciality
   
   function get_specialitiess(cls)
   
   { 
   
       if(cls!='-1')
   
       {
   
   		
   
           $.ajax(
   
           {
   
               type:"POST",
   
               url:"<?php echo base_url(); ?>welcome/get_specialities",
   
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
<!--======== Shameem slider section start=========-->
<section class="section full-slide-home bg-grey">
  
      <div class="slick-wrapper">
    
               <?php $view=$this->db->select('image')
                  ->where('banner_type',"consult")
                  
                  ->order_by('id','desc')->limit(1)
                  
                  ->get('banner') 
                  
                  ->row();
                  
                  ?>
               <div class="row">
                  <img src="<?php echo base_url(); ?>assets/img/banner/<?php echo $view->image; ?>" class="hero-img" alt="Speciality" style="margin-top:10px !important" style="height:400px;width:100%;"> 
               </div>
            </div>
            <!--/slide-->
</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--============ Slider Section End ============-->

<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<!--============= Css Section Start ==============-->
<style type="text/css">
   .slick-slide {margin: 0px 20px;}
   .slick-slide img {width: 100%;}
   .slick-prev:before,
   .slick-next:before {color: black;}
   .slick-slide {transition: all ease-in-out .3s;opacity: .2;}
   .slick-active {opacity: .5;}
   .slick-current {opacity: 1;}
   .card-box {margin: 3px 2px 26px;/*-webkit-box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);box-shadow: 0 3px 6px 0 rgba(45,45,51,0.4);*/padding: 20px 5px 10px;text-align: center;}
   .card-box h5 {margin-top: 15px;font-size: 15px;}
   .card-box img {width: 120px;height: 120px;margin: 0 auto; border-radius: 50%;}
   .card-box p a {color: #15558d;font-weight: 500;}
   .price {font-size: 14px;}
   .slick-active {opacity: 1;}
   .text-center{text-align:center;}
   .bg-grey{background:#f7af3c33;}
   .card-boxs {border-radius: 10px;margin: 3px 2px 26px;box-shadow: 0 3px 6px 0 rgba(45,45,51,0.8);text-align: center;padding: 5px;}
   .card-boxs h5 {margin-top: 18px;font-size: 18px;}
   .card-boxs p a {color: #15558d;font-weight: 500;}
   /*.card-boxs img {border-radius: 50%;padding: 10px 50px;height: 205px;width: 100%}*/
   .card-boxs img {border-radius: 50%;height: 120px;width: 120px;margin: 0 auto;}
   .card-box:hover {box-shadow: 0 3px 6px 0 rgba(45,45,51,0.8);}
   .card-boxs:hover {box-shadow: 0 3px 6px 0 rgba(45,45,51,0.5);}
   .card-boxs p {margin-top: 15px;}
   .card-doctor img {width: 90px;height: 90px;border-radius: 50px;margin-right: 10px;}
   .card-doctor {border-radius: 6px;border: 1px solid #cacacc;padding: 10px;display: flex!important;}
   .card-inner h5 {font-size: 14px;}
   @media only screen and (max-width:768px) {
   .card-box h5 {margin-top: 10px;font-size: 12px;}
   .card-boxs h5 {margin-top: 10px;font-size: 12px;}
   }
</style>
<!--============== Css Section End ===============-->
<!--======= Top Specialities Section Start========-->
<div class="section-specialities container-fluid">
   <div class="section-header text-center">
      <h2>Top Specialities</h2>
      <p>Consult with top doctors across specialities</p>
   </div>
   <div class="autoplay slider">
      <?php if(!empty($specialities)):
         foreach($specialities as $row):
         
         ?>
      <a href="<?php echo base_url('SearchBySpecialities/')?>/<?php echo base64_encode($row->special_id);  ?> ">
         <div class="card-box">
            <img src="<?php echo base_url(); ?>assets/img/specialities/<?php  echo $row->special_image?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
            <h5><?php echo $row->service_name ?></h5>
            <!-- <small class="price">₹299</small>--->
         </div>
      </a>
      <?php endforeach;
         endif;
         
         
         
         ?>
      <?php /*
         <div class="card-box">
         
                   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.svg" class="img-fluid" alt="Speciality">            
      <h5>Stomach & digestion</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-box">
      <img src="<?php echo base_url(); ?>assets/img/specialities/psychiatric.svg" class="img-fluid" alt="Speciality">
      <h5>Psychiatric</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-box">
      <img src="<?php echo base_url(); ?>assets/img/specialities/pediatric.svg" class="img-fluid" alt="Speciality">
      <h5>Pediatric</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-box">
      <img src="<?php echo base_url(); ?>assets/img/specialities/kidney-urine.svg" class="img-fluid" alt="Speciality">
      <h5>Kidney & urine.</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-box">
      <img src="<?php echo base_url(); ?>assets/img/specialities/general-physician.svg" class="img-fluid" alt="Speciality">
      <h5>General physician</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-box">
      <img src="<?php echo base_url(); ?>assets/img/specialities/dermatology.svg" class="img-fluid" alt="Speciality">
      <h5>Dermatology</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   */?>
</div>
</div>
<!--======== Top Specialities Section End=========-->
<!--======== Common Health Section Start==========-->
<div class="section-specialities bg-grey container-fluid">
   <div class="section-header text-center">
      <h2>Common Health Concern</h2>
      <p>Consult a doctor online for any health issue</p>
   </div>
   <div class="health slider">
      <?php if(!empty($common_specialities)):
         foreach($common_specialities as $row):
         
         ?>
      <a href="<?php echo base_url('SearchByConcern/') ?><?php echo base64_encode($row->id); ?>">
         <div class="card-boxs">
            <img src="<?php echo base_url(); ?>assets/img/specialities/<?php echo $row->image ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
            <h5><?php echo $row->service_name; ?></h5>
            <!-- <small class="price">₹299</small> -->
         </div>
      </a>
      <?php endforeach;
         endif;
         
         ?>
      <?php /* <div class="card-boxs">
         <img src="<?php echo base_url(); ?>assets/img/specialities/dipression.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">            
      <h5>Depression ?</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-boxs">
      <img src="<?php echo base_url(); ?>assets/img/specialities/cold-cough.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
      <h5>Cold & Cough</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-boxs">
      <img src="<?php echo base_url(); ?>assets/img/specialities/period.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
      <h5>Period problem?</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-boxs">
      <img src="<?php echo base_url(); ?>assets/img/specialities/skin.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
      <h5>Skin problem?</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   <div class="card-boxs">
      <img src="<?php echo base_url(); ?>assets/img/specialities/vaginal.jpg" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality">
      <h5>Vaginal infection</h5>
      <small class="price">₹299</small>
      <p><a href="#">Consult Now</a> </p>
   </div>
   */?>
</div>
</div>
<!--========= Common Health Section End===========-->
<!-- How It Works -->
<section class="section section-features">
   <div class="container">
      <div class="row">
         <div class="col-md-5 features-img howit_works" data-aos="fade-right">
            <img src="<?php echo base_url(); ?>assets/img/features/left.png" class="img-fluid" alt="Feature">
         </div>
         <div class="col-md-1"></div>
         <div class="col-md-6" data-aos="fade-left">
            <div class="section-header">
               <h2 class="mt-2">How It Works</h2>
               <p> Take precautions and do not ignore the symptoms. Book your tele/ video consultation with India’s top doctors. Now reach out to India’s best, from the comfort of your home! </p>
            </div>
            <ul class="consult_details">
               <li><i class="fas fa-file-alt"></i>  Fill in your details, doctor to consult and pay for the appointment through verified channels</li>
               <li><i class="fas fa-notes-medical"></i>  A medical expert will call to confirm your details and request</li>
               <li><i class="fas fa-user"></i> Connect with your doctor and get diagnosed remotely</li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- How It Works -->
<section class="section section-features">
   <div class="container">
      <div class="row">
         <div class="col-md-6" data-aos="fade-right">
            <div class="section-header">
               <h2 class="mt-2">Why do you need tele / video* consult?</h2>
               <p> Take precautions and do not ignore the symptoms. Book your tele/ video consultation with India’s top doctors. Now reach out to India’s best, from the comfort of your home! </p>
            </div>
            <ul class="consult_details">
               <li><i class="fas fa-file-alt"></i>  Ease of booking appointment from the safety of your home</li>
               <li><i class="fas fa-notes-medical"></i>  In the times of crisis, the best way to get screened and advised</li>
               <li><i class="fas fa-user"></i> On demand access to specialists</li>
            </ul>
         </div>
         <div class="col-md-1"></div>
         <div class="col-md-5 features-img howit_works" data-aos="fade-left">
            <img src="<?php echo base_url(); ?>assets/img/features/right.png" class="img-fluid" alt="Feature">
         </div>
      </div>
   </div>
</section>

<!--========= Our Doctor Section Start ===========-->
<?php /*
   <div class="section-specialities container-fluid">
   
       <div class="section-header text-center">
   
   		<h2>Our Doctor</h2>
   
   	</div>
   
       <div class="doctor slider">
   
           <div class="card-doctor">
   
               <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
<div class="card-inner">
   <h5>Dr Om Prakash</h5>
   <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
</div>
</div>
<div class="card-doctor">
   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
   <div class="card-inner">
      <h5>Dr Om Prakash</h5>
      <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
   </div>
</div>
<div class="card-doctor">
   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
   <div class="card-inner">
      <h5>Dr Om Prakash</h5>
      <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
   </div>
</div>
<div class="card-doctor">
   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
   <div class="card-inner">
      <h5>Dr Om Prakash</h5>
      <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
   </div>
</div>
<div class="card-doctor">
   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
   <div class="card-inner">
      <h5>Dr Om Prakash</h5>
      <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
   </div>
</div>
<div class="card-doctor">
   <img src="<?php echo base_url(); ?>assets/img/specialities/stomach.jpg" class="img-fluid" alt="Speciality">
   <div class="card-inner">
      <h5>Dr Om Prakash</h5>
      <small class="d-name">Sexologist <br>4yrs experience <br> 5621 consults done</small>
   </div>
</div>
</div>
</div>*/?>

<!--========== Our Doctor Section End ============-->
<div class="content" style="min-height: 166px;">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-12 col-lg-6 order-md-last order-sm-last order-last map-left">
            <div class="row align-items-center mb-4">
               <div class="col-md-12 col">
                  <?php
                     $doc_user_count = 0;
                     $d_user = '';
                     if(!empty($doctors)) :
                       foreach($doctors as $doctor):
                       if($d_user != $doctor->user_id):
                       $d_user = $doctor->user_id;
                     $doc_user_count++;
                       endif;
                       endforeach;
                       endif;
                      ?>
                  <h4>Top <?php echo $doc_user_count; ?>  Doctors (Rating)</h4>
               </div>
            </div>
            <!-- Doctor Widget -->
            <div class="row">
               <?php 
                  $doc_user_id = '';
                  if(!empty($doctors)) :
                             foreach($doctors as $doctor):
                    if($doc_user_id != $doctor->user_id):
                             ?>
               <div class="col-xl-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="doctor-widget">
                           <div class="doc-info-left">
                              <div class="doctor-img">
                                 <a href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>"> 
                                 <img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $doctor->image; ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" class="img-fluid" alt="User Image">
                                 </a>
                              </div>
                              <div class="doc-info-cont">
                                 <h4 class="doc-name"><a href="<?php echo base_url() ?>doctor-profile/<?php echo base64_encode($doctor->id); ?>"><?php echo $doctor->name;?> </a></h4>
                                 <p class="doc-speciality">
                                    <?php
                                       $doc_user_id = $doctor->user_id;
                                        $degree=implode(",",json_decode($doctor->degree));
                                        //echo "<pre>";
                                        //print_r($degree);
                                       echo $degree;
                                                               ?>                            
                                 </p>
                                 <?php
                                    $data=$this->db->query('SELECT specialities.image as special_img, specialities.service_name,specialities.id as special_id from doctor_specialities
                                    						join specialities on specialities.id=doctor_specialities.specialites_id
                                    						join doctors on doctors.id=doctor_specialities.doctor_id
                                    						where doctors.id='.$doctor->id .' ' )->result();
                                    foreach($data as $row):
                                    ?>
                                 <b class="doc-department"><img src="<?php echo base_url() ?>assets/img/specialities/<?php echo $row->special_img ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/HOSP_icon_flat.jpg') ?>'" class="img-fluid" alt="Speciality"><?php echo $row->service_name ?></b> &nbsp;&nbsp;
                                 <?php
                                    endforeach;
                                    
                                    ?>
                                 <div class="clinic-details">
                                    <span class="rating mt-3">
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
                                    </span>
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor->address;?></p>
                                    <p class="doc-location " style="font-size:20px;color: green;"><B>Fee: Rs. <?php echo $doctor->fee;?></b></p>
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
                        </div>
                     </div>
                  </div>
               </div>
               <?php 
                  $doc_user_id = $doctor->user_id;
                  endif;
                  endforeach;
                  endif;
                  ?>
            </div>
            <!-- /Doctor Widget -->
         </div>
      </div>
      <!-- /row-->
   </div>
</div>
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
           infinite: true,
           slidesToShow: 6,
   
           slidesToScroll: 5,
   
           autoplay: true,
   
           autoplaySpeed: 3000,
   
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
   
       $('.doctor').slick({
   
           slidesToShow: 4,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 4000,
   
           responsive: [{
   
               breakpoint: 768,
   
               settings: {
   
                   slidesToShow: 1,
   
                   slidesToScroll: 1
   
               }
   
           }]
   
       });
   
   });
   
</script>
<!--=========== JavaScript Section End ============-->