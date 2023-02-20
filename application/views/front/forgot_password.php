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
                  <div class="col-md-7 col-lg-6 login-left">
                     <img src="<?php echo base_url() ?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
                  </div>
                  <div class="col-md-12 col-lg-6 login-right">
						<h4>Forgot Password</h4><br>
						
						
					<?php
                        if($this->session->flashdata('info_success')){ ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('info_success'); ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <?php } ?>
						
						
					<form action="<?php echo base_url('welcome/forgot_pass');?>" method="post">
                     <div class="form-group form-focus ">
                        <input type="email" class="form-control floating" name="email" required>
                        <label class="focus-label">Email</label>
                     </div>
					<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
					 
					 
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
	
<!----model end--->