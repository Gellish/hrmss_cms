<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tickets_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_tickets() {
	  return $this->db->get("xin_support_tickets");
	}
	 
	 public function read_ticket_information($id) {
	
		$condition = "ticket_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_support_tickets');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_support_tickets', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_comment($data){
		$this->db->insert('xin_tickets_comments', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_new_attachment($data){
		$this->db->insert('xin_tickets_attachment', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('ticket_id', $id);
		$this->db->delete('xin_support_tickets');
		
	}
	
	// Function to Delete selected record from table
	public function delete_comment_record($id){
		$this->db->where('comment_id', $id);
		$this->db->delete('xin_tickets_comments');
		
	}
	
	// Function to Delete selected record from table
	public function delete_attachment_record($id){
		$this->db->where('ticket_attachment_id', $id);
		$this->db->delete('xin_tickets_attachment');
		
	}
	
	public function get_employee_tickets($id) {
	 	return $query = $this->db->query("SELECT * from xin_support_tickets where employee_id = '".$id."'");
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('ticket_id', $id);
		if( $this->db->update('xin_support_tickets',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function assign_ticket_user($data, $id){
		$this->db->where('ticket_id', $id);
		if( $this->db->update('xin_support_tickets',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_status($data, $id){
		$this->db->where('ticket_id', $id);
		if( $this->db->update('xin_support_tickets',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_note($data, $id){
		$this->db->where('ticket_id', $id);
		if( $this->db->update('xin_support_tickets',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get comments
	public function get_comments($id) {
	
		$condition = "ticket_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_tickets_comments');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();
		
		return $query;
	}
	
	// get attachments
	public function get_attachments($id) {
	
		$condition = "ticket_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_tickets_attachment');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();
		
		return $query;
	}
	
	// get all ticket users
	public function read_ticket_users_information($id) {
	
		$condition = "ticket_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_support_tickets');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();
		
		return $query->result();
	}
}
?>