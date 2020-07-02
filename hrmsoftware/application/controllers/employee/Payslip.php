<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslip extends MY_Controller {
	
	 public function __construct() {
        Parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the model
		$this->load->model("Payroll_model");
		$this->load->model("Xin_model");
		$this->load->model("Employees_model");
		$this->load->model("Designation_model");
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
	 	 
	 // payment history of current user
	 public function index()
     {
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('');
		}
		$data['title'] = $this->Xin_model->site_title();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['breadcrumbs'] = $this->lang->line('xin_payslip');
		$data['path_url'] = 'user/user_payslip';
		if(!empty($session)){ 
			$data['subview'] = $this->load->view("user/payslips", $data, TRUE);
			$this->load->view('layout_main', $data); //page load
		} else {
			redirect('');
		}
		  
     }
	 
	 // all payslips list
	 public function employee_payslip_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("user/payslips", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$history = $this->Payroll_model->get_payroll_slip($session['user_id']);
		
		$data = array();

          foreach($history->result() as $r) {

			  // get addd by > template
			  $user = $this->Xin_model->read_user_info($r->employee_id);
			  // user full name
			  $full_name = $user[0]->first_name.' '.$user[0]->last_name;
			  
			  $emp_link = '<a target="_blank" href="'.site_url().'employees/detail/'.$r->employee_id.'/">'.$user[0]->employee_id.'</a>';
			  		  
			  $month_payment = date("F, Y", strtotime($r->payment_date));
			   //$month_payment = $this->xin_model->set_date_format($r->payment_date);
			  $p_amount = $this->Xin_model->currency_sign($r->payment_amount);
	
			  // get date > created at > and format
			  $created_at = $this->Xin_model->set_date_format($r->created_at);
			   // get hourly rate
			  // payslip
		 	 $payslip = '<a class="text-success" href="'.site_url().'payroll/payslip/id/'.$r->make_payment_id.'/">'.$this->lang->line('left_generate_payslip').'</a>';
			 // view
			 $functions = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" data-toggle="modal" data-target=".detail_modal_data" data-employee_id="'. $r->employee_id . '" data-pay_id="'. $r->make_payment_id . '"><i class="fa fa-arrow-circle-right"></i></button></span>';
			  
			  if($r->payment_method==1){
			  $p_method = 'Online';
			  } else if($r->payment_method==2){
				  $p_method = 'PayPal';
			  } else if($r->payment_method==3) {
				  $p_method = 'Payoneer';
			  } else if($r->payment_method==4){
				  $p_method = 'Bank Transfer';
			  } else if($r->payment_method==5) {
				  $p_method = 'Cheque';
			  } else {
				  $p_method = 'Cash';
			  }

               $data[] = array(
			   		$functions,
					'#'.$r->make_payment_id,
                    $p_amount,
                    $month_payment,
                    $created_at,
					$p_method,
					$payslip
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $history->num_rows(),
                 "recordsFiltered" => $history->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }	 
	// make payment info by id
	public function make_payment_view()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('pay_id');
       // $data['all_countries'] = $this->xin_model->get_countries();
		$result = $this->Payroll_model->read_make_payment_information($id);
		// get addd by > template
		$user = $this->Xin_model->read_user_info($result[0]->employee_id);
		// get designation
		$designation = $this->Designation_model->read_designation_information($user[0]->designation_id);
		// department
		$department = $this->Department_model->read_department_information($user[0]->department_id);
		
		$data = array(
				'first_name' => $user[0]->first_name,
				'last_name' => $user[0]->last_name,
				'employee_id' => $user[0]->employee_id,
				'department_name' => $department[0]->department_name,
				'designation_name' => $designation[0]->designation_name,
				'date_of_joining' => $user[0]->date_of_joining,
				'profile_picture' => $user[0]->profile_picture,
				'gender' => $user[0]->gender,
				'monthly_grade_id' => $user[0]->monthly_grade_id,
				'hourly_grade_id' => $user[0]->hourly_grade_id,
				'basic_salary' => $result[0]->basic_salary,
				'payment_date' => $result[0]->payment_date,
				'payment_method' => $result[0]->payment_method,
				'overtime_rate' => $result[0]->overtime_rate,
				'hourly_rate' => $result[0]->hourly_rate,
				'total_hours_work' => $result[0]->total_hours_work,
				'is_payment' => $result[0]->is_payment,
				'house_rent_allowance' => $result[0]->house_rent_allowance,
				'medical_allowance' => $result[0]->medical_allowance,
				'travelling_allowance' => $result[0]->travelling_allowance,
				'dearness_allowance' => $result[0]->dearness_allowance,
				'provident_fund' => $result[0]->provident_fund,
				'security_deposit' => $result[0]->security_deposit,
				'tax_deduction' => $result[0]->tax_deduction,
				'gross_salary' => $result[0]->gross_salary,
				'total_allowances' => $result[0]->total_allowances,
				'total_deductions' => $result[0]->total_deductions,
				'net_salary' => $result[0]->net_salary,
				'comments' => $result[0]->comments,
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('payroll/dialog_payslip', $data);
		} else {
			redirect('');
		}
	}
}
