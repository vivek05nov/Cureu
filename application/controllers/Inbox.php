<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
 
    public function  chat_members(){
        $new_user = '';
        $main_user_id =  $this->session->userdata('user_id');
        
        $name = '';
        $output = '';
        $first = '';
        $last = '';
        $namee = '';
       
        $who_is = '';
        
        $sender_id =  $this->input->post('user_id');
		
		/* echo $sender_id;die; */
		
      //  $sender_id = 'mlm0001';
      
        $query =  $this->db->query("select * from inbox join 

(select user, max(date) m from ( (select id, receiver_id user, date from inbox where sender_id='$main_user_id' )
 union 
(select id, sender_id user, date from inbox where receiver_id='$main_user_id') ) t1 group by user) t2 

on 

((sender_id='$main_user_id' and receiver_id=user) or (sender_id=user and receiver_id='$main_user_id')) and (date = m) order by id desc");
        $data = $query->result();
        
        foreach($data as $row)
        {
       
              $new_user = $row->user;
			  
               $roww = $this->db->select('*')->from('doctors')->where('user_id',$new_user)->get()->row();  
			
               $name = $roww->name;
               $image = $roww->image;
               
            if($image == ''){
                $image = 'https://ptetutorials.com/images/user-profile.png';
            }
            else{
                $image = base_url("assets/img/doctors/".$roww->image) ;
            }
           $output .= '
                <a href="javascript:void(0);" class="media chat_list" data-id="'.$roww->user_id.'" user-img="'.$image.'" user-name="'.$roww->name.'">
					<div class="media-img-wrap">
						<div class="avatar avatar-away">'; 
						
                    if($roww->image != ''){
                    $output .= '<img src="'.base_url("assets/img/doctors/".$roww->image).'" alt="User Image" class="avatar-img rounded-circle">';    
                    }
                    else{
                    $output .= '<img src="https://ptetutorials.com/images/user-profile.png" alt="User Image" class="avatar-img rounded-circle" >';    
                    }
         $output .= '</div>
					</div>
					<div class="media-body">
						<div>
							<div class="user-name">'.$name.'</div>
							<div class="user-last-chat"><b>'.$who_is.'</b> '.substr($row->message,0,40).' ...</div>
						</div>
						<div>
							<div class="last-chat-time block">'.date("h:i A", strtotime($row->m)).'</div>
							<!-- <div class="badge badge-success badge-pill">15</div> -->
						</div>
					</div>
				</a>
                
                  ';
        }
        
        echo json_encode($output);
      //  echo $output;
    }
    public function  admin_chat_members(){
        
        $new_user = '';
        $main_user_id =  $this->session->userdata('user_id');
        
        $name = '';
        $output = '';
        $first = '';
        $last = '';
        $namee = '';
       
        $who_is = '';
        
        $sender_id =  $this->input->post('user_id');
     
        $query =  $this->db->query("select * from inbox join 

(select user, max(date) m from ( (select id, receiver_id user, date from inbox where sender_id='$main_user_id' )
 union 
(select id, sender_id user, date from inbox where receiver_id='$main_user_id') ) t1 group by user) t2 

on 

((sender_id='$main_user_id' and receiver_id=user) or (sender_id=user and receiver_id='$main_user_id')) and (date = m) order by id desc");
        $data = $query->result();
        
        foreach($data as $row)
        {
      
              $new_user = $row->user;
               $roww = $this->db->select('*')->from('members')->where('user_id',$new_user)->get()->row();  
			
               $name = $roww->name;
               $image = $roww->image;
               
            if($image == ''){
                $image = 'https://ptetutorials.com/images/user-profile.png';
            }
            else{
                $image =  base_url("/".$roww->image);
            }
           $output .= '
                <a href="javascript:void(0);" class="media chat_list" data-id="'.$roww->user_id.'" user-img="'.$image.'" user-name="'.$roww->name.'">
					<div class="media-img-wrap">
						<div class="avatar avatar-away">'; 
						
                    if($roww->image != ''){
                    $output .= '<img src="'.base_url("/".$roww->image).'" alt="User Image" class="avatar-img rounded-circle">';    
                    }
                    else{
                    $output .= '<img src="https://ptetutorials.com/images/user-profile.png" alt="User Image" class="avatar-img rounded-circle" >';    
                    }
         $output .= '</div>
					</div>
					<div class="media-body">
						<div>
							<div class="user-name">'.$name.'</div>
							<div class="user-last-chat"><b>'.$who_is.'</b> '.substr($row->message,0,40).' ...</div>
						</div>
						<div>
							<div class="last-chat-time block">'.date("h:i A", strtotime($row->m)).'</div>
							<!-- <div class="badge badge-success badge-pill">15</div> -->
						</div>
					</div>
				</a>
                
                  ';
        }
        
        echo json_encode($output);
      //  echo $output;
    }
    
    	public function chat(){
    	    
    		$mobile =  $this->session->userdata('user_id');
            $xyz='';
            $output = '';
            
            $sender_id =  $this->input->post('sender_id');
            
            $select_sender_data =  $this->db->query("select name from doctors where user_id='$sender_id'");
            $name = '<b style="color:#05728f">'.$select_sender_data->row()->name.'</b>';
            
            $query =  $this->db->query("SELECT doctors.name as first, inbox.sender_id as sender_id, inbox.message as message, TIME(inbox.date) as time, DATE(inbox.date) as date,  doctors.image as picture FROM `inbox` left join doctors on inbox.sender_id = doctors.mobile WHERE inbox.receiver_id ='$mobile' and inbox.sender_id='$sender_id' or inbox.receiver_id ='$sender_id' and inbox.sender_id='$mobile' ORDER by inbox.id asc");
            $data = $query->result();
            
            
            foreach($data as $row)
            {
                if($row->sender_id == $mobile){
                      
                       $output .= '<li class="media sent"><div class="media-body">';
                       $output .= '
                         	<div class="msg-box">
								<div>
									<p>'.$row->message.'</p>
									<ul class="chat-msg-info">
										<li>
											<div class="chat-time">
												<span>'.date("h:i A", strtotime($row->time)).'    |    '.date("M d", strtotime($row->time)).'</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
					    ';
                        $output .= '</li></div>';
                }
                else{
                    $output .= '<li class="media received">';            
                    $output .= '            
                        	<div class="avatar">
								<img src="https://ptetutorials.com/images/user-profile.png" alt="User Image" class="avatar-img rounded-circle"> 
							</div>
							<div class="media-body">
								<div class="msg-box">
									<div>
									
										<p>'.$row->message.'</p>
										<ul class="chat-msg-info">
											<li>
												<div class="chat-time">
													<span>'.date("h:i A", strtotime($row->time)).'    |    '.date("M d", strtotime($row->time)).'</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						
                        ';
                    $output .= '</li>';            
                }
                     
            }
            
            $xyz = array('name'=>$name, 'output'=>$output);
            echo json_encode($xyz);
        }
        
        public function admin_chat(){
    	   
			
    		$mobile =  $this->session->userdata('user_id');
            $xyz='';
            $output = '';
            
            $sender_id =  $this->input->post('sender_id');
            
            $select_sender_data =  $this->db->query("select name from members where user_id='$sender_id'");
            $name = '<b style="color:#05728f">'.$select_sender_data->row()->name.'</b>';
            
            $query =  $this->db->query("SELECT members.name as first, inbox.sender_id as sender_id, inbox.message as message, TIME(inbox.date) as time, DATE(inbox.date) as date,  members.image as picture FROM `inbox` left join members on inbox.sender_id = members.user_id WHERE inbox.receiver_id ='$mobile' and inbox.sender_id='$sender_id' or inbox.receiver_id ='$sender_id' and inbox.sender_id='$mobile' ORDER by inbox.id asc");
            $data = $query->result();
            
            
            foreach($data as $row)
            {
                if($row->sender_id == $mobile){
                      
                       $output .= '<li class="media sent"><div class="media-body">';
                       $output .= '
                         	<div class="msg-box">
								<div>
									<p>'.$row->message.'</p>
									<ul class="chat-msg-info">
										<li>
											<div class="chat-time">
												<span>'.date("h:i A", strtotime($row->time)).'    |    '.date("M d", strtotime($row->time)).'</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
					    ';
                        $output .= '</li></div>';
                }
                else{
                    $output .= '<li class="media received">';            
                    $output .= '            
                        	<div class="avatar">
								<img src="https://ptetutorials.com/images/user-profile.png" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="media-body">
								<div class="msg-box">
									<div>
									
										<p>'.$row->message.'</p>
										<ul class="chat-msg-info">
											<li>
												<div class="chat-time">
													<span>'.date("h:i A", strtotime($row->time)).'    |    '.date("M d", strtotime($row->time)).'</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						
                        ';
                    $output .= '</li>';            
                }
                     
            }
            
            $xyz = array('name'=>$name, 'output'=>$output);
            echo json_encode($xyz);
        }
    	
    	public function  send_message(){
            
            $sender_id =  $this->session->userdata('user_id');
            $receiver_id =  $this->input->post('receiver_id');
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
                $msg = "Message Send ...";
            }
            else{
                $msg = "Sorry Message not Sent, Please Try Again";
            }
            echo json_encode($msg);       
        }
    	
    	public function member_serach(){
    	    
    		$builder = $this->db->table('inbox');
    		 
    	 //    
    		$output = '';
        //	$sender_id = $this->session->userdata('mobile');
    	  
    	    $val = $request->getVar('val');
    	   // $val = 'mlm0001';
    	    $members = $this->db->query("select mobile from registration where mobile LIKE '%$val%'");
            
            $data = $members->result();  
             
            $output .= '<datalist id="browsers">';
                
            foreach($data as $row)
            {
                 $output .= '<option class="search-list" value="'.$row->mobile.'">';
                 
            }
    	    $output .= '</datalist>';
                 
            echo json_encode($output);
    	}
		public function notification()
		{
			$doctor=$this->session->userdata('user_id');
			$doct=$this->db->where('receiver_id',$doctor)
							->where('status','0')
							->get('inbox')->result();
			echo  count($doct);
		}
		public function status()
		{
			
			$this->db->where('receiver_id',$this->session->userdata('user_id'))
						->update('inbox',['status'=>1]);
						echo "true";
		}
}    	