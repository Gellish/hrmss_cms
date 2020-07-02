<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_projects()
	{
	  return $this->db->get("xin_projects");
	}
	 
	 public function read_project_information($id) {
	
		$condition = "project_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_projects');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function read_bug_information($id) {
	
		$condition = "bug_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_projects_bugs');
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
		$this->db->insert('xin_projects', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('project_id', $id);
		$this->db->delete('xin_projects');
		
	}
	
	// Function to Delete selected record from table
	public function delete_bug_record($id){
		$this->db->where('bug_id', $id);
		$this->db->delete('xin_projects_bugs');
		
	}
	
	// get attachments > projects
	public function get_attachments($id) {
		return $query = $this->db->query("SELECT * from xin_projects_attachment where project_id = '".$id."'");
	}
	
	public function get_all_projects()
	{
	  $query = $this->db->query("SELECT * from xin_projects");
  	  return $query->result();
	}
	
	// Function to add record in table > add attachment
	public function add_new_attachment($data){
		$this->db->insert('xin_projects_attachment', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_attachment_record($id){
		$this->db->where('project_attachment_id', $id);
		$this->db->delete('xin_projects_attachment');
		
	}
	
	// get project discussion
	public function get_discussion($id) {
		return $query = $this->db->query("SELECT * from xin_projects_discussion where project_id = '".$id."' order by discussion_id desc");
	}
	
	// get project bugs/issues
	public function get_bug($id) {
		return $query = $this->db->query("SELECT * from xin_projects_bugs where project_id = '".$id."' order by bug_id desc");
	}
	
	// Function to add record in table > add discussion
	public function add_discussion($data){
		$this->db->insert('xin_projects_discussion', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table > add bug
	public function add_bug($data){
		$this->db->insert('xin_projects_bugs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to update record in table
	public function update_bug($data, $id){
		$this->db->where('bug_id', $id);
		if( $this->db->update('xin_projects_bugs',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('project_id', $id);
		if( $this->db->update('xin_projects',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get total project tasks 
	public function total_project_tasks($id) {
		$query = $this->db->query("SELECT * FROM xin_tasks where project_id = '".$id."'");
		return $query->num_rows();
	}
	
	// get total project bugs 
	public function total_project_bugs($id) {
		$query = $this->db->query("SELECT * FROM xin_projects_bugs where project_id = '".$id."'");
		return $query->num_rows();
	}
}
?>