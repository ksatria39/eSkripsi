<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score_Proposal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proscore_model');
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
		if ($this->session->userdata('group_id') != 1) {
			redirect('error404');
		}

		$ujian = $this->Proscore_model->getNilai($this->session->userdata('user_id'));
		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/mahasiswa/mahasiswa',
			'ujian' => $ujian
		];
		$this->load->view('template/overlay/mahasiswa', $data);
	}

	public function dosen()
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$id = $this->session->userdata('user_id');

		$dosuji1 = $this->Proscore_model->getDosuji1($id);
		$dosuji2 = $this->Proscore_model->getDosuji2($id);
		$dospem1 = $this->Proscore_model->getDospem1($id);
		$dospem2 = $this->Proscore_model->getDospem2($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/dosen',
			'dosuji1' => $dosuji1,
			'dosuji2' => $dosuji2,
			'dospem1' => $dospem1,
			'dospem2' => $dospem2
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function nilai_pembimbing($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$ujian = $this->Proscore_model->getUjian($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/nilai_dospem',
			'ujian' => $ujian,
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function insert_nilai_pembimbing()
	{
		$id = $this->input->post('id');

		$naskah_penulisan = $this->input->post('naskah_penulisan');
		$naskah_pemikiran = $this->input->post('naskah_pemikiran');
		$naskah_kajian = $this->input->post('naskah_kajian');
		$naskah_metode = $this->input->post('naskah_metode');
		$naskah_hasil = $this->input->post('naskah_hasil');
		$naskah_kesimpulan = $this->input->post('naskah_kesimpulan');
		$naskah_kepustakaan = $this->input->post('naskah_kepustakaan');

		$bs_naskah_penulisan = $naskah_penulisan * 15;
		$bs_naskah_pemikiran = $naskah_pemikiran * 15;
		$bs_naskah_kajian = $naskah_kajian * 15;
		$bs_naskah_metode = $naskah_metode * 15;
		$bs_naskah_hasil = $naskah_hasil * 20;
		$bs_naskah_kesimpulan = $naskah_kesimpulan * 10;
		$bs_naskah_kepustakaan = $naskah_kepustakaan * 10;

		$total_a = $bs_naskah_penulisan + $bs_naskah_pemikiran + $bs_naskah_kajian + $bs_naskah_metode + $bs_naskah_hasil + $bs_naskah_kesimpulan + $bs_naskah_kepustakaan;
		$rata_a = $total_a / 100;

		$pelaksanaan_presentasi = $this->input->post('pelaksanaan_presentasi');
		$pelaksanaan_penguasaan = $this->input->post('pelaksanaan_penguasaan');
		$pelaksanaan_argumentasi = $this->input->post('pelaksanaan_argumentasi');

		$bs_pelaksanaan_presentasi = $pelaksanaan_presentasi * 20;
		$bs_pelaksanaan_penguasaan = $pelaksanaan_penguasaan * 50;
		$bs_pelaksanaan_argumentasi = $pelaksanaan_argumentasi * 30;

		$total_b = $bs_pelaksanaan_presentasi + $bs_pelaksanaan_penguasaan + $bs_pelaksanaan_argumentasi;
		$rata_b = $total_b / 100;

		$bimbingan_ketekunan = $this->input->post('bimbingan_ketekunan');
		$bimbingan_adab = $this->input->post('bimbingan_adab');
		$bimbingan_kemandirian = $this->input->post('bimbingan_kemandirian');

		$total_c = $bimbingan_ketekunan + $bimbingan_adab + $bimbingan_kemandirian;
		$rata_c = $total_c / 3;

		$data = [
			'naskah_penulisan' => $naskah_penulisan,
			'naskah_pemikiran' => $naskah_pemikiran,
			'naskah_kajian' => $naskah_kajian,
			'naskah_metode' => $naskah_metode,
			'naskah_hasil' => $naskah_hasil,
			'naskah_kesimpulan' => $naskah_kesimpulan,
			'naskah_kepustakaan' => $naskah_kepustakaan,
			'bs_naskah_penulisan' => $bs_naskah_penulisan,
			'bs_naskah_pemikiran' => $bs_naskah_pemikiran,
			'bs_naskah_kajian' => $bs_naskah_kajian,
			'bs_naskah_metode' => $bs_naskah_metode,
			'bs_naskah_hasil' => $bs_naskah_hasil,
			'bs_naskah_kesimpulan' => $bs_naskah_kesimpulan,
			'bs_naskah_kepustakaan' => $bs_naskah_kepustakaan,
			'total_a' => $total_a,
			'rata_a' => $rata_a,
			'pelaksanaan_presentasi' => $pelaksanaan_presentasi,
			'pelaksanaan_penguasaan' => $pelaksanaan_penguasaan,
			'pelaksanaan_argumentasi' => $pelaksanaan_argumentasi,
			'bs_pelaksanaan_presentasi' => $bs_pelaksanaan_presentasi,
			'bs_pelaksanaan_penguasaan' => $bs_pelaksanaan_penguasaan,
			'bs_pelaksanaan_argumentasi' => $bs_pelaksanaan_argumentasi,
			'total_b' => $total_b,
			'rata_b' => $rata_b,
			'bimbingan_ketekunan' => $bimbingan_ketekunan,
			'bimbingan_adab' => $bimbingan_adab,
			'bimbingan_kemandirian' => $bimbingan_kemandirian,
			'total_c' => $total_c,
			'rata_c' => $rata_c,
		];

		$this->Proscore_model->insertNilai($id, $data);
		$this->session->set_flashdata('success','Nilai berhasil disimpan');
		redirect('score_proposal');
	}

	public function nilai_penguji($id)
	{
		if ($this->session->userdata('group_id') != 2) {
			redirect('error404');
		}

		$ujian = $this->Proscore_model->getUjian($id);
		$data = [
			'title' => "Penilaian Ujian Proposal",
			'content' => 'score/proposal/dosen/nilai_dosuji',
			'ujian' => $ujian
		];
		$this->load->view('template/overlay/dosen', $data);
	}

	public function insert_nilai_penguji()
	{
		$id = $this->input->post('id');

		$naskah_penulisan = $this->input->post('naskah_penulisan');
		$naskah_pemikiran = $this->input->post('naskah_pemikiran');
		$naskah_kajian = $this->input->post('naskah_kajian');
		$naskah_metode = $this->input->post('naskah_metode');
		$naskah_hasil = $this->input->post('naskah_hasil');
		$naskah_kesimpulan = $this->input->post('naskah_kesimpulan');
		$naskah_kepustakaan = $this->input->post('naskah_kepustakaan');

		$bs_naskah_penulisan = $naskah_penulisan * 15;
		$bs_naskah_pemikiran = $naskah_pemikiran * 15;
		$bs_naskah_kajian = $naskah_kajian * 15;
		$bs_naskah_metode = $naskah_metode * 15;
		$bs_naskah_hasil = $naskah_hasil * 20;
		$bs_naskah_kesimpulan = $naskah_kesimpulan * 10;
		$bs_naskah_kepustakaan = $naskah_kepustakaan * 10;

		$total_a = $bs_naskah_penulisan + $bs_naskah_pemikiran + $bs_naskah_kajian + $bs_naskah_metode + $bs_naskah_hasil + $bs_naskah_kesimpulan + $bs_naskah_kepustakaan;
		$rata_a = $total_a / 100;

		$pelaksanaan_presentasi = $this->input->post('pelaksanaan_presentasi');
		$pelaksanaan_penguasaan = $this->input->post('pelaksanaan_penguasaan');
		$pelaksanaan_argumentasi = $this->input->post('pelaksanaan_argumentasi');

		$bs_pelaksanaan_presentasi = $pelaksanaan_presentasi * 20;
		$bs_pelaksanaan_penguasaan = $pelaksanaan_penguasaan * 50;
		$bs_pelaksanaan_argumentasi = $pelaksanaan_argumentasi * 30;

		$total_b = $bs_pelaksanaan_presentasi + $bs_pelaksanaan_penguasaan + $bs_pelaksanaan_argumentasi;
		$rata_b = $total_b / 100;

		$data = [
			'naskah_penulisan' => $naskah_penulisan,
			'naskah_pemikiran' => $naskah_pemikiran,
			'naskah_kajian' => $naskah_kajian,
			'naskah_metode' => $naskah_metode,
			'naskah_hasil' => $naskah_hasil,
			'naskah_kesimpulan' => $naskah_kesimpulan,
			'naskah_kepustakaan' => $naskah_kepustakaan,
			'bs_naskah_penulisan' => $bs_naskah_penulisan,
			'bs_naskah_pemikiran' => $bs_naskah_pemikiran,
			'bs_naskah_kajian' => $bs_naskah_kajian,
			'bs_naskah_metode' => $bs_naskah_metode,
			'bs_naskah_hasil' => $bs_naskah_hasil,
			'bs_naskah_kesimpulan' => $bs_naskah_kesimpulan,
			'bs_naskah_kepustakaan' => $bs_naskah_kepustakaan,
			'total_a' => $total_a,
			'rata_a' => $rata_a,
			'pelaksanaan_presentasi' => $pelaksanaan_presentasi,
			'pelaksanaan_penguasaan' => $pelaksanaan_penguasaan,
			'pelaksanaan_argumentasi' => $pelaksanaan_argumentasi,
			'bs_pelaksanaan_presentasi' => $bs_pelaksanaan_presentasi,
			'bs_pelaksanaan_penguasaan' => $bs_pelaksanaan_penguasaan,
			'bs_pelaksanaan_argumentasi' => $bs_pelaksanaan_argumentasi,
			'total_b' => $total_b,
			'rata_b' => $rata_b,
		];

		$this->Proscore_model->insertNilai($id, $data);
		$this->session->set_flashdata('success', 'Nilai berhasil disimpan');
		redirect('score_proposal');
	}

	public function admin()
	{
		if ($this->session->userdata('group_id') != 4) {
			redirect('error404');
		}

		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/admin/admin',
		];
		$this->load->view('template/overlay/admin', $data);
	}

	public function koordinator()
	{

		if ($this->session->userdata('group_id') != 3) {
			redirect('error404');
		}

		$data = [
			'title' => "Nilai Ujian Proposal",
			'content' => 'score/proposal/koordinator/koordinator',
		];
		$this->load->view('template/overlay/koordinator', $data);
	}
}
