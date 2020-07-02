<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Department_model");
		$this->load->model("Xin_model");
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
		$data['title'] = $this->Xin_model->site_title();
		$data['all_locations'] = $this->Xin_model->all_locations();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$session = $this->session->userdata('username');
		$data['breadcrumbs'] = $this->lang->line('xin_departments');
		$data['path_url'] = 'department';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('5',$role_resources_ids)) {
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("department/department_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
			} else {
				redirect('');
			}
		} else {
			redirect('dashboard/');
		}
     }
 
    public function department_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("department/department_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$department = $this->Department_model->get_departments();
		
		$data = array();

          foreach($department->result() as $r) {
			  
			// get location
			$location = $this->Xin_model->read_location_info($r->location_id);
			if(!is_null($location)){
				$location_name = $location[0]->location_name;
			} else {
				$location_name = '--';	
			}
			// get user > head
			$head_user = $this->Xin_model->read_user_info($r->employee_id);
			// user full name
			if(!is_null($head_user)){
				$dep_head = $head_user[0]->first_name.' '.$head_user[0]->last_name;
			} else {
				$dep_head = '--';	
			}
			
			// get company
			$company = $this->Xin_model->read_company_info($r->company_id);
			if(!is_null($company)){
				$comp_name = $company[0]->name;
			} else {
				$comp_name = '--';	
			}
			  
		   $data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target="#edit-modal-data"  data-department_id="'. $r->department_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->department_id . '"><i class="fa fa-trash-o"></i></button></span>',
				$r->department_name,
				$dep_head,
				$comp_name,
				$location_name,
		   );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $department->num_rows(),
                 "recordsFiltered" => $department->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }
	 
	 // get company > location
	 public function get_locations() {

		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(3);
		
		$data = array(
			'location_id' => $id,
			'all_locations' => $this->Xin_model->all_locations(),
			);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("department/get_locations", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }
	 
	 public function read()
	{
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('department_id');
       // $data['all_countries'] = $this->xin_model->get_countries();
		$result = $this->Department_model->read_department_information($id);
		$data = array(
				'department_id' => $result[0]->department_id,
				'department_name' => $result[0]->department_name,
				'location_id' => $result[0]->location_id,
				'company_id' => $result[0]->company_id,
				'employee_id' => $result[0]->employee_id,
				'all_locations' => $this->Xin_model->all_locations(),
				'all_employees' => $this->Xin_model->all_employees(),
				'get_all_companies' => $this->Xin_model->get_companies()
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('department/dialog_department', $data);
		} else {
			redirect('');
		}
	}
	
	// Validate and add info in database
	public function add_department() {
	
		if($this->input->post('add_type')=='department') {
		// Check validation for user input
		$this->form_validation->set_rules('department_name', 'Department Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('location_id', 'Location', 'trim|required|xss_clean');
		$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required|xss_clean');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($this->input->post('department_name')==='') {
        	$Return['error'] = $this->lang->line('error_department_field');
		} else if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('location_id')==='') {
			$Return['error'] = $this->lang->line('error_location_dept_field');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('error_department_head_field');
		} 
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'department_name' => $this->input->post('department_name'),
		'company_id' => $this->input->post('company_id'),
		'location_id' => $this->input->post('location_id'),
		'employee_id' => $this->input->post('employee_id'),
		'added_by' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y'),
		
		);
		$result = $this->Department_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_add_department');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='department') {
			
		$id = $this->uri->segment(3);
		
		// Check validation for user input
		$this->form_validation->set_rules('department_name', 'Department Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('location_id', 'Location', 'trim|required|xss_clean');
		$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required|xss_clean');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($this->input->post('department_name')==='') {
        	$Return['error'] = $this->lang->line('error_department_field');
		} else if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('location_id')==='') {
			$Return['error'] = $this->lang->line('error_location_dept_field');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('error_department_head_field');
		}  
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'department_name' => $this->input->post('department_name'),
		'company_id' => $this->input->post('company_id'),
		'location_id' => $this->input->post('location_id'),
		'employee_id' => $this->input->post('employee_id'),
		);
		
		$result = $this->Department_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_update_department');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function delete() {
		
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		$id = $this->uri->segment(3);
		$result = $this->Department_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_delete_department');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
