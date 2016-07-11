<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ans_model');
	}

	public function index() {

	}

	public function add_ans_view() {

	}

	public function add_ans() {
		
	}

	public function update_ans_view() {
		// $this->load->helper('form');
		// $ans_id = $this->uri->segment('3');
		// $query = $this->db->get_where("answer",array("ans_id"=>$ans_id));
		// $data['records'] = $query->result();
		// $data['old_quesid'] = $ans_id;
		// $this->load->view('Ans_edit',$data);
	}

	public function update_ans(){
		// $this->load->model('Ans_Model');

		// $data = array(
		// 	'ans_content' => $this->input->post('ans_content'),
		// 	'ans_createdat' => $this->input->post('ans_createdat'),
		// 	'ans_memid' => $this->input->post('ans_memid'),
		// 	'ans_quesid' => $this->input->post('ans_quesid'),
		// 	);

		// $old_ansid = $this->input->post('old_ansid');
		// $this->Ans_model->update($data,$old_ansid);

		// $query = $this->db->get("answer");
		// $data['records'] = $query->result();
		// $this->load->view('Ans_view',$data);
	}

	public function delete_ans() {
		// $this->load->model('Ans_Model');
		// $ans_id = $this->uri->segment('3');
		// $this->Ans_Model->delete($ans_id );

		// $query = $this->db->get("answer");
		// $data['records'] = $query->result();
		// $this->load->view('Ans_view',$data);
	}

}

?>