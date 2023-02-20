<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentication extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user'); 
		$this->load->library('form_validation');

	    $this->load->model(array('auth_model'=>'auth'));
    } 
     
    public function index(){ 
        $userData = array(); 
         
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,name,last_name,email,link,gender,picture'); 
 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';
            $userData['name']    = !empty($fbUser['name'])?$fbUser['name']:''; 
            //$userData['password']    = !empty($fbUser['password'])?$fbUser['password']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
            
            // Insert or update user data to the database 
            $userID = $this->user->checkUser($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                
				
					

					$email = $userData['email'];
                      

					//$password = md5($this->input->post('password'));

					//echo $password;die;

					$result = $this->auth->validate_user($email);
					//print_r($result); die; 
					
					if(isset($result) && !empty($result))

					{
							$logged_data = array('userid'=>$result->id,

												'username'=>$result->name,

												'user_id'=>$result->user_id,

												'usertype'=>'user',

												'profilepic'=>$result->image,

												'logged_in'=>TRUE

											);

						

						$this->session->set_userdata($logged_data);

						//$this->redirect_to();

						redirect('', 'refresh');

							

						

					}

				
            }else{ 
               $data['userData'] = array(); 
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        
		// redirect('', 'refresh',$data);
    } 
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        redirect('user_authentication'); 
    } 
}