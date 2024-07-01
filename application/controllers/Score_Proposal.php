<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score_Proposal extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Proscore_model');
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

		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$id = $this->session->userdata('user_id');

		$dosuji1 = $this->Proscore_model->getDosuji1($id);
		$dosuji2 = $this->Proscore_model->getDosuji2($id);
		$dospem1 = $this->Proscore_model->getDospem1($id);
		$dospem2 = $this->Proscore_model->getDospem2($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/dosen', 
			'dosuji1' => $dosuji1,
			'dosuji2' => $dosuji2,
			'dospem1'=> $dospem1,
			'dospem2'=> $dospem2
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function nilai_pembimbing($id, $role)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$ujian = $this->Proscore_model->getUjian($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/nilai_dospem', 
			'role' => $role,
			'ujian' => $ujian
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function nilai_penguji($id, $role)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$ujian = $this->Proscore_model->getUjian($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/nilai_dosuji',
			'role' => $role,
			'ujian' => $ujian
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function koordinator()
	{

		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}
}
