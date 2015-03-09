<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array('USERNAME' => $this->input->post('username', TRUE),
						'PASSWORD' => $this->input->post('password', TRUE)
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['UID'] = $sess->UID;
				$sess_data['USERNAME'] = $sess->USERNAME;
				$sess_data['LEVEL'] = $sess->LEVEL;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('LEVEL')=='admin') {
				redirect('admin/c_admin');
			}
			elseif ($this->session->userdata('LEVEL')=='member') {
				redirect('member/c_member');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>
