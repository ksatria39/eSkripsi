<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
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
