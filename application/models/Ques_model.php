<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ques_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function insert($data) {
		if ($this->db->insert("question", $data)) {
			return true;
		}
	}

	public function delete($ques_id) {
		if ($this->db->delete("question", "ques_id = ".$ques_id)) {
			return true;
		}
	}

	public function update($data,$old_quesid) {
		$this->db->set($data);
		$this->db->where("mem_id", $old_quesid);
		$this->db->update("member", $data);
	}

	public function listQuesWelcome(){
		$sql = " select `ques_id`, `ques_memid`, `ques_title`, `ques_content`, `ques_tag`, `ques_createdat`, `mem_id`, `mem_name`, `mem_pic`, count(`ans_id`) as count_ans from `question` as q left join `member` as m on q.`ques_memid` = m.`mem_id` left join `answer` as a on q.`ques_id` = a.`ans_quesid` group by `ques_id` order by `ques_id` desc";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getQuestionAndMemberInfo($ques_id){
		$sql = "select * from `question` as q, `member` as m where q.`ques_memid` = m.`mem_id` and `ques_id` = ?";
		$query = $this->db->query($sql, array($ques_id));
		return $query->result();
	}

}