<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('M_users', 'm_users');
	}

	public function index()
	{
		if ($this->session->has_userdata('logged_in')) {
			redirect('admin/home');
		}

		if ($this->input->method(TRUE) == 'POST') {
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');

			$get_user	= $this->m_users->get_row(['email' => $email]);

			$notif = ['type' => 'warning', 'text' => 'Email tidak terdaftar!'];
			$redirect	= 'admin/';
			if (!empty($get_user)) {
				$check_password	= password_verify($password, $get_user->password);
				$redirect		= $check_password ? 'admin/home' : 'admin/';
				$notif['type']	= $check_password ? 'success' : 'warning';
				$notif['text']	= $check_password ? 'Berhasil login!' : 'Email atau password salah';
				
				if ($get_user->is_disabled === 'true'){
					$redirect		= 'admin/';
					$notif['type']	= 'error';
					$notif['text']	= 'Akun anda dinonaktifkan!';
				} else if ($check_password) {
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('user', $get_user);
				}
			}

			$this->session->set_flashdata('msg', $notif);
			redirect($redirect);
		}

		$this->load->view('admin/login');
	}

	public function change_password()
	{
		if ($this->input->method(TRUE) == 'POST') {
			$password	= password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => 10]);

			$data	= [
				'password' => $password,
			];
			if ($this->m_users->update($data, ['id' => $this->session->userdata('user')->id])) {
				$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Berhasil mengubah password!']);
				echo "<script>document.location = '".base_url('admin/home')."';</script>";
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Berhasil logout!']);
		redirect('admin');
	}
}
