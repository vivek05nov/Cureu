<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="<?php echo base_url() ?>appointment" method="post">
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
							 <?php
								if($this->session->flashdata('info_success')){ ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?> <strong> </strong>
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
											<div class="row">
											<input class="form-control" type="hidden" name="doctor_id" value="<?php echo $doctor->id; ?>">
											
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>First Name</label>
														<input class="form-control" type="text" name="name" value="<?php echo $this->session->userdata('username') ?>" readonly>
													</div> 
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Appointment Date</label><!--id="timepicker"-->
														<input class="form-control  appointmentt" name="appointment_date"   onchange="get_date();" type="date" required>
													</div>
												</div>
												<!--div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Appointment Time</label>
														<input class="form-control" name="appointment_time" onchange="get_time();" id="appointment_time" type="time">
													</div>
												</div-->
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label> Service Name</label>
														<select class="form-control" name="specialities_id" id="service"  > 
														<?php if(!empty($special))
														{ 
														?>
														<?php foreach($special as $row): ?>
														<option value="<?php echo $row->special_id ?>" ><?php echo $row->service_name; ?></option>
														<?php endforeach;
														}
														else
														{
															?>
															
															<option value="-1"> Select Specialities</option>
															<?php 
														}
														?>
														</select>
														
													</div>
												</div>
												<?php /*
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Package</label>
														<select class="form-control" name="package">
															<option value="">Select Package</option>
															<?php foreach($package as $row){ ?>
															<option value=""><?php echo $row->name ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												*/?>
											</div>
											<!--div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div-->
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept" required="required">
												   <label for="terms_accept">I have read and accept <a href="http://cureu.in/welcome/terms_condition" target="_blank">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- Submit Section -->
											<div class="submit-section mt-4">
											<?php if(!empty($special))
														{ 
														?>
												<button type="submit" class="btn btn-primary submit-btn">Appointment Now</button>
														<?php }

													else
													{?>
														<button type="submit" class="btn btn-primary submit-btn " disabled>Appointment Now</button>
													<?php 
													}
														?>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="#" class="booking-doc-img">
											<img src="<?php echo base_url() ?>assets/img/doctors/<?php echo $doctor->image; ?>" alt="User Image" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'">
										</a>
										<div class="booking-info">
											<h4><a href="#"><?php echo $doctor->name; ?></a></h4>
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
											 
											 
											</div>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor->address; ?></p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<!--li>Date <span id="appointment_details"></span></li>
												<li>Time <span id="appointment_timee"></span></li-->
											</ul>
											<ul class="booking-fee">
												<li>Appointment Fee <span>₹ <?php echo $doctor->fee ?></span></li>
												<!--<li>Booking Fee <span>₹10</span></li>-->
												<!--<li>Video Call <span>₹50</span></li>-->
											</ul>
											<!--<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">₹160</span>
													</li>
												</ul>
											</div>--->
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>

<script>

$(document).ready(function(){
	
});
function get_date()
{
	//alert('ok');
	appointment=$('.appointmentt').val();
	
	$('#appointment_details').html(appointment);
	
}
function get_time()
{
         var n = $('#appointment_time').val();
		// alert(n);
		 var n1 =n.split('_');
		  var time = hours_am_pm(n1[0]+n1[1]);
		 // alert(time);
        $('#appointment_timee').html(n+" "+ time);
}
 function hours_am_pm(time) {
        var hours = time[0] + time[1];
		
		if(hours<=12)
		{
			
			var timew= "AM";
			return timew;
		}
		else
		{
			var timew= "PM";
			return timew;
		}
        
 }
 


</script>

