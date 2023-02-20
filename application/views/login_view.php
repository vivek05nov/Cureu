<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style> 
body 
{ 
margin:0; 
padding:0; 
background-color:#f1f1f1; 
} 
.loginbox 
{ 
width:500px; 
padding:20px; 
margin-left: 30%;
margin-top: 10%;
background-color:#fff; 
}
.signbox{
	text-align: center;
	margin-left: 100px;
}

</style>
 
<div class="container loginbox">
	 
<h2 style="text-align: center;">Login Using Google Account</h2>
 
 <span class="signbox"><a href="<?=base_url()?>googlelogin/login" style="text-decoration:none;">
 <i class="fa fa-google" aria-hidden="true"></i> Login</a></span>

</div>