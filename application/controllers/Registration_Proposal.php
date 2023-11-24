<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_Proposal extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => "Pendaftaran Proposal",
			'content' => 'registration/proposal/mahasiswa/mahasiswa', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

    public function mahasiswa2()
	{
		$data = [
			'title' => "Pendaftaran Proposal",
			'content' => 'registration/proposal/mahasiswa/mahasiswa2', 
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

}
