<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ans_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function insert($data) {
		if ($this->db->insert("answer", $data)) {
			return true;
		}
	}

	public function delete($ans_id) {
		if ($this->db->delete("answer", "ans_id = ".$ans_id)) {
			return true;
		}
	}

	public function update($data,$old_ansid) {
		$this->db->set($data);
		$this->db->where("ans_id", $old_ansid);
		$this->db->update("answer", $data);
	}

	public function getAnswerAndMemberInfo($ques_id){
		$sql = "select * from `answer` as a, `member` as m where a.`ans_memid` = m.`mem_id` and `ans_quesid` = ?";
		$query = $this->db->query($sql, array($ques_id));
		return $query->result();
	}
}