<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Hospital extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->model(array('api/Hospital_model'=>'hospital',
                                'api/user'=>'user'));
    }
    
   
    public function login_post() {
        $email = $this->post('email');
        $password = $this->post('password');
        if(!empty($email) && !empty($password)){
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'email' => $email,
                'password' => md5($password),
                'status' => 1
            );
            $user = $this->hospital->getRows($con);
            
            if($user){
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

	public function hospital_get() {
        $hospital = $this->hospital->get_hospital();
        if(!empty($hospital)){
            $this->response(['status' => TRUE,'data'=>$hospital], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


























    
    
}