<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ques_model');
		$this->load->model('ans_model');
	}

	public function index() {
		$ques_id = $this->uri->segment('2');
		

		//get question and question-er info
		$data['question'] = $this->ques_model->getQuestionAndMemberInfo($ques_id);

		//get answers and answers-er info
		$this->load->model('ans_model');
		$data['answers'] = $this->ans_model->getAnswerAndMemberInfo($ques_id);

		//check if there is a existing user
		if(!$this->session->userdata('mem_id')){
			$data['isLogin'] = "notlogged";
      // var_dump($data);
		}
		else {
			$data['isLogin'] = "logged";
			$data['mem_loginpic'] = $this->session->userdata('mem_pic');
			$data['mem_name'] = $this->session->userdata('mem_name');
		}

		$this->load->view('Ques_view',$data);
		// var_dump($data);
	}

	public function add_ans() {
		$ans_quesid = $this->uri->segment('3');
		$data = array(
			'ans_content' => $this->input->post('reply'),
			'ans_memid' => $this->session->userdata('mem_id'),
			'ans_quesid' => $ans_quesid,
			);
		$this->db->set('ans_createdat', 'NOW()', FALSE);

		$this->ans_model->insert($data);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}

	public function add_ques_view() {
		if(!$this->session->userdata('mem_id')){
			redirect('member/login_view', 'refresh');
		} else {
			$data['mem_loginpic'] = $this->session->userdata('mem_pic');
			$data['mem_name'] = $this->session->userdata('mem_name');
			$this->load->view('Ques_add', $data);
		}
	}

	public function add_ques() {
		$this->form_validation->set_rules(
			'title', 
			'title', 
			'required|min_length[10]'
			);

		$this->form_validation->set_rules(
			'content', 
			'content', 
			'required|min_length[10]'
			);

		if($this->form_validation->run()){
			$data = array(
				'ques_memid' => $this->session->userdata('mem_id'),
				'ques_title' => $this->input->post('title'),
				'ques_content' => $this->input->post('content'),
				'ques_tag' => $this->input->post('tag'),
				);
			$this->db->set('ques_createdat', 'NOW()', FALSE);
			$this->ques_model->insert($data);
			redirect();
		} else {
			$data['mem_loginpic'] = $this->session->userdata('mem_pic');
			$data['mem_name'] = $this->session->userdata('mem_name');
			$this->load->view('ques_add', $data);
		}
	}

	public function update_ques_view() {
		// $ques_id = $this->uri->segment('2');
		// $query = $this->db->get_where("question",array("ques_id"=>$ques_id));
		// $data['records'] = $query->result();
		// $data['old_quesid'] = $ques_id;
		// $this->load->view('Ques_edit',$data);
	}

	public function update_ques(){
		// $this->load->model('ques_model');

		// $data = array(
		// 	'ques_memid' => $this->input->post('ques_memid'),
		// 	'ques_title' => $this->input->post('ques_title'),
		// 	'ques_content' => $this->input->post('ques_content'),
		// 	'ques_tag' => $this->input->post('ques_tag'),
		// 	'ques_createdat' => $this->input->post('ques_createdat'),
		// 	);

		// $old_quesid = $this->input->post('old_quesid');
		// $this->ques_model->update($data,$old_quesid);

		// $query = $this->db->get("member");
		// $data['records'] = $query->result();
		// $this->load->view('Ques_view',$data);
	}

	public function delete_ques() {
		// $ques_id = $this->uri->segment('2');
		// $this->ques_model->delete($ques_id);

		// $query = $this->db->get("ques");
		// $data['records'] = $query->result();
		// $this->load->view('Ques_view',$data);
	}

}

?>