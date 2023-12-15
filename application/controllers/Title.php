<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Title extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}
    
	public function mahasiswa2()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa/mahasiswa2', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function detail()
	{
		$this->load->view('title/admin/detail');
	}

	public function admin2()
	{
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/admin/admin2', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

}
