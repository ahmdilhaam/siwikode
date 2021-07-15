<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('M_wisata', 'm_wisata');
		$this->load->model('M_galeri_foto', 'm_galeri_foto');
		$this->load->model('M_testimoni', 'm_testimoni');
		$this->load->model('M_profesi', 'm_profesi');
		$this->load->model('M_jenis_rekreasi', 'm_jenis_rekreasi');
		$this->load->model('M_jenis_kuliner', 'm_jenis_kuliner');
	}

	public function index()
	{
		$order = ['bintang' => 'DESC', 'updated_date' => 'DESC'];
		$data['beranda'] = $this->m_wisata->get(['status' => 'valid'], $order, [], null, 1, 3);
		$data['menu_active'] = 'beranda';
		$data['view'] = 'user/beranda';

		$this->load->view('user/index.php', $data);
	}

	public function daftar_wisata($jenis = 'rekreasi')
	{
		$order = ['nama' => 'ASC'];
		$data['daftar_wisata'] = $this->m_wisata->get(["jenis_{$jenis}_id >" => 0, 'status' => 'valid'], $order, [], null, 1, 10);
		$data['menu_active'] = $jenis;
		$data['view'] = 'user/daftar_wisata';
		
		$this->load->view('user/index.php', $data);
	}

	public function informasi_wisata($slug = 0)
	{
		$detail = $this->m_wisata->get_row(['slug' => $slug]);
		
		if ($this->input->method(TRUE) == 'POST') {
			$nama		= $this->input->post('nama');
			$profesi	= $this->input->post('profesi');
			$email		= $this->input->post('email');
			$rating		= $this->input->post('rating');
			$komentar	= $this->input->post('komentar');

			$data	= [
				'nama' => $nama,
				'email' => $email,
				'rating' => $rating,
				'komentar' => $komentar,
				'profesi_id' => $profesi,
				'wisata_id' => $detail->id,
			];
			if ($this->m_testimoni->save($data)) {
				$testimoni = $this->m_testimoni->get_custom(['wisata_id' => $detail->id], 'result_array');
				$testimoni_rating	= array_column($testimoni, 'rating');
				$testimoni_rating	= array_sum($testimoni_rating) / count($testimoni_rating);

				$this->m_wisata->update(['bintang' => $testimoni_rating], ['id' => $detail->id]);
				$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Berhasil menambahkan testimoni, terimakasih!']);

				echo "<script>document.location = '';</script>";
			} else {
				echo "something went wrong!";
				exit;
			}
		}

		$galeri_foto = $this->m_galeri_foto->get(['wisata_id' => $detail->id]);

		$testimoni_select = 'testimoni.nama testimoni_nama, profesi.nama profesi_nama, komentar, rating';
		$testimoni_join = [['f_table' => 'profesi', 'on' => 'profesi.id=testimoni.profesi_id']];
		$testimoni = $this->m_testimoni->get(['wisata_id' => $detail->id], [], $testimoni_join, $testimoni_select);
		$rating = 0;
		if (count($testimoni) > 0) {
			$rating		= round(array_sum(array_column($testimoni, 'rating')) / count($testimoni), 1);
		}
		$profesi = $this->m_profesi->get([], ['nama' => 'ASC']);

		$data['detail'] = $detail;
		$data['galeri_foto'] = $galeri_foto;
		$data['testimoni'] = $testimoni;
		$data['profesi'] = $profesi;
		$data['rating'] = $rating;
		$data['menu_active'] = !empty($detail->jenis_rekreasi_id) ? 'rekreasi' : 'kuliner';
		$data['view'] = 'user/informasi_wisata';

		$this->load->view('user/index.php', $data);
	}

	public function registrasi($jenis = 'rekreasi')
	{
		if ($this->input->method(TRUE) == 'POST') {
			$nama		= $this->input->post('nama');
			$slug		= strtolower(str_replace(' ', '-', $nama));
			$jenis		= $this->input->post('jenis');
			$tentang	= $this->input->post('tentang');
			$deskripsi	= $this->input->post('deskripsi');
			$kontak		= $this->input->post('kontak');
			$email		= $this->input->post('email');
			$web		= $this->input->post('web');
			$alamat		= $this->input->post('alamat');
			$latlong	= $this->input->post('ll');

			$data	= [
				'nama' => $nama,
				'slug' => $slug,
				'note'	=> $tentang,
				'deskripsi' => $deskripsi,
				'alamat' => $alamat,
				'kontak' => $kontak,
				'web' => $web,
				'email' => $email,
				'latlong' => $latlong,
			];
			if ($jenis == 'rekreasi') {
				$data['jenis_rekreasi_id']	= $jenis;
			} else {
				$data['jenis_kuliner_id']	= $jenis;
			}
			if ($this->m_wisata->save($data)) {

				$wisata_id = $this->db->insert_id();
				$count = count($_FILES['files']['name']);
				$data_galeri = [];
				for($i=0;$i<$count;$i++) {
					if(!empty($_FILES['files']['name'][$i])) {
						
						$this->load->helper('Common');
						$dir    = "public/user/photo/".$wisata_id;
						create_folder($dir);
						
						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];
						$config['upload_path'] = $dir;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '5000';
						$config['file_name'] = $slug.'-'.$i;
	
						$this->load->library('upload', $config); 
						if($this->upload->do_upload('file')) {
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$data_galeri[] = [
								'file' => $uploadData['file_name'],
								'wisata_id' => $wisata_id,
							];
						} else {
							echo "<pre>";
							print_r($this->upload->display_errors());
							exit;
						}
					}
				}
				$this->m_galeri_foto->save_batch($data_galeri);
				$this->m_wisata->update(['cover' => $data_galeri[0]['file']], ['id' => $wisata_id]);

				$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Berhasil menambahkan wisata, terimakasih!']);

				echo "<script>document.location = '';</script>";
			} else {
				echo "something went wrong!";
				exit;
			}
		}

		$data['jenis'] = $jenis;
		$data['menu_active'] = 'registrasi';
		$model_jenis = 'm_jenis_'.$jenis;
		$data['jenis_wisata'] = $this->{$model_jenis}->get([], ['nama' => 'ASC']);
		$data['view'] = 'user/registrasi';
		
		$this->load->view('user/index.php', $data);
	}
}
