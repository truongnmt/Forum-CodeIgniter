<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mem_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public $table = 'member';
	
	public function insert($data) {
		if ($this->db->insert("member", $data)) {
			return $this->db->insert_id();
		} else return -9999;
	}

	public function delete($mem_id) {
		if ($this->db->delete("member", "mem_id = ".$mem_id)) {
			return true;
		}
	}

	public function update($data,$old_memid) {
		$this->db->set($data);
		$this->db->where("mem_id", $old_memid);
		$this->db->update("member", $data);
	}

	public function check_login($email, $password){
		$where = array('mem_email' => $email, 'mem_pass' => $password);
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_user_info($where = array()){
		$this->db->where($where);
		$result = $this->db->get($this->table);
		return $result->row();
	}

	function check_exists($where = array())
	{
		$this->db->where($where);
         //thuc hien cau truy van lay du lieu
		$query = $this->db->get($this->table);
		
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}