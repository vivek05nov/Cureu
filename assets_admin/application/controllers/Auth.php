<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Auth extends CI_Controller
{

	public function __construct()

	{

		parent::__construct();

		// Your own constructor code



		/*Library*/

		$this->load->library('form_validation');



		/*Model*/

		$this->load->model(array('auth_model' => 'auth'));


		// Load facebook oauth library 
		$this->load->library('facebook');

		// Load user model 
		$this->load->model('user');
	}

	public function index()

	{

		echo date("Y-m-d h:i:s A");

		//$this->load->view('welcome_message');

	}

	public function login()

	{
		$data['authURL'] =  $this->facebook->login_url();


		if ($this->input->post()) {

			if ($this->input->post('ddtype') == 1) {



				$this->form_validation->set_rules('email', 'Email', 'htmlspecialchars|trim|required');

				$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required');

				if ($this->form_validation->run() == false) {

					$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">' . validation_errors() . '</div>');

					$this->load->view('front/header');

					$this->load->view('front/login', $data);

					$this->load->view('front/footer');
				} else {

					//echo "vivek";die;

					$email = $this->input->post('email');

					$password = md5($this->input->post('password'));

					//echo $password;die;

					$result = $this->auth->validate_login($email);

					if (isset($result) && !empty($result)) {

						if ($password == $result->password) {



							$logged_data = array(
								'userid' => $result->id,

								'username' => $result->name,

								//'user_id'=>$result->user_id,

								'usertype' => $result->usertype,

								'profilepic' => $result->profile_pic,

								'logged_in' => TRUE

							);



							$this->session->set_userdata($logged_data);

							//$this->redirect_to();

							redirect('Admin/index', 'refresh');
						} else {

							$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Wrong Password</div>');

							$this->load->view('front/header');

							$this->load->view('front/login', $data);

							$this->load->view('front/footer');
						}
					} else {

						$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Invalid Credintials</div>');

						$this->load->view('front/header');

						$this->load->view('front/login', $data);

						$this->load->view('front/footer');
					}
				}
			} elseif ($this->input->post('ddtype') == 2) {

				$this->form_validation->set_rules('email', 'Email', 'htmlspecialchars|trim|required');

				$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required');

				if ($this->form_validation->run() == false) {

					$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">' . validation_errors() . '</div>');

					$this->load->view('front/header');

					$this->load->view('front/login', $data);

					$this->load->view('front/footer');
				} else {

					$email = $this->input->post('email');

					$password = md5($this->input->post('password'));

					$result = $this->auth->validate_doctor($email);

					if (isset($result) && !empty($result)) {

						if ($password == $result->password) {

							$logged_data = array(
								'userid' => $result->id,

								'username' => $result->name,

								'user_id' => $result->user_id,

								'usertype' => 'doctors',

								'profilepic' => $result->image,

								'logged_in' => TRUE

							);

							//print_r($logged_data);die;

							$this->session->set_userdata($logged_data);

							$this->redirect_to_dr();
						} else {

							$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Wrong Password</div>');

							$this->load->view('front/header');

							$this->load->view('front/login', $data);

							$this->load->view('front/footer');
						}
					} else {

						$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Invalid Credintials</div>');

						$this->load->view('front/header');

						$this->load->view('front/login', $data);

						$this->load->view('front/footer');
					}
				}
			} elseif ($this->input->post('ddtype') == 4) {

				$this->form_validation->set_rules('email', 'Email', 'htmlspecialchars|trim|required');

				$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required');

				if ($this->form_validation->run() == false) {

					$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">' . validation_errors() . '</div>');

					$this->load->view('front/header');

					$this->load->view('front/login', $data);

					$this->load->view('front/footer');
				} else {

					$email = $this->input->post('email');

					$password = md5($this->input->post('password'));





					$result = $this->auth->validate_hospital($email);

					if (isset($result) && !empty($result)) {



						if ($password == $result->password) {





							$logged_data = array(
								'userid' => $result->id,

								'hospitalname' => $result->name,

								'usertype' => 'Hospital',

								'profilepic' => $result->image,

								'logged_in' => TRUE

							);

							//print_r($logged_data);die;



							$this->session->set_userdata($logged_data);

							$this->redirect_to_hos();
						} else {



							$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Wrong Password</div>');

							$this->load->view('front/header');

							$this->load->view('front/login', $data);

							$this->load->view('front/footer');
						}
					} else {

						$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Invalid Credintials</div>');

						$this->load->view('front/header');

						$this->load->view('front/login', $data);

						$this->load->view('front/footer');
					}
				}
			} else {

				$this->form_validation->set_rules('email', 'Email', 'htmlspecialchars|trim|required');

				$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required');

				if ($this->form_validation->run() == false) {

					$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">' . validation_errors() . '</div>');

					$this->load->view('front/header');

					$this->load->view('front/login', $data);

					$this->load->view('front/footer');
				} else {

					$email = $this->input->post('email');

					$password = md5($this->input->post('password'));

					$result = $this->auth->validate_user($email);

					if (isset($result) && !empty($result)) {

						if ($password == $result->password) {

							$logged_data = array(
								'userid' => $result->id,

								'username' => $result->name,

								'user_id' => $result->user_id,

								'usertype' => 'user',

								'profilepic' => $result->image,

								'logged_in' => TRUE

							);

							//print_r($logged_data);die;

							$this->session->set_userdata($logged_data);

							redirect('', 'refresh');
						} else {

							$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Wrong Password</div>');

							$this->load->view('front/header');

							$this->load->view('front/login', $data);

							$this->load->view('front/footer');
						}
					} else {

						$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Invalid Credintials</div>');

						$this->load->view('front/header');

						$this->load->view('front/login', $data);

						$this->load->view('front/footer');
					}
				}
			}
		} else {

			$this->load->view('front/header');

			$this->load->view('front/login', $data);

			$this->load->view('front/footer');
		}
	}



	function login_bypass($id)

	{

		$user_type = $this->session->userdata('usertype');

		if (($user_type == 'Super Admin') || ($user_type == 'Admin')) {

			$result = $this->auth->login_bypass($id);

			if ($result->is_active == 'Yes') {

				$user_type = $this->user->get_user_type($result->user_type_id);

				$logged_data = array(
					'userid' => $result->id,

					'username' => $result->name,

					'usertype' => $user_type->user_type,

					'profilepic' => $result->profile_pic,

					'post' => $result->post_id,

					'branch_id' => $result->branch_id,

					'logged_in' => TRUE

				);



				$this->session->set_userdata($logged_data);

				$this->redirect_to();
			}
		} else {

			redirect('login');
		}
	}

	function register()

	{

		if ($this->input->post(NULL, TRUE)) {

			/*check Captcha*/

			if ($this->input->post('g-recaptcha-response')) {

				$captcha = $this->input->post('g-recaptcha-response');

				$secret = '6Lc6C60UAAAAAN1nDn7cXxuzsucqHmNl8lZ307rT'; // Secret Key

				$url = "https://www.google.com/recaptcha/api/siteverify"; // url to varify Captch

				$data = [
					'secret' => $secret,

					'response' => $captcha,

					'remoteip' => $this->input->ip_address()
				];



				$options = array('http' => array(
					'header' => 'Content-type:application/x-www-form-urlencoded\r\n',

					'method' => 'POST',

					'content' => http_build_query($data)
				));



				$context = stream_context_create($options);



				$response = file_get_contents($url, false, $context);



				$res = json_decode($response, true);

				if ($res['success'] == true) {

					$this->form_validation->set_rules('firstname', 'First Name', 'htmlspecialchars|trim|required');

					$this->form_validation->set_rules('lastname', 'Last Name', 'htmlspecialchars|trim|required');

					$this->form_validation->set_rules('email', 'Email', 'htmlspecialchars|trim|required|valid_email|is_unique[userdetail.email]', array('is_unique' => '%s already exist in our record'));

					$this->form_validation->set_rules('mobile', 'Mobile', 'htmlspecialchars|trim|required|integer|is_unique[userdetail.contact]', array('is_unique' => '%s already exist in our record'));

					$this->form_validation->set_rules('password', 'Password', 'htmlspecialchars|trim|required');

					$this->form_validation->set_rules('conf_password', 'Confirm Password', 'htmlspecialchars|trim|required|matches[password]');



					if ($this->form_validation->run() == false) {

						$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">' . validation_errors() . '</div>');

						$this->load->view('users/register');
					} else {

						$data = $this->auth->register();

						if ($data == true) {

							$to_email = $this->input->post('email', TRUE);

							$message = "You are successfully registered to Brahmavarchas International Yoga Academy";

							$subject_email = "Registartion Successfull";

							$to_mobile = $this->input->post('mobile', TRUE);



							$this->send_email($to_email, $subject_email, $message);

							$this->send_sms($to_mobile, $message);

							header('Refresh:5; url= ' . base_url() . '/login');

							echo "You will be redirected in 5 seconds...";
						}
					}
				} else {

					$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Captcha Not Varified</div>');

					$this->load->view('users/register');
				}
			} else {

				$this->session->set_flashdata('item', '<div class="alert alert-danger p-2">Captcha Not Varified</div>');

				$this->load->view('users/register');
			}
		} else {

			$this->load->view('users/register');
		}
	}



	function logout()

	{

		$this->session->sess_destroy();

		redirect('', 'refresh');
	}

	function redirect_to()

	{

		$user_type = strtolower(str_ireplace(' ', '', $this->session->userdata('usertype')));

		redirect($user_type, 'refresh');
	}

	function redirect_to_dr()

	{

		$user_type = strtolower(str_ireplace(' ', '', $this->session->userdata('usertype')));

		redirect($user_type, 'refresh');
	}

	function redirect_to_hos()

	{

		$user_type = strtolower(str_ireplace(' ', '', $this->session->userdata('usertype')));



		header('location:http://cureu.in/hospital/index');
	}



	function check_session()

	{

		if (!$this->session->userdata('logged_in') == TRUE) {

			$output = array('result' => false);

			echo json_encode($output);
		} else {

			$output = array('result' => true);

			echo json_encode($output);
		}
	}

	function forget_password()

	{

		if ($this->input->post()) {

			print_r($this->input->post());
		} else {

			$this->load->view('users/forget_password');
		}
	}

	function session_expire()

	{

		$this->load->view('session_expire');
	}

	function page_not_found()

	{

		$this->load->view('pages/pages_404');
	}
}
