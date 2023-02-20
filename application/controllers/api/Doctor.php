<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');



// Load the Rest Controller library

require APPPATH . '/libraries/REST_Controller.php';



class Doctor extends REST_Controller {

    public function __construct() { 

        parent::__construct();

        // Load the user model

        $this->load->model(array('api/doctor_modal'=>'doctor_modal'));

    }

    

    // public function index_get()

    // {

        // echo password_hash("12345", PASSWORD_BCRYPT);

    // }

    

    public function login_post() {

        $mobile = $this->input->post('mobile');

        $password = md5($this->input->post('password'));

        if(!empty($mobile) && !empty($password)){ 

            $user = $this->doctor_modal->getlogin(); 

            //print_r($user);die;

            if ($password == $user['password']) {

                $this->response([ 

                    'status' => TRUE,

                    'message' => 'Doctor login successful.',

                    'data' => $user,

                ], REST_Controller::HTTP_OK);

            }

            else {

                //BAD_REQUEST (400) being the HTTP response code

                $this->response(['status' => TRUE,

                                'message'=>'Wrong api_id ,name or password.'], REST_Controller::HTTP_BAD_REQUEST);

            }

                

        }

        else

        {

            // Set the response and exit

            $this->response(['status' => false,'message'=>'Provide Api mobile and password.'], REST_Controller::HTTP_BAD_REQUEST);

        }

    }

    

    public function registration_post() {

		$mobile 	= $this->input->post('mobile');

        $email 		= strip_tags($this->post('email'));

		$password 	= md5($this->input->post('password')); 

        // Validate the post data

        if(!empty($mobile) && !empty($email) && !empty($password)){ 

            $userCount = $this->doctor_modal->getuserRows($email);

            if($userCount > 0){

                $this->response(['status' => FALSE,'message' =>'The given mobile or email already exists.'], REST_Controller::HTTP_BAD_REQUEST);

            }else{

                // Insert user data

                $data = array(

					'specialities' =>$this->input->post('specialities_id'),

					'name' =>$this->input->post('name'),

					'dob' =>$this->input->post('dob'),

					'gender' =>$this->input->post('gender'),

					'mobile' =>$this->input->post('mobile'),

					'aadhaar' =>$this->input->post('aadhaar'),

					'blood_group' =>$this->input->post('blood_group'),

					'email' =>$this->input->post('email'),

					'created_at' =>date('Y-m-d H:i:s'),

					'password' =>$password, 

					'address'=>$this->input->post('address'),

					'status'=>1

				  );

                $insert = $this->doctor_modal->insert($data);

                // Check if the user data is inserted

                if(!empty($insert)){

                    //$send = $this->user->send_reg($password,$userData);

                    // Set the response and exit

                    $this->response([

                        'status' => TRUE,

                        'message' => 'The Doctor has been added successfully.'

                    ], REST_Controller::HTTP_OK);

                }else{

                    // Set the response and exit

                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);

                }

            }

        }else{

            // Set the response and exit

            $this->response(['status' => FALSE,'message' =>'Provide complete user info to add.'], REST_Controller::HTTP_BAD_REQUEST);

        }

    }

	

	public function specialities_get() {

        $specialities = $this->doctor_modal->get_specialities();

        

        // Check if the user data exists

        if(!empty($specialities)){

            //OK (200) being the HTTP response code

            $this->response([

                 'status' => TRUE,'data'=>$specialities], REST_Controller::HTTP_OK);

        }else{

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No user was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

	

	public function appointment_get() {

        $con = $this->input->get('doctor_id');

        $appointment = $this->doctor_modal->get_appointment($con); 

        if(!empty($appointment)){ 

            $this->response([

                 'status' => TRUE,'data'=>$appointment], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No user was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

    public function user_get($id = 0) {

        // Returns all the users data if the id not specified,

        // Otherwise, a single user will be returned.

        $con = $id?array('id' => $id):'';

        $users = $this->user->getUsers($con);

        

        // Check if the user data exists

        if(!empty($users)){

            // Set the response and exit

            //OK (200) being the HTTP response code

            $this->response([

                 'status' => TRUE,'data'=>$users], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No user was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

     public function awards_get($id = 0) {

        // Returns all the users data if the id not specified,

        // Otherwise, a single user will be returned.

        $con = $id?array('id' => $id):array('id' => null);

        $con['conditions'] = array('event_type' => 'Award');

        $events = $this->event->getRows($con);

        

        // Check if the user data exists

        if(!empty($events)){

            // Set the response and exit

            //OK (200) being the HTTP response code

            $this->response(['status' => TRUE,'events'=>$events], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No Event was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

     public function events_get($id = 0) {

        // Returns all the users data if the id not specified,

        // Otherwise, a single user will be returned.

        $con = $id?array('id' => $id):array('id' => null);

        $con['conditions'] = array('event_type !=' => 'Award');

        $events = $this->event->getRows($con);

        

        // Check if the user data exists

        if(!empty($events)){

            // Set the response and exit

            //OK (200) being the HTTP response code

            $this->response(['status' => TRUE,'events'=>$events], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No Event was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

    public function upcoming_events_get($id = 0) {

        // Returns all the users data if the id not specified,

        // Otherwise, a single user will be returned.

        $con = $id?array('id' => $id):array('id' => null);

        $con['conditions'] = array('event_type !=' => 'Award',

                                'event_date >'=> date('Y-m-d'));

        $events = $this->event->getRows($con);

        

        // Check if the user data exists

        if(!empty($events)){

            // Set the response and exit

            //OK (200) being the HTTP response code

            $this->response(['status' => TRUE,'events'=>$events], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    public function archives_get() {

        // Returns all the users data if the id not specified,

        // Otherwise, a single user will be returned.

        

        $year = $this->input->get('year');

        

        $archive = $this->event->getArchive($year);

        

        // Check if the user data exists

        if(!empty($archive)){

            // Set the response and exit

            //OK (200) being the HTTP response code

            $this->response(['status' => TRUE,'archive'=>$archive], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            //NOT_FOUND (404) being the HTTP response code

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

    public function user_put() {

        $id = $this->put('id');

        

        // Get the post data

        $first_name = strip_tags($this->put('first_name'));

        $last_name = strip_tags($this->put('last_name'));

        $email = strip_tags($this->put('email'));

        $password = $this->put('password');

        $phone = strip_tags($this->put('phone'));

        

        // Validate the post data

        if(!empty($id) && (!empty($first_name) || !empty($last_name) || !empty($email) || !empty($password) || !empty($phone))){

            // Update user's account data

            $userData = array();

            if(!empty($first_name)){

                $userData['first_name'] = $first_name;

            }

            if(!empty($last_name)){

                $userData['last_name'] = $last_name;

            }

            if(!empty($email)){

                $userData['email'] = $email;

            }

            if(!empty($password)){

                $userData['password'] = md5($password);

            }

            if(!empty($phone)){

                $userData['phone'] = $phone;

            }

            $update = $this->user->update($userData, $id);

            

            // Check if the user data is updated

            if($update){

                // Set the response and exit

                $this->response([

                    'status' => TRUE,

                    'message' => 'The user info has been updated successfully.'

                ], REST_Controller::HTTP_OK);

            }else{

                // Set the response and exit

                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);

            }

        }else{

            // Set the response and exit

            $this->response("Provide at least one user info to update.", REST_Controller::HTTP_BAD_REQUEST);

        }

    }

    

    public function scientific_post() {

        $id = strip_tags($this->post('member_id'));

        $file = strip_tags($this->post('file_name'));

        $title = strip_tags($this->post('title'));

        $cat = strip_tags($this->post('cat_id'));

         // $this->response([

                // 'status' => TRUE,

                // 'message' => 'The scientific inputs has been added successfully.',

                // 'file_data'=> $_FILES,

                // 'post_data'=>$_POST,

            // ], REST_Controller::HTTP_OK);

        

        $config = array(

        'upload_path' => "./assets/scientific/",

        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",

        'encrypt_name' => TRUE

        );

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_name'))

        { 

            $data['imageError'] =  $this->upload->display_errors();

            print_r($data['imageError']);

        }

        else

        {

            $imageDetailArray = $this->upload->data();

            $image =  $imageDetailArray['file_name'];

           // echo $image;

        }

        if(!empty($id) && !empty($title)){

                $data = array(

                'member_id' => $id,

                'image'=>$image,

                'title'=>$title,

                'category'=>$cat

                );

               // print_r($data);

                $insert = $this->db->insert('scientific', $data);

                

                if(!empty($insert)){

                    $this->response([

                        'status' => TRUE,

                        'message' => 'The scientific inputs has been added successfully.',

                        'data'=>$data

                    ], REST_Controller::HTTP_OK);

                }else{

                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);

                }

           

        }else{

            $this->response(['status' => FALSE,'message' =>'Provide complete user info to add.'], REST_Controller::HTTP_BAD_REQUEST);

        }

    }

    

    public function listscientific_get() {

        $id = $this->input->get('id');

       

        $list = $this->user->getscientific($id);

       // print_r($list);die;

        if(!empty($list)){

            $this->response(['status' => TRUE,'archive'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

    public function adminscientific_get() {

       // $id = $this->input->get('id');

       

        $list = $this->user->get_admin_scientific();

        if(!empty($list)){

            $this->response(['status' => TRUE,'archive'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

    public function forgot_post() 

        {    

            //$id = $this->input->post('customer_id');

            $mobile = $this->input->post('mobile');

            $otp = rand(000000,999999);

            $this->session->set_userdata('otp', $otp);

            $send = $this->user->send_otp($otp,$mobile);

            //echo $this->session->userdata('otp');die;  

            //$forgot_password = $this->signup->forgot_password($otp);

                

            if(!empty($send))

                { 

                    $this->response(['status'=>TRUE,'message' => 'Successfully send OTP.'],REST_Controller::HTTP_OK);

                }

            else

                {

                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_NOT_FOUND);

                }

    	}

        

    public function forgotpassword_post() 

        {     

            $forgot_password = $this->user->forgot_password();

                

            if(!empty($forgot_password))

                { 

                    $this->response(['status'=>TRUE,'message' => 'Password Change Successfully.'],REST_Controller::HTTP_OK);

                }

            else

                {

                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_NOT_FOUND);

                }

    	}

    public function change_post() 

        {     

            $change_password = $this->user->change_password();

                

            if(!empty($change_password))

                { 

                    $this->response(['status'=>TRUE,'message' => 'Password Change Successfully.'],REST_Controller::HTTP_OK);

                }

            else

                {

                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_NOT_FOUND);

                }

    	}

        

        

   

    

    public function update_post() {

        $id = strip_tags($this->post('id'));

        $first_name     = strip_tags($this->post('first_name'));

        $last_name      = strip_tags($this->post('last_name'));

        $email          = strip_tags($this->post('email'));

        $phone          = strip_tags($this->post('phone'));

        $file           = strip_tags($this->post('file_name'));

        $address        = strip_tags($this->post('address'));

        $user= $this->user->getuser($id);

        if($first_name =='' || $last_name ==''){

           $first_name = $user->firstname; 

           $last_name  = $user->lastname; 

           $email     = $user->email; 

           $phone     = $user->mobile_no; 

           $address     = $user->address; 

        }

        //print_r($user); die;

        // Update user data

        $config = array(

        'upload_path' => "./assets/users/",

        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",

        'encrypt_name' => TRUE

        );

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_name'))

        { 

            $data['imageError'] =  $this->upload->display_errors();

            //print_r($data['imageError']);

            $image = $user->image;

        }

        else

        {

            $imageDetailArray = $this->upload->data();

            $image =  $imageDetailArray['file_name'];

           // echo $image;

        }

        $data = array(

            'firstname' => $first_name,

            'lastname' => $last_name,

            'email' => $email,

            'mobile_no' => $phone,

            'address' => $address,

            'image' => $image

        );

        $update = $this->user->update($data,$id);

        

        if(!empty($update)){

            // Set the response and exit

            $this->response([

                'status' => TRUE,

                'message' => 'The user has been updated successfully.'

            ], REST_Controller::HTTP_OK);

        }else{

            // Set the response and exit

            $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);

        }

    }

    

    

    public function category_get() {

        $list = $this->user->get_category();

        if(!empty($list)){

            $this->response(['status' => TRUE,'archive'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    public function subcategory_post() {

        $cat_id = $this->input->post('cat_id');

        $list = $this->user->get_subcategory($cat_id);

        if(!empty($list)){

            $this->response(['status' => TRUE,'archive'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    public function medicalcal_get() {

        $list = $this->user->get_medicalcal();

        if(!empty($list)){

            $this->response(['status' => TRUE,'data'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

     public function calculator_post() {

        $cat_id = $this->input->post('cat_id');

        $list = $this->user->get_admin_calculator($cat_id);

        if(!empty($list)){

            $this->response(['status' => TRUE,'data'=>$list], REST_Controller::HTTP_OK);

        }else{

            $this->response([

                'status' => FALSE,

                'message' => 'No Record was found.'

            ], REST_Controller::HTTP_NOT_FOUND);

        }

    }

    

}