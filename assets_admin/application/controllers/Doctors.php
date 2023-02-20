<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	    $this->load->helper('form');
        $this->load->library('form_validation');
	    $this->load->model(array('doctor_model'=>'doctor'));
	    // Your own constructor code

	    if($this->session->userdata('usertype')!=='doctors')
	    {
	    	redirect('logout','refresh');

	    }
	}
	function index($page = 'doctor/dashboard',$data = null)
	{
		
		$today = date('Y-m-d');
		$id = $this->session->userdata('userid');
		//print_r($id); die;
        $data['total_members'] = $this->db->query("select count(*) as members from appointment where doctor_id='$id'")->row();
		//print_r($data['total_members']); die;
        $data['today_members'] = $this->db->query("select count(*) as today_members from members where created_at = '$today'")->row();
		//echo $this->db->last_query();die;
		$data['upcoming_appointment'] = $this->doctor->get_upcoming_appointment($id); 
		//print_r($data['upcoming_appointment']); die;
		
		$data['today_appointment'] = $this->doctor->get_today_appointment($id); 
		
		//print_r($data['today_appointment']); die;
		$this->db->select('a.id as id, a.status as status, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		  ->order_by("a.appointment_date",'DESC')
		 ->where('d.id',$id);
		$data['appointment1'] = $this->db->get()->result(); 
		
        $data['total_appointment'] = $this->db->query("select count(*) as appointment from appointment where doctor_id = '$id'")->row();
		
		
		$this->load->view('doctor/header');
		$this->load->view($page,$data);
		$this->load->view('doctor/footer');	
	}

	// function view_profile(){
        // $id = $this->session->userdata('userid');
        // $data['user'] = $this->db->get_where('doctors',array('id'=>$id))->row(); 
        // $this->load->view('doctor/header');
        // $this->load->view('doctor/profile',$data);
        // $this->load->view('doctor/footer');
    // }
	function view_profile(){ 
	
        $id = $this->session->userdata('userid');
        $data['user'] = $this->db->get_where('doctors', array('id =' => $id))->row();
		$data['specialities'] = $this->db->get('specialities')->result();
		$data['common_special'] = $this->db->get('common_specialities')->result();
		$data['cities'] = $this->db->get('cities')->result();
		$data['doc_special']=$this->db->query('SELECT doctor_specialities.* from doctors 
		join doctor_specialities on doctors.id=doctor_specialities.doctor_id
		where doctors.id="'.$id.'"')->result();
		
        $page = 'doctor/profile'; 
		//echo "<pre>";print_r($data);die;
		$this->index($page,$data);
		
    }
	function update_profile(){
	//echo "<pre>";print_r($this->input->post('user_file'));die;  
	//echo "<pre>";print_r($_FILES['clinic_image']['name']);die;  
		$data=array();
        $id = $this->session->userdata('userid');
		$specialist = $this->input->post('specialist');
		$image = '';
		$clinicimage = '';
		if($_FILES["user_file"]["name"] != ''){
			$config = array(
			'upload_path' => "./assets/img/doctors/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "1024",
			'max_width' => "1024"
			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('user_file'))
			{ 
				$data['imageError'] =  $this->upload->display_errors();
				//print_r($data['imageError']);
				if($data['imageError'])
				{
					$this->session->set_flashdata('Warning', "The image you are attempting to upload doesn't fit into the allowed dimensions.");
					redirect('doctors/view_profile', 'refresh');
				}
			}
			else
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}
		}
		
		else
		{
				$image = $this->input->post('image');
		}
		//for clinic image
			if($_FILES["clinic_image"]["name"] != ''){
			$config = array(
			'upload_path' => "./assets/img/clinic/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "1024",
			'max_width' => "1024"
			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('clinic_image'))
			{ 
		
				$data['imageError'] =  $this->upload->display_errors();
				print_r($data['imageError']);
			}
			else
			{ //die('okk');
				$imageDetailArray = $this->upload->data();
				//print_r($imageDetailArray);die;
				$clinicimage =  $imageDetailArray['file_name'];
			}
		}
		
		else
		{
				$clinicimage = $this->input->post('c_image');
		}
        //	
		$year_encode =json_encode($this->input->post('year'));
			$data = array(
            'name' =>$this->input->post('name'),
            'email' =>$this->input->post('email'),
            'mobile' =>$this->input->post('mobile'),
            'gender' =>$this->input->post('gender'),
            'dob' =>$this->input->post('dob'),
			'fee'=>$this->input->post('fee'),
            'about' =>$this->input->post('about'),
            'clinic_name' =>$this->input->post('clinic_name'),
            'clinic_image' =>$clinicimage, 
            'address' =>$this->input->post('address'),
            'state_id' =>$this->input->post('state'),
            'city_id' =>$this->input->post('city'),
            'area' =>$this->input->post('area'),
            'image' =>$image,
            'services'=>$this->input->post('services'),
			'specialities_id'=>json_encode($this->input->post('specialist')),
			//'common_specialities_id'=>json_encode($this->input->post('common_specialist')),
            'degree'=>json_encode($this->input->post('degree')),
            'college'=>json_encode($this->input->post('college')),
            'year'=>json_encode($this->input->post('year')),
            'hospital'=>json_encode($this->input->post('hospital')),
            'from'=>json_encode($this->input->post('from')),
            'to'=>json_encode($this->input->post('to')),
            'dasignation'=>json_encode($this->input->post('dasignation')),
            'awards'=>json_encode($this->input->post('awards')),
            'awards_year'=>json_encode($this->input->post('awards_year')),
            //'year'=>json_encode($this->input->post('awards_year')),
            'upadted_at' =>date('Y-m-d H:i:s'),
            'status'=>1
          );
		  //echo "<pre>";print_r($data);die;  
			if(!empty($this->input->post('common_specialist')))
			{
				$data['common_specialities_id']=json_encode($this->input->post('common_specialist'));
			}
			else
			{
				$data['common_specialities_id']=" ";
			}
			 /*  echo "<Pre>";
			 print_r($data);die;  */
		
          
        $this->db->where('id', $id);
        $this->db->update('doctors', $data);
		
		$specialities=$this->db->get_where('doctors',array('id'=>$id))->row()->specialities_id;
		$common_specialist=$this->db->get_where('doctors',array('id'=>$id))->row()->common_specialities_id;
		$doctor_id=$this->db->where('doctor_id',$id)->get('doctor_specialities')->row();
		$doctor_idd=$this->db->where('doctors_id',$id)->get('doctor_common_specailities')->row();
			//echo $this->db->last_query();die;
			if(empty($doctor_id))
			{
				$special=json_decode($specialities);
				
					foreach($special as $spec):
					
					$data=array('specialites_id'=>$spec,
								'doctor_id'=>$id
								);
					$this->db->insert('doctor_specialities',$data);
					endforeach;
				
			}
			else
			{
				$del = $this->db->where('doctor_id',$id)->delete('doctor_specialities');
			    //echo $this->db->last_query();die;
				$special=json_decode($specialities);
				if($del)
				{
					foreach($special as $spec):
					
					$data=array('specialites_id'=>$spec,
								'doctor_id'=>$id
								);
								
					$this->db->insert('doctor_specialities',$data);
					
					endforeach;
				}
					
			}
			if(empty($doctor_idd))
			{
				$special=explode(" ",$common_specialist);
				
					foreach($special as $key=>$spec):
					
					$data=array('common_id'=>$special[$key],
								'doctors_id'=>$id
								);
						
					$this->db->insert('doctor_common_specailities',$data);
					endforeach;
				
			}
			else
			{
				$this->db->where('doctors_id',$id)->delete('doctor_common_specailities');
				//echo $this->db->last_query();die;
				$special=explode(" ",$common_specialist);
				
					foreach($special as $key=>$spec):
					
					$data=array('common_id'=>$special[$key],
								'doctors_id'=>$id
								);
								
					$this->db->insert('doctor_common_specailities',$data);
					
					endforeach;
			}
	
        $this->session->set_flashdata('info_success', "Profile has been Update successfully.");
        redirect('doctors/view_profile', 'refresh');
    }

	function appointment()
	{
		$id = $this->session->userdata('userid');
		$this->db->select('a.id as id, a.status as status, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		 ->where('d.id',$id)
		 ->order_by("appointment_date",'DESC');
		$data['appointment1'] = $this->db->get()->result();
		// echo "<pre>";
		// print_r($data['appointment1']); die;
		
		$page = 'doctor/appointments'; 
		$this->index($page,$data);
	}
	
	function accept($id){ 
		
		$this->db->where('id', $id);
        $this->db->update('appointment', array('status'=>2));
       return  $this->session->set_flashdata('success', "Appointment has been <a href='#' class='alert-link'>accept</a> successfully.");
        
	}
	function cancel($id){ 
		$this->db->where('id', $id);
        $this->db->update('appointment', array('status'=>0));
        $this->session->set_flashdata('warning', "Appointment has been  <a href='#' class='alert-link'>cancel</a>");
        redirect('doctors/index', 'refresh');
	}
	function view_prescriptions()
	{
		$page = 'doctor/view_prescriptions';
       // $data['prescriptions'] = $this->db->get('prescriptions')->result();
		$this->db->select('p.description,p.file,p.created_at,m.name')
         ->from('prescriptions p')
		 ->join('appointment a','a.id=p.patient_id')
         ->join('members m', 'm.id = a.member_id')
         ->join('doctors d', 'd.id = p.doctor_id')
		 ->order_by("p.created_at desc");
		$data['prescriptions'] = $this->db->get()->result();
		//echo $this->db->last_query();die;
		$this->index($page,$data);
	}
	function add_prescriptions(){
		$doctor_id = $this->session->userdata('userid');
		if($_FILES['file_name']['name']!='')
		{
			
		$config = array(
        'upload_path' => "./assets/img/pharmacy/",
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
            'doctor_id' => $doctor_id,
            'description' => $this->input->post('desc'),
            'file' => $image,
            'created_at' => date('Y-m-d H:i:s'),
            'upadted_at' => date('Y-m-d H:i:s'),
			'status' => 1
        );
		$this->db->where('id',$this->input->post('patient_id'))->update('appointment',['status'=>3]);
		//$dat=$this->db->where('id',$this->input->post('patient_id'))->order_by('id','desc')->get('appointment')->row_array();
		
		/* $this->db->insert('appointment_log',$dat);
		
		$this->db->where('id',$this->input->post('patient_id'))->delete('appointment'); */
		
		///echo $this->db->last_query();die;
	//print_r($data);die;
        $this->db->insert('prescriptions',$data);
		$this->session->set_flashdata('info_success', "Prescriptions has been added successfully.");
        redirect('doctors/view_prescriptions', 'refresh');
	}
	
	else
		
		{
			
			$this->session->set_flashdata('Warning', "Please Upload Prescriptions");
			 redirect('doctors/view_prescriptions', 'refresh');
		}
	}
	function my_patients()
	{
	   $id = $this->session->userdata('userid');
	   $this->db->select('m.*')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
		 ->where('a.doctor_id',$id)
		 ->order_by("a.doctor_id",'DESC');
		$data['memers'] = $this->db->get()->result(); 
		  
		$page = 'doctor/my_patients';
		$this->index($page,$data);
	}
	function invoice()
	{
		$id = $this->session->userdata('userid');
		$this->db->select('name')
			 ->from('doctors')
			 ->where('id',$id);
		$data['dname'] = $this->db->get()->result(); 
		
		$data['transation'] = $this->db->query('SELECT DISTINCT transaction_log.*,appointment.doctor_id,appointment.member_id,members.name,members.image,members.email,members.id as userid from transaction_log 
		left join appointment on appointment.member_id=transaction_log.user_id
		left join members on members.id=transaction_log.user_id
		 WHERE appointment.doctor_id = '.$id.'')->result();
	
		$data['trans'] = $this->db->query('select * from transaction_log')->result();
		
		$page = 'doctor/invoice';
		$this->index($page,$data); 
	}
	
	
	function ehr_doctor()
	{
		
		$id = $this->session->userdata('userid');
		$this->db->select('ehr_doctor.ehr_name,ehr_doctor.image,ehr_doctor.user_id,members.name,members.id')
			 ->from('ehr_doctor')
			 ->join('members', "members.id = ehr_doctor.user_id",'inner')
			 ->where('doctor_id',$id);
			 
		$data['ehr_data'] = $this->db->get()->result();
		//echo $this->db->last_query(); die;
		//print_r($data['ehr_data']);  die; 
		$this->load->view('doctor/header');
		$this->load->view('doctor/view_doctor_ehr',$data);
		$this->load->view('doctor/footer');
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
	public function refer_to()
	{
		$this->load->view('doctor/header');
		$this->load->view('doctor/referpage');
		$this->load->view('doctor/footer');
	}
	public function refer_hospital()
	{
		$data=$this->doctor->refer_hospital();
		if($data==true)
		{
			 
			$this->session->set_flashdata('info_success','Thank You For Referring');
			redirect('doctors/index','refresh');
		}
		else
		{
			$this->session->set_flashdata('warning','Error Occured');
			redirect('doctors/index','refresh');
		}
	}
	
	public function invoice_list()
	{
		$id = $this->input->get('var1');
		$ide = $this->session->userdata('userid');
		$this->db->select('name')
			 ->from('doctors')
			 ->where('id',$ide);
		$data['dname'] = $this->db->get()->result(); 
		
		
		
		
		
		$data['transation'] = $this->db->query("SELECT transaction_log.*,members.name as member_name,members.address as member_address from transaction_log
		JOIN members on replace(members.user_id, 'USER', '')=transaction_log.user_id WHERE transaction_log.id = $id")->row();

		
		$this->load->view('doctor/header');
		$this->load->view('doctor/invoice_list',$data); 
		$this->load->view('doctor/footer');
	}
	
	public function change_passwordd()
	{
		
		$old=md5($this->input->post('old_pass'));
		$id=$this->session->userdata('userid');
		$datta=$this->db->where('id',$id )->select('password')->get('doctors')->row();
		
		if($datta->password==$old)
		{
			$data=array('password'=>md5($this->input->post('new_pass')),
						'upadted_at'=>date('y-m-d h:i:s')
						);
			$this->db->where('id',$id)->update('doctors',$data);
			$this->session->set_flashdata('success','Password Changed Successfully');
			redirect('doctors/change_password');	
		}
		else
		{
			$this->session->set_flashdata('warning','Error Changed');
			redirect('doctors/change_password');	
			
		}
	}
	public function gallery()
	{
		$id=$this->session->userdata('userid');
		//$data['gallery']=$this->db->get('doctor_gallery')->result(); 
		$data['gallery']=$this->db->where('doctor_id',$id )->select('*')->get('doctor_gallery')->result();
		//print_r($data['gallery']); die; 
		$this->load->view('doctor/header');
		$this->load->view('doctor/gallery',$data);
		$this->load->view('doctor/footer');
		
	}
	public function add_gallery()
	{
		$file=$_FILES['gallery_photo']['name'];
	
		/* echo"<pre>";
		print_r($file);
		die;  */
		
		
		
		 if(!empty($file))
		{ 
		 
		$config = array(
            'upload_path' => "./assets/doctor/gallery",
            'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
            'encrypt_name' => TRUE
            );
			
            $this->load->library('upload', $config);
            if($this->upload->do_upload('gallery_photo'))
            {
            $imageDetailArray = $this->upload->data();
            $image = $imageDetailArray['file_name'];
             //print_r( $image);
            }
            else
            {
            $data['imageError'] = $this->upload->display_errors();
            print_r($data['imageError']);
            }
           $data = array(
			//'brand_name' =>$this->input->post('brand_name'),
			'gallery_photo'=>$image,
			'doctor_id' =>$this->session->userdata('userid'),
			'created_at' =>date('Y-m-d H:i:s'),
			'status'=>1
						);
           
            //$insert = $this->db->insert('sub_category', $data);
	   
	   /* 	echo"<pre>";
		print_r($data);
		die; */
	   
        $insert = $this->db->insert('doctor_gallery',$data);
        $this->session->set_flashdata('success',"Successfully Added");
		redirect('doctors/gallery');	
		
		//return 1;
		
		
		  }
		
		else
		{
			$this->session->set_flashdata('warning',"Please select image");
			redirect('doctors/gallery');	
		}  
		 
	}
	function delete_gallery()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('doctor_gallery'))
		{
			$this->session->set_flashdata('success','Deleted Successfully');
			redirect('doctors/gallery');
		}
		else 
		{
			$this->session->set_flashdata('warning',"Error Occured");
			redirect('doctors/gallery');
		}
	}
	public function appointment_time()
	{
		//echo $this->input->post('hidden_member');die; 
		$this->accept($this->input->post('hidden_id'));
		
		$this->db->where('id',$this->input->post('hidden_member'))->update('members',['appointment_time'=>$this->input->post('time')]);
		//echo $this->db->last_query();die;
		$this->index();
		
	}
	public function reschedule_date()
	{
		$this->db->where('id',$this->input->post('hidden_appointment'))
				 ->update('appointment',['appointment_date'=>$this->input->post('reschedule_date')]);
		
		$this->session->set_flashdata('success','Reschedule Successfully');
			$this->index();
		
	}
}