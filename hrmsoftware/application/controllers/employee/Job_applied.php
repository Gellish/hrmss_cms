<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_applied extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Job_post_model");
		$this->load->model("Xin_model");
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
		$data['breadcrumbs'] = $this->lang->line('left_jobs_applied');
		$data['path_url'] = 'user/user_job_applied';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/job_applied_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function applied_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/job_applied_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$candidates = $this->Job_post_model->get_employee_jobs_applied($session['user_id']);
		
		$data = array();

        foreach($candidates->result() as $r) {
			 			  
		// get user
		$user = $this->Xin_model->read_user_info($r->user_id);
		// get full name
		if(!is_null($user)){
			$full_name = $user[0]->first_name. ' ' .$user[0]->last_name;
			$uemail = $user[0]->email;
		} else {
			$full_name = '--';	
			$uemail = '--';
		}
		// get job title
		$job = $this->Job_post_model->read_job_information($r->job_id);
		if(!is_null($job)){
			$job_title = $job[0]->job_title;
		} else {
			$job_title = '--';	
		}
		// get date
		$created_at = $this->Xin_model->set_date_format($r->created_at);
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="Download">
			<a href="'.site_url().'download?type=resume&filename='.$r->job_resume.'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" title="Download"><i class="fa fa-download"></i></button></a></span><a href="'.site_url().'frontend/jobs/detail/'.$r->job_id.'/" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i></button></a>',
			$job_title,
			$full_name,
			$uemail,
			$r->application_status,
			$created_at
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $candidates->num_rows(),
			 "recordsFiltered" => $candidates->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
