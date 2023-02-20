<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Member extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->model(array('api/user'=>'user'));
    }

    public function login_post() {
        $mobile = $this->input->post('mobile');
        $password = md5($this->input->post('password'));
        if(!empty($mobile) && !empty($password)){
            $con['returnType'] = 'single';
           
            $user = $this->user->getlogin();
            if ($password == $user['password']) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user,
                ], REST_Controller::HTTP_OK);
            }
            else {
                $this->response(['status' => TRUE,
                                'message'=>'Wrong api_id ,name or password.'], REST_Controller::HTTP_OK);
            }
                
        }
        else
        {
            $this->response(['status' => false,'message'=>'Provide Api id ,Name and password.'], REST_Controller::HTTP_OK);
        }
    }
    
	

	public function mobilelogin_post() { 
        $mobile 	= $this->input->post('mobile');
        $otp = mt_rand(000000,999999);
        if(!empty($mobile)){
            $userCount = $this->user->getuserRows($mobile);
            if($userCount > 0){ 
				$this->user->send_otp($otp,$mobile);
                $this->response(['status' => TRUE,'OTP' => $otp,'message' =>'The given mobile already exists.'], REST_Controller::HTTP_OK);
            }else{
				//$this->user->send_otp($otp,$mobile);
				$data=array(
						'mobile_no'=>$mobile,
						'otp'=>$otp);
				$insert = $this->user->insert($data);
				
				if($insert){  
					$this->response([
						'status' => TRUE,
						'OTP' => $otp
					], REST_Controller::HTTP_OK);
				}else{
                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            $this->response(['status' => FALSE,'message' =>'Provide complete user info to add.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
	public function verify_post() {
        $status = $this->input->post('status');
        $otp 		= $this->input->post('otp');
		$mobile 	= $this->input->post('mobile');
		$data = $this->db->get_where('members', array('mobile_no' => $mobile))->row();  
		//echo $this->db->last_query();die;
        if($status == 1)
		{  
			$this->response([
				'status' => TRUE,
				'data'=>$data
			], REST_Controller::HTTP_OK); 
		}
		else
		{
			$this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_OK);
        }
    }  

	public function appointment_post() {  
		$member_id 			= $this->input->post('member_id');
        $specialities_id 	= strip_tags($this->post('specialities_id'));
		$doctor_id 			= $this->input->post('doctor_id'); 
        if(!empty($member_id) && !empty($specialities_id) && !empty($doctor_id)){ 
                $data = array(
					'user_id'=>$member_id,
					'payment_id'=>$this->input->post('payment_id'),
					'amount'=>$this->input->post('amount'),
					'payment_status'=>'captured',
					'response_msg'=>'Welcome To Cureu Venturess',
					'signature_hash'=>'app',
					'order_id'=>$this->input->post('order_id'),
					'payment_date'=>date('Y-m-d H:i:s'),  
					'method'=>'upi',
					'status'=>1
				  ); 
				 
                $insert = $this->db->insert('transaction_log',$data); 
				
				$data = array(
					'member_id'=> $member_id,
					'appointment_id'=>"AP-".rand(10000,99999),
					'specialities_id'=> $specialities_id,
					'doctor_id'=> $doctor_id,
					'appointment_date'=>$this->input->post('appointment_date'),
					'created_at'=> date("Y-m-d H:i:s"),   
					'status' =>1
				  ); 
				$insert = $this->db->insert('appointment',$data);
                if(!empty($insert)){
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The Appointment has been successfully.'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_OK);
                }
        }else{
            $this->response(['status' => FALSE,'message' =>'Provide complete user info to add.'], REST_Controller::HTTP_OK);
        }
    }
	
	public function appointmentlist_get() { 
        $id = $this->input->get('customer_id');
        $appointment_list = $this->user->get_appointment_list($id);
        if(!empty($appointment_list)){
            $this->response(['status' => TRUE,'appointment_list'=>$appointment_list], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Appointment list was not found.'
            ],REST_Controller::HTTP_OK);
        }
    }
	
    public function banner_get() {
        $banner = $this->db->get_where('banner',array('banner_type'=>'Home'))->result();
        if(!empty($banner)){
            $this->response([
                 'status' => TRUE,'data'=>$banner], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_OK);
        }
    }
	public function doctor_get() {
        $doctors = $this->db->get('doctors')->result();
        if(!empty($doctors)){
            $this->response([
                 'status' => TRUE,'data'=>$doctors], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No doctors was found.'
            ], REST_Controller::HTTP_OK);
        }
    }
	
	public function specialities_get() {
        $specialities = $this->user->get_specialities();
        if(!empty($specialities)){
            $this->response([
                 'status' => TRUE,'data'=>$specialities], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
	
	public function specialitieslist_get() {
		$id = $this->input->get('id');
        $specialities_list = $this->user->get_specialities_list($id);
        if(!empty($specialities_list)){
            $this->response([
                 'status' => TRUE,'data'=>$specialities_list], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Specialit list was not found.'
            ], REST_Controller::HTTP_OK);
        }
    }
	
	public function commonspecialities_get() {
		$id = $this->input->get('id');
        $common_specialities = $this->db->get('common_specialities')->result();
        if(!empty($common_specialities)){
            $this->response([
                 'status' => TRUE,'data'=>$common_specialities], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Specialit list was not found.'
            ], REST_Controller::HTTP_OK);
        }
    }
	
	public function doctorspecial_get() {
		$id = $this->input->get('doctor_id');
        $specialities_list = $this->user->get_doctor_special($id);
        if(!empty($specialities_list)){
            $this->response([
                 'status' => TRUE,'data'=>$specialities_list], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Specialit list was not found.'
            ], REST_Controller::HTTP_OK);
        }
    }
    public function user_get() {
        $con = $this->input->get('mobile');
        $users = $this->user->getuser($con); 
        if(!empty($users)){
            $this->response([
                 'status' => TRUE,'data'=>$users], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function doctors_get() { 
        $id = $this->input->get('specialities_id');
        $doctors = $this->user->get_doctor($id);
        if(!empty($doctors)){
            $this->response(['status' => TRUE,'doctors'=>$doctors], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Doctor was not found.'
            ],REST_Controller::HTTP_OK);
        }
    }
	public function doctorprofile_get() { 
        $id = $this->input->get('doctor_id');
        $data = $this->user->get_doctor_profile($id);
		
        if(!empty($data)){
            $this->response(['status' => TRUE,'data'=>$data], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Doctor was not found.'
            ],REST_Controller::HTTP_OK);
        }
    }
	
	public function hospitalprofile_get() { 
        $id = $this->input->get('hospital_id');
        $data = $this->user->get_hospital_profile($id);
		 
        if(!empty($data)){
            $this->response(['status' => TRUE,'data'=>$data], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Doctor was not found.'
            ],REST_Controller::HTTP_OK);
        }
    }
	public function hospitalappointment_post() {  
		$member_id 			= $this->input->post('member_id');
		$hospital_id 			= $this->input->post('hospital_id'); 
        if(!empty($member_id) && !empty($hospital_id)){ 
            $data = array(
				'member_id'=> $member_id,
				'appointment_id'=>"AP-".rand(10000,999999),
				'specialities_name'=> $this->input->post('specialities_name'),
				'hospital_id'=> $hospital_id,
				'appointment_date'=> $this->input->post('appointment_date'),
				'created_at'=> date("Y-m-d H:i:s"), 
				'status' =>1
			  ); 
			$insert = $this->db->insert('appointmentt',$data); 
                if(!empty($insert)){
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The Appointment has been successfully.'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_OK);
                }
        }else{
            $this->response(['status' => FALSE,'message' =>'Provide complete user info to add.'], REST_Controller::HTTP_OK);
        }
    }
	public function hospappointmentlist_get() { 
        $id = $this->input->get('customer_id');
        $appointment_list = $this->user->get_hospital_appointment_list($id);
        if(!empty($appointment_list)){
            $this->response(['status' => TRUE,'appointment_list'=>$appointment_list], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Appointment list was not found.'
            ],REST_Controller::HTTP_OK);
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
    
	public function notification_get() {
        $notification = $this->user->get_notification();
        if(!empty($notification)){
            $this->response([
                 'status' => TRUE,'data'=>$notification], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
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
		
		public function likee_post()   
        {     
            $patient_id=$this->input->post('patient_name');
		    $doc_id=$this->input->post('doc_name');
			if(!empty($this->db->where('doc_id',$doc_id)->where('patient_id',$patient_id)->get('likee')->row()))
                { 
                    $this->response(['status'=>TRUE,'message' => 'You Already Liked.'],REST_Controller::HTTP_OK);
                }
				else if(empty($this->db->where('doc_id',$doc_id)->where('patient_id',$patient_id)->get('likee')->row()))
                {
					$data=array('patient_id'=>$patient_id,
						'doc_id'=>$doc_id,
						'likee_at'=>date('y:m:d H:I:S'),
						'status'=>1
						);
						
					if($this->db->insert('likee',$data))	
					{
						$likes=$this->db->get_where('likee', array('doc_id' =>$doc_id ))->result();
						 $this->response(['status' => TRUE,'data' => count($likes),'message' => 'total like'],REST_Controller::HTTP_OK);
					}			
					
                  
                }
				else 
				{
					$this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
				}
    	}
		
		function getlike_post()
		{
			$hospital_id=$this->input->post('hospital_id');
			if(!empty($hospital_id))
                { 
					$likee=count($this->db->get_where('hospital_likee', array('hospital_id' =>$hospital_id ))->result());
					
                    $this->response(['status'=>TRUE,'data'=>$likee , 'message' => 'Total Hospital Like.'],REST_Controller::HTTP_OK);
                }
            else
                {
                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
                }  
			
		}  
		
		function getlikedoctor_post()
		{
			$doctor_id=$this->input->post('doctor_id');
			if(!empty($doctor_id))
                { 
					$likedoc=count($this->db->get_where('likee', array('doc_id' =>$doctor_id ))->result());
					
                    $this->response(['status'=>TRUE,'data'=>$likedoc , 'message' => 'Total Doctor Like.'],REST_Controller::HTTP_OK);
                }
            else
                {
                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
                }  
			
		}  

		public function ehrhospital_post() { 
		$userid =  $this->input->post('userid');
        $hospital_id = $this->input->post('hospital_id');
        $ehr_hospital_name = $this->input->post('ehr_hospital_name');
        $hospital_image_name = $_FILES['hospital_image_name']['name'];
		if(!empty($_FILES['hospital_image_name']['name']))
		{
			$uploadPath = 'assets/img/filehospital/';  
			$config['upload_path'] = $uploadPath; 
			$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv|doc|docx";  
			$config['encrypt_name']=true;
			//$this->allowed_file_size = '1024';
			//$config['max_size']    = '100'; 
			$config['max_width'] = '1024'; 
			//$config['max_height'] = '768'; 
			 
			// Load and initialize upload library 
			$this->load->library('upload', $config);
        
		$this->load->library('upload', $config);
		
		if(!empty($_FILES['hospital_image_name']['name']) && count(array_filter($_FILES['hospital_image_name']['name'])) > 0){ 
                $filesCount = count($_FILES['hospital_image_name']['name']);
				
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['fil']['name']     = $_FILES['hospital_image_name']['name'][$i]; 
                    $_FILES['fil']['type']     = $_FILES['hospital_image_name']['type'][$i]; 
                    $_FILES['fil']['tmp_name'] = $_FILES['hospital_image_name']['tmp_name'][$i]; 
                   $_FILES['fil']['error']     = $_FILES['hospital_image_name']['error'][$i]; 
                    $_FILES['fil']['size']     = $_FILES['hospital_image_name']['size'][$i]; 
                     
					
                    // File upload configuration 
                     
                    $uplaod=$this->upload->initialize($config); 
                   
                    // Upload file to server 
                    if($this->upload->do_upload('fil')){ 
                        // Uploaded file data 
				
                        $fileData = $this->upload->data(); 
                        $uploadData['file_name'][$i] = $fileData['file_name']; 
                       /* echo "<pre>";
					  print_r( $uploadData);  */
					  
                    }else{  
                        $errorUploadType = $_FILES['fil']['name'].' | ';  
                    } 
                }
					
				  		
				// Initialize array
				$uploadImgData = $uploadData;
			  }
			  
			  
			  if(!empty($userid) && !empty($uploadImgData)){
                $data=array('ehr_hospital'=>json_encode($this->input->post('ehr_hospital_name')),
						'hospital_image'=>json_encode($uploadImgData),
						'hospital_id'=>$this->input->post('hospital_id'),
						'user_id'=>$userid,
						'created_at'=> date("Y-m-d H:i:s") 
						);
					
			    $insert = $this->db->insert('ehr_hospital',$data);
                
                if(!empty($insert)){
                    $this->response([
                        'status' => TRUE,
                        'message' => 'EHR uploaded successfully.'
                        
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_OK);
                }
           
        }else{
            $this->response(['status' => FALSE,'message' =>'Provide complete ehr info to add.'], REST_Controller::HTTP_OK);
        }
			  
		} else {
			$this->response(['status' => FALSE,'message' =>'Not Found.'], REST_Controller::HTTP_OK);
		} 
		
        
    }

	function getehrhospital_post()
	{
		
		$userid=$this->input->post('userid');
			if(!empty($userid))
                { 
					$ehr_hos_get = $this->db->query('SELECT DISTINCT(hospital.name),hospital.id, appointmentt.hospital_id FROM hospital 
												  left join appointmentt on appointmentt.hospital_id=hospital.id where member_id='.$userid.'')->result();
					
                    $this->response(['status'=>TRUE,'data'=>$ehr_hos_get , 'message' => 'EHR Hospital List.'],REST_Controller::HTTP_OK);
                }
            else
                {
                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
                }  
		
	} 
	
	function gethosehrlist_post() 
	{
		$userid=$this->input->post('userid');
			if(!empty($userid))
                { 
					$ehr_list = $this->db->get_where('ehr_hospital',array('user_id'=>$userid))->result_array();
					
					foreach($ehr_list as $row) {
						
						$data_rhr = array(
							'id' => $row['id'],
							'hospital_id' => $row['hospital_id'],
							'user_id' => $row['user_id'],
							'hospital_image' => json_decode($row['hospital_image']),
							'ehr_hospital' => json_decode($row['ehr_hospital'])
							
						);
					 
					}
					$new_data = str_replace(array('[',']'),'',$data_rhr); 
					
                    $this->response(['status'=>TRUE,'data'=>$new_data , 'message' => 'EHR List.'],REST_Controller::HTTP_OK); 
                }
            else
                {
                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
                } 
	}
	
	
	public function ehrdoctor_post() { 
		$userid =  $this->input->post('userid');  
        $doctor_id = $this->input->post('doctor_id');
        $ehr_name = $this->input->post('ehr_name');
        $image_ehr = $_FILES['image_name']['name'];
		
		if(!empty($_FILES['image_name']['name']))
		{
			$uploadPath = 'assets/img/fileehr/';  
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv|doc|docx";  
					$config['encrypt_name']=true;
					//$this->allowed_file_size = '1024';
                    //$config['max_size']    = '100'; 
                    $config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config);
		
		if(!empty($_FILES['image_name']['name']) && count(array_filter($_FILES['image_name']['name'])) > 0){ 
                $filesCount = count($_FILES['image_name']['name']);
				
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['fil']['name']     = $_FILES['image_name']['name'][$i]; 
                    $_FILES['fil']['type']     = $_FILES['image_name']['type'][$i]; 
                    $_FILES['fil']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i]; 
                    $_FILES['fil']['error']     = $_FILES['image_name']['error'][$i]; 
                    $_FILES['fil']['size']     = $_FILES['image_name']['size'][$i]; 
                     
					
                    // File upload configuration 
                     
                    $uplaod=$this->upload->initialize($config); 
                   
                    // Upload file to server 
                    if($this->upload->do_upload('fil')){ 
                        // Uploaded file data 
				
                        $fileData = $this->upload->data(); 
                        $uploadData['file_name'][$i] = $fileData['file_name']; 
                       /* echo "<pre>";
					  print_r( $uploadData);  */
					  
                    }else{  
                        $errorUploadType = $_FILES['fil']['name'].' | ';   
                    } 
                }
					
				  		
				// Initialize array
				$uploadImgData = $uploadData;
			  }
			  
			  
			  if(!empty($userid) && !empty($uploadImgData)){
               $data=array('ehr_name'=>json_encode($this->input->post('ehr_name')),
						'image'=>json_encode($uploadImgData),
						'doctor_id'=>$this->input->post('doctor_id'),
						'user_id'=>$userid,
						'created_at'=> date("Y-m-d H:i:s") 
						);
						
			  $insert = $this->db->insert('ehr_doctor',$data);
                
                if(!empty($insert)){
                    $this->response([
                        'status' => TRUE,
                        'message' => 'EHR uploaded successfully.'
                        
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => FALSE,'message' =>'Some problems occurred, please try again.'], REST_Controller::HTTP_OK);
                }
           
        }else{
            $this->response(['status' => FALSE,'message' =>'Provide complete ehr info to add.'], REST_Controller::HTTP_OK);
        }
			  
		} else {
			$this->response(['status' => FALSE,'message' =>'Not Found.'], REST_Controller::HTTP_OK); 
		} 
		
        
    }
	
	
	function getdoctorlist_post()
	{ 
		
		$userid=$this->input->post('userid');
			if(!empty($userid))
                { 
					$ehr_doc_get = $this->db->query('SELECT DISTINCT(doctors.name),doctors.id, appointment.doctor_id FROM doctors 
												  left join appointment on appointment.doctor_id=doctors.id where member_id='.$userid.'')->result();
					
                    $this->response(['status'=>TRUE,'data'=>$ehr_doc_get , 'message' => 'EHR Doctor List.'],REST_Controller::HTTP_OK);
                }
            else
                {
                   $this->response(['status' => FALSE,'message' => 'Not Found.'],REST_Controller::HTTP_OK);
                }   
		
	} 
        
    
}