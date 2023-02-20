<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	    $this->load->helper('form'); 
        $this->load->library('form_validation');
	    $this->load->model(array('hospital_model'=>'hospital'));
		$this->load->model(array('Admin_model'=>'admin'));
	    // Your own constructor code

	    if($this->session->userdata('usertype')!='Hospital')
	    { 
	    	redirect('logout','refresh');

	    }
	}  
	function index($page = 'hospital/dashboard',$data = null)
	{
		$today = date('Y-m-d');
		$id = $this->session->userdata('userid');
        $data['total_members'] = $this->db->query("select count(*) as members from hospital")->row();
		/* echo "<pre>";
		print_r( $data['total_members']);die */;
        //$data['today_members'] = $this->db->query("select count(*) as today_members from hospital where created_at = '$today'")->row();
		//echo $this->db->last_query();die;
		$data['upcoming_appointment'] = $this->hospital->get_upcoming_appointment($id); 
		$data['today_appointment'] = $this->hospital->get_today_appointment($id); 
        //$data['total_appointment'] = $this->db->query("select count(*) as appointment from appointment where doctor_id = '$id'")->row();
		//echo $this->db->last_query();die;
		$data['total_appointment']=$this->db->where('hospital_id',$id)->order_by('created_at desc') ->get('appointmentt')->result();
		//print_r($data['total_appointment']); die;
       
		$this->load->view('hospital/header');
		$this->load->view($page,$data);
		$this->load->view('hospital/footer');	
	}
	public function refer_to()
	{
		
		$this->load->view('hospital/header');
		$this->load->view('hospital/referpage');
		$this->load->view('hospital/footer');
	}

	// function view_profile(){
        // $id = $this->session->userdata('userid');
        // $data['user'] = $this->db->get_where('doctors',array('id'=>$id))->row(); 
        // $this->load->view('doctor/header');
        // $this->load->view('doctor/profile',$data);
        // $this->load->view('doctor/footer');
    // }
	/*function view_profile(){ 
        $id = $this->session->userdata('userid');
        $data['user'] = $this->db->get_where('doctors', array('id =' => $id))->row();
		$data['specialities'] = $this->db->get('specialities')->result();
		$data['cities'] = $this->db->get_where('cities',array('state_id =' => 38));
        $page = 'doctor/profile'; 
		$this->index($page,$data);
    }*/
	function update_profile(){
        $id = $this->session->userdata('userid');
		$specialist = $this->input->post('specialist');
		$image = '';
		if($_FILES["user_file"]["name"] != ''){
			$config = array(
			'upload_path' => "./assets/img/hospital/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			
			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('user_file'))
			{ 
				$data['imageError'] =  $this->upload->display_errors();
				print_r($data['imageError']);
			}
			else
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}
		}
		else{
				$image = $this->input->post('image');
			}
			
		$data = array(
            'name' =>$this->input->post('name'),
            'email' =>$this->input->post('email'),
            'phone_no' =>$this->input->post('mobile'),
           
            
			'fee'=>$this->input->post('hos_fee'),
            'about_hos' =>$this->input->post('about'),
             
            'hos_address' =>$this->input->post('address'),
         
            'city_id' =>$this->input->post('city'),
            
            'image' =>$image,
            'hospital_facilities'=>json_encode(array($this->input->post('services'))),
            'updated_at' =>date('Y-m-d H:i:s'),
            'status'=>1
          );
          /* echo "<pre>"; */
           /* print_r($data);die; */
        $this->db->where('id', $id);
        $this->db->update('hospital', $data);
		
        $this->session->set_flashdata('info_success', "Profile has been Update successfully.");
        redirect('hospital/view_profile', 'refresh');
    }


	function appointment()
	{
		$id = $this->session->userdata('userid');
		 
		 $data['appointment1'] = $this->db->query('select appointmentt.id, appointmentt.appointment_date as appointment_date, appointmentt.appointment_time as appointment_time,members.name as customer, members.mobile_no, members.email,members.address from appointmentt 
								join members on members.id=appointmentt.member_id 
								join hospital on hospital.id= appointmentt.hospital_id 
								where hospital.id="'.$id.'"')->result(); 
								
		
		
		//echo $this->db->last_query();die;
		$page = 'hospital/appointment'; 
		$this->index($page,$data);
	}
	
	
	function view_hos_ehr()
	{
		$id = $this->session->userdata('userid');
		
		$this->db->select('ehr_hospital.hospital_image,ehr_hospital.ehr_hospital,ehr_hospital.user_id,members.name,members.id')
			 ->from('ehr_hospital')
			 ->join('members', "members.id = ehr_hospital.user_id",'inner')
			 ->where('hospital_id',$id);
			 
		$data['ehr_data'] = $this->db->get()->result();
		
		$page = 'hospital/view_ehr'; 
		$this->index($page,$data);
	}
	
	public function download($fileName = NULL) { 
		
		
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
				
				  redirect('hospital/view_ehr');   
			}
	   }
    } 
	
	function hotel()
	{
		 $id = $this->session->userdata('userid');
		
		//$data['hotel']=$this->db->query('select * from pharmacy where type ="hotel" AND hosptial_id='.$id.'')->result();
		//print_r($data['pharmacy']); die;
		$data['hospital']=$this->db->query('SELECT hospital.*, hotel.name as hotel_name,hotel.image as hotel_image,hos_gallery.image as gallery,pharmacy.name as pharmacy_name,pharmacy.image as pharmacy_image from hospital  
										 left join hotel on hotel.hospital_id=hospital.id 
										left join hos_gallery on hos_gallery.hospital_id=hospital.id
										left join pharmacy on pharmacy.hosptial_id=hospital.id
										where hospital.id="'.$id.'"')->row_array(); 
		$page = 'hospital/hotel'; 
		//print_r($data['pharmacy']); die;
		$this->index($page,$data); 
	}
	
	
	
	function pharmacy()
	{
		$id = $this->session->userdata('userid');
		
		$data['pharmacy']=$this->db->query('select * from pharmacy where type ="pharmacy" AND hosptial_id='.$id.'')->result();
		//print_r($data['pharmacy']); die;
		$page = 'hospital/pharmacy'; 
		//print_r($data['pharmacy']); die;
		$this->index($page,$data);
	}
	
	function add_pharmacy()
	{
	    $hospital_id = $this->session->userdata('userid'); 
		if(!empty($_FILES['userfile']['name'])){
				
				 
			$this->db->where('hosptial_id',$hospital_id)->delete('pharmacy');
					$uploadPath = 'assets/img/pharmacy/';  
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv"; 
					$config['encrypt_name']=true;
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config);
				
		if(!empty($_FILES['userfile']['name']) && count(array_filter($_FILES['userfile']['name'])) > 0){ 
                $filesCount = count($_FILES['userfile']['name']);
				
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['fil']['name']     = $_FILES['userfile']['name'][$i]; 
                    $_FILES['fil']['type']     = $_FILES['userfile']['type'][$i]; 
                    $_FILES['fil']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i]; 
                   $_FILES['fil']['error']     = $_FILES['userfile']['error'][$i]; 
                    $_FILES['fil']['size']     = $_FILES['userfile']['size'][$i]; 
                     
					
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
			
            $this->admin->multiple_image_pharmacy($uploadImgData,$hospital_id);              
        }
		}  
        $this->session->set_flashdata('success', "pharmacy Image uploaded successfully.");
        redirect('hospital/pharmacy'); 
    
	}
	
	
	function add_hotal()   
	{
			$hospital_id = $this->session->userdata('userid'); 
			 if(!empty($_FILES['image_name']['name'])){
				$data=$this->db->where('hospital_id',$hospital_id)->select('image')->get('hotel')->result();
				 
				foreach($data as $key=> $row):
				
					$dat=json_decode($row->image);
					//echo "<pre>";
					//echo ($dat->file_name[$key]);die;
					$daa= "assets/img/hotel/".$dat->file_name[$key];
					//print_r ($daa) ; die;
					unlink($daa);
				endforeach;
				
				 $this->db->where('hospital_id',$hospital_id)->delete('hotel'); 
			
                    // File upload configuration 
                    $uploadPath = 'assets/img/hotel/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv"; 
                    $config['encrypt_name']=true;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config);
           if(!empty($_FILES['image_name']['name']) && count(array_filter($_FILES['image_name']['name'])) > 0){ 
                $filesCount = count($_FILES['image_name']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['image_name']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['image_name']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i]; 
                   $_FILES['file']['error']     = $_FILES['image_name']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['image_name']['size'][$i]; 
                      
                    $uplaod=$this->upload->initialize($config); 
                   
					 
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData['file_name'][$i] = $fileData['file_name']; 
                       
                    }else{  
                        $errorUploadType = $_FILES['file']['name'].' | ';  
                    } 
                } 
						
				// Initialize array
				$uploadImgData= $uploadData;
			  }
		
         if(!empty($uploadImgData)){
           
            $this->admin->multiple_images_hotel($uploadImgData,$hospital_id);              
        }
	}
        $this->session->set_flashdata('success', "Hotel uploaded successfully.");
        redirect('hospital/hotel', 'refresh'); 
	}
	
	private function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = './assets_admin/img/doctors/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
	
	function accept($id){ 
		
		$this->db->where('id', $id);
        $this->db->update('appointmentt', array('status'=>2));
        $this->session->set_flashdata('success', "Appointment has been <a href='#' class='alert-link'>accept</a> successfully.");
        redirect('hospital/index', 'refresh');
	}
	function cancel($id){ 
		
		$this->db->where('id', $id);
        $this->db->update('appointmentt', array('status'=>0));
        $this->session->set_flashdata('warning', "Appointment has been  <a href='#' class='alert-link'>cancel</a>");
        redirect('hospital/index', 'refresh');
	}
	function view_prescriptions()
	{
		$id = $this->session->userdata('userid');
		$page = 'hospital/view_prescription';
       // $data['prescriptions'] = $this->db->get('hos_prescriptions')->result();
		$this->db->select('p.description,p.file,p.created_at,m.name')
         ->from('hos_prescriptions p')
		 ->where('p.hospital_id',$id)
		 ->join('appointmentt a','a.id=p.patient_id')
         ->join('members m', 'm.id = a.member_id')
         ->join('hospital d', 'd.id = p.hospital_id'); 
		$data['prescriptions'] = $this->db->get()->result();
		
		
		//echo $this->db->last_query();die;
		$this->index($page,$data);
	}
	
	function add_prescriptions(){
		$hospital_id = $this->session->userdata('userid');
		$config = array(
        'upload_path' => "./assets/img/prescriptions/",
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        
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
        }
        $data = array(
            'patient_id' => $this->input->post('patient_id'),
            'hospital_id' => $hospital_id,
            'description' => $this->input->post('desc'),
            'file' => $image,
            'created_at' => date('Y-m-d H:i:s'),
            'upadted_at' => date('Y-m-d H:i:s'),
			'status' => 1
        );
		/* echo "<pre>";
	print_r($data);die; */
        $this->db->insert('hos_prescriptions',$data);
		$this->session->set_flashdata('info_success', "Prescriptions has been added successfully.");
        redirect('hospital/view_prescriptions', 'refresh');
	}
	/*
	function my_patients()
	{
	   $id = $this->session->userdata('userid');
	   $this->db->select('m.*')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
		 ->where('a.doctor_id',$id);
		$data['memers'] = $this->db->get()->result(); 
		$page = 'doctor/my_patients';
		$this->index($page,$data);
	}
	function invoice()
	{
		$page = 'doctor/invoice';
		$this->index($page);
	}
	function change_password()
	{
		$page = 'doctor/change_password';
		$this->index($page);
	}
	
    function del_scientific(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('scientific');
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/scientific', 'refresh');
    }
    function scientific_status(){
        $id  = $this->uri->segment(3);
        $status  = $this->uri->segment(4);
       
        $this->db->set('status', $status); //value that used to update column  
        $this -> db -> where('id', $id); //which row want to upgrade  
        $this->db->update('scientific'); 
        //echo $this->db->last_query();die;
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/scientific', 'refresh');
    }
	public function chat(){ 
	 //   $id = $this->session->userdata('user_id');
	//     $mobile = $this->db->query("select * from doctors where id='$id'");
	 //   $data['doctor'] = $mobile->row();
	    
		$this->load->view('front/header');
		$this->load->view('doctor/chat');
		$this->load->view('doctor/footer');
	}
	*/
	function refer_hos()
	{ 
	
	$data=$this->hospital->refer_hos();
	if($data== true)
	{
		$this->session->set_flashdata('success',"Thanks for  Referring" );
		$this->index();
	}
	else
	{
		$this->session->set_flashdata('warning',"Error " );
		$this->index();
	} 
	}
	public function view_profile()
	{
		
		$data['user']=$this->db->where('id',$this->session->userdata('userid'))->get('hospital')->row();
		$data['cities']=$this->db->get('cities')->result();
		$this->load->view('hospital/header');
		$this->load->view('hospital/profile',$data);
		$this->load->view('hospital/footer');
	}
	function change_password()
	{
		$this->load->view('hospital/header');
		$this->load->view('hospital/change_password');
		$this->load->view('hospital/footer');
	}
	public function change_passwordd()
	{
		
		$old=md5($this->input->post('old_pass'));
		$id=$this->session->userdata('userid');
		$datta=$this->db->where('id',$id )->select('password')->get('hospital')->row();
		
		if($datta->password==$old)
		{
			$data=array('password'=>md5($this->input->post('new_pass')),
						'updated_at'=>date('y-m-d h:i:s')
						);
			$this->db->where('id',$id)->update('hospital',$data);
			$this->session->set_flashdata('success','Password Changed Successfully');
			redirect('hospital/change_password');	
		}
		else
		{
			$this->session->set_flashdata('warning','Error Changed');
			redirect('hospital/change_password');	
			
		}
	}
}
