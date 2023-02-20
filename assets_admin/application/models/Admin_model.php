<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model 
{
   
	public function get_plan($plan_id)
	{ 
		$res= $this->db->get_where('plan',array('id'=>$plan_id));
		//echo $this->db->last_query();die;
		echo  json_encode($res->row());
	}
	function add_blog()
	{
		
		
		$posted_data = $this->input->post(null,true);
        $file = $this->input->post('blog_image'); 
        $config = array(
        'upload_path' => "./assets/img/blog/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('blog_image'))
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
            'blog_name' =>$this->input->post('blog_name'),
            'blog_image' =>$image,
			'blog_description'=>$this->input->post('blog_description'),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );
        $insert = $this->db->insert('blog',$data);
        return 1;
	}
	public function get_city($state_id)
	{ 
		$res= $this->db->get_where('cities',array('state_id'=>$state_id));
		echo  json_encode($res->result()); 
	} 
	public function get_area($city_id)
	{ 
		$res= $this->db->get_where('area',array('city_id'=>$city_id));
		echo  json_encode($res->result());
	} 
		public function get_special()
	{ 
		$res= $this->db->get('specialities');
		echo  json_encode($res->result());
	} 
    
	function add_doctor()
    {
		$last_id = $this->db->query("SELECT id FROM doctors ORDER BY id DESC LIMIT 1")->row();
		//echo "vivek";
		
		if(empty($last_id))
		{
			$u_id="0000". 1;// echo $u_id;die;
		}
		else
		{
		$u_id  = "0000" .($last_id->id + 1);
		}
		
        $posted_data = $this->input->post(null,true);
        $mobile = $this->input->post('mobile');
        $password = md5($this->input->post('password',TRUE));
        //$password_hash = password_hash($password,PASSWORD_BCRYPT);
        // $file = $this->input->post('file_name'); 
        // $config = array(
        // 'upload_path' => "./assets/user/",
        // 'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        // 'encrypt_name' => TRUE
        // );
        // $this->load->library('upload', $config);
        // if(!$this->upload->do_upload('file_name'))
        // { 
            // $data['imageError'] =  $this->upload->display_errors();
            // print_r($data['imageError']);
        // }
        // else
        // {
            // $imageDetailArray = $this->upload->data();
            // $image =  $imageDetailArray['file_name'];
        // }
           $data = array(
            'user_id' =>$u_id,
            'name' =>$this->input->post('name'),
            'dob' =>$this->input->post('dob'),
            'gender' =>$this->input->post('gender'),
            'mobile' =>$this->input->post('mobile'),
            'email' =>$this->input->post('email'),
            //'image' =>$image,
            'created_at' =>date('Y-m-d H:i:s'),
            'password' =>$password, 
            'address'=>$this->input->post('address'),
            'status'=>1
          );
        $insert = $this->db->insert('doctors',$data);
        return 1;
    }
    function add_users()
    {
        $posted_data = $this->input->post(null,true);
        $mobile = $this->input->post('phone');
        $password = md5($this->input->post('password',TRUE));
        //$password_hash = password_hash($password,PASSWORD_BCRYPT);
         
        //return $password_hash;
        // $file = $this->input->post('file_name');
        
        // $config = array(
        // 'upload_path' => "./assets/users/",
        // 'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        // 'encrypt_name' => TRUE
        // );
        // $this->load->library('upload', $config);
        // if(!$this->upload->do_upload('file_name'))
        // { 
            // $data['imageError'] =  $this->upload->display_errors();
            // print_r($data['imageError']);
        // }
        // else
        // {
            // $imageDetailArray = $this->upload->data();
            // $image =  $imageDetailArray['file_name'];
        // }
           $data = array(
            'specialities'=> $this->input->post('specialities'),
            'name' =>$this->input->post('name'),
            'mobile_no' =>$this->input->post('phone'),
            'email' =>$this->input->post('email'),
            'gender' =>$this->input->post('gender'),
            'age' =>$this->input->post('age'),
           // 'image' =>$image,
            'password' =>$password,
            'address'=>$this->input->post('address'),
            'state'=>$this->input->post('state'),
            'pincode'=>$this->input->post('pincode'),
            'city'=>$this->input->post('city') 
          );
		  //print_r($data);die;
        $insert = $this->db->insert('members',$data);
        return 1;
    }
	function add_banner()
    {
		$data=array();
        $posted_data = $this->input->post(null,true);
        $file = $_FILES['banner_image']['name'];
			//print_r($file);die; 
		if(!empty($file))
		{
			$uploadPath = 'assets/img/banner/';  
			$config['upload_path'] = $uploadPath; 
			$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv"; 
			$config['encrypt_name']=true;
			//$config['max_size']    = '100'; 
			//$config['max_width'] = '1024'; 
			//$config['max_height'] = '768'; 
			 
			// Load and initialize upload library 
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('banner_image'))
			{ //echo "ok"; die;
				$data['imageError'] =  $this->upload->display_errors();
				print_r($data['imageError']);
			}
			else
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}
			$data=array('banner_name'=>$this->input->post('banner_name'),
						'banner_type'=>$this->input->post('banner_type'),
						'image'=>$image,
						'created_at'=>date('y-m-d'),
						'status'=>1
						); 
		}
        $insert = $this->db->insert('banner',$data);
        return 1;
    }
	function add_package()
    {
		/////
		$posted_data = $this->input->post(null,true);
       $file = $_FILES['package_image']['name'];
	   
		if($file!='')
		{
			
        $config = array(
        'upload_path' => "assets/img/package/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('package_image'))
        { //echo "ok"; die;
            $data['imageError'] =  $this->upload->display_errors();
            print_r($data['imageError']);
        }
        else
        {
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }
			// else{
				// $image = $this->input->post('file');
			// }
       
		
		////
		$data = array(
			'name' =>$this->input->post('name'),
			'months' =>$this->input->post('months'),
			'amount' =>$this->input->post('amount'),
			'image' => $image,
			'created_at' =>date('Y-m-d H:i:s'),
			'status'=>1
		);
        $insert = $this->db->insert('package',$data);
        return 1;
    }
	}
	function add_package_hospital()
    {
		$data = array(
			'name' =>$this->input->post('name'),
			'status'=>1
		);
        $insert = $this->db->insert('package_for_hospital',$data);
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
       // $res= $this->db->get_where('members',array('id'=>$id))->row();
       // die($res->image);
	   $data= array();
	   $config['upload_path'] = 'assets/img/patients/';
	  
	   
	     $config['allowed_types'] = 'gif|jpg|jpeg|png';
			// $config['overwrite']  = TRUE;
			// $config['max_size']   = "2048000"; 
			// $config['max_height'] = "1024";
			// $config['max_width']  = "1024";
    
         $this->load->library('upload', $config);
			
			if(!empty($this->upload->do_upload('file_name'))){
					  
				$ll = $this->upload->data()['file_name'];
					   if($ll != ''){
						   $l = 'assets/img/patients/'.$ll ;   
						   $image = $l;
						   $data = array(
					'name' =>$this->input->post('firstname'),
					'mobile_no' =>$this->input->post('phone'),
					'dob'=>$this->input->post('dob'),
					'image'=>$image,
					'blood'=>$this->input->post('blood'),
					'email' =>$this->input->post('email'),
					'gender' =>$this->input->post('gender'),
					//'age' =>$this->input->post('age'),
					'address'=>$this->input->post('address'),
					'state'=>$this->input->post('state'),
					'pincode'=>$this->input->post('pincode'),
					'city'=>$this->input->post('city'),
				  );
				  
						   
					   }
            }
			else
			{
				$data = array(
            'name' =>$this->input->post('firstname'),
            'mobile_no' =>$this->input->post('phone'),
			'dob'=>$this->input->post('dob'),
			//'image'=>$image,
			'blood'=>$this->input->post('blood'),
            'email' =>$this->input->post('email'),
            'gender' =>$this->input->post('gender'),
            //'age' =>$this->input->post('age'),
            'address'=>$this->input->post('address'),
            'state'=>$this->input->post('state'),
            'pincode'=>$this->input->post('pincode'),
            'city'=>$this->input->post('city'),
          );
			}
	     
        
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
    }
	function get_hospital()
    {
        $q=$this->db->get('specialities');
        return $q->result();
    }
	function update_specialities()
    {
        $id = $this->input->post('id');
        if(!empty($_FILES['user_file']['name'])){
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
		}else{
			$image = $this->input->post('file');
		}
        $data = array(
            'service_name' => $this->input->post('service_name'),
            'desc' => $this->input->post('desc'),
            'image' => $image,
            'upadted_at' => date('Y-m-d H:i:s'),
			'status' => 1
        );
        // echo "<pre>";
        // print_r($data);die;
        $this->db->where('id',$id);
        $this->db->update('specialities', $data);
        //echo $this->db->last_query();die;
        return 1;
    }
	function update_doctor()
    {
        $id = $this->input->post('id');
        $data = array(
            'specialities' =>$this->input->post('specialities'),
            'name' =>$this->input->post('name'),
            'dob' =>$this->input->post('dob'),
            'gender' =>$this->input->post('gender'),
            'mobile' =>$this->input->post('phone'),
            'aadhaar' =>$this->input->post('aadhaar'),
            'blood_group' =>$this->input->post('blood_group'),
            'email' =>$this->input->post('email'),
            //'image' =>$image,
            'upadted_at' =>date('Y-m-d H:i:s'),
            'address'=>$this->input->post('address')
          );
        // echo "<pre>";
        // print_r($data);die;
        $this->db->where('id',$id);
        $this->db->update('doctors', $data);
        return 1;
    }
	function add_contact()
	{
		$this->db->insert('contact');
	}
	function edit_blog($id)
	{
		$row=$this->db->select('*')
				  ->where('id',$id)
				  ->get('blog');
		return $row->row();
	}
	function Update($id)
	{
	  $posted_data = $this->input->post(null,true);
       $file = $_FILES['update_image']['name'];
	   
		if($file!='')
		{
        $config = array(
        'upload_path' => "./assets/img/blog/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('update_image'))
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
            'blog_name' =>$this->input->post('Update_name'),
            'blog_image' =>$image,
			'blog_description'=>$this->input->post('update_description'),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );
				$this->db->where('id',$id);
        $insert = $this->db->update('blog',$data);
        return 1;
		}
		else{
			$file=$this->input->post('update_img');
			$data = array(
            'blog_name' =>$this->input->post('Update_name'),
            'blog_image' =>$file,
			'blog_description'=>$this->input->post('update_description'),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );
			return 1;
			
			
			
		}
		
				 
    }
	function delete_blog($id)
	{
		$this->db->query("delete  from blog where id='".$id."'");
	}
	
	function delete_package($id)
	{
		$this->db->query("delete  from package where id='".$id."'");
	}
	function delete_banner($id)
	{
		$this->db->query("delete  from banner where id='".$id."'");
	}
	function delete_area($id)
	{
		$this->db->query("delete  from area where id='".$id."'");
	}
	function delete_viewspecialities($id)
	{
		$this->db->query("delete  from specialities where id='".$id."'");
	}
	
	function add_hospital()
	{
		// print_r(json_encode($this->input->post('field_name')));exit;
		//$posted_data = $this->input->post(null,true); 
		
        $file = $_FILES['user_image']['name']; 
		if(!empty($file))
		{
		
          $config = array(
        'upload_path' => "assets/img/hospital/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('user_image'))
        { 
            $data['imageError'] =  $this->upload->display_errors();
            print_r($data['imageError']); 
        }
        else
        {
			$imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }
		
		$uploadPath = 'assets/img/doctors/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|csv"; 
					$config['encrypt_name']=true;
                    $this->load->library('upload', $config);
		if(!empty($_FILES['doctor_img']['name']) && count(array_filter($_FILES['doctor_img']['name'])) > 0){ 
                $filesCount = count($_FILES['doctor_img']['name']);
				
				    
				
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['fil']['name']     = $_FILES['doctor_img']['name'][$i]; 
                    $_FILES['fil']['type']     = $_FILES['doctor_img']['type'][$i]; 
                    $_FILES['fil']['tmp_name'] = $_FILES['doctor_img']['tmp_name'][$i]; 
                   $_FILES['fil']['error']     = $_FILES['doctor_img']['error'][$i]; 
                    $_FILES['fil']['size']     = $_FILES['doctor_img']['size'][$i]; 
                     
					
                    // File upload configuration 
                     
                    $uplaod=$this->upload->initialize($config); 
                   
                    // Upload file to server 
                    if($this->upload->do_upload('fil')){ 
                        // Uploaded file data 
				 
                        $fileData = $this->upload->data(); 
                        $uploadData['file_name'][$i] = $fileData['file_name']; 
                        
					  
                    }else{  
                        $errorUploadType = $_FILES['fil']['name'].' | ';  
                    } 
                }
					
						
				// Initialize array
				$uploadImgData = $uploadData;
				
			    $doctor_image = json_encode($uploadImgData);  
			  } 
        //$this->load->library('upload', $config);
       
		  if(empty($_FILES['doctor_img']['name']))
		  {
			$data = array(
            'name' =>$this->input->post('hospital_name'),
			'email'=>$this->input->post('email'),
			'phone_no'=>$this->input->post('phone_no'),
			'password'=>md5($this->input->post('password')),
            'image' =>$image,
			'hospital_facilities'=>json_encode($this->input->post('facility')), 
			'about_hos'=>$this->input->post('about'),
			'specialities_id'=>json_encode($this->input->post('field_name')),
			'country_id'=>$this->input->post('country'),
			'state_id'=>$this->input->post('state'),
			'city_id'=>$this->input->post('city'),
			'hos_address'=>$this->input->post('address'),
			//'hos_doctor_image'=> $doctor_image,  
			'hos_doctor'=>json_encode($this->input->post('special_name')),
			'doctor_specialities'=>json_encode($this->input->post('field_name')),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );  
		  }else if(!empty($_FILES['doctor_img']['name'])){ 
			$data = array(
            'name' =>$this->input->post('hospital_name'),
			'email'=>$this->input->post('email'),
			'phone_no'=>$this->input->post('phone_no'),
			'password'=>md5($this->input->post('password')),
            'image' =>$image,
			'hospital_facilities'=>json_encode($this->input->post('facility')), 
			'about_hos'=>$this->input->post('about'),
			'specialities_id'=>json_encode($this->input->post('field_name')),
			'country_id'=>$this->input->post('country'),
			'state_id'=>$this->input->post('state'),
			'city_id'=>$this->input->post('city'),
			'hos_address'=>$this->input->post('address'),
			'hos_doctor_image'=> $doctor_image,  
			'hos_doctor'=>json_encode($this->input->post('special_name')),
			'doctor_specialities'=>json_encode($this->input->post('field_name')),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );   
		  }
           
		  // print_r($data); die; 
		 
        $this->db->insert('hospital',$data);
        return $this->db->insert_id();
		}
		else
		{
			
        //$this->load->library('upload', $config);
       
		
           $data = array(
            'name' =>$this->input->post('hospital_name'),
			'email'=>$this->input->post('email'),
			'phone_no'=>$this->input->post('phone_no'),
			'password'=>md5($this->input->post('password')),
          //  'image' =>$image,
			'hospital_facilities'=>json_encode($this->input->post('facility')), 
			'about_hos'=>$this->input->post('about'),
			'specialities_id'=>json_encode($this->input->post('field_name')),
			'country_id'=>$this->input->post('country'),
			'state_id'=>$this->input->post('state'),
			'city_id'=>$this->input->post('city'),
			'hos_address'=>$this->input->post('address'),
			//'hos_doctor_image'=> $doctor_image, 
			'hos_doctor'=>json_encode($this->input->post('special_name')),
			'doctor_specialities'=>json_encode($this->input->post('field_name')),
             'created_at' =>date('Y-m-d H:i:s'), 
             'status'=>1
          );
		 
        $this->db->insert('hospital',$data);
        return $this->db->insert_id();
		}
	}
	function hospital_details()
	{
		$data=$this->db->query('SELECT hospital.id,hospital.image, hospital.name,hos_address, specialities.service_name,countries.name as t, states.name as q,cities.name as r FROM hospital JOIN specialities ON specialities.id=hospital.specialities_id JOIN countries ON countries.id=hospital.country_id JOIN states ON states.id=hospital.state_id JOIN cities ON cities.id=hospital.city_id');
					   
					   
		return $data->result();
		
	}
	function get_country()
	{
		$data=$this->db->get('countries')->result();
					   
			return $data;		   
	}
	function get_state($country_id)
	{ 
		$res= $this->db->get_where('cities',array('country_id'=>$country_id));
		echo  json_encode($res->result());
	}
	function get_cityy($state_id)
	{ 
		$res= $this->db->get_where('cities',array('state_id'=>$state_id));
		echo  json_encode($res->result());
	}
	function hospital_detailss($id)
	{
		
		$data=$this->db->query('SELECT * from hospital where hospital.id='.$id.'' )->row();
		     	  
		 return $data;
		
	}
function update_hospital($id)
	{
		
		//$data=json_encode($this->input->post('service'));
		/* echo "<pre>";
		print_r($data);die; */
		//$posted_data = $this->input->post(null,true);
		//$file=$_FILES['hospital_image']['name'];	
		$file=$_FILES['user_image']['name'];	
		
				if(!empty($file))
				{
					
        //$file = $this->input->post('user_image'); 
        $config = array(
        'upload_path' => "assets/img/hospital/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
        'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('user_image'))
        { 
            $data['imageError'] =  $this->upload->display_errors();
            print_r($data['imageError']);
        }
        else
        {
			$imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }
        //$this->load->library('upload', $config);
       
		
           $data = array(
            //'name' =>$this->input->post('hospital_name'),
			'email'=>$this->input->post('email'),
			'phone_no'=>$this->input->post('phone_no'),
			//'password'=>md5($this->input->post('password')),
            'image' =>$image,
			'hospital_facilities'=>json_encode($this->input->post('facility')), 
			'about_hos'=>$this->input->post('about'),
			'specialities_id'=>json_encode($this->input->post('service')),
			'country_id'=>$this->input->post('country'),
			'state_id'=>$this->input->post('state'),
			'city_id'=>$this->input->post('city'),
			'hos_address'=>$this->input->post('address'),
			'hos_doctor'=>json_encode($this->input->post('special_name')),
			'doctor_specialities'=>json_encode($this->input->post('field_name')),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
          );
		 
		//  echo "<pre>";
		//  print_r($data);die;
        $this->db->where('id',$id)->update('hospital',$data);
				
				return 1;
				}
        else
		{
			
           $data = array(
            //'name' =>$this->input->post('hospital_name'),
			'email'=>$this->input->post('email'),
			'phone_no'=>$this->input->post('phone_no'),
			//'password'=>md5($this->input->post('password')),
            //'image' =>$image,
			'hospital_facilities'=>json_encode($this->input->post('facility')), 
			'about_hos'=>$this->input->post('about'),
			'specialities_id'=>json_encode($this->input->post('service')),
			'country_id'=>$this->input->post('country'),
			'state_id'=>$this->input->post('state'),
			'city_id'=>$this->input->post('city'),
			'hos_address'=>$this->input->post('address'),
			'hos_doctor'=>json_encode($this->input->post('special_name')),
			'doctor_specialities'=>json_encode($this->input->post('field_name')),
             'created_at' =>date('Y-m-d H:i:s'),
             'status'=>1
		  );
			$this->db->where('id',$id);
			$insert = $this->db->update('hospital',$data);
		  /* echo "<pre>";
		 print_r($data);die;   */
        return 1;
		}
				 
    }
		public function del_hos($id)
		{
			$this->db->where('id',$id)
					->delete('hospital');
			return true;		
		}
		
		  public function multiple_image_pharmacy($image = array(),$id){

					$data=array('name'=>json_encode($this->input->post('pharmacy_name')),
						'image'=>json_encode($image),
						'hosptial_id'=>$id
						);
						
			 $this->db->insert('pharmacy',$data);
			 return true;
             }
			 
			 
			 public function multiple_file_ehr($image = array(),$id){

					$data=array('ehr_name'=>json_encode($this->input->post('ehr_name')),
						'image'=>json_encode($image),
						'doctor_id'=>$this->input->post('doctor_id'),
						'user_id'=>$id,
						'created_at'=> date("Y-m-d H:i:s") 
					);
						
			 $this->db->insert('ehr_doctor',$data);
			 return true;
             }
			 
			  public function multiple_file_ehr_hospital($image = array(),$id){

					$data=array('ehr_hospital'=>json_encode($this->input->post('ehr_hospital_name')),
						'hospital_image'=>json_encode($image),
						'hospital_id'=>$this->input->post('hospital_id'),
						'user_id'=>$id,
						'created_at'=> date("Y-m-d H:i:s") 
						);
						
			 $this->db->insert('ehr_hospital',$data);
			 return true;
             }
			 
		 public function multiple_images_hotel($image = array(),$id){
			
			$data=array('name'=>json_encode($this->input->post('hotel_name')),
						'image'=>json_encode($image),
						'hospital_id'=>$id
						);
			
			 $this->db->insert('hotel',$data);
			 return true;
             }
			 public function get_specialities()
			 {
				
						$res=$this->db->get('specialities')->result();
						echo json_encode($res);	
						
			 }	
			
		public function multiple_specialities($id)
		
		{
			
			$specialities=$this->db->get_where('hospital',array('id'=>$id))->row()->specialities_id;
			/* echo "<pre>";
			print_r($specialities);die;   */
			if(!empty($specialities) && $specialities!= "null"){
				
				$this->db->where('hospital_id',$id)->delete('hospital_specialities_id');
				$special=json_decode($specialities);
				
					foreach($special as $spec):
					
					$data=array('hospital_specialities'=>$spec,
								'hospital_id'=>$id
								);
					
					$this->db->insert('hospital_specialities_id',$data);
					endforeach;
				
			}
			else
			{
			 return true;
			  
 			}
		} 
		public function multiple_image_gallery($image = array(),$id)
		{
			
			$data=array('image'=>json_encode($image),
						'hospital_id'=>$id
						);
						 
			 $this->db->insert('hos_gallery',$data);
			 return true;
             
		}
		public function add_enquiry()
		{
			$data=array('name'=>$this->input->post('name'),
						'email'=>$this->input->post('Email'),
						'phone'=>$this->input->post('Mob_no'),
						'gender'=>$this->input->post('gender'),
						'country'=>$this->input->post('country'),
						'message'=>$this->input->post('message'),
						'created_at'=>date('Y-m-d :h:i:s'),
						'status'=>1
						);
			$this->db->insert('enquiries',$data);
				return true;
		}
	
		public function add_special()
		{
			
				$service_name = $this->input->post('special_name');
				$file = $_FILES['special_img']['name'];
				
				if(!empty($file) || !empty($service_name))
				{
						if(!$file=='')
						{	
						 $config = array(
						'upload_path' => "./assets/img/specialities/",
						'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
						'encrypt_name' => TRUE
						);
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('special_img'))
						{ 
							$data['imageError'] =  $this->upload->display_errors();
							print_r($data['imageError']);
						}
						else
						{
							
							$imageDetailArray = $this->upload->data();
							
							$image =  $imageDetailArray['file_name'];
						}
						
						$data=array('service_name'=>$this->input->post('special_name'),
									 'image'=>$image,
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 
							$this->db->insert('specialities',$data);
							return true;
						}
						else
						{
							$data=array('service_name'=>$this->input->post('special_name'),
									 
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 
							$this->db->insert('specialities',$data);
							return true;
						} 
				}
				else{
					
					return false;
				}
				
		
		}
			
			public function edit_special()
		{
				$id= $this->input->post('edit_special');
				$service_name = $this->input->post('special_name');
				$files=$_FILES['special_img']['name'];
			
						if(!empty($files))
						{	
							 $config = array(
							'upload_path' => "./assets/img/specialities/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
							'encrypt_name' => TRUE
							);
							$this->load->library('upload', $config);
							if(!$this->upload->do_upload('special_img'))
							{ 
								$data['imageError'] =  $this->upload->display_errors();
								print_r($data['imageError']);
							}
							else
							{
								
								$imageDetailArray = $this->upload->data();
								
								$image =  $imageDetailArray['file_name'];
							}
							
							$data=array('service_name'=>$this->input->post('special_name'),
										 'image'=>$image,
										 'created_at'=>date('y-m-s h:i:s'),
										 'status'=>1
										 );
										
								$this->db->where('id',$id)->update('specialities',$data);
								
								return true;
						}
						else
						{
							$data=array('service_name'=>$this->input->post('special_name'),
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 	
							$this->db->where('id',$id)->update('specialities',$data);
							return true;
						} 
				
		}	
		public function add_common()
		{
			
				$posted_data = $this->input->post('special_name');
				
				$file = $_FILES['special_img']['name'];
				if(!empty($posted_data) || !empty($file))
				{
					 //cho "vivek";die;
						if(!empty($file))
						{	
						 $config = array(
						'upload_path' => "./assets/img/specialities/",
						'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
						'encrypt_name' => TRUE
						);
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('special_img'))
						{ 
							$data['imageError'] =  $this->upload->display_errors();
							print_r($data['imageError']);
						}
						else
						{
							
							$imageDetailArray = $this->upload->data();
							
							$image =  $imageDetailArray['file_name'];
						}
						
						$data=array('service_name'=>$this->input->post('special_name'),
								     'type'=>$this->input->post('type'),
									 'image'=>$image,
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 
							$this->db->insert('common_specialities',$data);
							return true;
						}
						else
						{
							$data=array('service_name'=>$this->input->post('special_name'),
									 
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 
							$this->db->insert('common_specialities',$data);
							return true;
						} 
					}
				else
				{
					return false;
				}
		}	
			
		public function edit_common()
		{
				$id= $this->input->post('edit_special');
				$service_name = $this->input->post('service_name');
				$files=$_FILES['special_img']['name'];
			
						if(!empty($files))
						{	 //echo "vivek";die;
							 $config = array(
							'upload_path' => "./assets/img/specialities/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf|csv",
							'encrypt_name' => TRUE
							);
							$this->load->library('upload', $config);
							if(!$this->upload->do_upload('special_img'))
							{ 
								$data['imageError'] =  $this->upload->display_errors();
								print_r($data['imageError']);
							}
							else
							{
								
								$imageDetailArray = $this->upload->data();
								
								$image =  $imageDetailArray['file_name'];
							}
							
							$data=array('service_name'=>$this->input->post('special_name'),
										 'image'=>$image,
										 'created_at'=>date('y-m-s h:i:s'),
										 'status'=>1
										 );
										//echo "<pre>";
										//print_r($data);die;
								$this->db->where('id',$id)->update('common_specialities',$data);
								
								return true;
						}
						else
						{
							$data=array('service_name'=>$this->input->post('special_name'),
									 'created_at'=>date('y-m-s h:i:s'),
									 'status'=>1
									 );
									 	
							$this->db->where('id',$id)->update('common_specialities',$data);
							return true;
						} 
				}



    public function insert_feedback($data){
      if($this->db->insert('feedback', $data)){
        return true;
      }else{
        return false;
      }
    }
    public function get_all_feedback_List($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_feedback($feedback_id){
        $this->db->where('ID', $feedback_id);
        $this->db->delete('feedback');
        return;
    }
    public function insert_story($data){
      if($this->db->insert('stories', $data)){
        return true;
      }else{
        return false;
      }
    }
    public function get_all_story_List($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_story($story_id){ 
        $this->db->where('ID', $story_id);
        $this->db->delete('stories');
        return;
    }
    public function insert_doctor($data){
		$last_id = $this->db->query("SELECT id FROM doctors ORDER BY id DESC LIMIT 1")->row();
		if(empty($last_id))
		{
			$u_id="DOCTOR". 1;// echo $u_id;die;
		}
		else
		{
		$u_id  = "DOCTOR" .($last_id->id + 1);
		}
        $posted_data = $this->input->post(null,true);
        $mobile = $this->input->post('mobile');
        $password = md5($this->input->post('password',TRUE));
    }
    public function get_all_Story($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit(6);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }	
	
	    public function get_all_treatment_spec($table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where('type', 'treatment');
        $this->db->limit(6);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }	
	
	function user_search($search_book){ 

		 $this->db->like('name', $search_book);
		 // $this->db->or_like('author', $search_book);
		 // $this->db->or_like('date', $search_book);
		 // $query = $this->db->where('name',$search_book)->get('doctors');
		 $query = $this->db->get('doctors');
		 return $query->result();
	}
	
		function user_search1($search_book){ 

		 $this->db->like('name', $search_book);
		 // $this->db->or_like('author', $search_book);
		 // $this->db->or_like('date', $search_book);
		 // $query = $this->db->where('name',$search_book)->get('doctors');
		 $query = $this->db->get('hospital');
		 return $query->result();
	}
	
	    public function chk($city){            
        
        $this->db->select('*');
        $this->db->from('doctors');
        $this->db->where('name', $city); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }

}