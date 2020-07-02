<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Resignation extends MY_Controller {
	
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
		$this->load->model("Resignation_model");
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
		$data['breadcrumbs'] = $this->lang->line('left_resignations');
		$data['path_url'] = 'resignation';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('17',$role_resources_ids)) {
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("resignation/resignation_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
			} else {
				redirect('');
			}
		} else {
			redirect('dashboard/');
		}		  
     }
 
    public function resignation_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("resignation/resignation_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$resignation = $this->Resignation_model->get_resignations();
		
		$data = array();

        foreach($resignation->result() as $r) {
			 			  
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
		// get notice date
		$notice_date = $this->Xin_model->set_date_format($r->notice_date);
		// get resignation date
		$resignation_date = $this->Xin_model->set_date_format($r->resignation_date);
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-resignation_id="'. $r->resignation_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-resignation_id="'. $r->resignation_id . '"><i class="fa fa-eye"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->resignation_id . '"><i class="fa fa-trash-o"></i></button></span>',
			$employee_name,
			$notice_date,
			$resignation_date,
			$full_name
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $resignation->num_rows(),
			 "recordsFiltered" => $resignation->num_rows(),
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
		$id = $this->input->get('resignation_id');
		$result = $this->Resignation_model->read_resignation_information($id);
		$data = array(
				'resignation_id' => $result[0]->resignation_id,
				'employee_id' => $result[0]->employee_id,
				'notice_date' => $result[0]->notice_date,
				'resignation_date' => $result[0]->resignation_date,
				'reason' => $result[0]->reason,
				'all_employees' => $this->Xin_model->all_employees(),
				);
		if(!empty($session)){ 
			$this->load->view('resignation/dialog_resignation', $data);
		} else {
			redirect('');
		}
	}
	
	// Validate and add info in database
	public function add_resignation() {
	
		if($this->input->post('add_type')=='resignation') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$reason = $this->input->post('reason');
		$qt_reason = htmlspecialchars(addslashes($reason), ENT_QUOTES);
		
		if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('notice_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_resignation_notice_date');
		} else if($this->input->post('resignation_date')==='') {
			 $Return['error'] = $this->lang->line('xin_error_resignation_date');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'notice_date' => $this->input->post('notice_date'),
		'resignation_date' => $this->input->post('resignation_date'),
		'reason' => $qt_reason,
		'added_by' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y'),
		
		);
		$result = $this->Resignation_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_resignation_added');
			
			//get setting info 
			$setting = $this->Xin_model->read_setting_info(1);
			if($setting[0]->enable_email_notification == 'yes') {
				
				$this->email->set_mailtype("html");
				
				//get company info
				$cinfo = $this->Xin_model->read_company_setting_info(1);
				//get email template
				$template = $this->Xin_model->read_email_template(12);
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
	
		if($this->input->post('edit_type')=='resignation') {
			
		$id = $this->uri->segment(3);
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$reason = $this->input->post('reason');
		$qt_reason = htmlspecialchars(addslashes($reason), ENT_QUOTES);
		
		if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('notice_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_resignation_notice_date');
		} else if($this->input->post('resignation_date')==='') {
			 $Return['error'] = $this->lang->line('xin_error_resignation_date');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'notice_date' => $this->input->post('notice_date'),
		'resignation_date' => $this->input->post('resignation_date'),
		'reason' => $qt_reason,
		);
		
		$result = $this->Resignation_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_resignation_updated');
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
		$result = $this->Resignation_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_resignation_deleted');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
