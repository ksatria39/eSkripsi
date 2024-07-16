<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpregister_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getSkripsi()
	{
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMyProposal($user_id)
	{
		$this->db->select('*, skp_register.id as pro_id, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.mahasiswa', $user_id);
		$this->db->order_by('skp_register.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMyTitle($user_id)
	{
		$this->db->where('mahasiswa', $user_id);
		$this->db->where('status', 'Diterima');
		$this->db->where('status_ujian_proposal', 'Selesai')
		$this->db->where('status_ujian_skripsi', 'Belum terdaftar');
		$query = $this->db->get('title');
		return $query->result_array();
	}

	public function addSkripsi($data)
	{
		$this->db->insert('skp_register', $data);
	}

	public function getSkripsiDospem1($id)
	{
		$this->db->select('*, skp_register.id as pro_id, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_1_id', $id);
		$this->db->where('title.status_ujian_skripsi', 'Terdaftar');
		$this->db->order_by('skp_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getSkripsiDospem2($id)
	{
		$this->db->select('*, skp_register.id as pro_id, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_2_id', $id);
		$this->db->where('title.status_ujian_skripsi', 'Terdaftar');
		$this->db->order_by('skp_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getSkripsiKoo()
	{
		$this->db->select('*, skp_register.id as pro_id, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('skp_register.status', 'Sedang diproses');
		$this->db->where('title.status_ujian_skripsi', 'Terdaftar');
		$this->db->order_by('skp_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getThisProposal($pro_id)
	{
		$this->db->select('*, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2, pro_register.id as pro_id, title.id as title_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('pro_register.id', $pro_id);
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function accSkripsi($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('skp_register', $data);
	}

	public function getRooms()
	{
		return $this->db->get('rooms')->result_array();
	}

	public function getDosen()
	{
		$this->db->where('group_id', '2');
		$this->db->or_where('group_id', '3');
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function setDosuji($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('title', $data);
	}

	public function setTitle($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('title', $data);
	}

	public function addUjian($data)
	{
		$this->db->insert('skp_nilai', $data);
	}
}
