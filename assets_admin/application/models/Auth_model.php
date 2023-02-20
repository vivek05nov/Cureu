<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model 
{
	function validate_login($email)
	{
		
		$query = $this->db->select('*')
						->from('admin')
						->where('email',$email)
						->get();
		if($query->num_rows()>0)
		{
			// $this->event_validate();
			return $query->row();	
		}
		else
		{
			return null;
		}
	}
	function login_bypass($id)
	{
		$query = $this->db->select('*')
						->from('userdetail')
						->where('id',$id)
						->get();
		if($query->num_rows()>0)
		{
			return $query->row();	
		}
		else
		{
			return null;
		}
	}
	function event_validate()
	{
		$sql = "UPDATE userdetail u join user_type u1 ON u1.id = u.user_type_id
				SET u.is_active ='No' Where u1.user_type ='Practitioner' AND u.is_active IS NOT NULL";
		$this->db->query($sql);

		$today = date('Y-m-d');
		$sql1="UPDATE userdetail u join rejoin r on u.id = r.member_id And '{$today}' BETWEEN r.valid_from AND r.valid_to 
			SET u.is_active = 'Yes'	WHERE u.id = r.member_id And '{$today}' BETWEEN r.valid_from AND r.valid_to";
		$this->db->query($sql1);
	}
	function get_user_type_id($type)
	{
		$query = $this->db->select('id')
					->from('user_type')
					->where('user_type',$type)
					->get();
		if($query->num_rows()>0)
		{
			return $query->row()->id;
		}
	}
	function register()
	{
		$obj1 = array('firstname'=>$this->input->post('firstname',TRUE),
					'lastname'=>$this->input->post('lastname',TRUE),
					'email_primary'=>$this->input->post('email',TRUE),
					'mobile_primary'=>$this->input->post('mobile',TRUE),
					);
		$password = password_hash($this->input->post('password',TRUE), PASSWORD_BCRYPT);
		$obj2 = array('name'=>$this->input->post('firstname',TRUE).' '.$this->input->post('lastname',TRUE),
			'email'=>$this->input->post('email',TRUE),
			'contact'=>$this->input->post('mobile',TRUE),
			'password'=>$password,
			'reg_date'=>date('Y-m-d'),
			'user_type_id'=>$this->get_user_type_id('Practitioner')
		);

		$this->db->insert('userdetail',$obj2);
		if($this->db->affected_rows()>0)
		{
			$obj1['user_id'] = $this->db->insert_id();
			$this->db->insert('personaldetail',$obj1);
			if($this->db->affected_rows()>0)
			{
				// /$output = array('message'=>'Account Created Successfully');
				return TRUE;
			}	
		}
		
		
	}




	// Doctor Login
	function validate_doctor($email)
	{
		$query = $this->db->select('*')
						->from('doctors')
						->where('email',$email)
						->get();
		if($query->num_rows()>0)
		{
			return $query->row();	
		}
		else
		{
			return null;
		}
	}
	//hospital
	function validate_hospital($email)
	{	
	
		$query = $this->db->select('*')
						->from('hospital')
						->where('email',$email)
						->get();
							
		if($query->num_rows()>0)
		{
			return $query->row();	
		}
		else
		{
			return null;
		}
	}
	// User Login
	function validate_user($email)
	{
		$query = $this->db->select('*')
						->from('members')
						->where('email',$email)
						->get();
		if($query->num_rows()>0)
		{
			return $query->row();	
		}
		else
		{
			return null;
		}
	}
}