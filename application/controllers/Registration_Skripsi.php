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

	public function view_naskah($file_naskah)
	{
		if (!$this->session->userdata('is_login')) {
			redirect('login');
		} else {
			if ($this->session->userdata('group_id') == 1) {
				$overlay = 'template/overlay/mahasiswa';
			} else if ($this->session->userdata('group_id') == 2) {
				$overlay = 'template/overlay/dosen';
			} else if ($this->session->userdata('group_id') == 3) {
				$overlay = 'template/overlay/koordinator';
			} else if ($this->session->userdata('group_id') == 4) {
				$overlay = 'template/overlay/admin';
			} else {
				redirect('login');
			}
		}

		$data = [
			'title' => "Naskah Skripsi",
			'content' => 'registration/skripsi/view_naskah',
			'file_naskah' => $file_naskah
		];
		$this->load->view($overlay, $data);
	}

	public function mahasiswa()
	{
		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		$myProposal = $this->Skpregister_model->getMySkripsi($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/mahasiswa/mahasiswa',
			'myProposal' => $myProposal
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
			'title' => "Pendaftaran Ujian Skripsi",
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
			redirect('registration_proposal/daftar');
		}

		$this->form_validation->set_rules('title_id', 'Judul', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Seluruh kolom wajib diisi.');
			redirect('registration_skripsi/daftar');
		} else {
			// Upload naskah
			$config_naskah['upload_path'] = './file/skripsi/naskah/';
			$config_naskah['allowed_types'] = 'pdf';
			$config_naskah['max_size'] = 10240; // 10MB

			$this->upload->initialize($config_naskah);

			if (!$this->upload->do_upload('file_naskah')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('registration_skripsi/daftar');
			} else {
				$upload_data_naskah = $this->upload->data();
				$file_name_naskah = $upload_data_naskah['file_name'];

				$data = array(
					'title_id' => $this->input->post('title_id'),
					'file_naskah' => $file_name_naskah,
					'status_dospem_1' => 'Sedang diproses',
					'status_dospem_2' => 'Sedang diproses',
					'status' => 'Sedang diproses'
				);

				$this->Skpregister_model->addProposal($data);

				$data2 = [
					'status_ujian_skripsi' => 'Terdaftar'
				];

				$this->Skpregister_model->setTitle($this->input->post('title_id'), $data2);

				$this->session->set_flashdata('success', 'Berhasil mendaftar ujian skripsi');
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
		// var_export($data['dospem2'][2]);
		// die;
		$this->load->view('template/overlay/dosen', $data);
	}

	public function update_status_dospem1($id)
	{
		$status = $this->input->post('status');
		if (!empty($status)) {
			$data['status_dospem_1'] = $status;
			$this->Skpregister_model->accSkripsi($id, $data);
		}
		redirect("registration_skripsi");
	}

	public function update_status_dospem2($id)
	{
		$status = $this->input->post('status');
		if (!empty($status)) {
			$data['status_dospem_2'] = $status;
			$this->Skpregister_model->accSkripsi($id, $data);
		}
		redirect("registration_skripsi");
	}



	public function koordinator()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$dosuji1 = $this->Skpregister_model->getDosen();
		$dosuji2 = $this->Skpregister_model->getDosen();
		$dospem1 = $this->Skpregister_model->getSkripsiDospem1($this->session->userdata('user_id'));
		$dospem2 = $this->Skpregister_model->getSkripsiDospem2($this->session->userdata('user_id'));
		$koordinator = $this->Skpregister_model->getProposalKoo($this->session->userdata('user_id'));
		$rooms = $this->Skpregister_model->getRooms();
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/skripsi/koordinator/koordinator',
			'dospem1' => $dospem1,
			'dospem2' => $dospem2,
			'koordinator' => $koordinator,
			'rooms' => $rooms,
			'dosuji1' => $dosuji1,
			'dosuji2' => $dosuji2
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
			redirect('registration_proposal');
		}

		$id_register = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$room = $this->input->post('room_id');
		$data = [
			'status' => 'Diterima',
			'tanggal' => $tanggal,
			'jam' => $jam,
			'room_id' => $room
		];
		$this->Skpregister_model->accSkripsi($id_register, $data);

		$dospem1 = $this->input->post('dospem1');
		$dospem2 = $this->input->post('dospem2');
		$dosuji1 = $this->input->post('dosuji1');
		$dosuji2 = $this->input->post('dosuji2');

		$data_ujian_1 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dospem1,
			'as' => 'dospem-1'
		];
		$this->Skpregister_model->addUjian($data_ujian_1);

		$data_ujian_2 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dospem2,
			'as' => 'dospem-2'
		];
		$this->Skpregister_model->addUjian($data_ujian_2);

		$data_ujian_3 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dosuji1,
			'as' => 'dosuji-1'
		];
		$this->Skpregister_model->addUjian($data_ujian_3);

		$data_ujian_4 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dosuji2,
			'as' => 'dosuji-2'
		];
		$this->Skpregister_model->addUjian($data_ujian_4);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_skripsi');
	}

	public function deSkripsi($id)
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$data['status'] = 'Ditolak';
		$this->Skpregister_model->accProposal($id, $data);

		$thisSkripsi = $this->Skpregister_model->getThisSkripsi($id);
		$data2 = [
			'status_ujian_skripsi' => 'Belum terdaftar'
		];
		$this->Skpregister_model->setTitle($thisSkripsi->title_id, $data2);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('registration_skripsi');
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$skripsi = $this->Skpregister_model->getProposal();
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/admin/admin',
			'proposal' => $skripsi,
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
