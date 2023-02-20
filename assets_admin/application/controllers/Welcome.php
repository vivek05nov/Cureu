<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
		$this->load->library('facebook'); 
	     $this->load->model(array('Admin_model'=>'admin'));
		 $this->db->order_by("id", "desc");
	}
	   
	public function index()
	{
		$data['specialities'] = $this->db->get('specialities')->result();
		$data['doctors'] = $this->db->get('doctors')->result();
		$data['feedback'] = $this->db->get('feedback')->result();
		
			$data['hospital']=$this->db->query('SELECT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,cities.name from hospital 
			join countries on hospital.country_id=countries.id 
			join cities on cities.id= hospital.city_id' )->result();
		//echo $this->db->last_query();die;	
		//$data['states'] = $this->db->get_where('states',array('country_id =' => 101)); 
		$data['cities'] = $this->db->get('cities')->result();
		
		//echo $this->db->last_query();die;
		//echo "<pre>";print_r($data['doctors']);die;
		$this->load->view('front/header');
		$this->load->view('front/index',$data);
		$this->load->view('front/footer');
	}
	public function Diagnostic()
	{
		$this->load->view('front/header');
		$this->load->view('front/Diagnostic');
		$this->load->view('front/footer');
	}
	public function chat($id){
	    $mobile = $this->db->query("select * from doctors where id='$id'");
	    $data['doctor'] = $mobile->row();
	    
	    $this->load->view('front/header');
		$this->load->view('front/chat',$data);
		$this->load->view('front/footer');
	    
	}
	public function get_state()
	{
		$this->admin->get_state($this->input->post('country')); 
	}
	public function get_city()
	{
		$this->admin->get_state($this->input->post('country')); 
	}
	public function get_area() 
	{
		$this->admin->get_area($this->input->post('city')); 
	}
	public function get_special()
	{
		$this->admin->get_special(); 
	}
	public function login()
	{
		$this->load->view('front/header');
		$this->load->view('front/login');
		$this->load->view('front/footer');
	}
	public function register()
	{
		   $data['authURL'] =  $this->facebook->login_url(); 
		$this->load->view('front/header');
		$this->load->view('front/register',$data);
		$this->load->view('front/footer');
	}
	public function doctor_register()
	{
		$this->load->view('front/header');
		$this->load->view('front/doctor_registration');
		$this->load->view('front/footer');
	}
	public function doctors()
	{
		if(!empty($this->input->post())){
			$state = $this->input->post('state');
			$city = $this->input->post('city');
			$area = $this->input->post('area');
			$this->db->select('*');
			$this->db->from('doctors');
			//$this->db->where('state_id',$state);
			$this->db->where('city_id',$city);
			$this->db->where('area_id',$area);
			$data['doctors'] = $this->db->get()->result();
			
			$this->db->select('count(*) as total');
			$this->db->from('doctors');
			$this->db->where('city_id',$city);
			$this->db->where('area_id',$area);
			$data['total'] = $this->db->get()->row(); 
			
		}else{
			$data['doctors'] = $this->db->get('doctors')->result();
			//$data['total'] = $this->db->query("select count(*) as total from doctors")->row();
			//echo $this->db->last_query();die;
		}
		$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();
		
		$data['gallery']=$this->db->query("SELECT doctor_gallery.*,doctors.name as doctor from doctor_gallery
		JOIN doctors on doctors.id=doctor_gallery.doctor_id WHERE doctors.id=doctor_gallery.doctor_id")->result();
		//die('okk');
		//print_r($data['gallery']);die;
		$this->load->view('front/header');
		$this->load->view('front/map_list',$data); 
		$this->load->view('front/footer');
	}
	function view_profile_doctor(){ 
        //$did = $this->session->userdata('userid');
		 $id = base64_decode($this->uri->segment(2));
		$data['doctor']=$this->db->where('id',$id)->select('*')->from('doctors')->get()->row();
		//print_r($data['doctor']); die;
        $data['special']=$this->db->query('SELECT specialities.service_name,specialities.image as specialities_img from `doctor_specialities`
		join specialities on specialities.id=doctor_specialities.specialites_id  
		WHERE doctor_specialities.doctor_id ='.$id.'' )->result(); 
		$data['like']=count($this->db->get_where('likee', array('doc_id' =>$id ))->result());
		$data['review']=$this->db->where('doctor_id',$id)->select('*')->get('review')->result();
		$data['gallery']=$this->db->query("SELECT * from doctor_gallery where doctor_id=$id")->result();
		//echo $this->db->last_query();die;
        $this->load->view('front/header');
		$this->load->view('front/view_profile_doctor',$data); 
		$this->load->view('front/footer');
    }
	public function about()
	{
		$data['doctors'] = $this->db->get('doctors')->result();
		$this->load->view('front/header');
		$this->load->view('front/about',$data); 
		$this->load->view('front/footer');
	}
	public function blog()
	{
		$blog['blog']=$this->db->order_by('id','ASC')
						   ->get('blog')->result();
		$blog['blog_side']=$this->db->order_by('id','ASC')->limit(5)
						   ->get('blog')->result();
						  /*  echo "<pre>";
						   print_r($blog['blog_side']);die; */
						   //echo $this->db->last_query(); die;
		$this->load->view('front/header');
		$this->load->view('front/blog',$blog); 
		$this->load->view('front/footer');
	}
	
	public function careers()
	{
		$data['doctors'] = $this->db->get('doctors')->result();
		$this->load->view('front/header');
		$this->load->view('front/careers',$data); 
		$this->load->view('front/footer');
	}
	public function contact()
	{
		
		$this->load->view('front/header');
		$this->load->view('front/contact'); 
		$this->load->view('front/footer');
	}
	
	public function terms_condition()
	{
		$this->load->view('front/header');
		$this->load->view('front/terms_condition'); 
		$this->load->view('front/footer');
	}
	public function policy()
	{
		$this->load->view('front/header');
		$this->load->view('front/policy'); 
		$this->load->view('front/footer');
	} 
	
	public function add_contact()
	{
		$data=array(
			'name' =>$this->input->post('name'),
			'Email'=>$this->input->post('Email'),
			'Mob_no'=>$this->input->post('Mob_no'),
            'created_at' =>date('Y-m-d H:i:s'),
            'status'=>1);
		
		$insert=$this->db->insert('contact',$data); 
		
		if($this->db->affected_rows()>0)
		{
		$output = array ('result' =>true);
		$this->session->set_flashdata('info_success', "we will contact you soon.");
		redirect('Welcome/contact', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', "Error Occured");
			redirect('Welcome/contact', 'refresh');
		}
		
		
	}
	public function registration(){
		 $one=1;
		$this->load->library('form_validation');
		 $this->form_validation->set_rules('name','name','required|trim');
		 $this->form_validation->set_rules('email','email','required|trim');
		 $this->form_validation->set_rules('mobile','mobile','required');
		 // $this->form_validation->set_rules('gender','gender','required');
		 // $this->form_validation->set_rules('age','age','required|trim');
		 $this->form_validation->set_rules('password','password','required|trim');
		 if($this->form_validation->run() )
		{
		
		$password 	= md5($this->input->post('password'));
		
		$last_id = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1")->row();
		 
		if(empty($last_id))
		{
			$u_id="0000". $one;
		}
		else
		{
			$u_id  = "0000" .($last_id->id + 1);
			 	
		}
		
		$data = array(
			'user_id' =>$u_id,
			'name' =>$this->input->post('name'),
			'mobile_no' =>$this->input->post('mobile'),
			'email' =>$this->input->post('email'),
			// 'gender' =>$this->input->post('gender'),
			// 'dob' =>$this->input->post('age'), 
			'password' =>$password
		  );
		   
		$insert = $this->db->insert('members',$data); 
		$this->session->set_flashdata('info_success', "Registration has been successfull.");
		redirect('login', 'refresh');
		} 
		else
		 { 
			$this->load->view('front/header');
		 	$this->load->view('front/register');
			$this->load->view('front/footer');
		 }
	}
	function add_doctor()
	{ 
		
		$this->load->library('form_validation');
		 $this->form_validation->set_rules('name','name','required|trim');
		 $this->form_validation->set_rules('email','email','required|trim');
		 $this->form_validation->set_rules('mobile','mobile','required');
		 $this->form_validation->set_rules('gender','gender','required');
		 $this->form_validation->set_rules('dob','dob','required|trim');
		 $this->form_validation->set_rules('password','password','required|trim');
		 $this->form_validation->set_rules('address','address','required');
		 if($this->form_validation->run() )
		{
		
			$data = $this->admin->add_doctor();
			$this->session->set_flashdata('info_success', "Doctor has been added successfully.");
			redirect('doctor', 'refresh');
		}
		else{
			$this->load->view('front/header');
			$this->load->view('front/doctor_registration'); 
			$this->load->view('front/footer');
			}
	}
	
	public function appointment_details()
	{
		$id = base64_decode($this->uri->segment(2)); 
		// echo $id;exit;
		$this->session->unset_userdata('user');   
		//$data['doctor'] = $this->db->get_where('doctors', array('id =' => $id))->row();
		$this->db->select('* ')
         ->from('doctors')
		 ->where('doctors.id',$id);  
		$data['doctor'] = $result = $this->db->get()->row();
		 $data['special']=$this->db->query('SELECT specialities.id as special_id, specialities.service_name,specialities.image as specialities_img  from `doctor_specialities`
		join specialities on specialities.id=doctor_specialities.specialites_id  
		WHERE doctor_specialities.doctor_id ='.$id.'' )->result();
		$data['package'] = $this->db->get('package')->result();
		$this->load->view('front/header');
		$this->load->view('front/appointment_details',$data);  
		$this->load->view('front/footer');
	}
	public function appointment() 
	{
		//$member_id = $this->session->userdata('userid');
		 //print_r($this->input->post()); die;
		 $this->session->set_userdata('user',$this->input->post()); 
		
		 $this->payment();   
		 
    }
	
	
	//User Dashboard 
	
	public function dashboard()
	{
		$id = base64_decode($this->uri->segment(2));
		$id = $this->session->userdata('userid');
		//echo $id;die;
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		$data['appointment'] =$this->db->select('a.id as id, a.status as status,a.created_at as created_at,a.member_id as mem_id, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, d.image as image, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		 ->order_by("a.appointment_date desc") 
         ->where('m.id',$id)
		 ->get()->result();
		 
		 // echo $this->db->last_query();exit;
		// echo "<pre>";
		// print_r($data['appointment']); die; 
		
		$data['appointmentt'] =$this->db->select('a.id as id, a.status as status,a.created_at as created_at,a.member_id as mem_id, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, d.image as image, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointmentt a')
         ->join('members m', 'm.id = a.member_id')
         ->join('hospital d', 'd.id = a.hospital_id')
		 ->order_by("a.created_at") 
         ->where('m.id',$id)
		 ->get()->result();	
		 // echo $this->db->last_query();exit;
		 // echo "<pre>";
		// print_r($data['appointmentt']); die; 

		$this->db->select('p.description,p.file,p.created_at,d.name,d.image')
         ->from('prescriptions p')
		 ->join('appointment a','a.id=p.patient_id')
         ->join('members m', 'm.id = a.member_id')
         ->join('doctors d', 'd.id = p.doctor_id')
		 ->order_by("created_at desc")
		 ->where('m.id',$id);
		 
		$data['prescriptions'] = $this->db->get()->result();
		 //echo $this->db->last_query();die;
		$this->load->view('front/header');
		$this->load->view('front/sidebar',$data);
		$this->load->view('front/dashboard',$data);
		$this->load->view('front/footer');
	}
	public function favourites(){ 
		$id = $this->session->userdata('userid');
		$user_id=$this->db->where('id',$id)->select('user_id')->get('members')->row();
		//echo $this->db->last_query();die;	
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		$data['favourite']=$this->db->query('SELECT doctors.* from appointment
											join members on members.id=appointment.member_id
											join doctors on doctors.id=appointment.doctor_id
											where members.id="'.$id.'"
											and appointment.status!=3')->result();
											
			// echo $this->db->last_query();die; 	 
		/* echo "<pre>";
		print_r($data);die;	 */  
		
		$this->load->view('front/header'); 
		$this->load->view('front/sidebar',$data); 
		$this->load->view('front/favourites',$data); 
		$this->load->view('front/footer'); 
	} 
	function view_profile_user(){ 
		$id = $this->session->userdata('userid');
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		$data['blood']=$this->db->select('*')->get('blood_type')->result();
		
		$this->load->view('front/header');
		$this->load->view('front/sidebar',$data);
		$this->load->view('front/view_profile_user',$data); 
		$this->load->view('front/footer'); 
	}
	
	function view_ehr_doctor(){
		$id = $this->session->userdata('userid');
		//$data['doc_name']=$this->db->query('select * from doctors')->result();
		$data['doc_name'] = $this->db->query('SELECT DISTINCT(doctors.name),doctors.id, appointment.doctor_id FROM doctors 
												  left join appointment on appointment.doctor_id=doctors.id where member_id='.$id.'')->result();
		$data['ehr_data']=$this->db->get_where('ehr_doctor',array('user_id'=>$id))->result();
		//print_r($data['hospital_name']); die;    
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		$this->load->view('front/header');
		$this->load->view('front/sidebar',$data);
		$this->load->view('front/view_ehr_doctor',$data); 
		$this->load->view('front/footer');
	}
	
	
	 public function download($fileName = NULL) { 
		
		
	   if ($fileName) {
		   $this->load->helper('download');
			//$file = realpath ( "download" ) . "\\" . $fileName;
			
			$file = 'assets/img/fileehr/'.$fileName; 
			
			//echo $file; die;
			//check file exists    
			if (file_exists ( $file )) {
				//get file content
				 $data = file_get_contents ( $file );
				
				 force_download ( $fileName, $data );
			} else {
				
				  redirect('welcome/view_ehr_doctor');   
			}
	   }
    }
	
	
	 public function download_hos_ehr($fileName = NULL) { 
		
		
	   if ($fileName) {
		   $this->load->helper('download');
			//$file = realpath ( "download" ) . "\\" . $fileName;
			
			$file = 'assets/img/filehospital/'.$fileName; 
			
			//echo $file; die;
			//check file exists    
			if (file_exists ( $file )) {
				//get file content
				 $data = file_get_contents ( $file );
				
				 force_download ( $fileName, $data );
			} else {
				
				  redirect('welcome/view_ehr_hospital');   
			}
	   }
    }
	
	
	
	function add_ehr()
	{
		$userid =  $this->session->userdata('userid');
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
			  if(!empty($uploadImgData)){
            // Insert files data into the database 
			
            $this->admin->multiple_file_ehr($uploadImgData,$userid);              
        }
		}
		
		$this->session->set_flashdata('info_success', "EHR uploaded successfully.");
        redirect('welcome/view_ehr_doctor');   
		
	}
	
	
	
	function view_ehr_hospital()
	{
		$id = $this->session->userdata('userid');
	    //$data['hospital_name']=$this->db->query('select * from hospital')->result();
		
		$data['ehr_hos_data']=$this->db->get_where('ehr_hospital',array('user_id'=>$id))->result();
		
		$data['hospital_name'] = $this->db->query('SELECT DISTINCT(hospital.name),hospital.id, appointmentt.hospital_id FROM hospital 
												  left join appointmentt on appointmentt.hospital_id=hospital.id where member_id='.$id.'')->result();  
		// echo "<pre>";										
		// print_r($data['ehr_test_data']); die;   			 							
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		
		$this->load->view('front/header');  
		$this->load->view('front/sidebar',$data); 
		$this->load->view('front/view_ehr_hospital',$data); 
		$this->load->view('front/footer');
	}
	
	function add_ehr_hospital()
	{
		$userid =  $this->session->userdata('userid');
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
			  if(!empty($uploadImgData)){
            // Insert files data into the database 
			
            $this->admin->multiple_file_ehr_hospital($uploadImgData,$userid);              
        }
		}
		
		$this->session->set_flashdata('info_success', "EHR uploaded successfully.");
        redirect('welcome/view_ehr_hospital'); 
		
	}
	
	
	function update_profile()
	{ 
	   $this->admin->update_user();
	   $this->session->set_flashdata('info_success', "Profile has been Update successfully.");
	   redirect('welcome/view_profile_user', 'refresh');
	}
	function change_password(){ 
		$id = $this->session->userdata('userid');
		$data['user'] = $this->db->get_where('members',array('id'=>$id))->row();
		$this->load->view('front/header');
		$this->load->view('front/sidebar',$data);
		$this->load->view('front/change_password',$data); 
		$this->load->view('front/footer'); 
	}
	function update_password(){
        $id =  $this->session->userdata('userid');
        $old = $this->input->post('old_password');
        $new = $this->input->post('new_password');
        $con = $this->input->post('con_password');
		$password = md5($new);
        if($new == $con){
            $this->db->where('id', $id);
            $this->db->update('members', array('password' => $password)); 
        }else{
            $this->session->set_flashdata('Warning', "Not Match Password!");
            redirect('welcome/change_password', 'refresh');
        }
        $this->session->set_flashdata('info_success', "Password has been Update successfully.");
		
        redirect('welcome/change_password', 'refresh');
    }
	
	function treatment()
	{	
		if(!empty($this->input->post())){
			$country = $this->input->post('countries');
			//$state = $this->input->post('state');
			$city = $this->input->post('city');
			$specialities=$this->input->post('specialities_idd'); 
			$hospial_name =$this->input->post('hospial_name'); 
			//echo $hospial_name; die;
			if($country==-1)
			{
			$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where specialities.id="'.$specialities.'"')->result(); 
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			}
			else if($specialities ==-1)
			{
				$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where hospital.country_id="'.$country.'" GROUP by hospital_specialities_id.hospital_id')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			
			}
			else
			{
			$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where specialities.id="'.$specialities.'"
			AND hospital.country_id="'.$country.'"
			and hospital.city_id="'.$city.'"')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			}
			if(!empty($hospial_name))
			{ //die("okk");
				$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where hospital.name LIKE "%'.$hospial_name.'%"
			')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
				//print_r($data);exit;
			}
			foreach($dataa as $dat)
			{
				$special[]=$this->db->query("SELECT hospital.id,hospital.image,hospital.name as hospital_name,hospital.email,hospital.phone_no,hospital.hos_address,hospital.hos_doctor,hospital.doctor_specialities,specialities.service_name from hospital join hospital_specialities_id on hospital_specialities_id.hospital_id=hospital.id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital.id='".$dat->hospital_id."'" )->row();
			}
			
				// echo "<pre>";
				// print_r($special); die();
			if(empty($special))
			{ 
				$data['search']=$this->db->query('SELECT DISTINCT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,states.name,cities.name from hospital
				join countries on hospital.country_id=countries.id
				join states on states.id=hospital.state_id 
				join cities on cities.id= hospital.city_id' )->result();
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			}
			else{ 
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result(); 
				$data['search']=$special;
				
			}
			
			
			
			
			
			
			//$data['specialities']=$specialities;
			 
		}
		else{
			 
			//echo $this->db->last_query();die;
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['search']=$this->db->query('SELECT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,cities.name from hospital 
											join countries on hospital.country_id=countries.id 
											join cities on cities.id= hospital.city_id' )->result();  
			
		} 
			//echo $this->db->last_query();die;
		$data['countries'] = $this->db->get_where('countries');
		//$data['review']=$this->db->where('hospital_id',$id)->select('*')->get('review_hospital')->result();
		$data['story_details']     = $this->admin->get_all_Story('stories');
		$data['treatment_spec1']     = $this->admin->get_all_treatment_spec('common_specialities');
		// echo '<pre>',print_r($data['treatment_spec']);exit;
		$this->load->view('front/header');
		$this->load->view('front/treatment',$data);
		$this->load->view('front/footer');
	}

	function treatmentbkp()
	{	
		if(!empty($this->input->post())){
			$country = $this->input->post('countries');
			//$state = $this->input->post('state');
			$city = $this->input->post('city');
			$specialities=$this->input->post('specialities_idd'); 
			$hospial_name =$this->input->post('hospial_name'); 
			//echo $hospial_name; die;
			if($country==-1)
			{
			$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where specialities.id="'.$specialities.'"')->result(); 
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			}
			else if($specialities ==-1)
			{
				$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where hospital.country_id="'.$country.'" GROUP by hospital_specialities_id.hospital_id')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			
			}
			else
			{
			$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id
			join hospital on hospital.id=hospital_specialities_id.hospital_id
			join specialities on specialities.id= hospital_specialities_id.hospital_specialities
			where specialities.id="'.$specialities.'"
			AND hospital.country_id="'.$country.'"
			and hospital.city_id="'.$city.'"')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['script']="true";
			}
			foreach($dataa as $dat)
			{
				$special[]=$this->db->query("SELECT hospital.id,hospital.image,hospital.name as hospital_name,hospital.email,hospital.phone_no,hospital.hos_address,hospital.hos_doctor,hospital.doctor_specialities,specialities.service_name from hospital join hospital_specialities_id on hospital_specialities_id.hospital_id=hospital.id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital.id='".$dat->hospital_id."'" )->row();
			}
			
				// echo "<pre>";
				// print_r($special); die();
			if(empty($special))
			{ 
				$data['search']=$this->db->query('SELECT DISTINCT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,states.name,cities.name from hospital
				join countries on hospital.country_id=countries.id
				join states on states.id=hospital.state_id 
				join cities on cities.id= hospital.city_id' )->result();
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			}
			else{ 
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result(); 
				$data['search']=$special;
				
			}
			
			if(!empty($hospial_name))
			{ //die("okk");
				$data['search']=$this->db->query('SELECT DISTINCT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,states.name,cities.name from hospital
				join countries on hospital.country_id=countries.id
				join states on states.id=hospital.state_id 
				join cities on cities.id= hospital.city_id where hospital.name LIKE "%'.$hospial_name.'%"' )->result();
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
				//print_r($data);exit;
			}
			
			
			
			
			//$data['specialities']=$specialities;
			 
		}
		else{
			 
			//echo $this->db->last_query();die;
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['search']=$this->db->query('SELECT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,cities.name from hospital 
											join countries on hospital.country_id=countries.id 
											join cities on cities.id= hospital.city_id' )->result();  
			
		} 
			//echo $this->db->last_query();die;
		$data['countries'] = $this->db->get_where('countries');
		//$data['review']=$this->db->where('hospital_id',$id)->select('*')->get('review_hospital')->result();
		$this->load->view('front/header');
		$this->load->view('front/treatment',$data);
		$this->load->view('front/footer');
	}

	public function get_specialities()
	{
		
		$data=$this->admin->get_specialities();
	}
	public function view_specialities_list()
	{
		
		$id=base64_decode($this->uri->segment(2));
		$data['search']=$this->db->query('select hospital.name as hospital_name, hospital.*, specialities.service_name, specialities.image as special_image from hospital join hospital_specialities_id on hospital_specialities_id.hospital_id=hospital.id join specialities ON specialities.id=hospital_specialities_id.hospital_specialities where specialities.id="'.$id.'"')->result();
		$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
		$data['countries'] = $this->db->get_where('countries');
		$this->load->view('front/header');
		$this->load->view('front/treatment',$data);
		$this->load->view('front/footer');
	} 
	public function view_hospital_profile()
	{
		
		//echo $id;die; 
		$id=base64_decode($this->uri->segment(2));
		$data['hospital']=$this->db->query('SELECT hospital.*, hotel.name as hotel_name,hotel.image as hotel_image,hos_gallery.image as gallery,pharmacy.name as pharmacy_name,pharmacy.image as pharmacy_image from hospital  
										 left join hotel on hotel.hospital_id=hospital.id 
										left join hos_gallery on hos_gallery.hospital_id=hospital.id
										left join pharmacy on pharmacy.hosptial_id=hospital.id
										where hospital.id="'.$id.'"')->row_array(); 
		
		//print_r($data['hospital']); die;  
	$data['specialities']=$this->db->query('select specialities.service_name, specialities.image as special_image from hospital_specialities_id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital_specialities_id.hospital_id="'.$id.'" ')->result();
		$data['review']=$this->db->where('hospital_id',$id)->select('*')->get('review_hospital')->result();
		$data['like']=count($this->db->get_where('hospital_likee', array('hospital_id' =>$id ))->result());
		$data['doctors'] = $this->db->query('SELECT specialities_id from doctors ')->result();
		//print_r($data['doctors']); die;
		
		$hospital_name = $this->db->query('SELECT name from hospital where id="'.$id.'"')->row('name'); 
	    
		
		
		//$data['doctor_image_name'] = $this->db->query("SELECT * FROM `doctors` WHERE `hospital` like '%".$hospital_name."%'")->result(); 
		$data['dataa']=$this->db->query('SELECT hos_doctor_image, hos_doctor from hospital where hospital.id="'.$id.'"')->result(); 
		//print_r($data['dataa']); die;  
		    
		$this->load->view('front/header');
		$this->load->view('front/view_hospital_profile',$data);
		$this->load->view('front/footer'); 
	}
	public function appointment_details_hospital()
	{
		
		$id = base64_decode($this->uri->segment(2));
		
		$data['hospital']=$this->db->query('SELECT hospital.* from hospital where hospital.id="'.$id.'"')->row();
		//echo $this->db->last_query();die;
		$data['specialities']=$this->db->query('select specialities.service_name, specialities.image as special_image from hospital_specialities_id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital_specialities_id.hospital_id="'.$id.'" ')->result();
		//print_r($data['hospital']); die;							
			$this->load->view('front/header');
			$this->load->view('front/appointment_details_hospital',$data);  
			$this->load->view('front/footer');							
				 
	}
	public function appointmentt()
	{
		
		$member_id = $this->session->userdata('userid'); 
		$data = array(
			'member_id'=> $member_id,
			'appointment_id'=>rand(1,99999),  
			'specialities_name'=> $this->input->post('appointment'),
			'hospital_id'=> $this->input->post('hospital_id'),
			'appointment_date'=> $this->input->post('appointment_date'),
			'created_at'=> date("Y-m-d H:i:s"), 
			'status' =>1
		  );
		 
		$insert = $this->db->insert('appointmentt',$data);  
		$this->session->set_flashdata('info_success', "Appointment has been successfull.");
		redirect('hospital-appointment/'.$this->input->post('hospital_id').'', 'refresh');
	}
	function consultant()
	{	
		if(!empty($this->input->post())){
			$country = $this->input->post('countries');
			$state = $this->input->post('state');
			$city = $this->input->post('city');
			$specialities=$this->input->post('specialities_idd'); 
			
			$dataa=$this->db->query('SELECT hospital.country_id,hospital.state_id,hospital.city_id,hospital_specialities_id.hospital_id from hospital_specialities_id join hospital on hospital.id=hospital_specialities_id.hospital_id join specialities on specialities.id= hospital_specialities_id.hospital_specialities where specialities.id="'.$specialities.'" AND hospital.country_id="'.$country.'" and hospital.state_id="'.$state.'"and hospital.city_id="'.$city.'"')->result(); 
			
			
			foreach($dataa as $dat)
			{
				$special[]=$this->db->query('SELECT hospital.id,hospital.image,hospital.name as hospital_name,hospital.email,hospital.phone_no,hospital.hos_address,hospital.hos_doctor,hospital.doctor_specialities,specialities.service_name from hospital join hospital_specialities_id on hospital_specialities_id.hospital_id=hospital.id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital.id="'.$dat->hospital_id.'" ')->row();
				 
			} 
			if(empty($special))
			{
				$data['search']=$this->db->query('SELECT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,states.name,cities.name from hospital join countries on hospital.country_id=countries.id join states on states.id=hospital.state_id join cities on cities.id= hospital.city_id' )->result();
			}
			else{
				$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
				$data['search']=$special;
			}
			
			
			
			//$data['specialities']=$specialities;
			 
		}
		else{
			 
			//echo $this->db->last_query();die;
			$data['common_specialities']=$this->db->get('common_specialities')->result();
			$data['specialities']=$this->db->select('id as special_id,image as special_image, service_name')->from('specialities')->get()->result();
			$data['search']=$this->db->query('SELECT hospital.id,hospital.image,hospital.hos_address, hospital.name as hospital_name,hospital.email,hospital.country_id,countries.name,states.name,cities.name from hospital join countries on hospital.country_id=countries.id join states on states.id=hospital.state_id join cities on cities.id= hospital.city_id' )->result();
			
		} 
		$data['doctors'] = $this->db->query("SELECT * from doctors limit 10")->result();
			//$data['total'] = $this->db->query("select count(*) as total from doctors")->row();
			//echo $this->db->last_query();die;
		$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();
		
		$data['gallery']=$this->db->query("SELECT doctor_gallery.*,doctors.name as doctor from doctor_gallery
		JOIN doctors on doctors.id=doctor_gallery.doctor_id WHERE doctors.id=doctor_gallery.doctor_id")->result();
						
		//$data['countries'] = $this->db->get_where('countries');
		$this->load->view('front/header');
		$this->load->view('front/consultant',$data);
		$this->load->view('front/footer');
	}
	function enquiry()  
	{
		$this->load->view('front/header');
		$this->load->view('front/enquiry');
		$this->load->view('front/footer');
	}
	function add_enquiry()
	{
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('name',"name", 'Required');
		$this->form_validation->set_rules('Email',"Email", 'Required');
		$this->form_validation->set_rules('gender',"gender", 'Required');
		$this->form_validation->set_rules('age',"age", 'Required');
		$this->form_validation->set_rules('country',"country", 'Required');
		
		$this->form_validation->set_rules('Mob_no',"Mob_no", 'Required');
		//$this->form_validation->set_rules('message',"message", 'Required');
		$this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
		if($this->form_validation->run()==false)
		{
			$this->enquiry();
		}
		else
		{
			$data=$this->admin->add_enquiry();
			if($data ==true)
			{
				$this->session->set_flashdata('info_success',"Thank You For Enquiry");
				$this->enquiry();
			}
			else
			{
				$this->session->set_flashdata('warning',"Error Occured");
				$this->enquiry();	
			}
		}
		
	}
	
	public function search_doctor()
	{
		
		$this->load->view('front/header');
		$this->load->view('front/search_doctor'); 
		$this->load->view('front/footer');
			
	   
	}
	public function search()
	{
		if($this->input->post('searched_item')== -1){
			$this->session->set_flashdata('warning',"Please Select Any Specialities");
			redirect('welcome/doctors');
		}
		else
		{
			$data['doctors'] = $this->db->query('SELECT doctors.*,specialities.service_name,specialities.id as special_id from doctors
												join doctor_specialities on doctors.id=doctor_specialities.doctor_id
												join specialities on specialities.id=doctor_specialities.specialites_id
												where specialities.id='.$this->input->post('searched_item').'')->result();
			$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();								
		$this->load->view('front/header');
		$this->load->view('front/map_list',$data); 
		$this->load->view('front/footer');
			
			
		}
	} 
	public function forget_password()
	{
		if($this->input->post('uri_segment')=='login')
		{
			$email=$this->input->post('user_email');
			$res=$this->db->where('email',$email)->select('email')->get('members')->row();
			if(empty($res))
			{
				$this->session->set_flashdata('email_sent_msg',"Email Not Registered");
				redirect('login');
			}
			else
			{
				
			$check=$res->email;
			if($check==$email)
			{
				
				$this->load->helper('string');
				$password=random_string('numeric',6);
				
				//////code start
				$to = $email;
				$subject = " PASSWORD CHANGED";

				$message = "
				<html>
				<body>
				<DIV> This Message is from CUREU.... </div><br>
				<p>This is your Auto Generated New Password <a href='#'>".$password."</a>
				<br>
				<br>
				Please Changed Password After Login.
				</p>
				
				<DIV>Have a Good Day. </DIV>
				<br>
				<br>
				<a href='<?php echo base_url() ?>'>CUREU Ventures Pvt Ltd</a>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: info@cureu.in' . "\r\n";


				if(mail($to,$subject,$message,$headers))
				{
				//////code end
				
				 $this->session->set_flashdata("email_sent","Email sent successfully.");
				 $data=array('password'=>md5($password),
							 'updated_at'=>date('d-m-Y H:i:s'),
							 'status'=>1
							);
					$this->db->where('email',$email)->update('members',$data);	
					redirect('login');
				}
				 else
				 {					 
					 $this->session->set_flashdata("email_sent_msg","Error in sending Email."); 
					 redirect('login');
				 
				} 
				}
			
			
			}
		}
		else if($this->input->post('uri_segment')=='doctor')
		{
			
				
			$email=$this->input->post('user_email');
			
			$res=$this->db->where('email',$email)->select('email')->get('doctors')->row();
			
			if(empty($res))
			{
				$this->session->set_flashdata('email_sent_msg',"Email Not Registered");
				redirect('login');
			}
			else
			{
				//echo "ok";die;
			$check=$res->email;
			if($check==$email)
			{
				 
				$this->load->helper('string');
				$password=random_string('numeric',6);
				
				//////code start
				$to = $email;
				$subject = " PASSWORD CHANGED";

				$message = "
				<html>
				<body>
				<DIV> This Message is from CUREU.... </div><br>
				<p>This is your Auto Generated New Password <a href='#'>".$password."</a>
				<br>
				<br>
				Please Changed Password After Login.
				</p>
				
				<DIV>Have a Good Day. </DIV>
				<br>
				<br>
				<a href='<?php echo base_url() ?>'>CUREU Ventures Pvt Ltd</a>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: vivek05nov@gmail.com' . "\r\n";


				if(mail($to,$subject,$message,$headers))
				{
				//////code end
				
				 $this->session->set_flashdata("email_sent","Email sent successfully.");
				 $data=array('password'=>md5($password),
							 'upadted_at'=>date('d-m-Y H:i:s'),
							 'status'=>1
							);
					$this->db->where('email',$email)->update('doctors',$data);	
					redirect('login');
				}
				 else
				 {					 
					 $this->session->set_flashdata("email_sent_msg","Error in sending Email."); 
					 redirect('login');
				 
				} 
				}
			
			
			}
		}
		else if($this->input->post('uri_segment')=='hospital')
		{
			$email=$this->input->post('user_email');
			$res=$this->db->where('email',$email)->select('email')->get('hospital')->row();
			if(empty($res))
			{
				$this->session->set_flashdata('msg',"Email Not Registered");
				redirect('login');
			}
			else
			{
				
			$check=$res->email;
			if($check==$email)
			{
				
				$this->load->helper('string');
				$password=random_string('numeric',6);
				
				//////code start
				$to = $email;
				$subject = " PASSWORD CHANGED";

				$message = "
				<html>
				<body>
				<DIV> This Message is from CUREU.... </div><br>
				<p>This is your Auto Generated New Password <a href='#'>".$password."</a>
				<br>
				<br>
				Please Changed Password After Login.
				</p>
				
				<DIV>Have a Good Day. </DIV>
				<br>
				<br>
				<a href='<?php echo base_url() ?>'>CUREU Ventures Pvt Ltd</a>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: vivek05nov@gmail.com' . "\r\n";


				if(mail($to,$subject,$message,$headers))
				{
				//////code end
				
				 $this->session->set_flashdata("email_sent","Email sent successfully.");
				 $data=array('password'=>md5($password),
							 'updated_at'=>date('d-m-Y H:i:s'),
							 'status'=>1
							);
					$this->db->where('email',$email)->update('hospital',$data);	
					redirect('login');
				}
				 else
				 {					 
					 $this->session->set_flashdata("email_sent_msg","Error in sending Email."); 
					 redirect('login');
				 
				} 
				}
			
			
			}
		}
	}
	public function checkmail()
	
	{
		$email=$this->input->post('email');
		$res=$this->db->where('email',$email)->select('email')->get('members')->row();
			if(empty($res))
			{
				echo " ";
			}
			
			else{
				
			$check=$res->email;
			if($check==$email)
			{
				$session=$this->session->set_flashdata('msg',"Email Already Exist");
				echo $this->session->flashdata('msg');
			}
		}
	}
	public function checkmaill()
	
	{
		$email=$this->input->post('email');
		$res=$this->db->where('email',$email)->select('email')->get('doctors')->row();
		if(empty($res))
			{
				echo " ";
			}
			else
			{
				
				$check=$res->email;
				if($check==$email) 
				{
					$session=$this->session->set_flashdata('msg',"Email Already Exist");
					echo $this->session->flashdata('msg');
				}
			}
	}
	public function mobile()
	
	{
		$mobile=$this->input->post('mobile');
		$res=$this->db->where('mobile_no',$mobile)->select('mobile_no')->get('members')->row();
		if(empty($res))
			{
				echo " ";
			}
			else
			{
				
				$check=$res->mobile_no;
				if($check==$mobile) 
				{
					$session=$this->session->set_flashdata('msg',"Mobile Number Already Exist");
					echo $this->session->flashdata('msg');
				}
			}
	}
	public function mobilee()
	
	{
		$mobile=$this->input->post('mobile');
		$res=$this->db->where('mobile',$mobile)->select('mobile')->get('doctors')->row();
		if(empty($res))
			{
				echo " ";
			}
			else
			{
				
				$check=$res->mobile;
				if($check==$mobile) 
				{
					$session=$this->session->set_flashdata('msg',"Mobile Number Already Exist");
					echo $this->session->flashdata('msg');
				}
			}
	}
	public function like()
	{
		$patient_id=$this->input->post('patient_name');
		$doc_id=$this->input->post('doc_name');
		if(!empty($this->db->where('doc_id',$doc_id)->where('patient_id',$patient_id)->get('likee')->row()))
		{
			
			echo json_encode("You Already Liked"); 
			
			}
		else
		{
			$data=array('patient_id'=>$patient_id,
						'doc_id'=>$doc_id,
						'likee_at'=>date('y:m:d H:I:S'),
						'status'=>1
						);
						
			if($this->db->insert('likee',$data))	
			{
				$likes=$this->db->get_where('likee', array('doc_id' =>$doc_id ))->result();
				echo count($likes);
			}			
		
		}
	}
	public function doctors_list()
	{
		
		$city=$this->input->post('city');
		// echo $city;exit;
		// $area=$this->input->post('area');
		// $special=$this->input->post('specialities');
		
		/*if($city== -1)
		{
			// $special;die;
			$data['doctors'] = $this->db->query('SELECT doctors.*,specialities.service_name,specialities.id as special_id from doctors
												join doctor_specialities on doctors.id=doctor_specialities.doctor_id
												join specialities on specialities.id=doctor_specialities.specialites_id
												where specialities.id='.$special.'')->result();
		 // echo $this->db->last_query();die;
		}
		else if($special==-1)
		{
			
			$data['doctors']=$this->db->query('SELECT doctors.*, cities.name as city,specialities.service_name as service_name, specialities.image as special_img from doctors
			join cities on cities.id=doctors.city_id 
			join doctor_specialities on doctor_specialities.doctor_id=doctors.id
			join specialities on specialities.id= doctor_specialities.specialites_id
			where cities.id='.$city.' group by doctors.user_id')->result();
		}
		else
		{*/
			if(empty($city)){ 
				//die("all");
				$data['doctors']=$this->db->query('SELECT doctors.*, cities.name as city,specialities.service_name as service_name, specialities.image as special_img
				 from doctors 
				 join cities on cities.id=doctors.city_id
				 join doctor_specialities on doctor_specialities.doctor_id=doctors.id
				 join specialities on specialities.id= doctor_specialities.specialites_id')->result();
			}else{  
				if(!empty($city) && !empty($special)){
					//die("with 2 inputs");    
					$data['doctors']=$this->db->query('SELECT doctors.*, cities.name as city,specialities.service_name as service_name, specialities.image as special_img
					 from doctors 
					 join cities on cities.id=doctors.city_id
					 join doctor_specialities on doctor_specialities.doctor_id=doctors.id
					 join specialities on specialities.id= doctor_specialities.specialites_id
					 where cities.id='.$city.' AND specialities.id='.$special.'')->result();
				}else if(!empty($city) && empty($special)){
					//die('with city input');
					$data['doctors']=$this->db->query('SELECT doctors.*, cities.name as city,specialities.service_name as service_name, specialities.image as special_img
					 from doctors 
					 join cities on cities.id=doctors.city_id
					 join doctor_specialities on doctor_specialities.doctor_id=doctors.id
					 join specialities on specialities.id= doctor_specialities.specialites_id
					 where cities.id='.$city.'')->result();
				}else{
					//die('with special input');
					$data['doctors']=$this->db->query('SELECT doctors.*, cities.name as city,specialities.service_name as service_name, specialities.image as special_img
					 from doctors 
					 join cities on cities.id=doctors.city_id
					 join doctor_specialities on doctor_specialities.doctor_id=doctors.id
					 join specialities on specialities.id= doctor_specialities.specialites_id
					 where specialities.id='.$special.'')->result();
				}
			} 
		
		// }
		 
		$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();
		 
			$this->load->view('front/header');
			$this->load->view('front/map_list',$data);
			$this->load->view('front/footer');
		
		
	}
		
	public function review()
	
	{
		
			$data=array('patient_name'=>$this->session->userdata('username'),
						'doctor_id'=>$this->input->post('hidden_id'),
						'title'=>$this->input->post('title'),
						'rating'=>$this->input->post('rating'),
						'comment'=>$this->input->post('comment'),
						'created_at'=>date('y:m:d H:i:s'),
						'status'=>1
						);
						
				$this->db->insert('review',$data);
				$this->view_profile_doctor($this->input->post('hidden_id'));				
		
	}
	
		public function searchh()
	{
		$id = base64_decode($this->uri->segment(2));
		
			$data['doctors'] = $this->db->query('SELECT doctors.*,specialities.service_name,specialities.id as special_id from doctors
												join doctor_specialities on doctors.id=doctor_specialities.doctor_id
												join specialities on specialities.id=doctor_specialities.specialites_id
												where specialities.id='.$id.'')->result();
			$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();								
		$this->load->view('front/header');
		$this->load->view('front/map_list',$data); 
		$this->load->view('front/footer');
			
			
		
	}
		public function common_special()
		{
			$id = base64_decode($this->uri->segment(2));
			 $data['doctors'] = $this->db->query('SELECT doctors.*,common_specialities.service_name,common_specialities.id as special_id from doctors
													join doctor_common_specailities on doctors.id=doctor_common_specailities.doctors_id
													join common_specialities on common_specialities.id=doctor_common_specailities.common_id
													where common_specialities.id='.$id.'')->result();  
					//echo $this->db->last_query();die;							
			$data['special']=$this->db->select('service_name, id as special_id')->get('specialities')->result();								 
			 $this->load->view('front/header');
			$this->load->view('front/map_list',$data); 
			$this->load->view('front/footer');
			 
		}
		
		public function likee()
	{
		$patient_id=$this->input->post('patient_name');
		$hos_id=$this->input->post('hos_name');
		//echo $hos_id;die;
		if(!empty($this->db->where('hospital_id',$hos_id)->where('patient_id',$patient_id)->get('hospital_likee')->row()))
		{
			
			echo json_encode("You Already Liked"); 
			
			}
		else
		{
			$data=array('patient_id'=>$patient_id,
						'hospital_id'=>$hos_id,
						//'likee_at'=>date('y:m:d H:I:S'),
						'status'=>1
						);
			if($this->db->insert('hospital_likee',$data))	
			{
				$likes=$this->db->get_where('likee', array('hospital_id' =>$hos_id ))->result();
				//echo count($likes);
			}			
		
		}
	}
	
	public function review_hospital()
	{
		
			$data=array('patient_id'=>$this->session->userdata('username'),
						'hospital_id'=>$this->input->post('hidden_id'),
						'rating'=>$this->input->post('rating'),
						'comment'=>$this->input->post('comment'),
						'created_at'=>date('y:m:d H:i:s'),
						'status'=>1
						);
						/* echo "<Pre>";
						print_r($data);die; */
				$this->db->insert('review_hospital',$data);
				$this->view_hospital_profile($this->input->post('hidden_id'));				
		
	
	}
	////payment
	public function payment()
	{
		
		$data['inputs']=$this->input->post();
		// $data['key']=['key_id'=>'rzp_live_UPEclUmwmBRVrD',
					  // 'secretkey'=>'HconM5PtZAH8GammH4XaAGmZ'];
	 $data['key']=['key_id'=>'rzp_test_hfJSc43qI0mkyZ',
					  'secretkey'=>'18wiO7RVQpwKFL5O6Hfm2cWa'];
		$this->load->view('razorpay/Razorpay',$data);			   	
		//echo "vivek";die;
						
	}
	public function success() {
        
        $data['response']=$this->input->post();
       // $data['key']=['key_id'=>'rzp_live_UPEclUmwmBRVrD',
		//			  'secretkey'=>'HconM5PtZAH8GammH4XaAGmZ'];
		$data['key']=['key_id'=>'rzp_test_hfJSc43qI0mkyZ',
					  'secretkey'=>'18wiO7RVQpwKFL5O6Hfm2cWa'];
		$this->load->view('razorpay/Razorpay_fetch_payment',$data);  
        }
	public function reschedule_date()
	{
		//print_r($this->input->post('reschedule_date')); die;
		$this->db->where('id',$this->input->post('hidden_appointment'))
				 ->update('appointment',['appointment_date'=>$this->input->post('reschedule_date')]);
		
		$this->session->set_flashdata('success','Reschedule Successfully');
			$this->dashboard();
		
	}
	
	public function reschedule_hospital_date()
	{
		$hos_date = $this->input->post('reschedule_date');
		$date = DateTime::createFromFormat('Y-m-d', $hos_date);
		$resh_date = $date->format('d/m/Y');
		$hidden_id = $this->input->post('hidden_appointmentt');
		//print_r($resh_date);
		
		$this->db->where('id',$hidden_id)
				 ->update('appointmentt',['appointment_date'=>$resh_date]);
		
		$this->session->set_flashdata('success','Reschedule Successfully');
			$this->dashboard();
		
	}
	
	
	public function get_hospital_name(){
		//print_r($this->input->get());
		$ret_name = [];
		$name = $this->input->get('term');
		$get_hospital_name = $this->db->query('SELECT * from hospital where name LIKE "%'.$name.'%" limit 10')->result();
		//echo "<pre>";print_r($get_hospital_name);die;
		foreach($get_hospital_name as $names){
			//$ret_name[] = $names->name;
			array_push($ret_name,$names->name);
		}
		//echo $ret_name;  
		//echo "<pre>";print_r($ret_name);die;
		return $ret_name;
	}




		public function forgot_password()
		{								 
			$this->load->view('front/header');
			$this->load->view('front/forgot_password'); 
			$this->load->view('front/footer');
			 
		}	
	public function forgot_pass()
	{
			$this->load->library('encryption');
			$email=$this->input->post('email');
			$new_pass = rand(1000,100);
			$que=$this->db->query("UPDATE members SET password= MD5('".$new_pass."') WHERE email='$email'");
			
			// $row=$que->row();
			// $member_email=$row->email;
			if(isset($email)){
			// $password=$row->password;
				/*Mail Code*/
				$to          =          $email;
				$subject     =          "Password";
				$txt         =          "Your password is $new_pass ";
				$headers     =          "From: cureuventures@gamil.com" . "\r\n";
				// .
				// "CC: ifany@pakainfo.com";

				mail($to,$subject,$txt,$headers);
				$this->session->set_flashdata('info_success', "Password has been send your Email Id.");
				// echo '<script>alert("Password han been send your Email Id.")</script>';  
				redirect('Welcome/forgot_password', 'refresh');
				}
				
			else{
			   $data['error']="Invalid Email ID ! ";
			}
		}
		
		public function story_details()
		{		
		    $id = base64_decode($this->uri->segment(2)); 
// echo $id;exit;		
			$this->db->select('*');
			$this->db->from('stories');
			$this->db->where('id',$id);
			$data['q'] = $this->db->get()->result();	
			// print_r($data['q']);exit;
			$data['story_details']     = $this->admin->get_all_Story('stories');
			$this->load->view('front/header');
			$this->load->view('front/story_details', $data); 
			$this->load->view('front/footer');
			 
		}
		
		public function search1(){
			 $data['searches'] =array();
			 $data['searches1'] =array();
			 $city    = $this->input->post('city');
			 $name 	  = $this->admin->chk($city);
			 if($name!= ''){
			 $data['searches'] = $this->admin->user_search($city);
			 }
			 if($name == '') {
				 $data['searches1'] = $this->admin->user_search1($city);
			 }
			 // echo '<pre>';print_r($data['searches']);
			 // echo '<pre>';print_r($data['searches1']);exit;
			// if ($query = $this->admin->user_search($this->input->post('city')))
			// {
				// $data['searches'] = $query;
			// }
			$this->load->view('front/header');
			$this->load->view('front/result',$data);
			$this->load->view('front/footer');
		}
		
	   public function result()
		{								 
			$this->load->view('front/header');
			$this->load->view('front/result'); 
			$this->load->view('front/footer');
			 
		}

}