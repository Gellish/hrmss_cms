<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employees_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
 	// get all employes
	public function get_employees() {
	  return $this->db->get("xin_employees");
	}
	
	// get total number of employees
	public function get_total_employees() {
	  $query = $this->db->get("xin_employees");
	  return $query->num_rows();
	}
		 
	 public function read_employee_information($id) {
	
		$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employees');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}	
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_employees', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('user_id', $id);
		$this->db->delete('xin_employees');
		
	}
	
	/*  Update Employee Record */
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > basic_info
	public function basic_info($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > change_password
	public function change_password($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > social_info
	public function social_info($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > profile picture
	public function profile_picture($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > contact_info
	public function contact_info_add($data){
		$this->db->insert('xin_employee_contacts', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > contact_info
	public function contact_info_update($data, $id){
		$this->db->where('contact_id', $id);
		if( $this->db->update('xin_employee_contacts',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > document_info_update
	public function document_info_update($data, $id){
		$this->db->where('document_id', $id);
		if( $this->db->update('xin_employee_documents',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > document_info_update
	public function img_document_info_update($data, $id){
		$this->db->where('immigration_id', $id);
		if( $this->db->update('xin_employee_immigration',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > document info
	public function document_info_add($data){
		$this->db->insert('xin_employee_documents', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > immigration info
	public function immigration_info_add($data){
		$this->db->insert('xin_employee_immigration', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	
	// Function to add record in table > qualification_info_add
	public function qualification_info_add($data){
		$this->db->insert('xin_employee_qualification', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > qualification_info_update
	public function qualification_info_update($data, $id){
		$this->db->where('qualification_id', $id);
		if( $this->db->update('xin_employee_qualification',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > work_experience_info_add
	public function work_experience_info_add($data){
		$this->db->insert('xin_employee_work_experience', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > work_experience_info_update
	public function work_experience_info_update($data, $id){
		$this->db->where('work_experience_id', $id);
		if( $this->db->update('xin_employee_work_experience',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > bank_account_info_add
	public function bank_account_info_add($data){
		$this->db->insert('xin_employee_bankaccount', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > bank_account_info_update
	public function bank_account_info_update($data, $id){
		$this->db->where('bankaccount_id', $id);
		if( $this->db->update('xin_employee_bankaccount',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > contract_info_add
	public function contract_info_add($data){
		$this->db->insert('xin_employee_contract', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	//for current contact > employee
	public function check_employee_contact_current($id) {
	
		$condition = "employee_id =" . "'" . $id . "' and contact_type ='current'";
		$this->db->select('*');
		$this->db->from('xin_employee_contacts');
		$this->db->where($condition);
		$this->db->limit(1);
		return $query = $this->db->get();		
	}
	
	//for permanent contact > employee
	public function check_employee_contact_permanent($id) {
	
		$condition = "employee_id =" . "'" . $id . "' and contact_type ='permanent'";
		$this->db->select('*');
		$this->db->from('xin_employee_contacts');
		$this->db->where($condition);
		$this->db->limit(1);
		return $query = $this->db->get();		
	}
	
	// get current contacts by id
	 public function read_contact_info_current($id) {
	
		$this->db->select('*');
		$this->db->where('contact_id', $id);
		$this->db->where('contact_type', 'current');
		$this->db->limit(1);// only apply if you have more than same id in your table othre wise comment this line
		$query = $this->db->get('xin_employee_contacts');
		$row = $query->row();
		return $row;
		
	}
	
	// get permanent contacts by id
	 public function read_contact_info_permanent($id) {
	
		$this->db->select('*');
		$this->db->where('contact_id', $id);
		$this->db->where('contact_type', 'permanent');
		$this->db->limit(1);// only apply if you have more than same id in your table othre wise comment this line
		$query = $this->db->get('xin_employee_contacts');
		$row = $query->row();
		return $row;
	}
	
	// Function to update record in table > contract_info_update
	public function contract_info_update($data, $id){
		$this->db->where('contract_id', $id);
		if( $this->db->update('xin_employee_contract',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > leave_info_add
	public function leave_info_add($data){
		$this->db->insert('xin_employee_leave', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	// Function to update record in table > leave_info_update
	public function leave_info_update($data, $id){
		$this->db->where('leave_id', $id);
		if( $this->db->update('xin_employee_leave',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > shift_info_add
	public function shift_info_add($data){
		$this->db->insert('xin_employee_shift', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > shift_info_update
	public function shift_info_update($data, $id){
		$this->db->where('emp_shift_id', $id);
		if( $this->db->update('xin_employee_shift',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to add record in table > location_info_add
	public function location_info_add($data){
		$this->db->insert('xin_employee_location', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > location_info_update
	public function location_info_update($data, $id){
		$this->db->where('office_location_id', $id);
		if( $this->db->update('xin_employee_location',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get all office shifts 
	public function all_office_shifts() {
	  $query = $this->db->query("SELECT * from xin_office_shift");
  	  return $query->result();
	}
		
	// get contacts
	public function set_employee_contacts($id) {
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_contacts');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get documents
	public function set_employee_documents($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_documents');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get immigration
	public function set_employee_immigration($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_immigration');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee qualification
	public function set_employee_qualification($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_qualification');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee work experience
	public function set_employee_experience($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_work_experience');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee bank account
	public function set_employee_bank_account($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_bankaccount');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	// get employee contract
	public function set_employee_contract($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_contract');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee office shift
	public function set_employee_shift($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_shift');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee leave
	public function set_employee_leave($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_leave');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	// get employee location
	public function set_employee_location($id) {
	
		$condition = "employee_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_location');
		$this->db->where($condition);
		$this->db->limit(500);
	  return $this->db->get();
	}
	
	 // get document type by id
	 public function read_document_type_information($id) {
	
		$condition = "document_type_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_document_type');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// contract type
	public function read_contract_type_information($id) {
	
		$condition = "contract_type_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_contract_type');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// contract employee
	public function read_contract_information($id) {
	
		$condition = "contract_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_contract');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// office shift
	public function read_shift_information($id) {
	
		$condition = "office_shift_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_office_shift');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	

	
	// get all contract types
	public function all_contract_types() {
	  $query = $this->db->query("SELECT * from xin_contract_type");
  	  return $query->result();
	}
	
	// get all contracts
	public function all_contracts() {
	  $query = $this->db->query("SELECT * from xin_employee_contract");
  	  return $query->result();
	}
	
	// get all document types
	public function all_document_types() {
	  $query = $this->db->query("SELECT * from xin_document_type");
  	  return $query->result();
	}
	
	// get all education level
	public function all_education_level() {
	  $query = $this->db->query("SELECT * from xin_qualification_education_level");
  	  return $query->result();
	}
	
	// get education level by id
	 public function read_education_information($id) {
	
		$condition = "education_level_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_qualification_education_level');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get all qualification languages
	public function all_qualification_language() {
	  $query = $this->db->query("SELECT * from xin_qualification_language");
  	  return $query->result();
	}
	
	// get languages by id
	 public function read_qualification_language_information($id) {
	
		$condition = "language_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_qualification_language');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get all qualification skills
	public function all_qualification_skill() {
	  $query = $this->db->query("SELECT * from xin_qualification_skill");
  	  return $query->result();
	} 
	
	// get qualification by id
	 public function read_qualification_skill_information($id) {
	
		$condition = "skill_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_qualification_skill');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get contacts by id
	 public function read_contact_information($id) {
	
		$condition = "contact_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_contacts');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get documents by id
	 public function read_document_information($id) {
	
		$condition = "document_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_documents');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get documents by id
	 public function read_imgdocument_information($id) {
	
		$condition = "immigration_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_immigration');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get qualifications by id
	 public function read_qualification_information($id) {
	
		$condition = "qualification_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_qualification');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get qualifications by id
	 public function read_work_experience_information($id) {
	
		$condition = "work_experience_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_work_experience');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get bank account by id
	 public function read_bank_account_information($id) {
	
		$condition = "bankaccount_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_bankaccount');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// get leave by id
	 public function read_leave_information($id) {
	
		$condition = "leave_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_leave');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
		
	// get shift by id
	 public function read_emp_shift_information($id) {
	
		$condition = "emp_shift_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_shift');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_contact_record($id){
		$this->db->where('contact_id', $id);
		$this->db->delete('xin_employee_contacts');
		
	}
	
	// Function to Delete selected record from table
	public function delete_document_record($id){
		$this->db->where('document_id', $id);
		$this->db->delete('xin_employee_documents');
		
	}
	
	// Function to Delete selected record from table
	public function delete_imgdocument_record($id){
		$this->db->where('immigration_id', $id);
		$this->db->delete('xin_employee_immigration');
		
	}
	
	// Function to Delete selected record from table
	public function delete_qualification_record($id){
		$this->db->where('qualification_id', $id);
		$this->db->delete('xin_employee_qualification');
		
	}
	
	// Function to Delete selected record from table
	public function delete_work_experience_record($id){
		$this->db->where('work_experience_id', $id);
		$this->db->delete('xin_employee_work_experience');
		
	}
	
	// Function to Delete selected record from table
	public function delete_bank_account_record($id){
		$this->db->where('bankaccount_id', $id);
		$this->db->delete('xin_employee_bankaccount');
		
	}
	
	// Function to Delete selected record from table
	public function delete_contract_record($id){
		$this->db->where('contract_id', $id);
		$this->db->delete('xin_employee_contract');
		
	}
	
	// Function to Delete selected record from table
	public function delete_leave_record($id){
		$this->db->where('leave_id', $id);
		$this->db->delete('xin_employee_leave');
		
	}
	
	// Function to Delete selected record from table
	public function delete_shift_record($id){
		$this->db->where('emp_shift_id', $id);
		$this->db->delete('xin_employee_shift');
		
	}
	
	// Function to Delete selected record from table
	public function delete_location_record($id){
		$this->db->where('office_location_id', $id);
		$this->db->delete('xin_employee_location');
		
	}
	
	// get location by id
	 public function read_location_information($id) {
	
		$condition = "office_location_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_location');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
}
?>