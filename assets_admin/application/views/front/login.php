<style>
   .fontpassword i{ 
   position: absolute; 
   left: 90%; 
   top: 20px; 
   float:right;
   color: gray; 
   } 
</style>
<!-- Page Content -->
<div class="content" style="min-height:205px;">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <!-- Login Tab Content -->
            <div class="account-content">
               <div class="row align-items-center justify-content-center">

                  <div class="col-md-12 col-lg-6 login-right">


                     <div class="login-header">


<?php if($this->uri->segment(1) == 'login'){ ?>
                        <h3>Login <span>Cureu</span>
                           <?php if($this->uri->segment(1) == 'login'){ ?>
                           <a href="<?php echo base_url() ?>doctor">Are you a Doctor?</a><br>
                           <?php }else{ ?>
                           <a href="<?php echo base_url() ?>login">Are you a Patient?</a>
                           <?php } ?>
                        </h3>
<?php }else{ ?>
   <?php if($this->uri->segment(1) == 'admin'){ ?>
      <h3>Login <span>Cureu</span>
                           <a href="<?php echo base_url() ?>doctor" hidden>Are you a Doctor?</a><br>
                           <?php }else{ ?>
                           <a href="<?php echo base_url() ?>login" hidden>Are you a Patient?</a>
                           <?php } ?>
<?php } ?>

                        <?php 
                           if($this->session->flashdata('item'))
                           {
                           	echo $this->session->flashdata('item');
                           }?>


                           
                     </div>


                     <?php
                        if($this->session->flashdata('info_success')){ ?> 
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?> <!--strong> &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>welcome/login">Login Now</strong-->
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
                     <!---------->
                     <?php
                        if($this->session->flashdata('email_sent')){ ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $this->session->flashdata('email_sent'); ?> <!--strong> &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>welcome/login">Login Now</strong-->
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <?php }											
                        if($this->session->flashdata('email_sent_msg')){ ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('email_sent_msg'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <?php } ?>
                     <!---------->
                     <?php 
                        echo form_open('login');
                        ?>
                     <?php  if($this->uri->segment(1) == 'admin')
                        { 
                          ?>
                     <input type="hidden" name="ddtype" value="1">
                     <?php
                        }
                          else if($this->uri->segment(1) == 'doctor')
                          {
                          ?> <h4>Doctor LogIn</h4><br>
                     <input type="hidden" name="ddtype" value="2">
                     <?php
                        }
                        else if($this->uri->segment(2) == 'login')
                        {
                        ?>
                     <input type="hidden" name="ddtype" value="3">
                     <?php
                        } 
                        else if($this->uri->segment(1) == 'hospital')
                        {
                        ?> <h4>Hospital LogIn</h4><br>
                     <input type="hidden" name="ddtype" value="4">
                     <?php
                        }
                        ?>
                     <div class="form-group form-focus ">
                        <input type="email" class="form-control floating" name="email">
                        <label class="focus-label">Email</label>
                     </div>
                     <div class="form-group form-focus  fontpassword">
                        <input type="password" id="password" class="form-control floating " name="password" >
                        <i class="far fa-eye form-group floating" id="togglePassword"></i>
                        <label class="focus-label">Password </label>
                     </div>


                     <div class="text-right">
                        <?php 
                           if($this->uri->segment(1)=='hospital'){
                           ?>
                      <!--  <a  style=" display:none" href="<?php echo base_url() ?>hospital">Login To Hospital?</a>
                        <a class="forgot-link " href="#" data-toggle="modal" data-target="#exampleModal">Forgot Password ?</a>  -->
                        <?php } if($this->uri->segment(1)=='admin'){ ?>
                              <a  style=" display:none" href="<?php echo base_url() ?>hospital" hidden>Login To Hospital?</a>
                      <?php  }
                           else
                           {
                            ?>
                        <a   style="padding-right:30%;color:#0de0fe; " href="<?php echo base_url() ?>hospital"><b>Login To Hospital?</b></a>
                        <a class="forgot-link " href="<?php echo base_url('welcome/forgot_password');?>" data-toggle="modal" data-target="#exampleModal">Forgot Password ?</a>
                        <?php 
                           } 
                           ?>
                     </div>
					<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
					
<?php if($this->uri->segment(1) == 'login'){ ?>
					 
                     <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or">or</span>
                     </div>
                     <div class="row form-row social-login">
                        <div class="col-6">
                           <a href="<?php echo $authURL; ?>" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>

						   
						   
                        </div>
                        <div class="col-6">
                           <a href="<?=base_url()?>googlelogin/login" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                        </div>
                     </div>
<?php } else {?>

<?php }?>
					 
					 
                     <!-- <div class="text-center dont-have">Don’t have an account? <a href="<?php echo base_url('welcome/register') ?>">Register</a></div> -->
                     </form>	
                  </div>
               </div>
            </div>
            <!-- /Login Tab Content -->
         </div>
      </div>
   </div>
</div>
</div>
<!-- /Page Content -->
<!-----model start---->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo base_url('welcome/forget_password'); ?>">
               <input type="hidden" name="uri_segment" value="<?php echo $this->uri->segment(1); ?>">
               <div class="form-group">
                  <input type="email" class=" form-control" name="user_email" placeholder="Enter Your Email" required >
                  <span><small> Please Enter Register Email</small></span>
               </div>
               <input type="submit" class=" btn btn-info" name="submit" value="Send">
         </div>
         </form>
      </div>
   </div>
</div>
</div>
<script>
   const togglePassword = document.querySelector('#togglePassword');
   const password = document.querySelector('#password');
   togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
   }); 
</script>		
<!----model end--->

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : 'APP_ID',
		  cookie     : true,
		  xfbml      : true,
		  version    : 'v3.1'
		});
		FB.AppEvents.logPageView();   
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   
	   function fbLogin(){
		   alert('okk');
			FB.login(function(response){
				if(response.authResponse){
					fbAfterLogin();
				}
			});
	   }
	   
	   function fbAfterLogin(){
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {   // Lo
				FB.api('/me', function(response) {
				  jQuery.ajax({
					url:'check_login.php',
					type:'post',
					data:'name='+response.name+'&id='+response.id,
					success:function(result){
						window.location.href='index.php';
					}
				  });
				});
			}
		});
	   }
</script>





