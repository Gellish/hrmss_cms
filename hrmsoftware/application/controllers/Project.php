<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		// load email library
		$this->load->library('email');
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Project_model");
		$this->load->model("Xin_model");
		$this->load->model("Company_model");
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
		$data['all_companies'] = $this->Xin_model->get_companies();
		$data['breadcrumbs'] = $this->lang->line('xin_projects');
		$data['path_url'] = 'project';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('7',$role_resources_ids)) {
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("project/project_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
			} else {
				redirect('');
			}
		} else {
			redirect('dashboard/');
		}		  
     }
	 
	 public function detail()
     {
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		//$data['all_employees'] = $this->Xin_model->all_employees();
		//$data['all_companies'] = $this->Xin_model->get_companies();
		//$data['breadcrumbs'] = $this->lang->line('xin_project_detail');
		$id = $this->uri->segment(3);
		$result = $this->Project_model->read_project_information($id);
		if(is_null($result)){
			redirect('project');
		}
		// get user > added by
		$user = $this->Xin_model->read_user_info($result[0]->added_by);
		// user full name
		if(!is_null($user)){
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$full_name = '--';	
		}
		$data = array(
			'breadcrumbs' => $this->lang->line('xin_project_detail'),
			'project_id' => $result[0]->project_id,
			'title' => $result[0]->title,
			'project_note' => $result[0]->project_note,
			'summary' => $result[0]->summary,
			'client_name' => $result[0]->client_name,
			'start_date' => $result[0]->start_date,
			'end_date' => $result[0]->end_date,
			'company_id' => $result[0]->company_id,
			'assigned_to' => $result[0]->assigned_to,
			'created_at' => $result[0]->created_at,
			'priority' => $result[0]->priority,
			'added_by' => $full_name,
			'description' => $result[0]->description,
			'progress' => $result[0]->project_progress,
			'status' => $result[0]->status,
			'path_url' => 'project_detail',
			'all_employees' => $this->Xin_model->all_employees(),
			'all_companies' => $this->Xin_model->get_companies()
			);

		$role_resources_ids = $this->Xin_model->user_role_resource();
		//if(in_array('7',$role_resources_ids)) {
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("project/project_details", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
			} else {
				redirect('');
			}
		/*} else {
			redirect('dashboard/');
		}*/		  
     }
 
    public function project_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("project/project_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$project = $this->Project_model->get_projects();
		
		$data = array();

        foreach($project->result() as $r) {
			 			  
		// get user > added by
		$user = $this->Xin_model->read_user_info($r->added_by);
		// user full name
		
		if(!is_null($user)){
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$full_name = '--';	
		}
		// get date
		$pdate = '<i class="fa fa-calendar position-left"></i> '.$this->Xin_model->set_date_format($r->end_date);
		
		//project_progress
		if($r->project_progress <= 20) {
			$progress_class = 'progress-danger';
		} else if($r->project_progress > 20 && $r->project_progress <= 50){
			$progress_class = 'progress-warning';
		} else if($r->project_progress > 50 && $r->project_progress <= 75){
			$progress_class = 'progress-info';
		} else {
			$progress_class = 'progress-success';
		}
		
		// progress
		
		$pbar = '<p class="m-b-0-5">'.$this->lang->line('xin_completed').' <span class="pull-xs-right">'.$r->project_progress.'%</span></p><progress class="progress '.$progress_class.' progress-sm" value="'.$r->project_progress.'" max="100">'.$r->project_progress.'%</progress>';
				
		//status
		if($r->status == 0) {
			$status = $this->lang->line('xin_not_started');
		} else if($r->status ==1){
			$status = $this->lang->line('xin_in_progress');
		} else if($r->status ==2){
			$status = $this->lang->line('xin_completed');
		} else {
			$status = $this->lang->line('xin_deffered');
		}
		
		// priority
		if($r->priority == 1) {
			$priority = '<span class="tag tag-danger">'.$this->lang->line('xin_highest').'</span>';
		} else if($r->priority ==2){
			$priority = '<span class="tag tag-danger">'.$this->lang->line('xin_high').'</span>';
		} else if($r->priority ==3){
			$priority = '<span class="tag tag-primary">'.$this->lang->line('xin_normal').'</span>';
		} else {
			$priority = '<span class="tag tag-success">'.$this->lang->line('xin_low').'</span>';
		}
		
		//assigned user
		if($r->assigned_to == '') {
			$ol = $this->lang->line('xin_not_assigned');
		} else {
			$ol = '';
			foreach(explode(',',$r->assigned_to) as $desig_id) {
				$assigned_to = $this->Xin_model->read_user_info($desig_id);
				if(!is_null($assigned_to)){
					
				$assigned_name = $assigned_to[0]->first_name.' '.$assigned_to[0]->last_name;
				 if($assigned_to[0]->profile_picture!='' && $assigned_to[0]->profile_picture!='no file') {
                    $ol .= '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="'.$assigned_name.'"><span class="avatar box-32"><img src="'.base_url().'uploads/profile/'.$assigned_to[0]->profile_picture.'" class="b-a-radius-circle" alt=""></span></a>';
                    } else {
                    if($assigned_to[0]->gender=='Male') { 
                    	$de_file = base_url().'uploads/profile/default_male.jpg';
                     } else {
                     	$de_file = base_url().'uploads/profile/default_female.jpg';
                     }
                    $ol .= '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="'.$assigned_name.'"><span class="avatar box-32"><img src="'.$de_file.'" class="b-a-radius-circle" alt=""></span></a>';
                    }
				} ////
				else {
					$ol .= '';
				}
			 }
			 $ol .= '';
		}
		
		$project_summary = '<div class="text-semibold"><a href="'.site_url().'project/detail/'.$r->project_id . '">'.$r->title.'</a></div>
					        <div class="text-muted">'.$r->summary.'</div>';
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-project_id="'. $r->project_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->project_id . '"><i class="fa fa-trash-o"></i></button></span>',
			$project_summary,
			$priority,
			$pdate,
			$pbar,
			$ol
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $project->num_rows(),
			 "recordsFiltered" => $project->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 public function read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('project_id');
		$result = $this->Project_model->read_project_information($id);
		$data = array(
				'project_id' => $result[0]->project_id,
				'title' => $result[0]->title,
				'client_name' => $result[0]->client_name,
				'start_date' => $result[0]->start_date,
				'end_date' => $result[0]->end_date,
				'company_id' => $result[0]->company_id,
				'priority' => $result[0]->priority,
				'summary' => $result[0]->summary,
				'assigned_to' => $result[0]->assigned_to,
				'description' => $result[0]->description,
				'project_progress' => $result[0]->project_progress,
				'status' => $result[0]->status,
				'all_employees' => $this->Xin_model->all_employees(),
				'all_companies' => $this->Xin_model->get_companies()
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('project/dialog_project', $data);
		} else {
			redirect('');
		}
	}
		
	// Validate and add info in database
	public function add_project() {
	
		if($this->input->post('add_type')=='project') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$description = $this->input->post('description');
		$st_date = strtotime($start_date);
		$ed_date = strtotime($end_date);
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_title');
		} else if($this->input->post('client_name')==='') {
			$Return['error'] = $this->lang->line('xin_error_client_name');
		} else if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_company');
		} else if($this->input->post('start_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_start_date');
		} else if($this->input->post('end_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_end_date');
		} else if($st_date > $ed_date) {
			$Return['error'] = $this->lang->line('xin_error_start_end_date');
		}  else if(empty($this->input->post('assigned_to'))) {
			 $Return['error'] = $this->lang->line('xin_error_project_manager');
		} else if($this->input->post('summary')==='') {
			$Return['error'] = $this->lang->line('xin_error_summary');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		$assigned_ids = implode(',',$this->input->post('assigned_to'));
		$employee_ids = $assigned_ids;
	
		$data = array(
		'title' => $this->input->post('title'),
		'client_name' => $this->input->post('client_name'),
		'company_id' => $this->input->post('company_id'),
		'start_date' => $this->input->post('start_date'),
		'end_date' => $this->input->post('end_date'),
		'summary' => $this->input->post('summary'),
		'priority' => $this->input->post('priority'),
		'assigned_to' => $employee_ids,
		'description' => $qt_description,
		'project_progress' => '0',
		'status' => '0',
		'added_by' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y'),
		
		);
		$result = $this->Project_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_add_project');
			
			//get setting info 
			$setting = $this->Xin_model->read_setting_info(1);
			if($setting[0]->enable_email_notification == 'yes') {
				
				$this->email->set_mailtype("html");
				
				$to_email = array();
				foreach($this->input->post('assigned_to') as $p_employee) {
					
				$user_info = $this->Xin_model->read_user_info($p_employee);				
					//get company info
				$cinfo = $this->Xin_model->read_company_setting_info(1);
				//get email template
				$template = $this->Xin_model->read_email_template(3);
				
				$subject = $template[0]->subject.' - '.$cinfo[0]->company_name;
				$logo = base_url().'uploads/logo/'.$cinfo[0]->logo;
				
				$p_date = $this->Xin_model->set_date_format($start_date);
				
				$message = '
				<div style="background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;padding: 20px;">
				<img src="'.$logo.'" title="'.$cinfo[0]->company_name.'"><br>'.str_replace(array("{var site_name}","{var name}","{var project_name}","{var project_start_date}"),array($cinfo[0]->company_name,'User',$this->input->post('title'),$p_date),html_entity_decode(stripslashes($template[0]->message))).'</div>';
				
				$this->email->from($cinfo[0]->email, $cinfo[0]->company_name);
				$this->email->to($user_info[0]->email);
				
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				}
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
	
		if($this->input->post('edit_type')=='project') {
			
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
		
		if($this->input->post('title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_title');
		} else if($this->input->post('client_name')==='') {
			$Return['error'] = $this->lang->line('xin_error_client_name');
		} else if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_company');
		} else if($this->input->post('start_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_start_date');
		} else if($this->input->post('end_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_end_date');
		} else if($st_date > $ed_date) {
			$Return['error'] = $this->lang->line('xin_error_start_end_date');
		}  else if(empty($this->input->post('assigned_to'))) {
			 $Return['error'] = $this->lang->line('xin_error_project_manager');
		} else if($this->input->post('summary')==='') {
			$Return['error'] = $this->lang->line('xin_error_summary');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		if(null!=$this->input->post('assigned_to')) {
			$assigned_ids = implode(',',$this->input->post('assigned_to'));
			$employee_ids = $assigned_ids;
		} else {
			$employee_ids = 'all-employees';
		}
	
		$data = array(
		'title' => $this->input->post('title'),
		'client_name' => $this->input->post('client_name'),
		'company_id' => $this->input->post('company_id'),
		'start_date' => $this->input->post('start_date'),
		'end_date' => $this->input->post('end_date'),
		'summary' => $this->input->post('summary'),
		'priority' => $this->input->post('priority'),
		'assigned_to' => $employee_ids,
		'description' => $qt_description,
		'project_progress' => $this->input->post('progres_val'),
		'status' => $this->input->post('status'),		
		);
		
		$result = $this->Project_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_update_project');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update_status() {
	
		if($this->input->post('type')=='update_status') {
			
		$id = $this->input->post('project_id');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */		
		$data = array(
		'priority' => $this->input->post('priority'),
		'project_progress' => $this->input->post('progres_val'),
		'status' => $this->input->post('status'),		
		);
		
		$result = $this->Project_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_update_project');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database // assign_ticket
	public function assign_project() {
	
		if($this->input->post('type')=='project_user') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');		
		
		if(null!=$this->input->post('assigned_to')) {
			$assigned_ids = implode(',',$this->input->post('assigned_to'));
			$employee_ids = $assigned_ids;
		} else {
			$employee_ids = '';
		}
	
		$data = array(
		'assigned_to' => $employee_ids
		);
		$id = $this->input->post('project_id');
		$result = $this->Project_model->update_record($data,$id);
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_project_employees_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// update task user > task details
	public function project_users() {

		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(3);
		
		$data = array(
			'project_id' => $id,
			'all_employees' => $this->Xin_model->all_employees(),
			);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("project/get_project_users", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }

	public function discussion_list()
     {

		$session = $this->session->userdata('username');
		if(empty($session)){
			redirect('');
		}
		
		$data['title'] = $this->Xin_model->site_title();
		//$id = $this->input->get('ticket_id');
		$id = $this->uri->segment(3);
		
		$ses_user = $this->Xin_model->read_user_info($session['user_id']);
		$this->load->view("project/project_details", $data);
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$discussion = $this->Project_model->get_discussion($id);
		
		$data = array();

        foreach($discussion->result() as $r) {
			 			  		
		// get user > employee_
		$employee = $this->Xin_model->read_user_info($r->user_id);
		// employee full name
		if(!is_null($employee)){
			$employee_name = $employee[0]->first_name.' '.$employee[0]->last_name;
			// get designation
			$_designation = $this->Designation_model->read_designation_information($employee[0]->designation_id);
			if(!is_null($_designation)){
				$designation_name = $_designation[0]->designation_name;
			} else {
				$designation_name = '--';	
			}
			
			// profile picture
			if($employee[0]->profile_picture!='' && $employee[0]->profile_picture!='no file') {
				$u_file = base_url().'uploads/profile/'.$employee[0]->profile_picture;
			} else {
				if($employee[0]->gender=='Male') { 
					$u_file = base_url().'uploads/profile/default_male.jpg';
				} else {
					$u_file = base_url().'uploads/profile/default_female.jpg';
				}
			} 
		} else {
			$employee_name = '--';
			$designation_name = '--';
			$u_file = '--';
		}
		// created at
		$created_at = date('h:i A', strtotime($r->created_at));
		$_date = explode(' ',$r->created_at);
		$date = $this->Xin_model->set_date_format($_date[0]);
		//
		if($ses_user[0]->user_role_id==1){
			$link = '<a class="c-user text-black" href="'.site_url().'employees/detail/'.$r->user_id.'"><span class="underline">'.$employee_name.' ('.$designation_name.')</span></a>';
		} else {
			$link = '<span class="underline">'.$employee_name.' ('.$designation_name.')</span>';
		}
		
		if($r->attachment_file!='' && $r->attachment_file!='no_file'){
			$at_file = '<a data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_download').'" href="'.site_url().'download?type=project/discussion&filename='.$r->attachment_file.'"> <i class="fa fa-download"></i> </a>';
		} else {
			$at_file = '';
		}
				
		$function = '<div class="c-item">
					<div class="media">
						<div class="media-left">
							<div class="avatar box-48">
							<img class="b-a-radius-circle" src="'.$u_file.'">
							</div>
						</div>
						<div class="media-body">
							<div class="mb-0-5">
								'.$link.'
								<span class="font-90 text-muted">'.$date.' '.$created_at.'</span>
							</div>
							<div class="c-text">'.$r->message.'<br> '.$at_file.'</div>
						</div>
					</div>
				</div>';
		
		$data[] = array(
			$function
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $discussion->num_rows(),
			 "recordsFiltered" => $discussion->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }	 
	 
	// Validate and add info in database
	public function set_discussion() {
	
		if($this->input->post('add_type')=='set_discussion') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */		
		if($this->input->post('xin_message')==='') {
       		 $Return['error'] = $this->lang->line('xin_project_message');
		} 
		$xin_message = $this->input->post('xin_message');
		$qt_xin_message = htmlspecialchars(addslashes($xin_message), ENT_QUOTES);
		
		if($_FILES['attachment_discussion']['size'] == 0) {
			$fname = 'no_file';
		} else {
			// is file upload
			if(is_uploaded_file($_FILES['attachment_discussion']['tmp_name'])) {
				//checking image type
				$allowed =  array('png','jpg','gif','jpeg','pdf','doc','docx','xls','xlsx','txt','zip','rar','gzip','ppt');
				$filename = $_FILES['attachment_discussion']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				if(in_array($ext,$allowed)){
					$tmp_name = $_FILES["attachment_discussion"]["tmp_name"];
					$attachment_file = "uploads/project/discussion/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["attachment_discussion"]["name"]);
					$newfilename = 'discussion_'.round(microtime(true)).'.'.$ext;
					move_uploaded_file($tmp_name, $attachment_file.$newfilename);
					$fname = $newfilename;
				} else {
					$Return['error'] = $this->lang->line('xin_error_project_file');
				}
			}
		}
		
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'message' => $qt_xin_message,
		'attachment_file' => $fname,
		'project_id' => $this->input->post('discussion_project_id'),
		'user_id' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y h:i:s')
		);
		$result = $this->Project_model->add_discussion($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_project_message_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	} 
	
	public function bug_list()
     {

		$session = $this->session->userdata('username');
		if(empty($session)){
			redirect('');
		}
		
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(3);
		
		$ses_user = $this->Xin_model->read_user_info($session['user_id']);
		$this->load->view("project/project_details", $data);
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$bug = $this->Project_model->get_bug($id);
		
		$data = array();

        foreach($bug->result() as $r) {
			 			  		
		// get user > employee_
		$employee = $this->Xin_model->read_user_info($r->user_id);
		// employee full name
		if(!is_null($employee)){
			$employee_name = $employee[0]->first_name.' '.$employee[0]->last_name;
			// get designation
			$_designation = $this->Designation_model->read_designation_information($employee[0]->designation_id);
			if(!is_null($_designation)){
				$designation_name = $_designation[0]->designation_name;
			} else {
				$designation_name = '--';	
			}
			
			// profile picture
			if($employee[0]->profile_picture!='' && $employee[0]->profile_picture!='no file') {
				$u_file = base_url().'uploads/profile/'.$employee[0]->profile_picture;
			} else {
				if($employee[0]->gender=='Male') { 
					$u_file = base_url().'uploads/profile/default_male.jpg';
				} else {
					$u_file = base_url().'uploads/profile/default_female.jpg';
				}
			} 
		} else {
			$employee_name = '--';
			$designation_name = '--';
			$u_file = '--';
		}
		// created at
		$created_at = date('h:i A', strtotime($r->created_at));
		$_date = explode(' ',$r->created_at);
		$date = $this->Xin_model->set_date_format($_date[0]);
		//
		if($ses_user[0]->user_role_id==1){
			$link = '<a class="c-user text-black" href="'.site_url().'employees/detail/'.$r->user_id.'"><span class="underline">'.$employee_name.' ('.$designation_name.')</span></a>';
		} else {
			$link = '<span class="underline">'.$employee_name.' ('.$designation_name.')</span>';
		}
		
		if($r->attachment_file!='' && $r->attachment_file!='no_file'){
			$at_file = '<a data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_download').'" href="'.site_url().'download?type=project/bug&filename='.$r->attachment_file.'"> <i class="fa fa-download"></i> </a>';
		} else {
			$at_file = '';
		}
		
		if($ses_user[0]->user_role_id==1 || $ses_user[0]->user_id==$r->user_id){
			$dlink = '<div class="media-right">
							<div class="c-rating">
							<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_update_status').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".view-modal-data"  data-bug_id="'. $r->bug_id . '"><i class="fa fa-pencil-square-o"></i></button></span>
							<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'">
								<a class="btn btn-danger btn-sm delete" href="#" data-toggle="modal" data-target=".delete-modal" data-record-id="'.$r->bug_id.'">
			  <i class="ti-trash m-r-0-5"></i></a></span>
							</div>
						</div>';
		} else {
			$dlink = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_update_status').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-bug_id="'. $r->bug_id . '"><i class="fa fa-pencil-square-o"></i></button></span>';
		}
			
		if($r->status==0) {
			$status = '<select name="status" id="status" class="bug_status" data-bug-id="'.$r->bug_id.'">
							<option value="0" selected="selected">'.$this->lang->line('xin_pending').'</option>
							<option value="1">'.$this->lang->line('xin_project_status_solved').'</option>
							</select>';
			$st_tag = '<span class="tag tag-warning">'.$this->lang->line('xin_pending').'</span>';				
		} else {
			$status = '<select name="status" id="status" class="bug_status" data-bug-id="'.$r->bug_id.'">
							<option value="0">'.$this->lang->line('xin_pending').'</option>
							<option value="1" selected="selected">'.$this->lang->line('xin_project_status_solved').'</option>
							</select>';
			$st_tag = '<span class="tag tag-success">'.$this->lang->line('xin_project_status_solved').'</span>';				
		}
		$function = '<div class="c-item">
					<div class="media">
						<div class="media-left">
							<div class="avatar box-48">
							<img class="b-a-radius-circle" src="'.$u_file.'">
							</div>
						</div>
						<div class="media-body">
							<div class="mb-0-5">
								'.$link.'
								<span class="font-90 text-muted">'.$date.' '.$created_at.' &nbsp; '.$st_tag.'
							</div>
							<div class="c-text">'.$r->title.'<br> '.$at_file.'</div>
						</div>
						'.$dlink.'
					</div>
				</div>
				';
		
		$data[] = array(
			$function
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $bug->num_rows(),
			 "recordsFiltered" => $bug->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	
	// Validate and add info in database
	public function set_bug() {
	
		if($this->input->post('add_type')=='set_bug') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */		
		if($this->input->post('title')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_project_bug_title');
		} 
		$title = $this->input->post('title');
		$qt_title = htmlspecialchars(addslashes($title), ENT_QUOTES);
		
		if($_FILES['attachment']['size'] == 0) {
			$fname = 'no_file';
		} else {
			// is file upload
			if(is_uploaded_file($_FILES['attachment']['tmp_name'])) {
				//checking image type
				$allowed =  array('png','jpg','gif','jpeg','pdf','doc','docx','xls','xlsx','txt','zip','rar','gzip','ppt');
				$filename = $_FILES['attachment']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				if(in_array($ext,$allowed)){
					$tmp_name = $_FILES["attachment"]["tmp_name"];
					$attachment_file = "uploads/project/bug/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["attachment"]["name"]);
					$newfilename = 'bug_'.round(microtime(true)).'.'.$ext;
					move_uploaded_file($tmp_name, $attachment_file.$newfilename);
					$fname = $newfilename;
				} else {
					$Return['error'] = $this->lang->line('xin_error_project_file');
				}
			}
		}
		
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'title' => $qt_title,
		'attachment_file' => $fname,
		'project_id' => $this->input->post('bug_project_id'),
		'user_id' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y h:i:s')
		);
		$result = $this->Project_model->add_bug($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_project_bug_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and add info in database
	public function add_attachment() {
	
		if($this->input->post('add_type')=='dfile_attachment') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */		
		if($this->input->post('file_name')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_project_file_title');
		} else if($_FILES['attachment_file']['size'] == 0) {
			$Return['error'] = $this->lang->line('xin_error_task_file');
		} else if($this->input->post('file_description')==='') {
			 $Return['error'] = $this->lang->line('xin_error_task_file_description');
		}
		$description = $this->input->post('file_description');
		$file_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		// is file upload
		if(is_uploaded_file($_FILES['attachment_file']['tmp_name'])) {
			//checking image type
			$allowed =  array('png','jpg','gif','jpeg','pdf','doc','docx','xls','xlsx','txt','zip','rar','gzip','ppt');
			$filename = $_FILES['attachment_file']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			if(in_array($ext,$allowed)){
				$tmp_name = $_FILES["attachment_file"]["tmp_name"];
				$attachment_file = "uploads/project/files/";
				// basename() may prevent filesystem traversal attacks;
				// further validation/sanitation of the filename may be appropriate
				$name = basename($_FILES["attachment_file"]["name"]);
				$newfilename = 'project_'.round(microtime(true)).'.'.$ext;
				move_uploaded_file($tmp_name, $attachment_file.$newfilename);
				$fname = $newfilename;
			} else {
				$Return['error'] = $this->lang->line('xin_error_project_file');
			}
		}
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		$data = array(
		'project_id' => $this->input->post('project_id'),
		'upload_by' => $this->input->post('user_id'),
		'file_title' => $this->input->post('file_name'),
		'file_description' => $file_description,
		'attachment_file' => $fname,
		'created_at' => date('d-m-Y h:i:s')
		);
		$result = $this->Project_model->add_new_attachment($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_project_file_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// attachment list
	  public function attachment_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		//$id = $this->input->get('ticket_id');
		$id = $this->uri->segment(3);
		$session = $this->session->userdata('username');
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$attachments = $this->Project_model->get_attachments($id);

		$data = array();

        foreach($attachments->result() as $r) {
			 			  				
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_download').'"><a href="'.site_url().'download?type=task&filename='.$r->attachment_file.'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-download"></i></button></a></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light fidelete" data-toggle="modal" data-target=".delete-modal-file" data-record-id="'. $r->project_attachment_id . '"><i class="fa fa-trash-o"></i></button></span>',
			$r->file_title,
			$r->file_description,
			$r->created_at
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $attachments->num_rows(),
			 "recordsFiltered" => $attachments->num_rows(),
			 "data" => $data
		);

	  echo json_encode($output);
	  exit();
     }
	 
	 // delete attachment
	 public function attachment_delete() {
		if($this->input->post('is_ajax') == '8') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'');
			$id = $this->uri->segment(3);
			$result = $this->Project_model->delete_attachment_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_project_file_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	
	// Validate and update info in database // add_note
	public function add_note() {
	
		if($this->input->post('type')=='add_note') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');		
			
		$data = array(
		'project_note' => $this->input->post('project_note')
		);
		$id = $this->input->post('note_project_id');
		$result = $this->Project_model->update_record($data,$id);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_project_note_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function bug_read()
	{
		
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('bug_id');
		$result = $this->Project_model->read_bug_information($id);
		$data = array(
				'bug_id' => $result[0]->bug_id,
				'project_id' => $result[0]->project_id,
				'status' => $result[0]->status,
				);
		$this->load->view('project/dialog_project_bug', $data);
	}
	
	public function change_bug_status() {
		if($this->input->post('data') == 'change_status') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'');
			$id = $this->uri->segment(3);
			
			$data = array(
			'status' => $this->input->post('status'),
			);
			$result = $this->Project_model->update_bug($data,$id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_project_bug_status_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	
	public function bug_delete() {
		if($this->input->post('data') == 'bug') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'');
			$id = $this->uri->segment(3);
			$result = $this->Project_model->delete_bug_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_project_bug_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	
	public function delete() {
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		$id = $this->uri->segment(3);
		$result = $this->Project_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_delete_project');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
