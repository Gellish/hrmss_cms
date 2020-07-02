<?php 
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{

   /*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('Login_model');
		  $this->load->model('Employees_model');
     }
	 
	public function auth() {
	
		$this->form_validation->set_rules('iusername', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ipassword', 'Password', 'trim|required|xss_clean');
		$Return = array('result'=>'', 'error'=>'');
		
		$username = $this->input->post('iusername');
		$password = $this->input->post('ipassword');
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		
		/* Server side PHP input validation */
		if($username==='') {
			$Return['error'] = $this->lang->line('xin_employee_error_username');
		} elseif($password===''){
			$Return['error'] = $this->lang->line('xin_employee_error_password');
		}
		if($Return['error']!=''){
			$this->output($Return);
		}
		
		$data = array(
			'username' => $username,
			'password' => $password
			);
		$result = $this->Login_model->login($data);	
		
		if ($result == TRUE) {
			
				$result = $this->Login_model->read_user_information($username);
				$session_data = array(
				'user_id' => $result[0]->user_id,
				'username' => $result[0]->username,
				'email' => $result[0]->email,
				);
				// Add user data in session
				$this->session->set_userdata('username', $session_data);
				$Return['result'] = $this->lang->line('xin_success_logged_in');
				
				// update last login info
				$ipaddress = $this->input->ip_address();
				  
				 $last_data = array(
					'last_login_date' => date('d-m-Y H:i:s'),
					'last_login_ip' => $ipaddress,
					'is_logged_in' => '1'
				); 
				
				$id = $result[0]->user_id; // user id
				  
				$this->Employees_model->update_record($last_data, $id);
				$this->output($Return);
				
			} else {
				$Return['error'] = $this->lang->line('xin_error_invalid_credentials');
				/*Return*/
				$this->output($Return);
			}
		}
} 
?>