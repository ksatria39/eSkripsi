<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score_Proposal extends CI_Controller {

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
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function dosen2()
	{
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/dosen2', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}
}
