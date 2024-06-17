<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration_Skripsi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Skpregister_model');
		$this->load->library('upload');
	}

	public function index()
	{
		if (!$this->session->userdata('is_login')) {
			redirect('login');
		} else {
			if ($this->session->userdata('group_id') == 1) {
				$this->mahasiswa();
			} else if ($this->session->userdata('group_id') == 2) {
				$this->dosen();
			} else if ($this->session->userdata('group_id') == 3) {
				$this->koordinator();
			} else if ($this->session->userdata('group_id') == 4) {
				$this->admin();
			} else {
				redirect('login');
			}
		}
	}

	public function mahasiswa()
	{
		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		$mySkripsi = $this->Skpregister_model->getMySkripsi($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/mahasiswa/mahasiswa',
			'mySkripsi' => $mySkripsi
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function daftar()
	{
		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		$myTitle = $this->Skpregister_model->getMyTitle($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/skripsi/mahasiswa/register',
			'myTitle' => $myTitle
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function addSkripsi()
	{

		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		if ($this->input->post('title_id') == '-- Pilih Judul --') {
			$this->session->set_flashdata('error', 'Seluruh kolom wajib diisi.');
			redirect('registration_skripsi/daftar');
		}

		$this->form_validation->set_rules('title_id', 'Judul', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Seluruh kolom wajib diisi.');
			redirect('registration_skripsi/daftar');
		} else {
			$config['upload_path'] = './file/skripsi/logbook/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 10240; // 10MB

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file_logbook')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('registration_skripsi/daftar');
			} else {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];

				$data = array(
					'title_id' => $this->input->post('title_id'),
					'file_logbook' => $file_name,
					'status_dospem_1' => 'Sedang diproses',
					'status_dospem_2' => 'Sedang diproses',
					'status' => 'Sedang diproses'
				);

				$this->Skpregister_model->addSkripsi($data);

				$this->session->set_flashdata('success', 'Berhasil mendaftar ujian proposal');
				redirect('registration_skripsi');
			}
		}
	}


	public function dosen()
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$dospem1 = $this->Skpregister_model->getSkripsiDospem1($this->session->userdata('user_id'));
		$dospem2 = $this->Skpregister_model->getSkripsiDospem2($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/dosen/dosen',
			'dospem1' => $dospem1,
			'dospem2' => $dospem2,
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function accDospem1($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$data['status_dospem_1'] = 'Diterima';
		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Skripsi Berhasil Disetujui');
		redirect('registration_skripsi');
	}

	public function deDospem1($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$data['status_dospem_1'] = 'Ditolak';
		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('denied', 'Pendaftaran Ujian Skripsi Berhasil Ditolak');
		redirect('registration_skripsi');
	}

	public function accDospem2($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$data['status_dospem_2'] = 'Diterima';
		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Skripsi Berhasil Disetujui');
		redirect('registration_skripsi');
	}

	public function deDospem2($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$data['status_dospem_2'] = 'Ditolak';
		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('denied', 'Pendaftaran Ujian Skripsi Berhasil Ditolak');
		redirect('registration_skripsi');
	}

	public function koordinator()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$dospem1 = $this->Skpregister_model->getSkripsiDospem1($this->session->userdata('user_id'));
		$dospem2 = $this->Skpregister_model->getSkripsiDospem2($this->session->userdata('user_id'));
		$koordinator = $this->Skpregister_model->getSkripsiKoo($this->session->userdata('user_id'));
		$rooms = $this->Skpregister_model->getRooms();
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/koordinator/koordinator',
			'dospem1' => $dospem1,
			'dospem2' => $dospem2,
			'koordinator' => $koordinator,
			'rooms' => $rooms
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function accSkripsi()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE || $this->input->post('room_id') == '-- Pilih Ruangan Ujian --') {
			$this->session->set_flashdata('error', 'Silahkan atur jadwal dan tempat ujian untuk menyetujui pendaftaran.');
			redirect('registration_skripsi');
		}

		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$room = $this->input->post('room_id');
		$data = [
			'status' => 'Diterima',
			'tanggal' => $tanggal,
			'jam' => $jam,
			'room_id' => $room
		];

		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_skripsi');
	}

	public function deSkripsi($id)
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$data['status'] = 'Ditolak';
		$this->Skpregister_model->accSkripsi($id, $data);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('registration_skripsi');
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/admin/admin',
		];
		$this->load->view('template/overlay/admin', $data);
	}

	// public function admin2()
	// {
	// 	$data = [
	// 		'title' => "Pendaftaran Ujian Proposal",
	// 		'content' => 'registration/proposal/admin/admin2',
	// 	];
	// 	$this->load->view('template/overlay/admin', $data);
	// }

	// public function admin3()
	// {
	// 	$data = [
	// 		'title' => "Pendaftaran Ujian Proposal",
	// 		'content' => 'registration/proposal/admin/admin3',
	// 	];
	// 	$this->load->view('template/overlay/admin', $data);
	// }
}
