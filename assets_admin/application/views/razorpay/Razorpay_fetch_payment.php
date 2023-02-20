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

 $razorpay_payment_id=$response['razorpay_payment_id'];
$razorpay_order_id=$response['razorpay_order_id'];
$razorpay_signature_id=$response['razorpay_signature'];
 

$payment=$api->payment->fetch($razorpay_payment_id);
  
    if($payment['status']=='captured')
    {
        $data=[ 'user_id'=>$this->session->userdata('userid'),
				'payment_id'=>$payment['id'],
                'amount'=>$payment['amount']/100,
                'payment_status'=>$payment['status'],
                'response_msg'=>$payment['description'],
                'signature_hash'=>$razorpay_signature_id,
                'order_id'=>$payment['order_id'],
                'method'=>$payment['method'],
				'payment_date'=>date('Y-m-d H:i:s'),  
                'status'=>1
                ];
				
            $this->db->insert('transaction_log',$data); 
			$date = date('Y-m-d',strtotime($this->session->userdata('user')['appointment_date']));
		 $data = array(
			'member_id'=> $this->session->userdata('userid'),
			'appointment_id'=>"AP-".rand(10000,99999),
			'specialities_id'=> $this->session->userdata('user')['specialities_id'],
			'doctor_id'=> $this->session->userdata('user')['doctor_id'],
			 'appointment_date'=> $date,
			/* 'appointment_time'=> $this->session->userdata('user')['appointment_time'], */ 
			'created_at'=> date("Y-m-d H:i:s"),   
			'status' =>1
		  );
		  //print_r($data); die;  
		$insert = $this->db->insert('appointment',$data);  
		$this->session->set_flashdata('info_success', "Appointment has been successfull.");
		
		redirect('appointment-details/'.$this->session->userdata('user') ['doctor_id'].'', 'refresh');
		     
     } 
    else 
    {
        $this->session->set_flashdata('warning','Payment Failed');
            redirect(base_url());    
    } 