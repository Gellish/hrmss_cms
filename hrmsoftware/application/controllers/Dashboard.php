<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the models
          $this->load->model('Login_model');
		  $this->load->model('Designation_model');
		  $this->load->model('Department_model');
		  $this->load->model('Employees_model');
		  $this->load->model('Xin_model');
		  $this->load->model('Expense_model');
		  $this->load->model('Timesheet_model');
		  $this->load->model('Job_post_model');
		  $this->load->model('Project_model');
		  $this->load->model('Awards_model');
		  $this->load->model('Announcement_model');
     }
	
	/*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	} 
	
	public function index()
	{
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		// get user > added by
		$user = $this->Xin_model->read_user_info($session['user_id']);
		// get designation
		$_designation = $this->Designation_model->read_designation_information($user[0]->designation_id);
		$data = array(
			'title' => $this->Xin_model->site_title(),
			'breadcrumbs' => $this->lang->line('dashboard_title'),
			'path_url' => 'dashboard',
			'first_name' => $user[0]->first_name,
			'last_name' => $user[0]->last_name,
			'employee_id' => $user[0]->employee_id,
			'username' => $user[0]->username,
			'email' => $user[0]->email,
			'designation_name' => $_designation[0]->designation_name,
			'date_of_birth' => $user[0]->date_of_birth,
			'date_of_joining' => $user[0]->date_of_joining,
			'contact_no' => $user[0]->contact_no,
			'last_four_employees' => $this->Xin_model->last_four_employees(),
			'last_jobs' => $this->Xin_model->last_jobs()
			);
			$data['subview'] = $this->load->view('dashboard/index', $data, TRUE);
			$this->load->view('layout_main', $data); //page load
	}
	
	// get opened and closed tickets for chart
	public function tickets_data()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('opened'=>'', 'closed'=>'');
		// open
		$Return['opened'] = $this->Xin_model->all_open_tickets();
		// closed
		$Return['closed'] = $this->Xin_model->all_closed_tickets();
		$this->output($Return);
		exit;
	}
	
	// get company wise salary
	public function payroll_company_wise()
	{
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#ff4dff','#a64dff','#cc33ff','#9966ff','#0099ff','#33cc33','#ff4dff','#ff1aff','#0099cc','#ff0066');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_companies_chart() as $comp) {
		$company_pay = $this->Xin_model->get_company_make_payment($comp->company_id);
		$c_name[] = htmlspecialchars_decode($comp->name);
		$c_am[] = $company_pay[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($comp->name),
		  'value' => $company_pay[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get location|station wise salary
	public function payroll_location_wise()
	{
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#3e70c9','#f59345','#f44236','#8A2BE2','#D2691E','#6495ED','#DC143C','#006400','#556B2F','#9932CC');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_location_chart() as $location) {
		$location_pay = $this->Xin_model->get_location_make_payment($location->location_id);
		$c_name[] = htmlspecialchars_decode($location->location_name);
		$c_am[] = $location_pay[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($location->location_name),
		  'value' => $location_pay[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get department wise salary
	public function payroll_department_wise()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#3e70c9','#f59345','#f44236','#8A2BE2','#D2691E','#6495ED','#DC143C','#006400','#556B2F','#9932CC');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_departments_chart() as $department) {
		$department_pay = $this->Xin_model->get_department_make_payment($department->department_id);
		$c_name[] = htmlspecialchars_decode($department->department_name);
		$c_am[] = $department_pay[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($department->department_name),
		  'value' => $department_pay[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get designation wise salary
	public function payroll_designation_wise()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#1AAF5D','#F2C500','#F45B00','#8E0000','#0E948C','#6495ED','#DC143C','#006400','#556B2F','#9932CC');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_designations_chart() as $designation) {
		$result = $this->Xin_model->get_designation_make_payment($designation->designation_id);
		$c_name[] = htmlspecialchars_decode($designation->designation_name);
		$c_am[] = $result[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($designation->designation_name),
		  'value' => $result[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// set new language
	public function set_language($language = "") {
        
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
        
    }
}
