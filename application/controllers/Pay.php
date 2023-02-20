<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Pay extends CI_Controller {
	/**
	 * This function loads the registration form
	 */
	public function index()
	{
		$this->load->view('user/article');
	}

	/**
	 * This function creates order and loads the payment methods
	 */
	

	public function payment()
	{
		//echo "vivek";die;
		$data['inputs']=$this->input->post();
		$data['key']=['key_id'=>'rzp_test_7lxOFPAckCl8x0',
					  'secretkey'=>'bH25v4DFauv1y3EV80iehJsb'];
		$this->load->view('razorpay/Razorpay',$data); 			   	

						
	}
	public function success() {
        
        $data['response']=$this->input->post();
        $data['key']=['key_id'=>'rzp_test_7lxOFPAckCl8x0',
					  'secretkey'=>'bH25v4DFauv1y3EV80iehJsb'];
		$this->load->view('razorpay/razorpay_fetch_payment',$data);
        }

    }