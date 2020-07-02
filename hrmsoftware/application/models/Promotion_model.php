<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class promotion_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_promotions() {
	  return $this->db->get("xin_employee_promotions");
	}
	
	public function get_employee_promotions($id) {
	 	return $query = $this->db->query("SELECT * from xin_employee_promotions where employee_id = '".$id."'");
	}
	 
	 public function read_promotion_information($id) {
	
		$condition = "promotion_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_employee_promotions');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_employee_promotions', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('promotion_id', $id);
		$this->db->delete('xin_employee_promotions');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('promotion_id', $id);
		if( $this->db->update('xin_employee_promotions',$data)) {
			return true;
		} else {
			return false;
		}		
	}
}
?>