<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');



class Doctor_modal extends CI_Model {



    public function __construct() {

        parent::__construct();

        

        // Load the database library

        $this->load->database();

        

        $this->userTbl = 'doctors';

    }



    /*

     * Get rows from the users table

     */

      function getlogin($params = array()){

        $query = $this->db->select('*')

        ->from($this->userTbl)

        ->where('mobile',$this->input->post('mobile'))

        ->get();

        $result = ($query->num_rows() > 0)?$query->row_array():false;

        return $result;

      }

     

     

     

    public function get_specialities(){

        $query = $this->db->get('specialities'); 

        return $query->result();

    }

	function get_appointment($id){

        $query = $this->db->get_where('members', array('doctor_id' => $id));  		

        return $query->result();

    }

    

    function getuserRows($email){

        $this->db->where('email', $email);

        $num_rows = $this->db->count_all_results($this->userTbl);

        //$query = $this->db->get_where($this->userTbl, array('mobile_no' => $phone));       

        return $num_rows;

    }

    

    function getuser($id){

        $query = $this->db->get_where($this->userTbl, array('id' => $id));       

        return $query->row();

    }

    

    function getUsers($params = array()){

        $this->db->select('*')

        ->from($this->userTbl);

        

        //fetch data by conditions

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

        if(!array_key_exists("created_at", $data)){

            $data['created_at'] = date("Y-m-d H:i:s");

        }

        if(!array_key_exists("upadted_at", $data)){

            $data['upadted_at'] = date("Y-m-d H:i:s");

        }

        $insert = $this->db->insert($this->userTbl, $data);

        //return the status

        return $insert?$this->db->insert_id():false;

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

    public function getscientific($id){

        $query = $this->db->get_where('scientific', array('member_id' => $id)); 

        return $query->result();

    }

    

    public function get_admin_scientific(){

        $query = $this->db->get('admin_scientific'); 

        return $query->result();

    }

    public function get_admin_calculator($cat_id){

        $this->db->select('*');

        $this->db->from('medical_calculator');

        $this->db->join('calculator_category', 'calculator_category.id = medical_calculator.cat_id','left');

        $this->db->where('cat_id',$cat_id);

         $query = $data['medical_calculator'] = $this->db->get();

        //$query = $this->db->get('medical_calculator '); 

        return $query->result();

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

    

    public function get_medicalcal(){

        $query = $this->db->get('calculator_category '); 

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

        <message>'.'Lucknowapi Registered Your Mobile No. is :'.$mobile.',Password is : '.$password.' Download App Link : http://esafesolution.com/lucknowapi/LucknowApi.apk</message>

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