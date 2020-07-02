<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Travel_model");
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
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['travel_arrangement_types'] = $this->Travel_model->travel_arrangement_types();
		$data['breadcrumbs'] = $this->lang->line('left_travels');
		$data['path_url'] = 'user/user_travels';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/travel_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function travel_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/travel_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$travel = $this->Travel_model->get_employee_travel($session['user_id']);
		
		$data = array();

        foreach($travel->result() as $r) {
			 			  
		// get user > added by
		$user = $this->Xin_model->read_user_info($r->added_by);
		// user full name
		if(!is_null($user)){
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$full_name = '--';	
		}
		
		// get user > employee_
		$employee = $this->Xin_model->read_user_info($r->employee_id);
		// employee full name
		if(!is_null($employee)){
			$employee_name = $employee[0]->first_name.' '.$employee[0]->last_name;
		} else {
			$employee_name = '--';	
		}
		// get start date
		$start_date = $this->Xin_model->set_date_format($r->start_date);
		// get end date
		$end_date = $this->Xin_model->set_date_format($r->end_date);
		// status
		if($r->status==0): $status = $this->lang->line('xin_pending');
		elseif($r->status==1): $status = $this->lang->line('xin_accepted'); else: $status = $this->lang->line('xin_rejected'); endif;
		
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-travel_id="'. $r->travel_id . '"><i class="fa fa-eye"></i></button></span>',
			$employee_name,
			$r->visit_purpose,
			$r->visit_place,
			$start_date,
			$end_date,
			$status,
			$full_name
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $travel->num_rows(),
			 "recordsFiltered" => $travel->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
