<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ques_model');
	}

	public function index() {
		$data['records'] = $this->ques_model->listQuesWelcome();
		if(!$this->session->userdata('mem_id')){
			$data['isLogin'] = "notlogged";
		}
		else {
			$data['isLogin'] = "logged";
			$data['mem_loginpic'] = $this->session->userdata('mem_pic');
		}
		$this->load->view('Welcome_page', $data);
	}
}
