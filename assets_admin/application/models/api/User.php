<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        
        $this->userTbl = 'members';
    }
    
	function getlogin($params = array()){
        $query = $this->db->select('*')
        ->from($this->userTbl)
        ->where('mobile_no',$this->input->post('mobile'))
        ->get();
        $result = ($query->num_rows() > 0)?$query->row_array():false;
        return $result;
      }
     
    function get_specialities(){
        $query = $this->db->get('specialities'); 
        return $query->result();
    }
	
	function get_specialities_list($id){
        $query = $this->db->query('select hospital.name as hospital_name, hospital.*, specialities.service_name, specialities.image as special_image from hospital join hospital_specialities_id on hospital_specialities_id.hospital_id=hospital.id join specialities ON specialities.id=hospital_specialities_id.hospital_specialities where specialities.id="'.$id.'"');
        return $query->result();
        
    }
	function get_doctor_special($id){
        $query = $this->db->query('select specialities.service_name from doctor_specialities
							join specialities on specialities.id=doctor_specialities.specialites_id
							where doctor_specialities.doctor_id="'.$id.'" limit 1');
        return $query->row(); 
    }
	function get_doctor_profile($id){
		$data['doctor']=$this->db->where('id',$id)->select('*')->from('doctors')->get()->row();
        $data['special']=$this->db->query('SELECT specialities.service_name,specialities.image as specialities_img from `doctor_specialities`
		join specialities on specialities.id=doctor_specialities.specialites_id  
		WHERE doctor_specialities.doctor_id ='.$id.'' )->result(); 
		$data['like']=count($this->db->get_where('likee', array('doc_id' =>$id ))->result());
		$data['review']=$this->db->where('doctor_id',$id)->select('*')->get('review')->result(); 
		return $data; 
	}

	function get_hospital_profile($id){
		$data['hospital']=$this->db->query('SELECT hospital.*, hotel.name as hotel_name,hotel.image as hotel_image,hos_gallery.image as gallery,pharmacy.name as pharmacy_name,pharmacy.image as pharmacy_image from hospital  
										 left join hotel on hotel.hospital_id=hospital.id 
										left join hos_gallery on hos_gallery.hospital_id=hospital.id
										left join pharmacy on pharmacy.hosptial_id=hospital.id
										where hospital.id="'.$id.'"')->row_array(); 
		$data['specialities']=$this->db->query('select specialities.service_name, specialities.image as special_image from hospital_specialities_id join specialities on specialities.id=hospital_specialities_id.hospital_specialities where hospital_specialities_id.hospital_id="'.$id.'" ')->result();
		$data['review']=$this->db->where('hospital_id',$id)->select('*')->get('review_hospital')->result();
		$data['like']=count($this->db->get_where('hospital_likee', array('hospital_id' =>$id ))->result()); 
		return $data; 
	} 
	
	
	
	
	
	
	public function get_notification(){
        $query = $this->db->get('notification');  
        return $query->result();
    } 
    
    function getuserRows($mobile){
        $this->db->where('mobile_no', $mobile);
        $num_rows = $this->db->count_all_results($this->userTbl);
        //$query = $this->db->get_where($this->userTbl, array('mobile_no' => $phone));       
        return $num_rows;
    }
    
    function getuser($mobile){
        $query = $this->db->get_where($this->userTbl, array('mobile_no' => $mobile));       
        return $query->row();
    }
	function get_doctor($id){
        $query = $this->db->query('SELECT doctors.*,specialities.service_name,specialities.id as special_id from doctors
									join doctor_specialities on doctors.id=doctor_specialities.doctor_id
									join specialities on specialities.id=doctor_specialities.specialites_id
									where specialities.id='.$id.'');
        return $query->result();
    }
	function get_appointment_list($id){
		$query = $this->db->select('a.id as id, a.status as status,a.created_at as created_at,a.member_id as mem_id, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, d.image as image, s.service_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointment a')
         ->join('members m', 'm.id = a.member_id')
         ->join('specialities s', 's.id = a.specialities_id')
         ->join('doctors d', 'd.id = a.doctor_id')
         ->where('m.id',$id)
		 ->get();      
         return $query->result(); 
    }
	
	function get_hospital_appointment_list($id){
		$query = $this->db->select('a.id as id, a.status as status,a.created_at as created_at,a.member_id as mem_id, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as doctor, d.image as image, a.appointment_date as appointment_date,a.specialities_name, a.appointment_time as appointment_time')
         ->from('appointmentt a')     
         ->join('members m', 'm.id = a.member_id')
         ->join('hospital d', 'd.id = a.hospital_id')
         ->where('m.id',$id)
		 ->get();	
         return $query->result(); 
    }
	
	
	
	
	
	
	
	
    
    function getUsers($params = array()){
        $this->db->select('*')
        ->from($this->userTbl);
        if(is_array($params) && array_key_exists("conditions",$params)){
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(is_array($params) && array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(is_array($params) && array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(is_array($params) && !array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if( is_array($params) && array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();    
            }elseif(is_array($params) && array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->row_array():false;
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():false;
            }
        }

        // return fetched data
        return $result;
    }
    
    /*
     * Insert user data
     */
    public function insert($data){
        //add created and modified date if not exists
        if(!array_key_exists("created_at", $data)){
            $data['created_at'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("updated_at", $data)){
            $data['updated_at'] = date("Y-m-d H:i:s");
        }
       // print_r($data);die;
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
		$last_id = $this->db->insert_id();
		
		$user_id = 'USER'.$this->db->insert_id();
		$data1=array(
				'user_id'=>$user_id
				); 
		$this->db->where('id', $last_id);
		$this->db->update('members', $data1);
        //echo $this->db->last_query(); die;
        //return the status
        return $last_id;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){
        //update user data in users table
        $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
        
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete('users',array('id'=>$id));
        //return the status
        return $delete?true:false;
    }
   
    public function get_category(){
        $query = $this->db->get('category '); 
        return $query->result();
    }
    
    public function get_subcategory($cat_id){
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->join('category', 'category.id = sub_category.cat_id','left');
        $this->db->where('cat_id',$cat_id);
        $query = $data['sub_category'] = $this->db->get();
        return $query->result();
    }
    
   
    public function send_reg($password,$userData)
    {
        $email = $userData['email'];
        $mobile = $userData['mobile_no'];
        // echo $email;
        // echo $password;
        // die;
        $xml_data ='<?xml version="1.0"?>
        <parent>
        <child>
        <user>EsafeS</user>
        <key>d5a7374c54XX</key>
        <mobile>'.$mobile.'</mobile>
        <message>'.'Cureu Registered Your Mobile No. is :'.$mobile.',Password is : '.$password.' Download App Link : http://cureu.in</message>
        <accusage>1</accusage>
        <senderid>LUCKTI</senderid>
        </child>
        </parent>';
        
        $URL = "http://sms.esafesolution.com/submitsms.jsp"; 
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output; 
    }
    
    public function send_otp($otp,$mobile)
    {
        $xml_data ='<?xml version="1.0"?>
        <parent>
        <child>
        <user>EsafeS</user>
        <key>d5a7374c54XX</key>
        <mobile>'.$mobile.'</mobile>
        <message>'.'Your OTP  is: '.$otp.' Do Not share anyone.</message>
        <accusage>1</accusage>
        <senderid>LUCKTI</senderid>
        </child>
        </parent>';
        
        $URL = "http://sms.esafesolution.com/submitsms.jsp"; 
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output; 
    }
    
     function forgot_password()
	   {
        $mobile = $this->input->post('mobile');
        $userotp = $this->input->post('otp');
        $newpassword = $this->input->post('newpassword');
        $otp  = $this->session->userdata('otp');
        //echo $otp; die;
           $new_password = password_hash($newpassword,PASSWORD_BCRYPT);
	       $query = $this->db->select('*')
	                        ->from('members')
	                        ->where('mobile_no',$mobile)
	                       ->get();
	       if($query->num_rows()>0)
	       {
	            $this->db->set('password',$new_password);
	            $this->db->where('mobile_no',$mobile);
	            $this->db->update('members');
	            if($this->db->affected_rows()>0)
	            {
	                return true;
	            }
	            else
	            {
	                return false;
	            }
	       }
	       else
	       {
	           return false;
	       }
	      
	   }
       
       function change_password()
	   {
        $id = $this->input->post('id');
       // $userotp = $this->input->post('old_password');
        $newpassword = $this->input->post('newpassword');
        //echo $otp; die;
           $new_password = password_hash($newpassword,PASSWORD_BCRYPT);
	       $query = $this->db->select('*')
	                        ->from('members')
	                        ->where('id',$id)
	                       ->get();
	       if($query->num_rows()>0)
	       {
	            $this->db->set('password',$new_password);
	            $this->db->where('id',$id);
	            $this->db->update('members');
	            if($this->db->affected_rows()>0)
	            {
	                return true;
	            }
	            else
	            {
	                return false;
	            }
	       }
	       else
	       {
	           return false;
	       }
	      
	   }

}