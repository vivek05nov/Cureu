<?php

// Include Requests only if not already defined
if (class_exists('Requests') === false)
{
    require_once __DIR__.'/libs/Requests-1.7.0/library/Requests.php';
}

try
{
    Requests::register_autoloader();

    if (version_compare(Requests::VERSION, '1.6.0') === -1)
    {
        throw new Exception('Requests class found but did not match');
    }
}
catch (\Exception $e)
{
    throw new Exception('Requests class found but did not match');
}

spl_autoload_register(function ($class)
{
    // project-specific namespace prefix
    $prefix = 'Razorpay\Api';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0)
    {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    //
    // replace the namespace prefix with the base directory,
    // replace namespace separators with directory separators
    // in the relative class name, append with .php
    //
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file))
    {
        require $file;
    }
});


use Razorpay\Api\Api;

$keyid=$key['key_id'];
$keysecret=$key['secretkey'];

$api=new Api($keyid,$keysecret);
$amount=$this->db->select('fee')->where('id',$this->session->userdata('user')['doctor_id'])->get('doctors')->row();						
$contact=$this->db->where('id',$this->session->userdata('userid'))->get('members')->row();	
					
$order=$api->order->create(array(
                                'receipt'=>rand(1000,9999).'ORD',
                                'amount'=>($amount->fee)*100,
                                'payment_capture'=>1,
                                'currency'=>'INR')
                            );
	
	//echo $orders;die;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   

        <style>
            .razorpay-payment-button {
              background-color: #f03c02; 
              border-radius: 20px;
              border:none;
              color: #FFFFFF;
              text-align: center; 
              font-size: 25px;
              padding: 18px;
              width: 80%;
              transition: all 0.5s;
              cursor: pointer;
              margin: 20px;
            }
            .razorpay-payment-button:hover {
              padding-right: 25px;
              width: 90%;
            }
            
        </style>
   
    
                
                
       
               

<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-dialog-md">
    <div class="modal-content">
      
      <div class="modal-body">
        <section class="flexbox-container" >
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-12 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <img class="brand-logo" alt="logo" src="http://cureu.in/assets/img/logo.png">
                                
                            </div>
                        </div>

                         
                           
            <div class="card-content">
                <div class="card-body"><!-- rzp_live_UPEclUmwmBRVrD -->
                    <form action="<?php echo base_url() ?>welcome/success" method="POST"><!----rzp_live_UPEclUmwmBRVrD---->
                        <script 
                            src="https://checkout.razorpay.com/v1/checkout.js" 
                            data-key="rzp_test_hfJSc43qI0mkyZ" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
                            data-amount="<?php echo ($amount->fee)*100; ?>" // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.
                            data-currency="INR"//You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
                            data-order_id="<?php echo $order['id']; ?>"//Replace with the order_id generated by you in the backend.
                              
                            data-name="Cureu Ventures Pvt Ltd" 
                            data-description="Welcome To Cureu Venturess"
                            data-image="https://cureu.in/assets/img/logo.png"
                            data-prefill.name=""
                            data-prefill.contact="<?php echo $contact->mobile_no; ?>"
                            data-prefill.email="<?php echo $contact->email; ?>" 
                            data-theme.color="#2bbdae"
                        ></script>
						</form> 
                </div>
            </div>
			</div>
		</div>
	</div>
</section>
      </div>
      
    </div>
  </div>
</div>
<!--  end -->

 

            
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<script type="text/javascript">
    

    $(document).ready(function() {
		$('body').css({ 'background-color': 'red'});
        $('#exampleModal').modal('show');
    });
</script>
<script>
$('#exampleModal').on('hidden.bs.modal', function () {
  window.location.assign('http://cureu.in/'); 
});
</script>