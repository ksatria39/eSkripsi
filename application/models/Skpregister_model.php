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
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2, skp_register.id as skp_id');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMySkripsi($user_id)
	{
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2, skp_register.id as skp_id');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.mahasiswa', $user_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getMyTitle($user_id)
	{
		$this->db->where('mahasiswa', $user_id);
		$this->db->where('status', 'Diterima');
		$query = $this->db->get('title');
		return $query->result_array();
	}

	public function addSkripsi($data)
	{
		$this->db->insert('skp_register', $data);
	}

	public function getSkripsiDospem1($id)
	{
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2, skp_register.id as skp_id');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_1_id', $id);
		$this->db->where('skp_register.status_dospem_1', 'Sedang diproses');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getSkripsiDospem2($id)
	{
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2, skp_register.id as skp_id');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_2_id', $id);
		$this->db->where('skp_register.status_dospem_2', 'Sedang diproses');
		$query = $this->db->get('');
		return $query->result();
	}

	public function getSkripsiKoo($id)
	{
		$this->db->select('*, skp_register.status as skp_status, skp_register.status_dospem_1 as skp_status_dospem_1, skp_register.status_dospem_2 as skp_status_dospem_2, skp_register.id as skp_id');
		$this->db->from('skp_register');
		$this->db->join('title', 'skp_register.title_id = title.id', 'inner');
		$this->db->where('skp_register.status', 'Sedang diproses');
		$query = $this->db->get('');
		return $query->result();
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
}
