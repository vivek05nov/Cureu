<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");  
	    $this->load->helper('form'); 
        $this->load->library('form_validation');
	    $this->load->model(array('Admin_model'=>'admin'));
		// $this->db->order_by("id", "desc");
	    // Your own constructor code
	 
	    if($this->session->userdata('usertype')!=='Admin')
	    {
	    	redirect('logout','refresh'); 
	    }
	}
	public function view_blog()
	{	
		$blog['blog']=$this->db->get('blog');
		$this->load->view('admin/header');
		$this->load->view('admin/view_blog',$blog);
		$this->load->view('admin/footer');
	
	}
	public function add_blog()
	{
		$this->load->library('form_validation');
		$this->load->helper('file');
	
		$this->form_validation->set_rules('blog_name', 'blog name', 'required');
		$this->form_validation->set_rules('blog_image', '', 'callback_check');
		$this->form_validation->set_rules('blog_description',' blog description',' required');
		if($this->form_validation->run()== true)
		{
		
				$this->session->set_flashdata('Warning', "Required all Fields");
						redirect('Admin/view_blog', 'refresh');
		}
			else
			{
				$data = $this->admin->add_blog();
				$output = array ('result' =>true);
		 
				$this->session->set_flashdata('info_success', "Blog has been added successfully.");
				redirect('Admin/view_blog', 'refresh');
			}
	}
	
	 public function check($str){
		
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['blog_image']['name']);
        if(isset($_FILES['blog_image']['name']) && $_FILES['blog_image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
				 
                return true;
            }else{
				
                $this->form_validation->set_message('check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('check', 'Please choose a file to upload.');
            return false;
		  
        }
    }

	
				
	function index($page = 'admin/dashboard',$data = null)
	{
	  
        $data['total_doctors'] = $this->db->query("select count(*) as doctor from doctors")->row();
		
        $data['total_treatment'] = $this->db->query("select count(*) as appointment from appointmentt")->row();
        $data['total_hospital'] = $this->db->query("select count(*) as hospital from hospital")->row();
        $data['total_members'] = $this->db->query("select count(*) as members from members")->row();
        $data['total_appointment'] = $this->db->query("select count(*) as appointment from appointment")->row(); 
		$data['total_revenue'] = $this->db->query("select sum(amount) as revenue from transaction_log")->row(); 
		$data['doctors_list']=$this->db->query("SELECT doctors.id, doctors.name ,doctors.image,specialities.service_name ,doctors.specialities_id
		FROM doctors 
		left join doctor_specialities ON doctor_specialities.doctor_id=doctors.id 
		left join specialities on specialities.id=doctor_specialities.specialites_id group by doctors.name")->result();
		//echo $this->db->last_query(); die; group by doctors.name
		
		$data['patient_list']=$this->db->select('*')
									   ->from('members')
									   ->order_by("members.created_at",'DESC')   
									   ->get()->result();
		
		$data['appointment1'] =$this->db->select('a.id as id, a.status as status, m.name as customer,m.mobile_no as contact,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor,d.fee as doctor_fee, d.image as image, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		 ->order_by('a.appointment_date', 'DESC')
		 ->get()->result(); 
		 $data['refer']=$this->db->query('SELECT refer_to.*, members.name as members ,doctors.name as doc_name,doctors.image as doc_img FROM refer_to
										 join members on members.id=refer_to.patient_id
										 join doctors on doctors.id=refer_to.doc_id')->result();
		 $data['contact_details']=$this->db->query('select * from contact order by created_at desc')->result();								  
		 $this->db->select('members.name,members.email,transaction_log.payment_id,transaction_log.payment_status,transaction_log.payment_date,transaction_log.amount');
        $this->db->from('members');
		$this->db->order_by('transaction_log.payment_date', 'DESC');
        $this->db->join('transaction_log', "transaction_log.user_id = replace(members.user_id, 'USER', '')",'inner');
		
        $data['transation'] = $this->db->get()->result(); 
		
		 
		
				//echo $this->db->last_query();die;
		$this->load->view('admin/header');
		$this->load->view($page,$data);
		$this->load->view('admin/footer');  	
	}

	

	function view_specialities()
	{
		$page = 'admin/view_specialities';
		$this->db->order_by("id", "desc");
        $data['specialities'] = $this->db->get('specialities')->result();
        //echo $this->db->last_query();die;
		$this->index($page,$data); 
	}
    
    function add_specialities()
    {
        $config = array(
        'upload_path' => "./assets/service/",
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        'max_size' => "2048000", 
        'max_height' => "768",
        'max_width' => "1024"
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
        $data = array(
            'service_name' => $this->input->post('service_name'),
            'desc' => $this->input->post('desc'),
            'image' => $image,
            'created_at' => date('Y-m-d H:i:s'),
            'upadted_at' => date('Y-m-d H:i:s'),
			'status' => 1
        );
	//print_r($data);die;
        $this->db->insert('specialities',$data);
		$this->session->set_flashdata('success', "Specialities has been added successfully.");
        redirect('Admin/view_specialities', 'refresh');
    }
	function edit_specialities()
	{
	    $page = 'admin/edit_specialities';
        $id = $this->uri->segment(3);
		$res['specialities'] = $this->db->get_where('specialities',array('id'=>$id))->row();
		$this->index($page,$res);
	}
    
	function update_specialities()
	{ 
	   $this->admin->update_specialities();
	   $this->session->set_flashdata('success', "Specialities has been update successfully.");
       redirect('Admin/view_specialities', 'refresh');
	}
    function del_specialities(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('specialities');
        $this->session->set_flashdata('warning', "Specialities has been deleted successfully.");
        redirect('Admin/view_specialities', 'refresh');
    }
	function hospital()
	{
	    $data['hospital'] = $this->admin->get_hospital();
		$data['countries']=$this->admin->get_country(); 
		
		
		$data['hospit']=$this->admin->hospital_details();
		$data['services']=$this->db->get('specialities')->result();
		$data['hospitall']=$this->db->get('hospital')->result();
		$data['city'] = $this->db->query('SELECT cities.*,countries.id as country_id from cities
										JOIN countries on countries.id=cities.country_id')->result();
										
		$this->load->view('admin/header');
		$this->load->view('admin/hospital',$data);
		$this->load->view('admin/footer');
	} 
	function doctors()
	{
	    // $data['doctors'] = $this->db->get('doctors')->result();
		
		
		$data['doctors'] = $this->db->query('select * from doctors order by id desc')->result();
	    $data['specialities'] = $this->db->get('specialities')->result();
        //echo $this->db->last_query();die;
		$page = 'admin/doctors';  
		$this->index($page,$data);
	} 
	function add_doctor()
	{
        //echo json_encode($this->input->post(null,TRUE));die;
		$this->form_validation->set_rules('specialities', 'Specialities', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('aadhaar', 'Aadhaar', 'trim|required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$array= array(
				'result' =>false,
  	            'specialities_error'=>form_error('specialities'),
  	            'name_error'=>form_error('name'),
  	            'dob_error'=>form_error('dob'),
  	            'gender_error'=>form_error('gender'),
  	            'email_error'=>form_error('email'),
  	            'password_error'=>form_error('password'),
  	            'mobile_error'=>form_error('mobile'),
  	            'aadhaar_error'=>form_error('aadhaar'),
  	            'blood_group_error'=>form_error('blood_group'),
  	            'address_error'=>form_error('address')
  	            //'profile_image_error' =>$profile_image_error,
  	            ); 
  	       echo json_encode($array);
		}else  if($this->form_validation->run()==TRUE){
			$data = $this->admin->add_doctor();
			$output = array ('result' =>true);
			$this->session->set_flashdata('info_success', "Doctor has been added successfully.");
			echo json_encode($data);
		}
	    
	}
	function del_doctor(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('doctors');
        $this->session->set_flashdata('warning', "Doctor has been deleted successfully.");
        redirect('Admin/doctors', 'refresh');
    }
	function edit_doctor()
	{
	    $page = 'admin/edit_doctor';
        $id = $this->uri->segment(3);
	    $res['specialities'] = $this->db->get('specialities')->result();
        $res['result']= $this->db->get_where('doctors',array('id'=>$id))->row();
        //echo $this->db->last_query();die;
		$this->index($page,$res);
	}
	function update_doctor()
	{ 
	   $this->admin->update_doctor();
	   $this->session->set_flashdata('info_success', "Doctor has been updated successfully.");
        redirect('Admin/doctors', 'refresh');
	}
	
	function view_area()
	{
	    $data['area'] = $this->db->get('area')->result();
		$data['cities'] = $this->db->get_where('cities',array('state_id =' => 38)); 
        //echo $this->db->last_query();die;
		$page = 'admin/view_area';   
		$this->index($page,$data);
	}
	function add_area()
	{
		//$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('area_name', 'area_name', 'required');
		if($this->form_validation->run()== true)
		{
			$data = array(  
            'name' => $this->input->post('area_name'),
            'city_id' => $this->input->post('city')
        );
        $this->db->insert('area',$data);
		$this->session->set_flashdata('info_success', "Area has been added successfully.");
        redirect('Admin/view_area', 'refresh');
	    }
		else
		{
		$this->view_area();
		}
	}
	
	
	
	function view_banner()
	{
	    $data['banner'] = $this->db->get('banner')->result();
        //echo $this->db->last_query();die;
		$page = 'admin/view_banner';  
		$this->index($page,$data);
	}
	
	
	function add_banner()
	{
		$this->form_validation->set_rules('banner_name', 'Banner Name', 'trim|required');
		$this->form_validation->set_rules('banner_type', 'Banner Type', 'trim|required');
		
		// if (empty($_FILES['userfile']['name']))
		// {
			// $this->form_validation->set_rules('userfile', 'Document', 'required');
		// }
		
		 if ($this->form_validation->run() == FALSE)
		 { 
			// $array= array(
				// 'result' =>false,
  	            // 'file_name_error'=>form_error('userfile')
  	            // ); 
  	       // echo json_encode($array);
		 }else  {
			 
			$data = $this->admin->add_banner();
			$this->session->set_flashdata('success', "Banner has been added successfully.");
			redirect('admin/view_banner');
		}
	} 
	function del_benner(){
		echo "vivek";die;
        $id  = $this->input->post('del');
        $this -> db -> where('id', $id);
        $this -> db -> delete('banner');
        $this->session->set_flashdata('success', "Banner has been deleted successfully.");  
        redirect('Admin/view_banner', 'refresh');
    }
	
	function view_package()
	{
	    $data['package'] = $this->db->get('package')->result();
        //echo $this->db->last_query();die;
		$page = 'admin/view_package';  
		$this->index($page,$data);
	}
	function add_package()
	{
		$data = $this->admin->add_package();
		$output = array ('result' =>true);
		$this->session->set_flashdata('info_success', "Package has been added successfully.");
		redirect('Admin/view_package', 'refresh');
	}
	function view_package_hospital()
	{
	    $data['package_for_hospital'] = $this->db->get('package_for_hospital')->result();
        //echo $this->db->last_query();die;
		$page = 'admin/view_package_hospital';   
		$this->index($page,$data);
	}
	function add_package_hospital()
	{
		$data = $this->admin->add_package_hospital();
		$output = array ('result' =>true);
		$this->session->set_flashdata('info_success', "Package has been added successfully.");
		redirect('Admin/view_package_hospital', 'refresh');
	}
	function members()
	{
	   // $data['branch'] = $this->admin->get_branch();
	   $this->db->order_by("id", "desc");
	   $data['patient'] = $this->db->get('members')->result();
        //echo $this->db->last_query();die;
        $data['memers'] = $this->admin->get_member();
		$page = 'admin/members';
		$this->index($page,$data);
	}
    function view_member(){
        $id  = $this->uri->segment(3);
        $data['details'] = $query = $this->db->get_where('members', array('id' => $id))->row();
        // echo $this->db->last_query();die;
        $this->session->set_flashdata('warning', "Member has been deleted successfully.");
        $page = 'admin/view_member';
        $this->load->view('admin/header');
        $this->load->view($page,$data);
        $this->load->view('admin/footer');
    }
    function del_member(){
		
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('members');
        $this->session->set_flashdata('warning', "Member has been deleted successfully.");
        redirect('Admin/members', 'refresh');
    }
	function appointment()
	{
		$this->db->select('a.id as id,a.status , m.name as customer,m.image as patient_img,m.mobile_no as contact, m.email as email, d.name as doctor,d.image as doctor_img, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time , a.appointment_id as appointment_id')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		->order_by("a.appointment_date",'DESC')->limit(15);
		$data['appointment'] = $this->db->get()->result();
        //echo $this->db->last_query(); die;  
		$page = 'admin/appointment'; 
		$this->index($page,$data);
	}


	function invoice_report()
	{
	   // $data['branch'] = $this->admin->get_branch();
		
		$this->db->select('a.id as id,a.status , m.name as customer,m.image as patient_img,m.mobile_no as contact, t.payment_id as payment,t.amount as amount,t.payment_date as payment_date, m.email as email, d.name as doctor,d.image as doctor_img,  a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id') 
         
		 ->join('transaction_log t', 't.user_id = a.member_id')
         ->join('doctors d', 'd.id = a.doctor_id')
		 ->order_by("appointment_date",'ASC');
		 //$this->db->distinct();
		 
		$data['transationss'] = $this->db->get()->result(); 
		
		// echo "<pre>";
		// print_r($data['transation']); die; 
		
	   
	   // $this->db->select('members.name,members.email,transaction_log.payment_id,transaction_log.method,transaction_log.payment_status,transaction_log.payment_date,transaction_log.id,transaction_log.amount');
       // $this->db->from('members');
       // $this->db->join('transaction_log', "transaction_log.user_id = replace(members.user_id, 'USER', '')",'inner');
       // $data['transation'] = $this->db->get()->result();
		$page = 'admin/invoice_report';
		$this->index($page,$data);
	}
	
	function view_invoice()
	{
		$id = $this->input->get('var1');
		
		$data['invoice_details'] = $this->db->query("SELECT transaction_log.*,members.name as member_name,doctors.name as doctor_name,doctors.degree as doctor_degree from transaction_log
		JOIN members on replace( members.user_id, 'USER', '')=transaction_log.user_id LEFT JOIN doctors ON replace( doctors.user_id, 'DOCTOR', '	
		')=replace( members.user_id, 'USER', '	
		') WHERE transaction_log.id = $id")->row();
		//print_r($data['invoice_details']); die;
		
		$page = 'admin/view_invoice';
		$this->index($page,$data);
	}
	
	function hospital_invoice()
	{
	   // $data['branch'] = $this->admin->get_branch();
	   $data['specialities'] = $this->db->get('specialities')->result();
        //echo $this->db->last_query();die;
        $data['memers'] = $this->admin->get_member();
		$page = 'admin/hospital_invoice';
		$this->index($page,$data);
	}
	
	function transations()
	{
	    $this->db->select('members.name,members.email,transaction_log.payment_id,transaction_log.payment_status,transaction_log.payment_date,transaction_log.amount');
        $this->db->from('members');
        $this->db->join('transaction_log', "transaction_log.user_id = replace(members.user_id, 'USER', '')",'inner');
		$this->db->order_by("transaction_log.payment_date",'DESC');
        $data['transation'] = $this->db->get()->result();
		// echo "<pre>";
		// print_r($data['transation']); die; 
		//echo $this->db->last_query(); die;
        
		$page = 'admin/transations';
		$this->index($page,$data);
	}
	
	function services()
	{
		$page = 'admin/services';
		$this->index($page);
	}
	
	function save_services()
	{
	    $data = $this->admin->save_services2();
	    echo json_encode($data);
	}
	function get_all_services()
	{
	    $data = $this->admin->get_all_services();
	    echo json_encode($data);
	}
	function add_users()
	{
        //echo json_encode($this->input->post(null,TRUE));die;
           // $this->form_validation->set_rules('reg_no', 'Registration Number', 'trim|required');
            // $this->form_validation->set_rules('date', 'Date', 'trim|required');
            // $this->form_validation->set_rules('membership_no', 'Membership no', 'trim|required');
	         $this->form_validation->set_rules('name', 'First Name', 'trim|required'); 
            // $this->form_validation->set_rules('middlename', 'Last Name', 'trim|required');
            // $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
            // $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
            // $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $output = array ('result' =>false,'message'=>validation_errors());
                echo json_encode($output);
            }else  if($this->form_validation->run()==TRUE){
                $data = $this->admin->add_users();
                $output = array ('result' =>true);
                $this->session->set_flashdata('info_success', "Product has been added successfully.");
                echo json_encode($data);
            }
	    
	}
	
	function edit_member()
	{
	    $page = 'admin/edit_member';
        $id = $this->uri->segment(3);
		$res['specialities'] = $this->db->get('specialities')->result();
        $res['result']= $this->db->get_where('members',array('id'=>$id))->row();
        //echo $this->db->last_query();die;
		$this->index($page,$res);
	}
    
	function update_member()
	{ 
	   $this->admin->update_user();
	   redirect('Admin/members', 'refresh');
	}
	function fetch_users()
	{
           $fetch_data = $this->admin->make_user_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array[] = $row->firstname;  
                $sub_array[] = $row->lastname;
                $sub_array[] = $row->email;
                $sub_array[] = $row->contact;
                $sub_array[] = $row->role;
                $sub_array[] = '<img src="'.base_url().'assets/service_details/user_image/'.$row->profile_pic.'" class="img-thumbnail" width="50" height="35" />'; 
                $sub_array[] = '<button type="button"  class="btn btn-light mx-1 btn-sm edit_user" data-id="'.$row->id.'"><i class="align-middle far fa-fw fa-edit"></i></button><button type="button" class="btn btn-danger mx-1 btn-sm delbtn" data-id="'.$row->id.'"><i class="align-middle far fa-fw fa-trash-alt"></i></button>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->admin->get_all_user_data(),  
                "recordsFiltered"     =>     $this->admin->get_filtered_user_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);
	}
	// function get_user_by_id()
	// {
	    // $id = $this->input->post('id',true);
	    // $q= $this->db->get_where('users',['id'=>$id]);
	    // echo json_encode($q->row());
	// }
	// function update_user()
	// {
	    // $data = $this->admin->update_user();
	    // echo json_encode($data);
	// }
	function delete_service()
	{
	    $data = $this->admin->delete_service();
	    echo json_encode($data);
	}
	function servicesupdate()
	{
	    $data = $this->admin->servicesupdate();
	    echo json_encode($data);
	}
	function booking()
	{
	    $data['doctors'] = $this->admin->get_all_active_doctors();
	    $page = 'admin/booking';
		$this->index($page,$data);
	}
	function fetch_booking()
	{
	    $fetch_data = $this->admin->fetch_booking();
	    $data = array();
	    foreach($fetch_data as $row)
	    {
	        $subarray = array();
	        $subarray[] = $row->name;
	        $subarray[]= $row->firstname.''.$row->lastname;
	        $subarray[] = $row->age;
	        $subarray[] = $row->gender;
	        $subarray[] = $row->problem;
	        $subarray[] = $row->contact;
	        $subarray[] = $row->email;
	        $subarray[] = $row->booking_status;	        
	        $subarray[] = '<button type="button"  class="btn btn-light mx-1 btn-sm edit_user" data-id="'.$row->id.'"><i class="align-middle far fa-fw fa-edit"></i></button><button type="button" class="btn btn-danger mx-1 btn-sm delbtn" data-id="'.$row->id.'"><i class="align-middle far fa-fw fa-trash-alt"></i></button><button type="button" class="btn btn-primary mx-1 btn-sm assignbtn" data-id="'.$row->id.'" title="Assign"><i class="align-middle fas fa-fw fa-marker"></i></button>';
	        $data[] = $subarray;
	    }
	    
	    $output = array(
	             'draw' => intval($_POST['draw']),
	             'recordsTotal' => $this->admin->total_booking_count(),
	             'recordsFiltered' => $this->admin->records_filtered_booking(),
	             'data' => $data,
	             'query' =>$this->db->last_query()
	        ); 
	        echo json_encode($output);
	}
	function assign_doctor()
	{
	    $data = $this->admin->assign_doctor();
	    echo json_encode($data);
	}
	
    function assigned_booking()
    {
        $page = 'admin/assigned_booking';
        $this->index($page);
    }
    
    function scientific()
	{
		$page = 'admin/scientific';
        $data['scientific'] = $this->db->get('scientific')->result();
		$this->index($page,$data);
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
    
    function adminscientific(){
        $page = 'admin/adminscientific';
        $data['admin_scientific'] = $this->db->get('admin_scientific')->result();
		$this->index($page,$data); 
    }
    function add_scientific(){ 
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
        
        $data = array(
            'title'=>$this->input->post('title'),
            'image'=>$image
            );
        $insert = $this->db->insert('admin_scientific', $data);
       // echo $this->db->last_query();die;
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/adminscientific', 'refresh');
    }
    function calculator(){
        $page = 'admin/calculator';
        $this->db->select('calculator_category.name,medical_calculator.id,medical_calculator.image,medical_calculator.link');
        $this->db->from('medical_calculator');
        $this->db->join('calculator_category', 'calculator_category.id = medical_calculator.cat_id','left');
        $data['medical_calculator'] = $this->db->get()->result();
        $data['calculator_category'] = $this->db->get('calculator_category')->result();
		$this->index($page,$data); 
    }
    function add_calculator(){
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
        
        $data = array(
            'cat_id'=>$this->input->post('cat'),
            'link'=>$this->input->post('link'),
            'image'=>$image
           );
        $insert = $this->db->insert('medical_calculator', $data);
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/calculator', 'refresh');
    }
    function admin_scientific_del(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('admin_scientific');
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/adminscientific', 'refresh'); 
    }
    function calculator_scientific_del(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('medical_calculator');
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/calculator', 'refresh');
    }
    function category(){
        $page = 'admin/category';
        $data['category'] = $this->db->get('category')->result();
		$this->index($page,$data); 
    }
    function add_category(){
        $data = array(
            'name'=>$this->input->post('name')
            );
        $insert = $this->db->insert('category', $data);
       // echo $this->db->last_query();die;
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/category', 'refresh');
    }
    function del_category(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('category');
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/category', 'refresh');
    }
    function subcat()
	{
		$page = 'admin/sub_category';
        $data['cat'] = $this->db->get('category')->result();
        $this->db->select('category.name,sub_category.id,sub_category.image,sub_category.link');
        $this->db->from('sub_category');
        $this->db->join('category', 'category.id = sub_category.cat_id','left');
        $data['sub_category'] = $this->db->get()->result();
        //$data['sub_category'] = $this->db->get('sub_category')->result();
        //echo $this->db->last_query();die;
		$this->index($page,$data);
	}
    function add_subcategor(){
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
        $data = array(
            'cat_id'=>$this->input->post('cat'),
            'link'=>$this->input->post('link'),
            'image'=>$image,
            //'desc'=>$this->input->post('desc')
            );
        $insert = $this->db->insert('sub_category', $data);
       // echo $this->db->last_query();die;
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/subcat', 'refresh');
    }
    function del_subcategory(){
        $id  = $this->uri->segment(3);
       
        $this -> db -> where('id', $id);
        $this -> db -> delete('sub_category');
        
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/subcat', 'refresh');
    }
    
    
    function calculator_category(){
        $page = 'admin/calculator_category';
        $data['calculator_category'] = $this->db->get('calculator_category')->result();
		$this->index($page,$data); 
    }
    function add_calculator_category(){
        $data = array(
            'name'=>$this->input->post('name')
            );
        $insert = $this->db->insert('calculator_category', $data);
        $this->session->set_flashdata('warning', "Scientific has been updated successfully.");
        redirect('Admin/calculator_category', 'refresh');
    }
    function del_calculator_category(){
        $id  = $this->uri->segment(3);
        $this -> db -> where('id', $id);
        $this -> db -> delete('calculator_category');
        $this->session->set_flashdata('warning', "Scientific has been deleted successfully.");
        redirect('Admin/calculator_category', 'refresh');
    }
	function contact_list()
	{
		$data['contact']=$this->db->query('select * from contact order by created_at desc')->result();
		$this->load->view('admin/header.php');
		$this->load->view('admin/contact_list',$data);
		$this->load->view('admin/footer');
	}

	function Edit_blog($id)
	{
	$data['edit_blog']=$this->admin->edit_blog($id);
	$this->load->view('admin/header');
	$this->load->view('admin/edit_blog',$data);	
	$this->load->view('admin/footer');
	}
	function Edit_blogg(){
		$this->admin->Update($this->input->post('hide'));
		redirect('Admin/view_blog','refresh');
	}
	
	function delete_blog()
	{
		if(isset($_POST['submit']))
		{
		$id=$this->input->post('del');
		$this->admin->delete_blog($id);
		$this->view_blog();
		}
		
	}
	function delete_package()
	{
		if(isset($_POST['submit']))
		{
		$id=$this->input->post('del');
		$this->admin->delete_package($id);
		$this->view_package();
		}
		
	}
	function delete_banner()
	{
		if(isset($_POST['submit']))
		{
			$this->load->helper('file'); 
		$id=$this->input->post('del');
		$image=$this->db->select('image')->where('id',$id)->get('banner')->row();
		
		
		$this->admin->delete_banner($id);
		if(!empty($image))
		{
			unlink('assets/img/banner/'.$image->image);
			
		}
		$this->session->set_flashdata('success','Deleted Successfully');
		$this->view_banner();
		}
		
	}
	function delete_area()
	{
		if(isset($_POST['submit']))
		{
		$id=$this->input->post('del');
		$this->admin->delete_area($id);
		$this->view_area();
		}
		
	}
	function delete_viewspecialities()
	{
		if(isset($_POST['submit']))
		{
		$id=$this->input->post('del');
		$this->admin->delete_viewspecialities($id);
		$this->view_specialities();
		}
		
		
	}
	
	public function add_hospital()
	{
		// print_r($this->input->post());exit;
		if(!($this->input->post())==null)
		{
				$files=$_FILES['image_name']['name'];
				$file=$_FILES['imag_name']['name'];
				$filesss=$_FILES['imagee_name']['name'];
		
		        //for image hos_doctors insert
				
				
			$id = $this->admin->add_hospital(); 
			$this->multiple_file_pharmacy($id);
			$this->multiple_file_gallery($id);
			$this->multiple_specialities($id);
			$this->multiple_files_hotel($id);
			$output = array ('result' =>true);
			$this->session->set_flashdata('info_success', "Hospital has been added successfully.");
			redirect('Admin/hospital') ;	
		}
		else
		{
			redirect('Admin/hospital') ;
		}
		
	}
	
	 
	public function get_state()
	{
		$data=$this->admin->get_state($this->input->post('id'));
	}
	public function get_city()
	{
		$data=$this->admin->get_cityy($this->input->post('id'));
		
	}
	public function edit_hospital($id)
	{
		
		$data['hospit']=$this->admin->hospital_detailss($id);
		$data['hos_gallery']=$this->db->get_where('hos_gallery',array('hospital_id'=>$id))->result_array();
		// print_r($data['hos_gallery']);exit;
		$data['hotel']=$this->db->get_where('hotel',array('hospital_id'=>$id))->result_array();
		$data['pharmacy']=$this->db->get_where('pharmacy',array('hosptial_id'=>$id))->result_array();
		$data['hospital']=$this->db->get('specialities')->result();
		$data['countries']=$this->db->get('countries')->result();
		$data['states']=$this->db->get('states')->result();
		$data['services']=$this->db->get('specialities')->result();
		$data['cities']=$this->db->get('cities')->result();
		// echo '<pre>';print_r($data);exit;
		$this->load->view('admin/header');
		$this->load->view('admin/edit_hospital',$data);
		$this->load->view('admin/footer');
		
	}
	public function update_hospital()
	{
		// echo '<pre>';
		// print_r($this->input->post());exit;
		if(!($this->input->post())==null)
		{
				//$files=$_FILES['image_name']['name'];
				//$file=$_FILES['imag_name']['name'];
				//$filesss=$_FILES['imagee_name']['name'];
		/* echo "<pre>";
		print_r($files);
		print_r($file);
		print_r($filesss);
		die; */
		$id=$this->input->post('hospital_id');
			$this->admin->update_hospital($id);
			
			$this->multiple_file_pharmacy($id);
			$this->multiple_file_gallery($id);
			$this->multiple_specialities($id);
			$this->multiple_files_hotel($id);
			$output = array ('result' =>true);
			$this->session->set_flashdata('info_success', "Hospital Updated Successfully.");
			redirect('Admin/hospital') ;	
		}
		else
		{
			redirect('Admin/hospital') ;
		}
	}
	public function delete_hospital()
	{
		if($this->admin->del_hos($this->input->post('del')))
			
		{
				
				$this->session->set_flashdata('info_success',"Data Deleted Successfully"); 
				$this->hospital();
		}
		else{
				$this->session->set_flashdata('Warning',"Error"); 
				$this->hospital();
		}
				
	}
	public function multiple_files_hotel($hospital_id){ 
			 
			 
			 if(!empty($_FILES['image_name']['name'])){
				// $data=$this->db->where('hospital_id',$hospital_id)->select('image')->get('hotel')->result();
				 
				// foreach($data as $key=> $row):
				
					// $dat=json_decode($row->image);
					//echo "<pre>";
					//echo ($dat->file_name[$key]);die;
					// $daa= "assets/img/hotel/".$dat->file_name[$key];
					//print_r ($daa) ; die;
					// unlink($daa);
				// endforeach;
				
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
	else
	{
		
		redirect('admin/hospital');
	}
  }
	
	
	public function multiple_file_pharmacy($hospital_id){
		 
		 
		
			if(!empty($_FILES['imag_name']['name'])){
				
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
				
		if(!empty($_FILES['imag_name']['name']) && count(array_filter($_FILES['imag_name']['name'])) > 0){ 
                $filesCount = count($_FILES['imag_name']['name']);
				
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['fil']['name']     = $_FILES['imag_name']['name'][$i]; 
                    $_FILES['fil']['type']     = $_FILES['imag_name']['type'][$i]; 
                    $_FILES['fil']['tmp_name'] = $_FILES['imag_name']['tmp_name'][$i]; 
                   $_FILES['fil']['error']     = $_FILES['imag_name']['error'][$i]; 
                    $_FILES['fil']['size']     = $_FILES['imag_name']['size'][$i]; 
                     
					
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
		else
			{
			
			redirect('admin/hospital');
			}
  }
  //gallery/
  public function multiple_file_gallery($hospital_id){
		  
		  if(!empty($_FILES['imagee_name']['name'])){
		  $this->db->where('hospital_id',$hospital_id)->delete('hos_gallery'); 
		  //$this->db->where('hosptial_id',$hospital_id)->delete('pharmacy');
		   $uploadPath = 'assets/img/gallery/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv"; 
					$config['encrypt_name']=true;
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
			if(!empty($_FILES['imagee_name']['name']) && count(array_filter($_FILES['imagee_name']['name'])) > 0){ 
                $filesCount = count($_FILES['imagee_name']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['imagee_name']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['imagee_name']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['imagee_name']['tmp_name'][$i]; 
                   $_FILES['file']['error']     = $_FILES['imagee_name']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['imagee_name']['size'][$i]; 
                     
                    // File upload configuration 
                   
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
				$uploadImgDat= $uploadData;
			  }
			  
			  
		
         if(!empty($uploadImgDat)){
            // Insert files data into the database
			
            $this->admin->multiple_image_gallery($uploadImgDat,$hospital_id);              
        }
		  }
		  else
		  {
			 
			 redirect('admin/hospital');
		  }
  }
  //
  public function get_specialities()
  {
	 $res= $this->db->get('specialities');
	  echo  json_encode($res->result());
  }
  public function multiple_specialities($id)
  {
	 $this->admin->multiple_specialities($id);
	 
  }
  	function Enquiry()
	{
		$data['enquiries']=$this->db->get('enquiries')->result();
		$this->load->view('admin/header.php');
		$this->load->view('admin/enquiries',$data);
		$this->load->view('admin/footer');
	}
	function delete_enquiry()
	{
		$id=$this->input->post('del');
		
		if($this->db->query("delete  from enquiries where id='".$id."'"))
		{
			  
			$this->session->set_flashdata('info_success','Deleted Successfully');
			$this->Enquiry();
		}
		else{
			$this->session->set_flashdata('warning','Error Occured');
			$this->Enquiry();
		}
		
	}
	public function treatment()
	{
	 	$data['appointment']=$this->db->query('select appointmentt.*,hospital.name as hospital,hospital.image as hospital_image,members.name as customer,members.mobile_no as contact,members.image as members_image from appointmentt
											  join hospital on hospital.id=appointmentt.hospital_id
											  join members on members.id=appointmentt.member_id order by appointment_date desc')->result();  
		// echo "<pre>";					
        // print_r($data['appointment']); die; 
		$page = 'admin/treatment'; 
		$this->index($page,$data);
	}
	public function add_special() 
	{
		$data=$this->admin->add_special();
		
		if($data==true)
		{
			$this->session->set_flashdata('success' ,"Added Successfully");
			redirect('admin/view_specialities');
		}
		else{
			$this->session->set_flashdata('warning' ,"Error");
			redirect('admin/view_specialities');
		}
		
	}
	public function edit_special()
	
	{
			$data=$this->admin->edit_special();
			
		if($data==true)
		{
			$this->session->set_flashdata('success' ,"Added Successfully");
			redirect('admin/view_specialities');
		}
		else{
			$this->session->set_flashdata('warning' ,"Error");
			redirect('admin/view_specialities');
		}
	}
	public function delete_appointment()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('appointmentt'))
		{
			$this->session->set_flashdata('success',"deleted successfully");
			redirect('admin/treatment');
		}
		else{
			$this->session->set_flashdata('warning',"Error occured");
			redirect('admin/treatment');
		}
		
		
	}
	public function delete_doctors()
	{
		$id=$this->input->post('del');
		
		if($this->db->where('id',$id)->delete('doctors'))
		{
			$this->db->where('id',$id)->delete('appointment');
			$this->db->where('id',$id)->delete('doctor_specialities');
			$this->db->where('id',$id)->delete('doctor_gallery');
			
			$this->session->set_flashdata('success',"deleted successfully");
			redirect('admin/doctors');
		}
		else{
			$this->session->set_flashdata('warning',"Error occured");
			redirect('admin/doctors');
		}
		
		
	}
	public function refer_hospital()
	{
		$data['refer']=$this->db->query('SELECT hospital_refer.*, members.name as members, hospital.image as hospital_img FROM hospital_refer
										JOIN members
										ON hospital_refer.patient_id=members.id
										join hospital on hospital.id=hospital_refer.hos_id order by id DESC')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/refer_by_hospital',$data);
		$this->load->view('admin/footer');
		
		
	}
	public function delete_refer()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('hospital_refer'))
		{
			$this->session->set_flashdata('success','Deleted Successfully');
			redirect('admin/refer_hospital');
		}
		else
		{
			$this->session->set_flashdata('warning','Error occured');
			redirect('admin/refer_hospital');
		}
	}
	public function refer_doctor()
	{
		$data['refer']=$this->db->query('SELECT refer_to.*, members.name as members ,doctors.name as doc_name,doctors.image as doc_img FROM refer_to 
										 join members on members.id=refer_to.patient_id
										 join doctors on doctors.id=refer_to.doc_id order by id DESC')->result();
		//echo $this->db->last_query(); die;								
		$this->load->view('admin/header');
		$this->load->view('admin/refer_by_doctor',$data); 
		$this->load->view('admin/footer');
		
		
	}
	public function delete_refer_doctor()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('refer_to'))
		{
			$this->session->set_flashdata('success','Deleted Successfully');
			redirect('admin/refer_doctor');
		}
		else
		{
			$this->session->set_flashdata('warning','Error occured');
			redirect('admin/refer_doctor');
		}
	}
	public function delete_patient()
	{
		$id=$this->input->post('del');
	if($this->db->where('id',$id)->update('members',['status'=>1]))
	{
		$this->session->set_flashdata('success',"Deactivated Successfully");
		redirect('admin/members');
	}
		else
		{
		$this->session->set_flashdata('warning',"Error Occured");
		redirect('admin/members');
		}
	}
	
	
	public function activate_patient()
	{
		//echo "vivek";die;
			$id=$this->input->post('del');
			//echo $id;die;
	if($this->db->where('id',$id)->update('members',['status'=>0]))  
	{
		//echo $this->db->last_query();die;
		$this->session->set_flashdata('success',"Activated Successfully");
		redirect('admin/members');
	}
		else
		{
		$this->session->set_flashdata('warning',"Error Occured");
		redirect('admin/members');
		}
	}
	public function delete_contact_list()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('contact'))
		{
			
			$this->session->set_flashdata('success','Deleted Successfully');
			redirect('admin/contact_list');
		}
		else
		{
			$this->session->set_flashdata('warning','Error Occured');
			redirect('admin/contact_list');
		}
	}
	public function view_country()
	{
		$data['country']=$this->db->get('countries')->result();
		
		$this->load->view('admin/header');
		$this->load->view('admin/add_country',$data); 
		$this->load->view('admin/footer');
	}
	public function add_country()
	{
		$data=array('name'=>$this->input->post('country')
	               );
				  if($this->db->insert('countries',$data))
				  {
					  $this->session->set_flashdata('msg',"Add Successfully");
					  redirect('admin/view_country');
				  }
				  else
				  {
					  $this->session->set_flashdata('warning',"Error Occured");
					  redirect('admin/view_country');
				  }
	}
	public function view_city()
	{
		$data['cities']=$this->db->get('cities')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/add_city',$data); 
		$this->load->view('admin/footer');
	}
	public function add_city()
	{
		$data=array('name'=>$this->input->post('city'),
					'country_id'=>$this->input->post('country')	
						
	               );
				  
				  if($this->db->insert('cities',$data))
				  {
					  $this->session->set_flashdata('msg',"Add Successfully");
					  redirect('admin/view_city');
				  }
				  else
				  {
					  $this->session->set_flashdata('warning',"Error Occured");
					  redirect('admin/view_city');
				  }
	}
	public function check_country()
	{
		$country=$this->input->post('country');
		$result=$this->db->where('name',$country)->get('countries')->row();
		if(!empty($result))
		{
			echo "Country Already Exist"; 
		}
		else
			
			{
				echo " ";
			}
		
	}
	
	public function check_city()
	{
		$city=$this->input->post('city');
		$countryid=$this->input->post('country');
		//echo $countryid;die;
		$result=$this->db->where('name',$city)->get('cities')->row();
		if(!empty($result))
		{
			echo "City Already Exist"; 
		}
		else
			
			{
				echo " ";
			}
		
	}
	public function delete_cities()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('cities'))
		{
			$this->session->set_flashdata('msg',"Delete Successfully");
			redirect('admin/view_city');
		}
		else
		{
			$this->session->set_flashdata('warning',"Error Occured");
			redirect('admin/view_city');
		}
	}
	public function delete_country()
	{
		$id=$this->input->post('del');
		if($this->db->where('id',$id)->delete('countries'))
		{
			$this->session->set_flashdata('info_success',"Delete Successfully");
			redirect('admin/view_country');
		}
		else
		{
			$this->session->set_flashdata('warning',"Error Occured");
			redirect('admin/view_country');
		}
	}
	function common_specialities()
	{
		
		$this->db->order_by("id", "desc");
        $data['specialities'] = $this->db->get('common_specialities')->result();
       /* echo "<pre>";
	   print_r($data);die; */
		$this->load->view('admin/header');
		$this->load->view('admin/common_specialities',$data);
		$this->load->view('admin/footer');
		
	}
	public function add_common() 
	{
		$data=$this->admin->add_common();
		
		if($data==true)
		{
			$this->session->set_flashdata('success' ,"Added Successfully");
			redirect('admin/common_specialities');
		}
		else{
			$this->session->set_flashdata('warning' ,"Error Occured");
			redirect('admin/common_specialities');
		}
		
	}
	function delete_commonspecialities()
	{
		if(isset($_POST['submit']))
		{
			$id=$this->input->post('del');
			if($this->db->where('id',$id)->delete('common_specialities'))
			{
				$this->session->set_flashdata('success','Deleted successfully');
				$this->common_specialities();
			}
			else
			{
				$this->session->set_flashdata('warning','Error Occured');
				$this->common_specialities();
			}
		
		}
	}
	public function edit_common()
	
	{
			$data=$this->admin->edit_common();
			
		if($data==true)
		{
			$this->session->set_flashdata('success' ,"Added Successfully");
			redirect('admin/common_specialities');
		}
		else{
			$this->session->set_flashdata('warning' ,"Error occured");
			redirect('admin/common_specialities');
		}
	}
	public function change_password()
	{
		//$id=$this->session->userdata('userid');
		//$password=password_hash($this->input->post('password',TRUE), PASSWORD_BCRYPT);
		$this->load->view('admin/header');
		$this->load->view('admin/change_password');
		$this->load->view('admin/footer');
		
		
		
	}
	public function check_pass()
	{
		$pass=md5($this->input->post('pass'));
		$passw=$this->db->where('id',$this->session->userdata('userid'))->select('password')->get('admin')->row();
		
		
		//echo $pass;die;
		if($pass==$passw->password )
		{
			
			echo "Use Different Password";
		}
		else
			
			{
				echo " ";
			}
		
	}
	public function change_pass()
	
	{
		$password=md5($this->input->post('password'));
		$data=array('password'=>$password);
		if($this->db->where('id',$this->session->userdata('userid'))->update('admin',$data))
		{
			$this->session->set_flashdata('success',"Password Change Successfully");
			redirect('admin/change_password');
		}
		else
		{
			$this->session->set_flashdata('warning',"Error Occured");
			redirect('admin/change_password');
		}
		
	}


// Testimonials

	public function feedback(){
		// echo 'a';exit;
			$data = array();
			// $data['page_title'] = 'TTG || Add Testimonials';
			if(!empty($_POST)) {
				if(!empty($_FILES['image']['name'])){
					$config['upload_path']          = './uploads/feedback/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 6048;
					$config['max_width']            = 6048;
					$config['max_height']           = 4000;
					$config['encrypt_name']         = true;

					$this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('image')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error_msg', $error);
                        redirect(base_url('admin/feedback'));
                    }else{
                        $datas = $this->upload->data();
                        $data = array(
                            'name'              => $_POST['name'],
                            // 'designation'       => $_POST['designation'],
                            'feedback'          => $_POST['feedback'],
                            'image'             => 'uploads/feedback/'.$datas['file_name'],
                            'added_date'        =>         date('Y-m-j H:i:s')
                        );
                    }
				}
				$this->admin->insert_feedback($data);
				$this->session->set_flashdata('success_msg', ' You have added Successfully');
				redirect(base_url('admin/feedback_list'));
			}
			$this->load->view('admin/header');
			$this->load->view('admin/feedback', $data);
			$this->load->view('admin/footer');
    }
    public function feedback_list(){
			// $data['page_title']            = 'TTG || Testimonials List';
			$data['all_feedback_list'] 	   = $this->admin->get_all_feedback_List('feedback');
			$this->load->view('admin/header');
			$this->load->view('admin/feedback_list',$data);
			$this->load->view('admin/footer');
	}
	public function delete_feedback(){
			$this->admin->delete_feedback($this->uri->segment(3));
			$this->session->set_flashdata('success_msg', ' You have deleted Successfully');
			redirect(base_url('admin/feedback_list'));
	}
	public function add_story(){
		// echo 'a';exit;
			$data = array();
			// $data['page_title'] = 'TTG || Add Testimonials';
			if(!empty($_POST)) {
				if(!empty($_FILES['image']['name'])){
					$config['upload_path']          = './uploads/story/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 6048;
					$config['max_width']            = 6048;
					$config['max_height']           = 4000;
					$config['encrypt_name']         = true;

					$this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('image')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error_msg', $error);
                        redirect(base_url('admin/add_story'));
                    }else{
                        $datas = $this->upload->data();
                        $data = array(
                            'title'             => $_POST['title'],
                            'treatment'         => $_POST['treatment'],
                            'about'             => $_POST['about'],
                            'image'             => 'uploads/story/'.$datas['file_name'],
                            'added_date'        =>         date('Y-m-j H:i:s')
                        );
                    }
				}
				$this->admin->insert_story($data);
				$this->session->set_flashdata('success_msg', ' You have added Successfully');
				redirect(base_url('admin/story_list'));
			}
			$this->load->view('admin/header');
			$this->load->view('admin/add_story', $data);
			$this->load->view('admin/footer');
    }
    public function story_list(){
			// $data['page_title']            = 'TTG || Testimonials List';
			$data['all_story_list'] 	   = $this->admin->get_all_story_List('stories');
			$this->load->view('admin/header');
			$this->load->view('admin/story_list',$data);
			$this->load->view('admin/footer');
	}
	public function delete_story(){
			$this->admin->delete_story($this->uri->segment(3));
			$this->session->set_flashdata('success_msg', ' You have deleted Successfully');
			redirect(base_url('admin/story_list'));
	}

	public function add_doctor1(){
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
					redirect('admin/doctors', 'refresh');
				}
				else{
					$this->load->view('admin/header');
					$this->load->view('admin/add_doctor'); 
					$this->load->view('admin/footer');
					}
    }



















	public function show_profile()
	{
	$id=$this->input->post('idd');
	
	$data=$this->db->where('id',$id)->get('members')->row();	
		echo '<div class="card ">
			<div class="card-body">

		<!-- Page Content -->
		<div class="content">
		<div class="container-fluid">

		<div class="row">
			<div class="">
				<div class="invoice-content">
					<div class="invoice-item">
						<div class="row">
							<div class="col-md-4">
								<div class="invoice-logo">
									<img src="'.base_url().$data->image.'" onerror="this.onerror=null; this.src="http://cureu.in/assets/img/doctors/123.png"">
								</div>
							</div>
							<div class="col-md-8">
								<p class="invoice-details">
									<strong>Email:</strong>'.$data->email.'<br>
									<strong>Mobile No: &nbsp;</strong>'.$data->mobile_no.'<br>  
									<strong>Created At:&nbsp;</strong>'.$data->created_at.' 
								</p>
							</div>
						</div>
					</div>
					
					<!-- Invoice Item -->
					<div class="invoice-item">
						<div class="row">
							<div class="col-md-4">
								<div class="invoice-info">
									<p class="invoice-details invoice-details-two">
										'.$data->name.' <br>
										'.$data->address.'<br>
									</p>
								</div>
							</div> 
							<div class="col-md-8">
								<div class="invoice-info invoice-info2">
									<p class="invoice-details">
										Date Of Birth: '.$data->dob.' <br>
										Gender: '.$data->gender.'<br>
										Blood Group: '.$data->blood.'
									</p>
								</div> 
								
									
									<p class="invoice-details ml-5">
										State: '.$data->state.' <br>
										City: '.$data->city.'<br>
										 pincode: '.$data->pincode.'
									</p>
								
							</div>
						</div>
					</div>
					<!-- /Invoice Item -->
					
					<!-- Invoice Item -->
					
					<!-- /Invoice Item -->
					
					<!-- Invoice Item -->
					<!---<div class="invoice-item invoice-table-wrap">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="invoice-table table table-bordered">
										<thead>
											<tr>
												<th>Description</th>
												<th class="text-center">Quantity</th>
												<th class="text-center">VAT</th>
												<th class="text-right">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>General Consultation</td>
												<td class="text-center">1</td>
												<td class="text-center">$0</td>
												<td class="text-right">$100</td>
											</tr>
											<tr>
												<td>Video Call Booking</td>
												<td class="text-center">1</td>
												<td class="text-center">$0</td>
												<td class="text-right">$250</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-6 col-xl-4 ml-auto">
								<div class="table-responsive">
									<table class="invoice-table-two table">
										<tbody>
										<tr>
											<th>Subtotal:</th>
											<td><span>$350</span></td>
										</tr>
										<tr>
											<th>Discount:</th>
											<td><span>-10%</span></td>
										</tr>
										<tr>
											<th>Total Amount:</th>
											<td><span>$315</span></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>----->
					<!-- /Invoice Item -->
					
					<!-- Invoice Information---->
					<div class="other-info">
						<h4>Other information</h4>
						<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
					</div>
					<!-- /Invoice Information -->
					
				</div>
			</div>
		</div>

				</div>

			</div>

			</div>

			</div>';
			
	
	}
	
	public function show_profilee()
	{
	$id=$this->input->post('idd');
	
	$data=$this->db->where('id',$id)->get('doctors')->row();
	$dat=$this->db->query('SELECT  specialities.service_name FROM `doctor_specialities` 
							join specialities on specialities.id=doctor_specialities.specialites_id
							join doctors on doctors.id=doctor_specialities.doctor_id
							WHERE doctor_specialities.doctor_id='.$id.'')->result();
		
		echo '<div class="card ">
			<div class="card-body">
			

				
		<!-- Page Content -->
		<div class="content">
		<div class="container-fluid">

		<div class="row">
			<div class="">
				<div class="invoice-content">
					<div class="invoice-item">
						<div class="row">
							<div class="col-md-12">
								<div class="invoice-logo">
									<center><img src="'.base_url("assets/img/doctors/").$data->image.'" style="width:200px; height:200px" ></center>
								
									</div>
							</div>
							<div class="col-md-12">
								<p class="invoice-details">
									<strong>Email:</strong>'.$data->email.'<br>
									<strong>Mobile No: &nbsp;</strong>'.$data->mobile.' <br>
									<strong>Created At: &nbsp;</strong>'.$data->created_at.' 
								</p>
							</div>
						</div>
					</div>
					
					<!-- Invoice Item -->
					<div class="invoice-item">
						<div class="row">
							<div class="col-md-4">
								<div class="invoice-info">
									<p class="invoice-details invoice-details-two">
										'.$data->name.' <br>
										'.$data->address.'<br>
									</p>
								</div>
							</div> 
							<div class="col-md-8">
								<div class="invoice-info invoice-info2">
									<p class="invoice-details">
										Date Of Birth: '.$data->dob.' <br>
										Gender: '.$data->gender.'<br>
										
									</p>
								</div> 
								
									<p class="invoice-details ">
									Address :'.$data->address.'	
									</p>
								
							</div>
							<div class="col-md-12">
								<div class="invoice-info invoice-info2">
									<p class="invoice-details">
										
										Specialities:'.$data->about.', <br>
										
									</p>
									
								</div> 
								
							</div>
							<div class="col-md-12">
								<div class="invoice-info invoice-info2">
							<p class="invoice-details">
										
										Degree:'.implode(',',json_decode($data->degree)).', <br>
										
									</p>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- /Invoice Item -->
					
					<!-- Invoice Item -->
					
					<!-- /Invoice Item -->
					
					<!-- Invoice Item -->
					<!---<div class="invoice-item invoice-table-wrap">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="invoice-table table table-bordered">
										<thead>
											<tr>
												<th>Description</th>
												<th class="text-center">Quantity</th>
												<th class="text-center">VAT</th>
												<th class="text-right">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>General Consultation</td>
												<td class="text-center">1</td>
												<td class="text-center">$0</td>
												<td class="text-right">$100</td>
											</tr>
											<tr>
												<td>Video Call Booking</td>
												<td class="text-center">1</td>
												<td class="text-center">$0</td>
												<td class="text-right">$250</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-6 col-xl-4 ml-auto">
								<div class="table-responsive">
									<table class="invoice-table-two table">
										<tbody>
										<tr>
											<th>Subtotal:</th>
											<td><span>$350</span></td>
										</tr>
										<tr>
											<th>Discount:</th>
											<td><span>-10%</span></td>
										</tr>
										<tr>
											<th>Total Amount:</th>
											<td><span>$315</span></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>---->
					<!-- /Invoice Item -->
					
					<!-- Invoice Information---->
					
					<!-- /Invoice Information -->
					
				</div>
			</div>
		</div>

				</div>

			</div>

			</div>

			</div>';
			
	
	}


	
}
