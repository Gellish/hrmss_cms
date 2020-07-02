<?php
 
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		 $this->load->model('Employees_model');
		 $this->load->model('Xin_model');
	}
	
	public function index()
	{		
		$data['title'] = 'HR Software';
		$this->load->view('login', $data);
	}
}
