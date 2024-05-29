<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Title_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getResearchArea()
    {
        return $this->db->get('research_area')->result_array();
    }

    public function getDosen()
    {
        return $this->db->get_where('users', ['group_id' => 2])->result_array();
    }

    public function addTitle($data)
    {
        $this->db->insert('title', $data);
        return $this->db->insert_id();
    }

    public function accTitle($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('title', $data);
    }

    public function getTitle()
    {
        $this->db->select('title.*, users.nama as nama_mahasiswa');
        $this->db->join('users', 'title.mahasiswa = users.id', 'left');
        $this->db->order_by('title.id', 'DESC');
        $query = $this->db->get('title');
        return $query->result();
    }

    public function getMyTitle($user_id)
    {
        $this->db->select('title.*, users.nama as nama_mahasiswa');
        $this->db->join('users', 'title.mahasiswa = users.id', 'left');
        $this->db->where('users.id', $user_id);
        $this->db->order_by('title.id', 'DESC');
        $query = $this->db->get('title');
        return $query->result();
    }

    public function getTitleDospem1($id)
    {
        $this->db->select('title.*');
        $this->db->where('dospem_1_id', $id);
        $this->db->where('status_dospem_1', 'Sedang diproses');
        $query = $this->db->get('title');
        return $query->result();
    }

    public function getTitleDospem2($id)
    {
        $this->db->select('title.*');
        $this->db->where('dospem_2_id', $id);
        $this->db->where('status_dospem_2', 'Sedang diproses');
        $query = $this->db->get('title');
        return $query->result();
    }

    public function getTitleKo()
    {
        $this->db->select('title.*');
        $this->db->where('status', 'Sedang diproses');
        $query = $this->db->get('title');
        return $query->result();
    }

    public function search($keyword)
    {
        $this->db->select('title.*, users.nama as nama_mahasiswa');
        $this->db->join('users', 'title.mahasiswa = users.id', 'left');
        $this->db->like('judul', $keyword);
        $this->db->or_like('mahasiswa_nama', $keyword);
        $this->db->order_by('title.id', 'DESC');
        $query = $this->db->get('title');
        return $query->result();
    }
}