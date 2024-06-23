<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_Proposal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proschedule_model');
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
			} else if ($this->session->userdata('group_id') == 3){
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

		$mhs = $this->Proschedule_model->getMhs($this->session->userdata('user_id'));
		$all = $this->Proschedule_model->getAll();
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/mahasiswa/mahasiswa', 
			'mhs' => $mhs,
			'all' => $all,
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}


	public function dosen()
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$dsn = $this->Proschedule_model->getDsn($this->session->userdata('user_id'));
		$all = $this->Proschedule_model->getAll();
		$data = [
			'title' => "Jadwal Ujan Proposal",
			'content' => 'schedule/proposal/dosen/dosen',
			'dsn' => $dsn,
			'all' => $all,
		];
		$this->load->view('template/overlay/dosen', $data);
	}


	public function koordinator()
	{
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$dsn = $this->Proschedule_model->getDsn($this->session->userdata('user_id'));
		$all = $this->Proschedule_model->getAll();
		$rooms = $this->Proschedule_model->getRooms();
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/koordinator/koordinator',
			'dsn' => $dsn,
			'all' => $all,
			'rooms' => $rooms
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function update(){
		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE || $this->input->post('room_id') == '-- Pilih Ruangan Ujian --') {
			$this->session->set_flashdata('error', 'Semua kolom wajib diisi');
			redirect('schedule_proposal');
		}

		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$room = $this->input->post('room_id');
		$data = [
			'tanggal' => $tanggal,
			'jam' => $jam,
			'room_id' => $room
		];

		$this->Proschedule_model->update($id, $data);

		$this->session->set_flashdata('success', 'Jadwal Ujian Berhasi Diperbarui');
		redirect('schedule_proposal');
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$all = $this->Proschedule_model->getAll();
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/admin/admin',
			'all' => $all,
		];
		$this->load->view('template/overlay/admin', $data);
	}

}
