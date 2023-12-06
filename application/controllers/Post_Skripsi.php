<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Skripsi extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pasca Ujian Skripsi",
			'content' => 'post/skripsi/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

    public function dosen()
	{
		$data = [
			'title' => "Pasca Ujian Skripsi",
			'content' => 'post/skripsi/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

    public function koordinator()
	{
		$data = [
			'title' => "Pasca Ujian Skripsi",
			'content' => 'post/skripsi/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

    public function admin()
	{
		$data = [
			'title' => "Pasca Ujian Skripsi",
			'content' => 'post/skripsi/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}
}
