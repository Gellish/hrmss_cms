<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Project_model");
		$this->load->model("Xin_model");
		$this->load->model("Company_model");
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
		$data['path_url'] = 'user/user_projects';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/projects", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
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
			 			  
		 $aim = explode(',',$r->assigned_to);
		 foreach($aim as $dIds) {
		 if($session['user_id'] == $dIds) {
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
		
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><a href="'.site_url().'project/detail/'.$r->project_id.'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i></button></a></span>',
			$project_summary,
			$priority,
			$pdate,
			$pbar,
			$ol
		);
      }
		 } } // e-project

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $project->num_rows(),
			 "recordsFiltered" => $project->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
