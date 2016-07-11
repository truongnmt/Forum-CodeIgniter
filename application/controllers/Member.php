<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public $table = 'member';

	function __construct() { 
		parent::__construct();
		$this->load->model('mem_model');
	}

	function check_email() {
		$email = $this->input->post('email'); 
		$where = array(); 
		$where['mem_email'] = $email; 
		if($this->mem_model->check_exists($where)) { 
			//trả về thông báo lỗi nếu đã tồn tại email này 
			$this->form_validation->set_message(__FUNCTION__, "Email already used."); 
			return FALSE;
		} 
		return TRUE; 
	} 
	public function login_view() {
		$this->load->view('Member_login'); 
	}

	public function login() {
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$pass = hash("sha256", $pass);
		$where = array('mem_email' => $email, 'mem_pass' => $pass);
		$this->db->where($where);

		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			$data = $query->result_array();
			// echo $data[0]['mem_id'];
			$this->session->set_userdata('mem_id', $data[0]['mem_id']);
			$this->session->set_userdata('mem_name', $data[0]['mem_name']);
			$this->session->set_userdata('mem_pic', $data[0]['mem_pic']);
			redirect();
			// var_dump($this->session);
		} else {
			redirect("member/login_view", "refresh");
		}
	}

	private function _user_is_login(){
		$user_data = $this->session->userdata('mem_id');
		if(!$user_data){
			return false;
		}
		return true;
	}

	public function logout(){
		if($this->_user_is_login()){
			$this->session->unset_userdata('mem_id');
		}
		redirect();
	}

	public function index() {

	}

	public function add_member_view() {
		$this->load->view('member_add');
	}

	public function add_member() {
		$this->form_validation->set_rules(
			'name',
			'user name',
			'required|min_length[8]'
			);
		$this->form_validation->set_rules(
			'email',
			'email',
			'required|valid_email|min_length[8]|callback_check_email'
			);
		$this->form_validation->set_rules(
			'pass',
			'password',
			'required|min_length[6]'
			);
		$this->form_validation->set_rules(
			'pass2',
			'retype password',
			'required|matches[pass]'
			);

		if($this->form_validation->run()){
			// if validation good then add member
			$data['mem_email'] = $this->input->post('email');
			if($this->mem_model->check_exists($data)) {
				redirect();
			}

			$str = hash("sha256", $this->input->post('pass'));
			$data = array(
				'mem_name' => $this->input->post('name'),
				'mem_email' => $this->input->post('email'),
				'mem_pass' => $str,
				);
			$inserted_id = $this->mem_model->insert($data);

			if(!empty($_FILES['pic']['name'])) {
				$config['upload_path'] = './assets/images/member';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 250;
				$config['file_name'] = $inserted_id;
				$this->load->library('upload');
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('pic')) {
					$error = array('error' => $this->upload->display_errors());
					echo $error['error'];
				} else {
					$tmp = $this->upload->data();
					$data['mem_pic'] = $tmp['file_name'];

				//resize img
					$config['image_library'] = 'gd2';
					$config['source_image'] = $tmp['full_path'];
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 37;
					$config['height'] = 37;

					$this->load->library('image_lib');
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
				$this->mem_model->update($data, $inserted_id);
			}
			redirect();
		}

		$this->load->view('member_add');
		// var_dump($data);
	}

	public function update_member_view() {
		// $this->load->helper('form'); 
		// $mem_id = $this->uri->segment('3');
		// $query = $this->db->get_where("member",array("mem_id"=>$mem_id));
		// $data['records'] = $query->result(); 
		// $data['old_memid'] = $mem_id;
		// $this->load->view('Member_edit',$data);
	}

	public function update_member(){
		// $this->load->model('mem_model');

		// $data = array(
		// 	'mem_name' => $this->input->post('mem_name'),
		// 	'mem_pass' => $this->input->post('mem_pass'),
		// 	'mem_email' => $this->input->post('mem_email'),

		// 	'mem_id' => $this->input->post('roll_no'),
		// 	'' => $this->input->post('name')
		// 	);

		// $old_roll_no = $this->input->post('old_roll_no'); 
		// $this->mem_model->update($data,$old_roll_no);

		// $query = $this->db->get($this->table);
		// $data['records'] = $query->result(); 
		// $this->load->view('Member_view',$data);
	}

	public function delete_member() {
		// $this->load->model('mem_model');
		// $roll_no = $this->uri->segment('3'); 
		// $this->mem_model->delete($roll_no);

		// $query = $this->db->get($this->table);
		// $data['records'] = $query->result(); 
		// $this->load->view('Member_view',$data);
	}
}
?>