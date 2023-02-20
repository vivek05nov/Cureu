<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Chat extends REST_Controller {
    public function __construct() { 
        parent::__construct();
        // Load the user model
     //   $this->load->model(array('api/doctor_modal'=>'doctor_modal'));
    }
    
    public function chat_member_post()  //  show all member on left side.
	{
	    if($this->token() == true)
		{
			$main_user_id = $this->input->post('patient_id'); 
			$query =  $this->db->query("select * from inbox join 
				(select user, max(date) m from ( (select id, receiver_id user, date from inbox where sender_id='$main_user_id' )
				 union 
				(select id, sender_id user, date from inbox where receiver_id='$main_user_id') ) t1 group by user) t2 
				on 
				((sender_id='$main_user_id' and receiver_id=user) or (sender_id=user and receiver_id='$main_user_id')) and (date = m) order by id desc");
			if($query->num_rows() > 0 )
			{
				$this->response(['status' => TRUE,'data'=> $query->result()], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(['status' => FALSE,'message'=> 'No Chat Found.'], REST_Controller::HTTP_OK);
			}
		}
	}
	
	public function my_chat_post()
	{
		if($this->token() == true)
		{
			$mobile =  $this->input->post('patient_id'); //USER41
		   
			$sender_id =   $this->input->post('doctor_id'); // 'doctor13'; // Doctor ID doctor_id
			
			$name =  $this->db->query("select name from doctors where user_id='$sender_id'")->row('name');
			
			$name = '<b style="color:#05728f">'.$name.'</b>';
			
			$query =  $this->db->query("SELECT doctors.name as first, inbox.sender_id as sender_id, inbox.message as message, TIME(inbox.date) as time, DATE(inbox.date) as date,  doctors.image as picture FROM `inbox` left join doctors on inbox.sender_id = doctors.mobile WHERE inbox.receiver_id ='$mobile' and inbox.sender_id='$sender_id' or inbox.receiver_id ='$sender_id' and inbox.sender_id='$mobile' ORDER by inbox.id asc");
			if($query->num_rows() > 0 )
			{
				$this->response(['status' => TRUE,'data'=> $query->result()], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(['status' => FALSE,'message'=> 'No Records Found.'], REST_Controller::HTTP_OK);
			}
		}	
	}
	
	public function doctor_information_post() //get doctor detail from chat_member api by passing user parameter detail
	{
		if($this->token() == true)
		{
			$new_user = $this->input->post('doctor_id');
			$query = $this->db->select('*')->from('doctors')->where('user_id',$new_user)->get(); 
			if($query->num_rows() > 0 )
			{
				$this->response(['status' => TRUE,'data'=> $query->row()], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(['status' => FALSE,'message'=> 'No Records Found.'], REST_Controller::HTTP_OK);
			}
		}	
	}
	
	public function patient_information_post() //get doctor detail from my_chat api by passing user parameter detail
	{
		if($this->token() == true)
		{
			$new_user = $this->input->post('patient_id');
			$query = $this->db->select('*')->from('members')->where('user_id',$new_user)->get(); 
			if($query->num_rows() > 0 )
			{
				$this->response(['status' => TRUE,'data'=> $query->row()], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(['status' => FALSE,'message'=> 'No Records Found.'], REST_Controller::HTTP_OK);
			}
		}
		
	}
	
	public function  send_message_post()
	{
		if($this->token() == true)
		{
			$sender_id =  $this->input->post('patient_id');
			$receiver_id =  $this->input->post('doctor_id');
			$message =  $this->input->post('message');
			
			$data = array(
					 'sender_id'=>$sender_id,
					 'receiver_id'=>strtolower($receiver_id),
					 'message'=>$message,
					 'date'=>date("Y-m-d H:i:s"),
					 'status'=>0,
					 );
			$this->db->insert('inbox',$data); 
			
			if( $this->db->affected_rows() > 0){
				$this->response(['status' => TRUE,'message'=> 'Sent Successfully.'], REST_Controller::HTTP_OK);
			}
			else{
				$this->response(['status' => FALSE,'message'=> 'Try Again.'], REST_Controller::HTTP_OK);
			} 
		}      
    }
	
	public function token()
	{
		if($this->input->post('token') == 'afsdf76a5d78fyuhj4r87tya8d7sghiu8743')
		{
			return true;
		} 
		else {
			$this->response(['status' => FALSE,'message'=> 'Authentication Failed.'], REST_Controller::HTTP_OK);
		}
	}
	
	
   
}