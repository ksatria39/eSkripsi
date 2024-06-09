<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // public function getProDospem1()
    // {
    //     $this->db->where('dospem_1_id', $this->session->userdata('user_id'));
    //     $query = $this->db->get('pro_register');
    //     return $query->num_rows() > 0;
    // }

    // public function getProDospem2()
    // {
    //     $this->db->where('dospem_2_id', $this->session->userdata('user_id'));
    //     $query = $this->db->get('pro_register');
    //     return $query->num_rows() > 0;
    // }

    public function getProDosuji1($id)
    {
        $this->db->select('*');
        $this->db->from('pro_register');
        $this->db->join('title','pro_register.judul_id = title.id','inner');
        $this->db->where('title.dosuji_1_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getProDosuji2($id)
    {
        $this->db->select('*');
        $this->db->from('pro_register');
        $this->db->join('title','pro_register.judul_id = title.id','inner');
        $this->db->where('title.dosuji_1_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}