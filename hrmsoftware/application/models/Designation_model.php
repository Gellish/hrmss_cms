<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class designation_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_designations()
	{
	  return $this->db->get("xin_designations");
	}
	 
	 public function read_designation_information($id) {
	
		$condition = "designation_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_designations');
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
		$this->db->insert('xin_designations', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('designation_id', $id);
		$this->db->delete('xin_designations');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('designation_id', $id);
		if( $this->db->update('xin_designations',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get all designations
	public function all_designations()
	{
	  $query = $this->db->query("SELECT * from xin_designations");
  	  return $query->result();
	}
	
	// get department > designations
	public function ajax_designation_information($id) {
	
		$condition = "department_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_designations');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
}
?>