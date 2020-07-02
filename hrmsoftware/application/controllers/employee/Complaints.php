<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaints extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Complaints_model");
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
		$data['breadcrumbs'] = $this->lang->line('left_complaints');
		$data['path_url'] = 'user/user_complaints';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/complaint_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function complaint_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/complaint_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$complaint = $this->Complaints_model->get_complaints();
		
		$data = array();

        foreach($complaint->result() as $r) {
			
		 $aim = explode(',',$r->complaint_against);
		 foreach($aim as $dIds) {
		 if($session['user_id'] == $dIds) {	
			 			  
		// get user > added by
		$user = $this->Xin_model->read_user_info($r->complaint_from);
		// user full name
		if(!is_null($user)){
			$complaint_from = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$complaint_from = '--';	
		}
		// get complaint date
		$complaint_date = $this->Xin_model->set_date_format($r->complaint_date);
		
		if($r->complaint_against == '') {
			$ol = '--';
		} else {
			$ol = '<ol class="nl">';
			foreach(explode(',',$r->complaint_against) as $desig_id) {
				$_comp_name = $this->Xin_model->read_user_info($desig_id);
				if(!is_null($_comp_name)){
					$ol .= '<li>'.$_comp_name[0]->first_name.' '.$_comp_name[0]->last_name.'</li>';
				} else {
					$ol .= '';
				}
			 }
			 $ol .= '</ol>';
		}
		
		// get status
		if($r->status==0): $status = $this->lang->line('xin_pending');
		elseif($r->status==1): $status = $this->lang->line('xin_accepted'); else: $status = $this->lang->line('xin_rejected'); endif;
		
		// description
		$description =  html_entity_decode($r->description);
		
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-complaint_id="'. $r->complaint_id . '"><i class="fa fa-eye"></i></button></span>',
			$complaint_from,
			$ol,
			$r->title,
			$complaint_date,
			$status,
			$description
		);
      }
		 } } // e-complaints
	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $complaint->num_rows(),
			 "recordsFiltered" => $complaint->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
