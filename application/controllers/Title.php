<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Title extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Title_model');
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
		$user_id = $this->session->userdata('user_id');
		$myt = $this->Title_model->getMyTitle($user_id);
		$title = $this->Title_model->getTitle();
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa/mahasiswa',
			't' => $title,
			'myt' => $myt
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}
    
	public function mahasiswa2()
	{
		
        $research_area = $this->Title_model->getResearchArea();
		$dosen = $this->Title_model->getDosen();
		$dosen2 = $this->Title_model->getDosen();
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/mahasiswa/mahasiswa2',
            'research_area' => $research_area,
            'dosen' => $dosen,
			'dosen2' => $dosen2
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function addTitle()
	{

        $user = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
        
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('bidang_id', 'Bidang', 'required');
            $this->form_validation->set_rules('dospem_1_id', 'Dosen Pembimbing 1', 'required');
            $this->form_validation->set_rules('dospem_2_id', 'Dosen Pembimbing 2', 'required');

            // If validation fails
            if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Seluruh kolom wajib diisi.');
                redirect('title/mahasiswa2');
            } else {
                // If validation succeeds, save data to database
				$data['judul'] = $this->input->post('judul');
                $data['mahasiswa'] = $user['id'];
                $data['tanggal_pengajuan'] = date('Y-m-d H:i:s');
				$data['bidang_id'] = $this->input->post('bidang_id');
				$data['dospem_1_id'] = $this->input->post('dospem_1_id');
                $data['status_dospem_1'] = 'Sedang Diproses';
				$data['dospem_2_id'] = $this->input->post('dospem_2_id');
                $data['status_dospem_2'] = 'Sedang Diproses';
                $data['status'] = 'Sedang Diproses';

				if($data['bidang_id'] == 'Pilih Bidang' || $data['dospem_1_id'] == 'Pilih Dosen' || $data['dospem_2_id'] == 'Pilih Dosen'){
					$this->session->set_flashdata('error', 'Seluruh kolom wajib diisi.');
					redirect('title/mahasiswa2');
				}

                $this->Title_model->addTitle($data);

                $this->session->set_flashdata('success', 'Berhasil mengajukan judul. Silahkan tunggu untuk judul disetujui oleh dosen pembimbing yang telah anda pilih!');
                redirect('title');
            }

	}

	public function dosen()
	{
		$id = $this->session->userdata('user_id');
		$dospem1 = $this->Title_model->getTitleDospem1($id);
		$dospem2 = $this->Title_model->getTitleDospem2($id);
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/dosen/dosen', 
			'dospem1' => $dospem1,
			'dospem2' => $dospem2
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function accDospem1()
	{
		$id = $this->input->post('id');
		$data['status_dospem_1'] = 'Diterima';
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('success', 'Judul Berhasil Disetujui');
		redirect('title');
	}

	public function deDospem1()
	{
		$id = $this->input->post('id');
		$alasan = $this->input->post('alasan');
		$data = [
			'status_dospem_1' => 'Ditolak',
			'alasan_dospem_1' => $alasan
		];
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('title');
	}

	public function accDospem2()
	{
		$id = $this->input->post('id');
		$data['status_dospem_2'] = 'Diterima';
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('success', 'Judul Berhasil Disetujui');
		redirect('title');
	}

	public function deDospem2()
	{
		$id = $this->input->post('id');
		$alasan = $this->input->post('alasan');
		$data = [
			'status_dospem_2' => 'Ditolak',
			'alasan_dospem_2' => $alasan
		];
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('title');
	}

	public function koordinator()
	{
		$titleKo = $this->Title_model->getTitleKo();
		$data = [
			'title' => "Pengajuan Judul",
			'content' => 'title/koordinator/koordinator', 
			'titleKo' => $titleKo
		];
		$this->load->view('template/overlay/koordinator', $data);
	}


	public function accTitle()
	{
		$id = $this->input->post('id');
		$data['status'] = 'Diterima';
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('success', 'Judul Berhasil Disetujui');
		redirect('title');
	}

	public function deTitle()
	{
		$id = $this->input->post('id');
		$data['status'] = 'Ditolak';
		$this->Title_model->accTitle($id, $data);

		$this->session->set_flashdata('denied', 'Judul Berhasil Ditolak');
		redirect('title');
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
