<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_Proposal extends CI_Controller {

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
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function mahasiswa2()
	{
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/mahasiswa/mahasiswa2', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		$data = [
			'title' => "Jadwal Ujan Proposal",
			'content' => 'schedule/proposal/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function dosen2()
	{
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/dosen/dosen2', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function koordinator2()
	{
		$data = [
			'title' => "Penjadwalan Ujian Proposal",
			'content' => 'schedule/proposal/koordinator/koordinator2', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Jadwal Ujian Proposal",
			'content' => 'schedule/proposal/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function admin2()
	{
		$data = [
			'title' => "Penjadwalan Ujian Proposal",
			'content' => 'schedule/proposal/admin/admin2', 
		];
		$this->load->view('template/overlay/admin', $data);
	}
}
