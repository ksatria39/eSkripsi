<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score_Skripsi extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Nilai Ujian Skripsi",
			'content' => 'score/skripsi/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		$data = [
			'title' => "Penilaian Ujian Skripsi",
			'content' => 'score/skripsi/dosen/dosen', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function dosen2()
	{
		$data = [
			'title' => "Penilaian Ujian Skripsi",
			'content' => 'score/skripsi/dosen/dosen2', 
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function admin()
	{
		$data = [
			'title' => "Nilai Ujian Skripsi",
			'content' => 'score/skripsi/admin/admin', 
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function koordinator()
	{
		$data = [
			'title' => "Nilai Ujian Skripsi",
			'content' => 'score/skripsi/koordinator/koordinator', 
		];
		$this->load->view('template/overlay/koordinator', $data);
	}
}
