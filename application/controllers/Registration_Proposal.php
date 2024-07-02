<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration_Proposal extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proregister_model');
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

		$myProposal = $this->Proregister_model->getMyProposal($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/proposal/mahasiswa/mahasiswa',
			'myProposal' => $myProposal
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function daftar()
	{
		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		$myTitle = $this->Proregister_model->getMyTitle($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/proposal/mahasiswa/register',
			'myTitle' => $myTitle
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function addProposal()
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
			redirect('registration_proposal/daftar');
		} else {
			$config['upload_path'] = './file/proposal/logbook/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 10240; // 10MB

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file_logbook')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('registration_proposal/daftar');
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

				$this->Proregister_model->addProposal($data);

				$this->session->set_flashdata('success', 'Berhasil mendaftar ujian proposal');
				redirect('registration_proposal');
			}
		}
	}


	public function dosen()
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$dospem1 = $this->Proregister_model->getProposalDospem1($this->session->userdata('user_id'));
		$dospem2 = $this->Proregister_model->getProposalDospem2($this->session->userdata('user_id'));
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/proposal/dosen/dosen',
			'dospem1' => $dospem1,
			'dospem2' => $dospem2,
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function accDospem1($id)
	{
		
		$data['status_dospem_1'] = 'Diterima';
		$this->Proregister_model->accProposal($id, $data);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_proposal');
	}

	public function deDospem1($id)
	{
		
		$data['status_dospem_1'] = 'Ditolak';
		$this->Proregister_model->accProposal($id, $data);

		$this->session->set_flashdata('denied', 'Pendaftaran Ujian Proposal Berhasil Ditolak');
		redirect('registration_proposal');
	}

	public function accDospem2($id)
	{
		
		$data['status_dospem_2'] = 'Diterima';
		$this->Proregister_model->accProposal($id, $data);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_proposal');
	}

	public function deDospem2($id)
	{
		

		$data['status_dospem_2'] = 'Ditolak';
		$this->Proregister_model->accProposal($id, $data);

		$this->session->set_flashdata('denied', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_proposal');
	}

	public function koordinator()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$dosuji1 = $this->Proregister_model->getDosen();
		$dosuji2 = $this->Proregister_model->getDosen();
		$dospem1 = $this->Proregister_model->getProposalDospem1($this->session->userdata('user_id'));
		$dospem2 = $this->Proregister_model->getProposalDospem2($this->session->userdata('user_id'));
		$koordinator = $this->Proregister_model->getProposalKoo($this->session->userdata('user_id'));
		$rooms = $this->Proregister_model->getRooms();
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/proposal/koordinator/koordinator',
			'dospem1' => $dospem1,
			'dospem2' => $dospem2,
			'koordinator' => $koordinator,
			'rooms' => $rooms,
			'dosuji1' => $dosuji1,
			'dosuji2' => $dosuji2
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function accProposal()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE || $this->input->post('room_id') == '-- Pilih Ruangan Ujian --' || $this->input->post('dosuji1') == '-- Pilih Penguji 1 --' || $this->input->post('dosuji2') == '-- Pilih Penguji 2 --') {
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
		$this->Proregister_model->accProposal($id_register, $data);

		$title_id = $this->input->post('title_id');
		$dosuji1 = $this->input->post('dosuji1');
		$dosuji2 = $this->input->post('dosuji2');
		$data2 = [
			'dosuji_1_id' => $dosuji1,
			'dosuji_2_id' => $dosuji2,
		];
		$this->Proregister_model->setDosuji($title_id, $data2);

		$dospem1= $this->input->post('dospem1');
		$dospem2 = $this->input->post('dospem2');

		$data_ujian_1 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dospem1,
			'as' => 'dospem-1'
		];
		$this->Proregister_model->addUjian($data_ujian_1);

		$data_ujian_2 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dospem2,
			'as' => 'dospem-2'
		];
		$this->Proregister_model->addUjian($data_ujian_2);

		$data_ujian_3 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dosuji1,
			'as' => 'dosuji-1'
		];
		$this->Proregister_model->addUjian($data_ujian_3);

		$data_ujian_4 = [
			'pro_register_id' => $id_register,
			'dosen_id' => $dosuji2,
			'as' => 'dosuji-2'
		];
		$this->Proregister_model->addUjian($data_ujian_4);

		$this->session->set_flashdata('success', 'Pendaftaran Ujian Proposal Berhasil Disetujui');
		redirect('registration_proposal');
	}

	public function deProposal($id)
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$data['status'] = 'Ditolak';
		$this->Proregister_model->accProposal($id, $data);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('registration_proposal');
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$proposal = $this->Proregister_model->getProposal();
		$data = [
			'title' => "Pendaftaran Ujian Proposal",
			'content' => 'registration/proposal/admin/admin',
			'proposal' => $proposal,
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
