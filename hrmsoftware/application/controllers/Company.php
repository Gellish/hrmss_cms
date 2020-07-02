<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the models
		$this->load->model("Company_model");
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
		$data['all_countries'] = $this->Xin_model->get_countries();
		$data['get_company_types'] = $this->Company_model->get_company_types();
		$data['breadcrumbs'] = $this->lang->line('module_company_title');
		$data['path_url'] = 'company';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('3',$role_resources_ids)) {
			$data['subview'] = $this->load->view("company/company_list", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('dashboard/');
		}
     }
 
    public function company_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("company/company_list", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$company = $this->Company_model->get_companies();
		
		$data = array();

          foreach($company->result() as $r) {
			  
			  // get country
			  $country = $this->Xin_model->read_country_info($r->country);
			  if(!is_null($country)){
			  	$c_name = $country[0]->country_name;
			  } else {
				  $c_name = '--';	
			  }
			  // get user
			  $user = $this->Xin_model->read_user_info($r->added_by);
			  // user full name
			  if(!is_null($user)){
			  	$full_name = $user[0]->first_name.' '.$user[0]->last_name;
			  } else {
				  $full_name = '--';	
			  }
			  
			  
               $data[] = array(
			   		'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-company_id="'. $r->company_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-company_id="'. $r->company_id . '"><i class="fa fa-eye"></i></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->company_id . '"><i class="fa fa-trash-o"></i></button></span>',
                    $r->name,
                    $r->email,
                    $r->website_url,
                    $r->city,
                    $c_name,
					$full_name
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $company->num_rows(),
                 "recordsFiltered" => $company->num_rows(),
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
		$id = $this->input->get('company_id');
       // $data['all_countries'] = $this->xin_model->get_countries();
		$result = $this->Company_model->read_company_information($id);
		$data = array(
				'company_id' => $result[0]->company_id,
				'name' => $result[0]->name,
				'type_id' => $result[0]->type_id,
				'government_tax' => $result[0]->government_tax,
				'trading_name' => $result[0]->trading_name,
				'registration_no' => $result[0]->registration_no,
				'email' => $result[0]->email,
				'logo' => $result[0]->logo,
				'contact_number' => $result[0]->contact_number,
				'website_url' => $result[0]->website_url,
				'address_1' => $result[0]->address_1,
				'address_2' => $result[0]->address_2,
				'city' => $result[0]->city,
				'state' => $result[0]->state,
				'zipcode' => $result[0]->zipcode,
				'countryid' => $result[0]->country,
				'all_countries' => $this->Xin_model->get_countries(),
				'get_company_types' => $this->Company_model->get_company_types()
				);
		$this->load->view('company/dialog_company', $data);
	}
	
	public function read_info()
	{
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('company_id');
       // $data['all_countries'] = $this->xin_model->get_countries();
		$result = $this->Company_model->read_company_information($id);
		$data = array(
				'company_id' => $result[0]->company_id,
				'name' => $result[0]->name,
				'type_id' => $result[0]->type_id,
				'government_tax' => $result[0]->government_tax,
				'trading_name' => $result[0]->trading_name,
				'registration_no' => $result[0]->registration_no,
				'email' => $result[0]->email,
				'logo' => $result[0]->logo,
				'contact_number' => $result[0]->contact_number,
				'website_url' => $result[0]->website_url,
				'address_1' => $result[0]->address_1,
				'address_2' => $result[0]->address_2,
				'city' => $result[0]->city,
				'state' => $result[0]->state,
				'zipcode' => $result[0]->zipcode,
				'countryid' => $result[0]->country,
				'all_countries' => $this->Xin_model->get_countries(),
				'get_company_types' => $this->Company_model->get_company_types()
				);
		$this->load->view('company/view_company.php', $data);
	}
	
	// Validate and add info in database
	public function add_company() {
	
		if($this->input->post('add_type')=='company') {
		// Check validation for user input
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', 'Website', 'trim|required|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		
		$name = $this->input->post('name');
		$trading_name = $this->input->post('trading_name');
		$registration_no = $this->input->post('registration_no');
		$email = $this->input->post('email');
		$contact_number = $this->input->post('contact_number');
		$website = $this->input->post('website');
		$address_1 = $this->input->post('address_1');
		$address_2 = $this->input->post('address_2');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zipcode = $this->input->post('zipcode');
		$country = $this->input->post('country');
		$user_id = $this->input->post('user_id');
		$file = $_FILES['logo']['tmp_name'];
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($name==='') {
			$Return['error'] = $this->lang->line('xin_error_name_field');
		} else if( $this->input->post('company_type')==='') {
			$Return['error'] = $this->lang->line('xin_error_ctype_field');
		} else if($contact_number==='') {
			$Return['error'] = $this->lang->line('xin_error_contact_field');
		} else if($email==='') {
			$Return['error'] = $this->lang->line('xin_error_cemail_field');
		} else if($website==='') {
			$Return['error'] = $this->lang->line('xin_error_website_field');
		}  else if($city==='') {
			$Return['error'] = $this->lang->line('xin_error_city_field');
		} else if($zipcode==='') {
			$Return['error'] = $this->lang->line('xin_error_zipcode_field');
		} else if($country==='') {
			$Return['error'] = $this->lang->line('xin_error_country_field');
		}
		
		/* Check if file uploaded..*/
		else if($_FILES['logo']['size'] == 0) {
			$fname = 'no file';
			 $Return['error'] = $this->lang->line('xin_error_logo_field');
		} else {
			if(is_uploaded_file($_FILES['logo']['tmp_name'])) {
				//checking image type
				$allowed =  array('png','jpg','jpeg','gif');
				$filename = $_FILES['logo']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				if(in_array($ext,$allowed)){
					$tmp_name = $_FILES["logo"]["tmp_name"];
					$bill_copy = "uploads/company/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$lname = basename($_FILES["logo"]["name"]);
					$newfilename = 'logo_'.round(microtime(true)).'.'.$ext;
					move_uploaded_file($tmp_name, $bill_copy.$newfilename);
					$fname = $newfilename;
				} else {
					$Return['error'] = $this->lang->line('xin_error_attatchment_type');
				}
			}
		}
		
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'name' => $this->input->post('name'),
		'type_id' => $this->input->post('company_type'),
		'government_tax' => $this->input->post('xin_gtax'),
		'trading_name' => $this->input->post('trading_name'),
		'registration_no' => $this->input->post('registration_no'),
		'email' => $this->input->post('email'),
		'contact_number' => $this->input->post('contact_number'),
		'website_url' => $this->input->post('website'),
		'address_1' => $this->input->post('address_1'),
		'address_2' => $this->input->post('address_2'),
		'city' => $this->input->post('city'),
		'state' => $this->input->post('state'),
		'zipcode' => $this->input->post('zipcode'),
		'country' => $this->input->post('country'),
		'added_by' => $this->input->post('user_id'),
		'logo' => $fname,
		'created_at' => date('d-m-Y'),
		
		);
		$result = $this->Company_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_add_company');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='company') {
		$id = $this->uri->segment(3);
		// Check validation for user input
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', 'Website', 'trim|required|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		$name = $this->input->post('name');
		$trading_name = $this->input->post('trading_name');
		$registration_no = $this->input->post('registration_no');
		$email = $this->input->post('email');
		$contact_number = $this->input->post('contact_number');
		$website = $this->input->post('website');
		$address_1 = $this->input->post('address_1');
		$address_2 = $this->input->post('address_2');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zipcode = $this->input->post('zipcode');
		$country = $this->input->post('country');
		$user_id = $this->input->post('user_id');
		$file = $_FILES['logo']['tmp_name'];
				
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($name==='') {
			$Return['error'] = $this->lang->line('xin_error_name_field');
		} else if( $this->input->post('company_type')==='') {
			$Return['error'] = $this->lang->line('xin_error_ctype_field');
		} else if($contact_number==='') {
			$Return['error'] = $this->lang->line('xin_error_contact_field');
		} else if($email==='') {
			$Return['error'] = $this->lang->line('xin_error_cemail_field');
		} else if($website==='') {
			$Return['error'] = $this->lang->line('xin_error_website_field');
		} else if($city==='') {
			$Return['error'] = $this->lang->line('xin_error_city_field');
		} else if($zipcode==='') {
			$Return['error'] = $this->lang->line('xin_error_zipcode_field');
		} else if($country==='') {
			$Return['error'] = $this->lang->line('xin_error_country_field');
		}
		
		/* Check if file uploaded..*/
		else if($_FILES['logo']['size'] == 0) {
			 $fname = 'no file';
			 $no_logo_data = array(
			'name' => $this->input->post('name'),
			'type_id' => $this->input->post('company_type'),
			'government_tax' => $this->input->post('xin_gtax'),
			'trading_name' => $this->input->post('trading_name'),
			'registration_no' => $this->input->post('registration_no'),
			'email' => $this->input->post('email'),
			'contact_number' => $this->input->post('contact_number'),
			'website_url' => $this->input->post('website'),
			'address_1' => $this->input->post('address_1'),
			'address_2' => $this->input->post('address_2'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'country' => $this->input->post('country'),
			);
			 $result = $this->Company_model->update_record_no_logo($no_logo_data,$id);
		} else {
			if(is_uploaded_file($_FILES['logo']['tmp_name'])) {
				//checking image type
				$allowed =  array('png','jpg','jpeg','gif');
				$filename = $_FILES['logo']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				if(in_array($ext,$allowed)){
					$tmp_name = $_FILES["logo"]["tmp_name"];
					$bill_copy = "uploads/company/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$lname = basename($_FILES["logo"]["name"]);
					$newfilename = 'logo_'.round(microtime(true)).'.'.$ext;
					move_uploaded_file($tmp_name, $bill_copy.$newfilename);
					$fname = $newfilename;
					$data = array(
					'name' => $this->input->post('name'),
					'type_id' => $this->input->post('company_type'),
					'government_tax' => $this->input->post('xin_gtax'),
					'trading_name' => $this->input->post('trading_name'),
					'registration_no' => $this->input->post('registration_no'),
					'email' => $this->input->post('email'),
					'contact_number' => $this->input->post('contact_number'),
					'website_url' => $this->input->post('website'),
					'address_1' => $this->input->post('address_1'),
					'address_2' => $this->input->post('address_2'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zipcode' => $this->input->post('zipcode'),
					'country' => $this->input->post('country'),
					'logo' => $fname,		
					);
					// update record > model
					$result = $this->Company_model->update_record($data,$id);
				} else {
					$Return['error'] = $this->lang->line('xin_error_attatchment_type');
				}
			}
		}
		
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_update_company');
		} else {
			$Return['error'] = $Return['error'] = $this->lang->line('xin_error_msg');
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
		$result = $this->Company_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_delete_company');
		} else {
			$Return['error'] = $Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
