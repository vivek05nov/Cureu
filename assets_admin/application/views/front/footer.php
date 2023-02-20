 <!-- Footer -->

	<footer class="footer">

				

				<!-- Footer Top -->

				<div class="footer-top">

					<div class="container-fluid">

						<div class="row">

							<div class="col-lg-3 col-md-6">

							

								<!-- Footer Widget -->

								<div class="footer-widget footer-about">

									<div class="footer-logo">

										<img src="<?php echo base_url() ?>assets/img/white_logo.png" alt="logo">

									</div>

									<div class="footer-about-content">

										<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->

										<div class="social-icon">

											<ul>

												<li>

													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>

												</li>

												<li>

													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>

												</li>

												<li>

													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>

												</li>

												<li>

													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>

												</li>

												

											</ul>

										</div>

									</div>

								</div>

								<!-- /Footer Widget -->

								

							</div>

							<div class="col-lg-2 col-md-6">

							

								<!-- Footer Widget -->

								<div class="footer-widget footer-menu">

									<h2 class="footer-title">Cureu</h2>

									<ul>

										<li><a href="<?php echo base_url('about-us') ?>">About</a></li>

										<li><a href="<?php echo base_url('blog') ?>">Blog</a></li>

										<!--<li><a href="<?php// echo base_url('welcome/careers') ?>">Careers</a></li>--->

										<li><a href="<?php echo base_url('contact-us') ?>">Contact Us</a></li>

										

									</ul>

								</div>

								<!-- /Footer Widget -->

								

							</div>

							

							<div class="col-lg-2 col-md-6">

							

								<!-- Footer Widget -->

								<div class="footer-widget footer-menu">

									<h2 class="footer-title">For Patients</h2>

									<ul>

										<li><a href="<?php echo base_url() ?>">Search for Doctors</a></li>

										<li><a href="<?php echo base_url('login') ?>">Login</a></li>

										<li><a href="<?php echo base_url('register') ?>">Register</a></li>

										<!--<li><a href="">Booking</a></li>-->

										<!-- <li><a href="patient-dashboard.html">Patient Dashboard</a></li> -->

									</ul>

								</div>

								<!-- /Footer Widget -->

								 

							</div>

							

							<div class="col-lg-2 col-md-6">

							

								<!-- Footer Widget -->

								<div class="footer-widget footer-menu">

									<h2 class="footer-title">For Doctors</h2>

									<ul>

										<!--<li><a href="appointments.html">Appointments</a></li>-->

										

										<li><a href="<?php echo base_url('doctor') ?>">Login</a></li>

									<!--	<li><a href="<?php echo base_url('welcome/doctor_register') ?>">Register</a></li> -->

										<!-- <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li> -->

									</ul>

								</div>

								<!-- /Footer Widget -->

								

							</div>

							<div class="col-lg-2 col-md-6">

							

								<!-- Footer Widget -->

								<div class="footer-widget footer-menu">

									<h2 class="footer-title">Social</h2>

									<ul>

										<li><a href="#">Facebook</a></li>

										<li><a href="#">Twitter</a></li>

										<li><a href="#">LinkedIn</a></li>

										

									</ul>

								</div>

								<!-- /Footer Widget -->

								

							</div>

							

							<!--div class="col-lg-3 col-md-6">

								<div class="footer-widget footer-contact">

									<h2 class="footer-title">Contact Us</h2>

									<div class="footer-contact-info">

										<div class="footer-address">

											<span><i class="fas fa-map-marker-alt"></i></span>

											<p> 3556 Gomti Nagar, Lucknow,<br> Uttar Perdesh , India</p>

										</div>

										<p>

											<i class="fas fa-phone-alt"></i>

											xxxxxxxxx

										</p>

										<p class="mb-0">

											<i class="fas fa-envelope"></i>

											 cureu@example.com

										</p>

									</div>

								</div>

							</div-->

							

						</div>

					</div>

				</div>

				<!-- /Footer Top -->

				

				<!-- Footer Bottom -->

                <div class="footer-bottom">

					<div class="container-fluid">

					

						<!-- Copyright -->

						<div class="copyright">

							<div class="row">

								<div class="col-md-6 col-lg-6">

									<div class="copyright-text">

										<p class="mb-0">&copy; 2020 Cureu. All rights reserved.</p>

									</div>

								</div>

								<div class="col-md-6 col-lg-6">

								

								

									<!-- Copyright Menu -->

									<div class="copyright-menu">

										<ul class="policy-menu">

											<li><a href="<?php echo base_url('terms-conditions'); ?>">Terms and Conditions</a></li>

											<li><a href="<?php echo base_url('policy'); ?>">Policy</a></li>

										</ul>

									</div>

									<!-- /Copyright Menu -->

									

								</div>

							</div>

						</div>

						<!-- /Copyright -->

						

					</div>

				</div>

				<!-- /Footer Bottom -->

				

			</footer>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

			<!-- /Footer --><script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

			

<script>

$(document).ready(function(){

  $('#datepicker').datepicker();

  });

  

  </script>





<script>

$(document).ready(function(){

	



///





$('#comment').click(function(){

 

	$('#review').addClass('active');

	$( "#overview" ).removeClass( "active" );

	$( "#location" ).removeClass( "active" );

	

}); 













///	

	$(document).off('click','.like_one').on('click','.like_one',function(){   

	  patient=$('#patient_name').val();

	  doctor=$(this).attr('data-id');

	  //alert(doctor);

	  $.ajax({ type:"post",

			   url: "<?php echo base_url(); ?>/welcome/like",

			   data:{patient_name:patient,doc_name:doctor},

			   dataType:"json",

			   success: function(data){

				   if(data=="You Already Liked" ) 

				   {

					   

					  toastr.warning('Already Liked');

						

				   }

				   else

					   {

						  

						   toastr.success('Liked');

							$('#count').html(data);

							 location.reload();

							 

					   }

               			   

	  }});

	});

	

	//

	$(document).off('click','.like_onee').on('click','.like_onee',function(){    

		//alert('ok');

	  patient=$('#patient_name').val();

	  hospital=$(this).attr('data-id');

	  //console.log(hospital);

	  $.ajax({ type:"post",

			   url: "<?php echo base_url(); ?>/welcome/likee",

			   data:{patient_name:patient,hos_name:hospital},

			   dataType:"json",

			   success: function(data){

				  // alert(data);

				   if(data=="You Already Liked" ) 

				   {

					 toastr.warning('Already Liked');

					 	

				   }

				   else

					   {

							toastr.success('Liked');

							$('#count').html(data);

						    location.reload();

					   }

               			   

	  }});

	});

	

	//

	

  

  $('#email').change(function (){

	  var dat=$('#email').val();

	 

	  $.ajax({

			  type:"post",

			  url: "<?php echo base_url();?>/welcome/checkmail",

			  data:{email:dat},	

			  success: function(data){

				if(data==' ')

			  {

				 $("#email_register").html(data);

				 $("#submit_list").show(); 

			  }

			else

			{

			  $("#email_register").html(data);

			  $("#submit_list").hide(); 

			}

  }}); 

  });

  $('#mobile').change(function (){

	  var dat=$('#mobile').val();

	 

	  $.ajax({

			  type:"post",

			  url: "<?php echo base_url();?>/welcome/mobile",

			  data:{mobile:dat},	

			  success: function(data){

				if(data==' ')

			  {

				 $("#mobile_register").html(data);

				 $("#submit_list").show(); 

			  }

			else

			{

			  $("#mobile_register").html(data);

			  $("#submit_list").hide(); 

			}

  }}); 

  });

   $('#emaill').change(function (){

	  var dat=$('#emaill').val(); 

	 

	  $.ajax({

			  type:"post",

			  url: "<?php echo base_url();?>/welcome/checkmaill",

			  data:{email:dat},	

			  success: function(data){ 

			  if(data==' ')

			  {

				 $("#email_registerr").html(data);

				 $("#submit_list").show(); 

			  }

			  else

			  {

			

			  $("#email_registerr").html(data);

			  

			  $("#submit_list").hide();

			  }

  }}); 

  });

  

  

});

$('#mobilee').change(function (){

	  var dat=$('#mobilee').val();

	

	  $.ajax({

			  type:"post",

			  url: "<?php echo base_url();?>/welcome/mobilee",

			  data:{mobile:dat},	

			  success: function(data){

				if(data==' ')

			  {

				 $("#mobile_registerr").html(data);

				 $("#submit_list").show(); 

			  }

			else

			{

			  $("#mobile_registerr").html(data);

			  $("#submit_list").hide(); 

			}

  }}); 

  });

  

  

  

</script> 



	<!--owl --->

	

		<!-- Bootstrap Core JS -->

		<!--<script src="https://unpkg.com/aos@next/dist/aos.js"></script>-->

		<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>

		<!--script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script-->

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

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

		<script type="text/javascript">
		    AOS.init({
		        duration: 2000,
		    });
		</script>

		<script>

		$('.owl-carousel').owlCarousel({

    rtl:true,

    loop:true,

    margin:10,

    nav:true,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:3

        },

        1000:{

            items:5

        }

    }

})

		

		</script>

		

		

		

		<script>

		

		var date=$('#timepicker').datetimepicker({

			format: 'DD/MM/YYYY',

			minDate:'<?php echo date("m/d/Y"); ?>'

			

			});

			

			

		

		</script>

		

		<?php if(isset($script) ||!empty($script)){

		

		?>

		<script>

			$(document).ready(function() {

			 $('html, body').animate({

				 scrollTop: $("#hospital").offset().top

			 }, 1500);

		 });

		

		</script>

		<?php 

			

		} ?>

		

<script>

$(document).off('click','#reschedule').on('click','#reschedule',function(){

	appointment_id=$(this).attr('data-id');

	id=$(this).attr('data-member');

	appointment=$(this).attr('data-appointment');

	max_appointment=$(this).attr('data-userdate');

	

	$('#appointment_user_date').attr('min',appointment);

	$('#appointment_user_date').attr('max',max_appointment);

	$('#appoint_id').val(appointment_id);

	$('#member_id').val(id);

	$('#reschedule_modal').modal('show');

	});

</script>



<script>

$(document).off('click','#reschedule_hospital').on('click','#reschedule_hospital',function(){

	appointmentt_id=$(this).attr('data-id');

	id=$(this).attr('data-member');

	appointment=$(this).attr('data-appointment');

	max_appointment=$(this).attr('data-userdate'); 

	

	$('#appointment_user_hos').attr('min',appointment); 

	$('#appointment_user_hos').attr('max',max_appointment);

	$('#appointt_id').val(appointmentt_id);

	$('#memberr_id').val(id);

	$('#reschedule_hos_modal').modal('show'); 

	});

</script>



<script>

	    $(document).ready(function(){

	        

	        $('.mobile').keyup(function(){ 

	        mobile=$('.mobile').val();

            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;



            if (filter.test(mobile)) {

              if(mobile.length==10){

                   var validate = true;

                  $('#spann').html('valid mobile number');

                  $('#span').html(" ");

				  $("#submit_list").show();

              } else {

                 $('#span').html('Please put 10  digit mobile number');

                 $('#spann').html(" ");

				 $("#submit_list").hide();

                  var validate = false;

              }

            }

            else {

              $('#span').html('Not valid Number');

              $('#spann').html(" ");

			  $("#submit_list").hide();

              var validate = false;

            }  

	    });

	    });

	    

	</script>

	

	<script>

	$(document).on('keyup','.mobileeeee',function(){

		mobile=$('.mobileeeee').val(); 

		

		var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;



            if (filter.test(mobile)) {

				if(mobile.length==10){

                  $('.mobillllee').html('valid mobile number');

                  $('.mobilllle').html(" ");

				  $(".submit_listtt").show();

              } else {

                 $('.mobilllle').html('Please put 10 digit mobile number');

                 $('.mobillllee').html(" ");

				 $(".submit_listtt").hide();

                  

              }

            }

            else {

              $('.mobilllle').html('Not valid Number');

              $('.mobillllee').html(" ");

			  $(".submit_listtt").hide();

              

            } 

	});

	

	

	</script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
	    
	
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
	 //availableTagss = "<?php echo base_url(); ?>/welcome/get_hospital_name";
	 //alert(availableTags);
    $( "#hospial_name" ).autocomplete({  
	
      source: "<?php echo base_url(); ?>welcome/get_hospital_name"	  
     // source: availableTags   
    });
  } );
  </script>
	

	

</body>





</html>

