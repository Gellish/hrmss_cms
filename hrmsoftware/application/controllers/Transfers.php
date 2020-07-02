<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfers extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('email');
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Transfers_model");
		$this->load->model("Xin_model");
		$this->load->model("Department_model");
		$this->load->model("Location_model");
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
		$data['all_locations'] = $this->Xin_model->all_locations();
		$data['all_departments'] = $this->Department_model->all_departments();
		$data['breadcrumbs'] = $this->lang->line('xin_transfers');
		$data['path_url'] = 'transfers';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('16',$role_resources_ids)) {
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("transfers/transfer_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
			} else {
				redirect('');
			}
		} else {
			redirect('dashboard/');
		}		  
     }
 
    public function transfer_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("transfers/transfer_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$transfer = $this->Transfers_model->get_transfers();
		
		$data = array();

        foreach($transfer->result() as $r) {
			 			  
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
		// get date
		$transfer_date = $this->Xin_model->set_date_format($r->transfer_date);
		// get department by id
		$department = $this->Department_model->read_department_information($r->transfer_department);
		if(!is_null($department)){
			$department_name = $department[0]->department_name;
		} else {
			$department_name = '--';	
		}
		// get location by id
		$location = $this->Location_model->read_location_information($r->transfer_location);
		if(!is_null($location)){
			$location_name = $location[0]->location_name;
		} else {
			$location_name = '--';	
		}
		// get status
		if($r->status==0): $status = $this->lang->line('xin_pending');
		elseif($r->status==1): $status = $this->lang->line('xin_accepted'); else: $status = $this->lang->line('xin_rejected'); endif;
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-transfer_id="'. $r->transfer_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-transfer_id="'. $r->transfer_id . '"><i class="fa fa-eye"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->transfer_id . '"><i class="fa fa-trash-o"></i></button></span>',
			$employee_name,
			$transfer_date,
			$department_name,
			$location_name,
			$status,
			$full_name
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $transfer->num_rows(),
			 "recordsFiltered" => $transfer->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 public function read()
	{
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('transfer_id');
		$result = $this->Transfers_model->read_transfer_information($id);
		$data = array(
				'transfer_id' => $result[0]->transfer_id,
				'employee_id' => $result[0]->employee_id,
				'transfer_date' => $result[0]->transfer_date,
				'transfer_department' => $result[0]->transfer_department,
				'transfer_location' => $result[0]->transfer_location,
				'description' => $result[0]->description,
				'status' => $result[0]->status,
				'all_employees' => $this->Xin_model->all_employees(),
				'all_locations' => $this->Xin_model->all_locations(),
				'all_departments' => $this->Department_model->all_departments()
				);
		if(!empty($session)){ 
			$this->load->view('transfers/dialog_transfer', $data);
		} else {
			redirect('');
		}
	}
	
	// Validate and add info in database
	public function add_transfer() {
	
		if($this->input->post('add_type')=='transfer') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('transfer_date')==='') {
			$Return['error'] = $this->lang->line('xin_transfers_error_date');
		} else if($this->input->post('transfer_department')==='') {
			 $Return['error'] = $this->lang->line('xin_employee_error_department');
		} else if($this->input->post('transfer_location')==='') {
       		$Return['error'] = $this->lang->line('error_location_dept_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'transfer_date' => $this->input->post('transfer_date'),
		'transfer_department' => $this->input->post('transfer_department'),
		'description' => $qt_description,
		'transfer_location' => $this->input->post('transfer_location'),
		'added_by' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y'),
		
		);
		$result = $this->Transfers_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_transfers_success_added');
			
			//get setting info 
			$setting = $this->Xin_model->read_setting_info(1);
			if($setting[0]->enable_email_notification == 'yes') {
				
				$this->email->set_mailtype("html");
				
				//get company info
				$cinfo = $this->Xin_model->read_company_setting_info(1);
				//get email template
				$template = $this->Xin_model->read_email_template(9);
				//get employee info
				$user_info = $this->Xin_model->read_user_info($this->input->post('employee_id'));
				
				$full_name = $user_info[0]->first_name.' '.$user_info[0]->last_name;
						
				$subject = $template[0]->subject.' - '.$cinfo[0]->company_name;
				$logo = base_url().'uploads/logo/'.$cinfo[0]->logo;
				
				$message = '
			<div style="background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;padding: 20px;">
			<img src="'.$logo.'" title="'.$cinfo[0]->company_name.'"><br>'.str_replace(array("{var site_name}","{var site_url}","{var employee_name}"),array($cinfo[0]->company_name,site_url(),$full_name),htmlspecialchars_decode(stripslashes($template[0]->message))).'</div>';
				
				$this->email->from($cinfo[0]->email, $cinfo[0]->company_name);
				$this->email->to($user_info[0]->email);
				
				$this->email->subject($subject);
				$this->email->message($message);
				
				$this->email->send();
			}
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='transfer') {
			
		$id = $this->uri->segment(3);
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('transfer_date')==='') {
			$Return['error'] = $this->lang->line('xin_transfers_error_date');
		} else if($this->input->post('transfer_department')==='') {
			 $Return['error'] = $this->lang->line('xin_employee_error_department');
		} else if($this->input->post('transfer_location')==='') {
       		$Return['error'] = $this->lang->line('error_location_dept_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'transfer_date' => $this->input->post('transfer_date'),
		'transfer_department' => $this->input->post('transfer_department'),
		'description' => $qt_description,
		'transfer_location' => $this->input->post('transfer_location'),
		'status' => $this->input->post('status'),
		);
		
		$result = $this->Transfers_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_transfers_success_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function delete() {
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		$id = $this->uri->segment(3);
		$result = $this->Transfers_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_transfers_success_deleted');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
