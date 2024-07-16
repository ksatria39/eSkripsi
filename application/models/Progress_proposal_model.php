<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress_proposal_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Load the 'user2' database
    }

    public function get_pembimbing($user_id)
    {
        // UNION itu menggabung
        $sql = "
        SELECT u1.id AS id, u1.nama AS nama, 'Dosen Pembimbing 1' AS role
        FROM title
        INNER JOIN users u1 ON title.dospem_1_id = u1.id
        WHERE title.mahasiswa = ?

        UNION ALL

        SELECT u2.id AS id, u2.nama AS nama, 'Dosen Pembimbing 2' AS role
        FROM title
        INNER JOIN users u2 ON title.dospem_2_id = u2.id
        WHERE title.mahasiswa = ?
    ";

        $query = $this->db->query($sql, array($user_id, $user_id));
        return $query->result();
    }


    public function get_judul($user_id)
    {
        $this->db->select('title.id, title.judul, title.dospem_1_id, title.dospem_2_id');
        $this->db->from('title');
        $this->db->where('mahasiswa', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function is_has_accepted_title($user_id)
    {
        $this->db->select('title.id, title.judul');
        $this->db->from('title');
        $this->db->where('mahasiswa', $user_id);
        $this->db->where('status', 'Diterima');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_progress($data)
    {
        return $this->db->insert('pro_progress', $data);
    }

    public function get_proposal_data()
    {
        $this->db->select('pro_progress.id, pro_progress.tanggal, title.judul, users.nama as nama_pembimbing, pro_progress.bab, pro_progress.pembahasan, pro_progress.bukti, pro_progress.status');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'pro_progress.pembimbing = users.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_proposal_data_by_user_id($user_id)
    {
        $this->db->select('pro_progress.id, pro_progress.tanggal, title.judul, users.nama as nama_pembimbing, pro_progress.bab, pro_progress.pembahasan, pro_progress.bukti, pro_progress.status');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'pro_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function download_progress_proposal_dospem($user_id, $dosen_id)
    {
        $this->db->select('pro_progress.id, pro_progress.tanggal, title.judul, pembimbing.nama as nama_pembimbing, pro_progress.bab, pro_progress.pembahasan, pro_progress.bukti, pro_progress.status, mahasiswa.nama as nama_mahasiswa, mahasiswa.npm as npm_mahasiswa');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->join('users pembimbing', 'pro_progress.pembimbing = pembimbing.id', 'inner');
        $this->db->join('users mahasiswa', 'title.mahasiswa = mahasiswa.id', 'inner');
        $this->db->where('title.mahasiswa', $user_id);
        $this->db->where('pro_progress.pembimbing', $dosen_id);

        // Menjalankan query menggunakan metode CI3
        $query = $this->db->get();
        return $query->result();
    }

    public function get_proposal_data_by_mahasiswa($id)
    {
        $this->db->select('pro_progress.id, pro_progress.tanggal, title.judul, users.nama as nama_pembimbing, pro_progress.bab, pro_progress.pembahasan, pro_progress.bukti, pro_progress.status');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'pro_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_bukti_by_id($id)
    {
        $this->db->select('bukti');
        $this->db->from('pro_progress');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    //kolom status dan aksi
    public function get_all_proposals()
    {
        $this->db->select('*');
        $this->db->from('pro_progress');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_proposal_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('pro_progress');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('pro_progress', array('status' => $status));
        return $this->db->affected_rows();
    }
    //end kolom 

    public function get_mahasiswa_for_dosen($pembimbing_id)
    {
        $this->db->select('u.id, u.nama, t.judul');
        $this->db->from('pro_progress pp');
        $this->db->join('title t', 'pp.judul_id = t.id');
        $this->db->join('users u', 't.mahasiswa = u.id');
        $this->db->where('pp.pembimbing', $pembimbing_id);
        $this->db->group_by('u.nama');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mahasiswa_for_koordinator()
    {
        $this->db->select('u.id, u.nama, t.judul');
        $this->db->from('pro_progress pp');
        $this->db->join('title t', 'pp.judul_id = t.id');
        $this->db->join('users u', 't.mahasiswa = u.id');
        $this->db->group_by('u.nama');
        $query = $this->db->get();
        return $query->result();
    }


    public function delete_progress($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pro_progress');
        return $this->db->affected_rows();
    }

    public function get_proposal_data_from_dospem_by_mahasiswa($id)
    {
        $this->db->select('pro_progress.id, pro_progress.tanggal, title.judul, users.nama as nama_pembimbing, pro_progress.bab, pro_progress.pembahasan, pro_progress.bukti, pro_progress.status');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'pro_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
