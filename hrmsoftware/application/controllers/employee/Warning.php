<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Warning extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Warning_model");
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
		$data['all_warning_types'] = $this->Warning_model->all_warning_types();
		$data['breadcrumbs'] = $this->lang->line('left_warnings');
		$data['path_url'] = 'user/user_warning';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/warning_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
 
    public function warning_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/warning_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$warning = $this->Warning_model->get_employee_warning($session['user_id']);
		
		$data = array();

        foreach($warning->result() as $r) {

		// get user > warning by
		$user_by = $this->Xin_model->read_user_info($r->warning_by);
		// user full name
		if(!is_null($user_by)){
			$warning_by = $user_by[0]->first_name.' '.$user_by[0]->last_name;
		} else {
			$warning_by = '--';	
		}
		// get warning date
		$warning_date = $this->Xin_model->set_date_format($r->warning_date);
				
		// get status
		if($r->status==0): $status = $this->lang->line('xin_pending');
		elseif($r->status==1): $status = $this->lang->line('xin_accepted'); else: $status = $this->lang->line('xin_rejected'); endif;
		// get warning type
		$warning_type = $this->Warning_model->read_warning_type_information($r->warning_type_id);
		if(!is_null($warning_type)){
			$wtype = $warning_type[0]->type;
		} else {
			$wtype = '--';	
		}
		// description
		$description =  html_entity_decode($r->description);
		
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-warning_id="'. $r->warning_id . '"><i class="fa fa-eye"></i></button></span>',
			$warning_date,
			$r->subject,
			$wtype,
			$status,
			$warning_by,
			$description
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $warning->num_rows(),
			 "recordsFiltered" => $warning->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
}
