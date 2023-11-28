<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_Skripsi extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

    public function mahasiswa2()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/mahasiswa/mahasiswa2', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function koordinator2()
	{
		$data = [
			'title' => "Penjadwalan Ujian Skripsi",
			'content' => 'registration/skripsi/koordinator/koordinator2', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function admin2()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/admin/admin2', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function admin3()
	{
		$data = [
			'title' => "Pendaftaran Ujian Skripsi",
			'content' => 'registration/skripsi/admin/admin3', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

}
