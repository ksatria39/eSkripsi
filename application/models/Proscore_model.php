<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proscore_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getDospem1($id)
	{
		$this->db->select('*, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_1_id', $id);
		$this->db->where('pro_register.status', 'Diterima');
		$this->db->order_by('pro_register.id','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDospem2($id)
	{
		$this->db->select('*, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dospem_2_id', $id);
		$this->db->where('pro_register.status', 'Diterima');
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDosuji1($id)
	{
		$this->db->select('*, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dosuji_1_id', $id);
		$this->db->where('pro_register.status', 'Diterima');
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDosuji2($id)
	{
		$this->db->select('*, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('title.dosuji_1_id', $id);
		$this->db->where('pro_register.status', 'Diterima');
		$this->db->order_by('pro_register.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getUjian($id)
	{
		$this->db->select('*, pro_register.id as pro_id');
		$this->db->from('pro_register');
		$this->db->join('title', 'pro_register.title_id = title.id', 'inner');
		$this->db->where('pro_register.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
}
