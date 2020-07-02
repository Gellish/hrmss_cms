<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Training_model");
		$this->load->model("Xin_model");
		$this->load->model("Trainers_model");
		$this->load->model("Designation_model");
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
		$data['all_trainers'] = $this->Trainers_model->all_trainers();
		$data['all_training_types'] = $this->Training_model->all_training_types();
		$data['breadcrumbs'] = $this->lang->line('left_training');
		$data['path_url'] = 'user/user_training';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/training_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function training_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/training_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$training = $this->Training_model->get_training();
		
		$data = array();

        foreach($training->result() as $r) {
			
		 $aim = explode(',',$r->employee_id);
		 foreach($aim as $dIds) {
		 if($session['user_id'] == $dIds) {
		
		// get training type
		$type = $this->Training_model->read_training_type_information($r->training_type_id);
		if(!is_null($type)){
			$itype = $type[0]->type;
		} else {
			$itype = '--';	
		}
		// get trainer
		$trainer = $this->Trainers_model->read_trainer_information($r->trainer_id);
		// trainer full name
		if(!is_null($trainer)){
			$trainer_name = $trainer[0]->first_name.' '.$trainer[0]->last_name;
		} else {
			$trainer_name = '--';	
		}
		// get start date
		$start_date = $this->Xin_model->set_date_format($r->start_date);
		// get end date
		$finish_date = $this->Xin_model->set_date_format($r->finish_date);
		// training date
		$training_date = $start_date.' '.$this->lang->line('dashboard_to').' '.$finish_date;
		// set currency
		$training_cost = $this->Xin_model->currency_sign($r->training_cost);
		/* get Employee info*/
		if($r->employee_id == '') {
			$ol = '--';
		} else {
			$ol = '<ol class="nl">';
			foreach(explode(',',$r->employee_id) as $uid) {
				$user = $this->Xin_model->read_user_info($uid);
				$ol .= '<li>'.$user[0]->first_name.' '.$user[0]->last_name.'</li>';
			 }
			 $ol .= '</ol>';
		}
		// status
		if($r->training_status==0): $status = $this->lang->line('xin_pending');
		elseif($r->training_status==1): $status = $this->lang->line('xin_started'); elseif($r->training_status==2): $status = $this->lang->line('xin_completed');
		else: $status = $this->lang->line('xin_terminated'); endif;
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view_details').'"><a href="'.site_url().'training/details/'.$r->training_id.'/"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i></button></a></span>',
			$ol,
			$itype,
			$trainer_name,
			$training_date,
			$training_cost,
			$status
		);
      }
		 } } // e- training
	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $training->num_rows(),
			 "recordsFiltered" => $training->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 public function read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('training_id');
		$result = $this->Training_model->read_training_information($id);
		$data = array(
				'training_id' => $result[0]->training_id,
				'employee_id' => $result[0]->employee_id,
				'training_type_id' => $result[0]->training_type_id,
				'trainer_id' => $result[0]->trainer_id,
				'start_date' => $result[0]->start_date,
				'finish_date' => $result[0]->finish_date,
				'training_cost' => $result[0]->training_cost,
				'training_status' => $result[0]->training_status,
				'description' => $result[0]->description,
				'performance' => $result[0]->performance,
				'remarks' => $result[0]->remarks,
				'all_employees' => $this->Xin_model->all_employees(),
				'all_training_types' => $this->Training_model->all_training_types(),
				'all_trainers' => $this->Trainers_model->all_trainers(),
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('training/dialog_training', $data);
		} else {
			redirect('');
		}
	}
	
	// Validate and add info in database
	public function add_training() {
	
		if($this->input->post('add_type')=='training') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$description = $this->input->post('description');
		$st_date = strtotime($start_date);
		$ed_date = strtotime($end_date);
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('training_type')==='') {
        	$Return['error'] = "The training type field is required.";
		} else if($this->input->post('trainer')==='') {
			$Return['error'] = "The trainer field is required.";
		} else if($this->input->post('start_date')==='') {
			$Return['error'] = "The start date field is required.";
		} else if($this->input->post('end_date')==='') {
			$Return['error'] = "The end date field is required.";
		} else if($st_date > $ed_date) {
			$Return['error'] = "Start Date should be less than End Date.";
		} 
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		if(isset($_POST['employee_id'])) {
			$employee_ids = implode(',',$_POST['employee_id']);
			$employee_id = $employee_ids;
		} else {
			$employee_id = '';
		}
	
		$data = array(
		'training_type_id' => $this->input->post('training_type'),
		'trainer_id' => $this->input->post('trainer'),
		'training_cost' => $this->input->post('training_cost'),
		'start_date' => $this->input->post('start_date'),
		'finish_date' => $this->input->post('end_date'),
		'employee_id' => $employee_id,
		'description' => $qt_description,
		'created_at' => date('d-m-Y h:i:s')
		);
		$result = $this->Training_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = 'Training added.';
		} else {
			$Return['error'] = 'Bug. Something went wrong, please try again.';
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='training') {
			
		$id = $this->uri->segment(3);
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$description = $this->input->post('description');
		$st_date = strtotime($start_date);
		$ed_date = strtotime($end_date);
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('training_type')==='') {
        	$Return['error'] = "The training type field is required.";
		} else if($this->input->post('trainer')==='') {
			$Return['error'] = "The trainer field is required.";
		} else if($this->input->post('start_date')==='') {
			$Return['error'] = "The start date field is required.";
		} else if($this->input->post('end_date')==='') {
			$Return['error'] = "The end date field is required.";
		} else if($st_date > $ed_date) {
			$Return['error'] = "Start Date should be less than End Date.";
		} 
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		if(isset($_POST['employee_id'])) {
			$employee_ids = implode(',',$_POST['employee_id']);
			$employee_id = $employee_ids;
		} else {
			$employee_id = '';
		}
	
		$data = array(
		'training_type_id' => $this->input->post('training_type'),
		'trainer_id' => $this->input->post('trainer'),
		'training_cost' => $this->input->post('training_cost'),
		'start_date' => $this->input->post('start_date'),
		'finish_date' => $this->input->post('end_date'),
		'employee_id' => $employee_id,
		'description' => $qt_description
		);
		
		$result = $this->Training_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = 'Training updated.';
		} else {
			$Return['error'] = 'Bug. Something went wrong, please try again.';
		}
		$this->output($Return);
		exit;
		}
	}
	
	// training details
	public function details()
     {
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(3);
		$result = $this->Training_model->read_training_information($id);
		// get training type
		$type = $this->Training_model->read_training_type_information($result[0]->training_type_id);
		// get trainer
		$trainer = $this->Trainers_model->read_trainer_information($result[0]->trainer_id);
		// trainer full name
		$trainer_name = $trainer[0]->first_name.' '.$trainer[0]->last_name;
		$data = array(
				'training_id' => $result[0]->training_id,
				'type' => $type[0]->type,
				'trainer_first_name' => $trainer[0]->first_name,
				'trainer_last_name' => $trainer[0]->last_name,
				'training_cost' => $result[0]->training_cost,
				'start_date' => $result[0]->start_date,
				'finish_date' => $result[0]->finish_date,
				'created_at' => $result[0]->created_at,
				'description' => $result[0]->description,
				'performance' => $result[0]->performance,
				'training_status' => $result[0]->training_status,
				'remarks' => $result[0]->remarks,
				'employee_id' => $result[0]->employee_id,
				'all_employees' => $this->Xin_model->all_employees(),
				);
			$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("training/training_details", $data);
		} else {
			redirect('');
		}		  
     }
	 
	 // Validate and update info in database
	public function update_status() {
	
		if($this->input->post('edit_type')=='update_status') {
			
		$id = $this->input->post('token_status');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
	
		$data = array(
		'performance' => $this->input->post('performance'),
		'training_status' => $this->input->post('status'),
		'remarks' => $this->input->post('remarks')
		);
		
		$result = $this->Training_model->update_status($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = 'Training status updated.';
		} else {
			$Return['error'] = 'Bug. Something went wrong, please try again.';
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function delete() {
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		$id = $this->uri->segment(3);
		$result = $this->Training_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = 'Training deleted.';
		} else {
			$Return['error'] = 'Bug. Something went wrong, please try again.';
		}
		$this->output($Return);
	}
}
