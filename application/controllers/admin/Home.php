<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_wisata', 'm_wisata');
		$this->load->model('M_testimoni', 'm_testimoni');
		$this->load->model('M_users', 'm_users');

		if (!$this->session->has_userdata('logged_in')) {
			$this->session->set_flashdata('msg', ['type' => 'warning', 'text' => 'Silahkan login terlebih dahulu!']);
			redirect('admin');
		}
	}

	public function index()
	{
		$select	= 'rating, jenis_rekreasi_id, jenis_kuliner_id';
		$join	= [
			['f_table' => "wisata", 'on' => "wisata.id=testimoni.wisata_id"]
		];
		$wisata	= $this->m_testimoni->get([], [], $join, $select, null, null);

		$rating_rekreasi	= 0;
		$rating_kuliner		= 0;
		$jml_rating_rekreasi	= 0;
		$jml_rating_kuliner		= 0;
		foreach ($wisata as $key => $value) {
			if ($value->jenis_rekreasi_id > 0) {
				$rating_rekreasi += (int) $value->rating;
				$jml_rating_rekreasi++;
			} else if ($value->jenis_kuliner_id > 0) {
				$rating_kuliner	+= (int) $value->rating;
				$jml_rating_kuliner++;
			}
		}
		$rating_rekreasi	= round($rating_rekreasi / $jml_rating_rekreasi, 2);
		$rating_kuliner		= round($rating_kuliner / $jml_rating_kuliner, 2);

		$data['testimoni'] = [
			'rekreasi' => ['rating' => $rating_rekreasi, 'jml' => $jml_rating_rekreasi],
			'kuliner' => ['rating' => $rating_kuliner, 'jml' => $jml_rating_kuliner],
		];
		$data['count_rekreasi']	= $this->m_wisata->get_count(["jenis_rekreasi_id >" => 0]);
		$data['count_kuliner']	= $this->m_wisata->get_count(["jenis_kuliner_id >" => 0]);
		$data['page']	= 'home';
		$this->load->view('admin/index', $data);
	}

	public function wisata($jenis = 'rekreasi')
	{
		$select = 'wisata.id id_wisata, wisata.nama nama_wisata, bintang, kontak, slug, status, ';
		$select .= "jenis_{$jenis}.nama nama_jenis";
		$join	= [
			['f_table' => "jenis_{$jenis}", 'on' => "wisata.jenis_{$jenis}_id=jenis_{$jenis}.id"]
		];
		$data['daftar'] = $this->m_wisata->get(["jenis_{$jenis}_id >" => 0], [], $join, $select, null, null);

		$data['page']	= 'wisata';
		$data['jenis']	= $jenis;
		$this->load->view('admin/index', $data);
	}

	public function testimoni()
	{
		$select	= 'testimoni.id id_testimoni, testimoni.nama nama_testimoni, testimoni.email email_testimoni, komentar, is_disabled, ';
		$select	.= 'wisata.nama nama_wisata, bintang';
		$join	= [
			['f_table' => "wisata", 'on' => "wisata.id=testimoni.wisata_id"]
		];
		$data['daftar'] = $this->m_testimoni->get([], ['id_testimoni' => 'DESC'], $join, $select, null, null);

		$data['page']	= 'testimoni';
		$this->load->view('admin/index', $data);
	}

	public function users()
	{
		if($this->session->userdata('user')->role !== 'superadmin')
			echo "<script>document.location = '".base_url('admin/home')."';</script>";

		if ($this->input->method(TRUE) == 'POST') {
			$nama		= $this->input->post('nama');
			$email		= $this->input->post('email');
			$role		= $this->input->post('role');
			$password	= password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => 10]);

			$data	= [
				'nama' => $nama,
				'email' => $email,
				'role' => $role,
				'password' => $password,
			];
			if ($this->m_users->save($data)) {
				$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Berhasil menambahkan user!']);

				echo "<script>document.location = '';</script>";
			}
		}
		$data['daftar'] = $this->m_users->get([], [], [], null, null, null);

		$data['page']	= 'users';
		$this->load->view('admin/index', $data);
	}

	public function hide($table = '', $id = 0)
	{
		$model	= 'm_'.$table;
		$get	= $this->{$model}->get_row(['id' => $id]);

		$notif		= ['type' => 'warning', 'text' => ucfirst($table).' tidak terdaftar!'];
		if ($get) {
			$status	= $get->is_disabled === 'true' ? 'false' : 'true';

			$this->{$model}->update(['is_disabled' => $status], ['id' => $id]);

			$text	= '';
			if ($table === 'testimoni') {
				$text	= $status === 'false' ? 'Testimoni berhasil ditampilkan!' : 'Testimoni berhasil disembunyikan!';
			} else if ($table === 'users') {
				$text	= $status === 'false' ? 'User berhasil diaktifkan!' : 'User berhasil dinonaktifkan!';
			}

			$notif	= ['type' => 'success', 'text' => $text];
		}

		$this->session->set_flashdata('msg', $notif);
		redirect('admin/home/'.$table);
	}

	public function validasi($id_wisata = NULL, $jenis = 'rekreasi')
	{
		$get_wisata	= $this->m_wisata->get_row(['id' => $id_wisata]);

		$redirect	= 'admin/home';
		$notif		= ['type' => 'warning', 'text' => 'Wisata tidak terdaftar!'];
		if ($get_wisata) {
			$status		= $get_wisata->status == 'valid' ? 'invalid' : 'valid';

			$this->m_wisata->update(['status' => $status], ['id' => $get_wisata->id]);

			$redirect	= 'admin/home/wisata/'.$jenis;
			$notif		= ['type' => 'success', 'text' => 'Wisata berhasil divalidasi!'];
		}

		$this->session->set_flashdata('msg', $notif);
		redirect($redirect);
	}

}
