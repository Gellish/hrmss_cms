<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Announcement_model");
		$this->load->model("Xin_model");
		$this->load->model("Company_model");
		$this->load->model("Location_model");
		$this->load->model("Department_model");
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
		$data['all_designations'] = $this->Designation_model->all_designations();
		$data['breadcrumbs'] = $this->lang->line('xin_announcements');
		$data['path_url'] = 'user/user_announcement';
		if(!empty($session)){
			$data['subview'] = $this->load->view("user/announcement_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function announcement_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/announcement_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$announcement = $this->Announcement_model->get_announcements();
		
		$data = array();

        foreach($announcement->result() as $r) {
						 			  
		// get user > added by
		$user = $this->Xin_model->read_user_info($r->published_by);
		// user full name
		if(!is_null($user)){
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$full_name = '--';	
		}
		// get date
		$sdate = $this->Xin_model->set_date_format($r->start_date);
		$edate = $this->Xin_model->set_date_format($r->end_date);
		
		$department = $this->Department_model->read_department_information($r->department_id);
		if(!is_null($department)){
			$department_name = $department[0]->department_name;
		} else {
			$department_name = '--';	
		}
		
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-announcement_id="'. $r->announcement_id . '"><i class="fa fa-eye"></i></button></span>',
			$r->title,
			$r->summary,
			$department_name,
			$sdate,
			$edate,
			$full_name
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $announcement->num_rows(),
			 "recordsFiltered" => $announcement->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
