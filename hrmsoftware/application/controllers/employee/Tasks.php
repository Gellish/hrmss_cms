<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Timesheet_model");
		$this->load->model("Employees_model");
		$this->load->model("Xin_model");
		$this->load->model("Department_model");
		$this->load->model("Designation_model");
		$this->load->model("Roles_model");
		$this->load->model("Location_model");
		$this->load->model("Project_model");
	}
	
	/*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	} 
	 
	 // tasks >
	 public function index() {
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['breadcrumbs'] = $this->lang->line('left_tasks');
		$data['path_url'] = 'user/user_tasks';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/tasks", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
	 	 
	 // task list > timesheet
	 public function task_list() {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("timesheet/leave", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		$task = $this->Timesheet_model->get_tasks();
		
		$data = array();

          foreach($task->result() as $r) {
			  
			 $aim = explode(',',$r->assigned_to);
			 foreach($aim as $dIds) {
			 if($session['user_id'] == $dIds) {
			  
			if($r->assigned_to == '' || $r->assigned_to == 'None') {
				$ol = 'None';
			} else {
				$ol = '<ol class="nl">';
				foreach(explode(',',$r->assigned_to) as $uid) {
					$user = $this->Xin_model->read_user_info($uid);
					$ol .= '<li>'.$user[0]->first_name. ' '.$user[0]->last_name.'</li>';
				 }
			 $ol .= '</ol>';
			}
			//$ol = 'A';
			/* get User info*/
			$u_created = $this->Xin_model->read_user_info($r->created_by);
			if(!is_null($u_created)){
				$f_name = $u_created[0]->first_name.' '.$u_created[0]->last_name;
			} else {
				$f_name = '--';	
			}
			
			// task project
			$prj_task = $this->Project_model->read_project_information($r->project_id);
			if(!is_null($prj_task)){
				$prj_name = $prj_task[0]->title;
			} else {
				$prj_name = '--';
			}
			
			/// set task progress
			if($r->task_progress=='' || $r->task_progress==0): $progress = 0; else: $progress = $r->task_progress; endif;
			
			
			// task progress
			if($r->task_progress <= 20) {
			$progress_class = 'progress-danger';
			} else if($r->task_progress > 20 && $r->task_progress <= 50){
			$progress_class = 'progress-warning';
			} else if($r->task_progress > 50 && $r->task_progress <= 75){
			$progress_class = 'progress-info';
			} else {
			$progress_class = 'progress-success';
			}
			
			$progress_bar = '<p class="m-b-0-5">'.$this->lang->line('xin_completed').' <span class="pull-xs-right">'.$r->task_progress.'%</span></p><progress class="progress '.$progress_class.' progress-sm" value="'.$r->task_progress.'" max="100">'.$r->task_progress.'%</progress>';
			
			
			// task status
			if($r->task_status == 0) {
				$status = $this->lang->line('xin_not_started');
			} else if($r->task_status ==1){
				$status = $this->lang->line('xin_in_progress');
			} else if($r->task_status ==2){
				$status = $this->lang->line('xin_completed');
			} else {
				$status = $this->lang->line('xin_deffered');
			}
			// task end date
			$tdate = $this->Xin_model->set_date_format($r->end_date);
			 			
		   $data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view_details').'"><a href="'.site_url().'timesheet/task_details/id/'.$r->task_id.'/"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i></button></a></span>',
				$r->task_name.'<br>'.$this->lang->line('xin_project').': <a href="'.site_url().'project/detail/'.$r->project_id.'">'.$prj_name.'</a>',
				$tdate,
				$ol,
				$f_name,
				$status,
				$progress_bar
		   );
	  }
		} } // e-task
	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $task->num_rows(),
			 "recordsFiltered" => $task->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
			 
     }
	 
}
