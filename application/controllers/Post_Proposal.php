<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Proposal extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pasca Ujian Proposal",
			'content' => 'post/proposal/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

    public function dosen()
	{
		$data = [
			'title' => "Pasca Ujian Proposal",
			'content' => 'post/proposal/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

    public function koordinator()
	{
		$data = [
			'title' => "Pasca Ujian Proposal",
			'content' => 'post/proposal/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

    public function admin()
	{
		$data = [
			'title' => "Pasca Ujian Proposal",
			'content' => 'post/proposal/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}
}
