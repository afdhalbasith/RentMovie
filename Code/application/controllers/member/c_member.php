<?php
session_start();
class C_member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('USERNAME')=="") {
			redirect('auth');
		}
		$this->load->helper('text');
	}
	
	public function index() {
		$data['USERNAME'] = $this->session->userdata('USERNAME');
		$this->load->view('member/index', $data);
	}

	public function logout() {
		$this->session->unset_userdata('USERNAME');
		$this->session->unset_userdata('LEVEL');
		$this->session->sess_destroy();//session_destroy();
		redirect('auth');
	}
}
?>