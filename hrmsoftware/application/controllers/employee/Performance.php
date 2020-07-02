<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Performance extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Performance_appraisal_model");
		$this->load->model("Xin_model");
		$this->load->model("Designation_model");
		$this->load->model("Department_model");
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
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['breadcrumbs'] = $this->lang->line('left_performance');
		$data['path_url'] = 'user/user_performance';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/performance_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function appraisal_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/performance_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$appraisal = $this->Performance_appraisal_model->get_employee_performance_appraisal($session['user_id']);
		
		$data = array();

        foreach($appraisal->result() as $r) {
			 			  
		// get user > added by
		$user = $this->Xin_model->read_user_info($r->employee_id);
		// user full name
		if(!is_null($user)){
				
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
			// department
			$department = $this->Department_model->read_department_information($user[0]->department_id);
			if(!is_null($department)){
				$department_name = $department[0]->department_name;
			} else {
				$department_name = '--';
			}
			// get designation
			$designation = $this->Designation_model->read_designation_information($user[0]->designation_id);
			if(!is_null($designation)){
				$designation_name = $designation[0]->designation_name;
			} else {
				$designation_name = '--';
			}
		} else {
			$full_name = '--';
			$designation_name = '--';
			$department_name = '--';
		}
		
		$d = explode('-',$r->appraisal_year_month);
		$get_month = date('F', mktime(0, 0, 0, $d[1], 10));
		$ap_date = $get_month.', '.$d[0];
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light view-data" data-toggle="modal" data-target=".view-modal-data" data-p_appraisal_id="'. $r->performance_appraisal_id . '"><i class="fa fa-eye"></i></button></span>',
			$full_name,
			$designation_name,
			$department_name,
			$ap_date
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $appraisal->num_rows(),
			 "recordsFiltered" => $appraisal->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
