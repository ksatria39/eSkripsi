<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

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
		$this->load->model('Dashboard_model');

		$user_id = $this->session->userdata('user_id');

		$data = [
			'title' => "Dashboard",
			'content' => 'dashboard/mahasiswa',
		];

		if ($user_id) {
			$proposal_data = $this->Dashboard_model->get_proposal_data_by_user_id($user_id);
			$guidance_count = $this->Dashboard_model->get_guidance_count($user_id);
			$last_guidance_date = $this->Dashboard_model->get_last_guidance_date($user_id);

			$data['data_proposal'] = $proposal_data;
			$data['guidance_count'] = $guidance_count;
			$data['last_guidance_date'] = $last_guidance_date;
		} else {
			// Handle the case where the user_id is not set
			$data['error'] = 'User ID not found in session';
		}

		$this->load->view('template/overlay/mahasiswa', $data);
	}


	public function dosen()
	{
		$this->load->model('Dashboard_model');
		$data['judul'] = $this->Dashboard_model->getBelumDisetujuiJudul();
		$data['dibimbing'] = $this->Dashboard_model->getMahasiswaDibimbing();
		$data['belumBimbingan'] = $this->Dashboard_model->getBelumBimbingan();
		$data['belumSeminar'] = $this->Dashboard_model->getBelumSeminar();
		$data['belumSkripsi'] = $this->Dashboard_model->getBelumSkripsi();

		// Menambahkan elemen baru ke array $data
		$data['title'] = "Dashboard";
		$data['content'] = 'dashboard/dosen';

		$this->load->view('template/overlay/dosen', $data);
	}



	public function koordinator()
	{
		$this->load->model('Dashboard_model');
		$data['title'] = "Dashboard";
		$data['content'] = 'dashboard/koordinator';
		$data['dosen_mahasiswa'] = $this->Dashboard_model->get_dosen_mahasiswa();
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
