<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Hospital_model extends CI_Model 
{
    
    function get_upcoming_appointment($id)
    {
		$today = date('Y-m-d');
		 $today=str_replace('-"', '/', $today);
		 $toda=date("d/m/Y", strtotime($today));  
		 
        $this->db->select('a.id as id, a.status as status,a.specialities_name as service_name, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as hospital, a.appointment_date as appointment_date, a.appointment_time as appointment_time')
         ->from('appointmentt a')
         ->join('members m', 'm.id = a.member_id')
         ->join('hospital d', 'd.id = a.hospital_id')
		 ->order_by("appointment_date desc")
	     ->where('a.hospital_id',$id)
		 ->where('a.appointment_date>',$toda);
		
			//$this->db->get()->result();
			//echo $this->db->last_query();die;
           return $this->db->get()->result(); 
    }
	
	
	function get_today_appointment($id)
    {
		$today = date('Y-m-d');
		 $today=str_replace('-"', '/', $today);
		 $toda=date("d/m/Y", strtotime($today));
        $this->db->select('a.id as id, a.status as status, m.name as customer,m.mobile_no as mobile, m.email as email, m.address as address, d.name as hospital, a.specialities_name as specialities, a.appointment_date as appointment_date, a.appointment_time as appointment_time') 
         ->from('appointmentt a')
         ->join('members m', 'm.id = a.member_id')
         ->join('hospital d', 'd.id = a.hospital_id')
		 ->where('a.hospital_id',$id)
		 ->where('a.appointment_date',$toda);  
			//$this->db->get()->result();
			//echo $this->db->last_query();die;
			
           return $this->db->get()->result(); 
    }
    
   /* function set_serviceupload_options()
    {
         //upload an image options
        $config = array();
        $config['upload_path'] ='./assets/service_details/service_image/';
        $config['allowed_types'] ='gif|jpg|png|JPG|JPEG|jpeg|PNG';
        $config['encrypt_name'] =true;
        return $config;
    }
    function get_all_services()
    {
        $q= $this->db->get('services');
        return $q->result();
    }
    function add_users()
    {
        $posted_data = $this->input->post(null,true);
        $mobile = $this->input->post('phone');
        $password = $this->input->post('password',TRUE);
        $password_hash = password_hash($password,PASSWORD_BCRYPT);
         if($this->input->post('member_s_dasignation') == '' || $this->input->post('member_s_dasignation') == null){
           $msd = 0;
       }else{
           $msd = $this->input->post('member_s_dasignation');
       }
        //return $password_hash;
        $file = $this->input->post('file_name');
        
        $config = array(
        'upload_path' => "./assets/users/",
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
            'title'=> $this->input->post('title'),
            'firstname' =>$this->input->post('firstname'),
            'middlename' =>$this->input->post('middlename'),
            'lastname' =>$this->input->post('lastname'),
            'mobile_no' =>$this->input->post('phone'),
            'email' =>$this->input->post('email'),
            'image' =>$image,
            'branch_id' =>$this->input->post('branch'),
            'number_allotted' =>$this->input->post('number_allotted'),
            'password' =>$password_hash,
            'lko_chapter_id'=>$this->input->post('lko_chapter_id'),
            'member_type'=>$this->input->post('member_type'),
            'address'=>$this->input->post('address'),
            'state'=>$this->input->post('state'),
            'pincode'=>$this->input->post('pincode'),
            'city'=>$this->input->post('city'),
            'designation'=>$this->input->post('designation'),
            'member_dasignation'=>$this->input->post('member_dasignation'),
            'member_s_dasignation'=>$msd,
            'fax'=>$this->input->post('fax')
          );
        $insert = $this->db->insert('members',$data);
        if(!empty($insert)){
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
        }
        return 1;
    }
    function send_message($password,$mobile){
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
    
    function set_upload_options()
   {   
      //  upload an image options
      $config = array();
      $config['upload_path'] = './assets/service_details/user_image/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']      =   "5000";
      $config['max_width']     =   "5000";
      $config['max_height']    =   "25000";
      $config['overwrite']     = FALSE;
      $config['encrypt_name']  = TRUE;

      return $config;
   }
    
        function user_query()  
      {  
           $table = "users";  
           $select_column = array("id", "firstname", "lastname","email","contact","role","profile_pic");  
           $order_column = array(null, "firstname", "lastname", "email","contact","role", null);
           $this->db->select($select_column);  
           $this->db->from($table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("firstname", $_POST["search"]["value"]);  
                $this->db->or_like("lastname", $_POST["search"]["value"]);
                $this->db->or_like("email", $_POST["search"]["value"]);
                $this->db->or_like("contact", $_POST["search"]["value"]);
                $this->db->or_like("role", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      } 
    
    function make_user_datatables(){
           $this->user_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
    }
    function get_all_user_data()
    {
           $this->db->select("*");  
           $this->db->from("users");  
           return $this->db->count_all_results();
    }
    
    function get_filtered_user_data()
    {
           $this->user_query();  
           $query = $this->db->get();  
           return $query->num_rows();   
    }
    
    function update_user()
    {
        $id = $this->input->post('id');
        $res= $this->db->get_where('members',array('id'=>$id))->row();
       // die($res->image);
       if($this->input->post('member_s_dasignation') == '' || $this->input->post('member_s_dasignation') == null){
           $msd = 0;
       }else{
           $msd = $this->input->post('member_s_dasignation');
       }
        $config = array(
        'upload_path' => "./assets/users/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file_name'))
        { 
            //$data['imageError'] =  $this->upload->display_errors();
            //print_r($data['imageError']);
            $image = $res->image;
        }
        else
        {
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
           // echo $image;
        }
        $data = array(
            'title'=> $this->input->post('title'),
            'reg_no'=> $this->input->post('reg_no'),
            'membership_no'=> $this->input->post('membership_no'),
            'firstname' =>$this->input->post('firstname'),
            'lastname' =>$this->input->post('lastname'),
            'mobile_no' =>$this->input->post('phone'),
            'email' =>$this->input->post('email'),
            'image' =>$image,
            'branch_id' =>$this->input->post('branch'),
            'number_allotted' =>$this->input->post('number_allotted'),
            'lko_chapter_id'=>$this->input->post('lko_chapter_id'),
            'member_type'=>$this->input->post('member_type'),
            'address'=>$this->input->post('address'),
            'state'=>$this->input->post('state'),
            'pincode'=>$this->input->post('pincode'),
            'city'=>$this->input->post('city'),
            'designation'=>$this->input->post('designation'),
            'member_dasignation'=>$this->input->post('member_dasignation'),
            'member_s_dasignation'=>$msd
          );
        // echo "<pre>";
        // print_r($data);die;
        $this->db->where('id',$id);
        $this->db->update('members', $data);
        //echo $this->db->last_query();die;
        return 1;
    }
    
    function delete_service()
    {
       $id = $this->input->post('id',true);
       $this->db->where('id',$id)->delete('services');
       if($this->db->affected_rows()>0)
       {
           $output = array("msg"=>"Service has been deleted","type"=>"success","result"=>true);
           return $output;
       }
       else
       {
           $output = array("msg"=>"Some error occured !! Please try again","type"=>"danger","result"=>false);
           return $output;
       }
    }
    function servicesupdate()
    {
        $post = $this->input->post(null,true);
	    $service_name = $post['service_name1'];
	    $service_amount = $post['service_amount1'];
	    $description = $post['description1'];
	    $discount = $post['discount1'];
	    $id = $post['serviceid'];
	    $oldimage = $post['old_images'];
	    
	    if($service_name=='' || $service_name==null)
	    {
	        $output = array("msg"=>"Please Enter Service Name","type"=>"error","result"=>false);
	        echo json_encode($output);
	        die();
	    }
	    else
	    {
	        $q = $this->db->get_where('services',['name'=>$service_name,'id!='=>$id]);
	       // echo json_encode($this->db->last_query());
	       // die();
	        if($q->num_rows()>0)
	        {
	           $output = array("msg"=>"Service Name is already added","type"=>"error","result"=>false);
    	        echo json_encode($output);
    	        die();    
	        }
	    }
	    
	    if($service_amount=='' || $service_amount==null)
	    {
	        $output = array("msg"=>"Please Enter Service Amount","type"=>"error","result"=>false);
	        echo json_encode($output);
	        die();
	    }
	    
	    if(isset($_FILES['service_image']) && !empty($_FILES['service_image']['name']))
	    {
	            $this->load->library('upload');
                $dataInfo = array();
                 
                 $files = $_FILES;
                $cpt = count($_FILES['service_image']['name']);
                for($i=0; $i<$cpt; $i++)
                {           
                    $_FILES['service_image']['name']= $files['service_image']['name'][$i];
                    $_FILES['service_image']['type']= $files['service_image']['type'][$i];
                    $_FILES['service_image']['tmp_name']= $files['service_image']['tmp_name'][$i];
                    $_FILES['service_image']['error']= $files['service_image']['error'][$i];
                    $_FILES['service_image']['size']= $files['service_image']['size'][$i];    
            
                    $this->upload->initialize($this->set_serviceupload_options());
                    $this->upload->do_upload('service_image');
                    $datainfo[] = $this->upload->data();
                }
                
                      $file_name = array_column($datainfo,'file_name');
                      $file_name= json_encode(array_merge($file_name,$oldimage));
                    
                    // echo json_encode($file_name);
                    // die();
                       
                       $arr = array("name"=>$service_name,"amount"=>$service_amount,"description"=>$description,"discount"=>$discount,"image"=>$file_name,"status"=>'1');
                       
                       $this->db->where('id',$id)->update('services',$arr);
                       if($this->db->affected_rows()>0)
                       {
                           $output = array("msg"=>"Service Detailas has been updated","type"=>"success","result"=>true);
                           echo json_encode($output);
                           die();
                       }
                       else
                       {
                           $output = array("msg"=>"Some error occured !! Please try again","type"=>"danger","result"=>false);
                           echo json_encode($output);
                           die();
                       }
	    }
	    else
	    {
	          $file_name = json_encode($old_images);
	          $arr = array("name"=>$service_name,"amount"=>$service_amount,"description"=>$description,"discount"=>$discount,"image"=>$file_name,"status"=>'1');
                       
                       $this->db->where('id',$id)->update('services',$arr);
                       if($this->db->affected_rows()>0)
                       {
                           $output = array("msg"=>"Service Detailas has been updated","type"=>"success","result"=>true);
                           echo json_encode($output);
                           die();
                       }
                       else
                       {
                           $output = array("msg"=>"Some error occured !! Please try again","type"=>"danger","result"=>false);
                           echo json_encode($output);
                           die();
                       }
	    }
    }
    
    function booking_query()
    {
        $select_column = $this->db->select('u.*,b.*,b.status as booking_status,s.name')
                                  ->from('users u')
                                  ->join('booking b','b.userid=u.id')
                                  ->join('services s','s.id=b.serviceid')
                                  ->where('b.status !=','Assigned');
         $order_column = array(null,'u.firstname','u.lastname','u.contact','u.email','b.paitientname','b.age','b.gender','b.problem','s.name',null);
        if(isset($_POST['search']['value']))
        {
            $this->db->group_start();
            $this->db->like('u.firstname',$_POST['search']['value']);
            $this->db->or_like('u.lastname',$_POST['search']['value']);
            $this->db->or_like('u.contact',$_POST['search']['value']);
            $this->db->or_like('u.email',$_POST['search']['value']);
            $this->db->or_like('b.paitientname',$_POST['search']['value']);
            $this->db->or_like('b.age',$_POST['search']['value']);
            $this->db->or_like('b.gender',$_POST['search']['value']);
            $this->db->or_like('b.problem',$_POST['search']['value']);
            $this->db->or_like('s.name',$_POST['search']['value']);
            $this->db->group_end();
        }
        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order'][0]['column']],$_POST['order'][0]['dir']);
            
        }
        else
        {
            $this->db->order_by('b.id','desc');
        }
        

    }
    
    function fetch_booking()
    {
        $this->booking_query();
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'],$_POST['start']);
        }
        $query=  $this->db->get();
        return $query->result();
    }
    function total_booking_count()
    {
        $this->db->select('u.*,b.*,b.status as booking_status')
                                  ->from('users u')
                                  ->join('booking b','b.userid=u.id')
                                  ->where('b.status !=','Assigned');
        return $this->db->count_all_results();
    }
    function records_filtered_booking()
    {
        $this->booking_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_active_doctors()
    {
        $q =$this->db->get_where('users',['is_active'=>'Yes','role'=>'Doctor']);
        return $q->result();
    }
    function assign_doctor()
    {
        $bookingid = $this->input->post('bookingid',TRUE); 
        $doctorid = $this->input->post('doctorid',TRUE);
        $q = $this->db->get_where('assigned_booking',['booking_id'=>$bookingid]);
        if($q->num_rows()>0)
        {
            $this->db->where(['booking_id'=>$bookingid])->update('assigned_booking',['doctor_id'=>$doctorid]);
              if($this->db->affected_rows()>0)
                {
                    $output = array('msg'=>'Doctor has been assigned','type'=>'success');
                }
                else
                {
                    $output = array('msg'=>'Some error occured !! Please try again','type'=>'error');
                }
                return $output;
        }
        else
        {
            $this->db->insert('assigned_booking',['doctor_id'=>$doctorid,'booking_id'=>$bookingid,'status'=>'Initiate']); 
             if($this->db->affected_rows())
            {
                $this->db->where('id',$bookingid)->update('booking',['status'=>'Assigned']);
                if($this->db->affected_rows()>0)
                {
                    $output = array('msg'=>'Doctor has been assigned','type'=>'success');
                }
                else
                {
                    $output = array('msg'=>'Some error occured !! Please try again','type'=>'error');
                }
                return $output;
            }
        }  
    }
    function get_branch()
    {
        $q=$this->db->get('branch');
        return $q->result();
    }
    function get_member()
    {
        $q=$this->db->get('members');
        return $q->result();
    }*/
	public function refer_hos()
	{ 
		 
		 if($this->input->post()!=null)
		 {
			
		 $data=array('patient_id'=>$this->input->post('hidden_member'),
					'hos_id'=>$this->input->post('hidden_hos'),
					'hos_name'=>$this->input->post('hos_refer'),
					'refer_hos'=>$this->input->post('refer_to'),
					'created_at'=>date('Y-m-d h:i:s'),
					'status'=>1
					); 
			
		$this->db->insert('hospital_refer',$data);
			return true;
		 }
		 else
		 {
			 return false;
		 }
	}
	 
}