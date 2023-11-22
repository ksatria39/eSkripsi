<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Title extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}
    
	public function mahasiswa2()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa2', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

    public function mahasiswa3()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa3', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}


}
