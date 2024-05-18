<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
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
		$data = [
			'title' => "Dashboard",
			'content' => 'dashboard/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}


	public function dosen()
	{
		$data = [
			'title' => "Dashboard",
			'content' => 'dashboard/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Dashboard",
			'content' => 'dashboard/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Dashboard",
			'content' => 'dashboard/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

}
