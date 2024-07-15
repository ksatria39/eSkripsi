<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proregister_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getProposal()
	{
		$this->db->select('*, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMyProposal($user_id)
	{
		$this->db->select('*, pro_register.id as pro_id, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.mahasiswa', $user_id);
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMyTitle($user_id)
	{
		$this->db->where('mahasiswa', $user_id);
		$this->db->where('status', 'Diterima');
		$this->db->where('status_ujian_proposal','Belum terdaftar');
		$query = $this->db->get('title');
		return $query->result_array();
	}

	public function addProposal($data)
	{
		$this->db->insert('pro_register', $data);
	}

	public function getProposalDospem1($id)
	{
		$this->db->select('*, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_1_id', $id);
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getProposalDospem2($id)
	{
		$this->db->select('*, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_2_id', $id);
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getProposalKoo()
	{
		$this->db->select('*, pro_register.status as pro_status, pro_register.status_dospem_1 as pro_status_dospem_1, pro_register.status_dospem_2 as pro_status_dospem_2, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('pro_register.status', 'Sedang diproses');
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get('');
		return $query->result();
	}

	public function accProposal($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('pro_register', $data);
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
		$this->db->insert('pro_nilai', $data);
	}
}
