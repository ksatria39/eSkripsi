<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress_skripsi_model extends CI_Model
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
        return $this->db->insert('skp_progress', $data);
    }



    public function get_skripsi_data()
    {
        $this->db->select('skp_progress.id, skp_progress.tanggal, title.judul, users.nama as nama_pembimbing, skp_progress.bab, skp_progress.pembahasan, skp_progress.bukti, skp_progress.status');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'skp_progress.pembimbing = users.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_skripsi_data_by_user_id($user_id)
    {
        $this->db->select('skp_progress.id, skp_progress.tanggal, title.judul, users.nama as nama_pembimbing, skp_progress.bab, skp_progress.pembahasan, skp_progress.bukti, skp_progress.status');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'skp_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function download_progress_skripsi_dospem($user_id, $dosen_id)
    {
        $this->db->select('skp_progress.id, skp_progress.tanggal, title.judul, pembimbing.nama as nama_pembimbing, skp_progress.bab, skp_progress.pembahasan, skp_progress.bukti, skp_progress.status, mahasiswa.nama as nama_mahasiswa, mahasiswa.npm as npm_mahasiswa');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id', 'inner');
        $this->db->join('users pembimbing', 'skp_progress.pembimbing = pembimbing.id', 'inner');
        $this->db->join('users mahasiswa', 'title.mahasiswa = mahasiswa.id', 'inner');
        $this->db->where('title.mahasiswa', $user_id);
        $this->db->where('skp_progress.pembimbing', $dosen_id);

        // Menjalankan query menggunakan metode CI3
        $query = $this->db->get();
        return $query->result();
    }

    public function get_skripsi_data_by_mahasiswa($id)
    {
        $this->db->select('skp_progress.id, skp_progress.tanggal, title.judul, users.nama as nama_pembimbing, skp_progress.bab, skp_progress.pembahasan, skp_progress.bukti, skp_progress.status');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'skp_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_bukti_by_id($id)
    {
        $this->db->select('bukti');
        $this->db->from('skp_progress');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    //kolom status dan aksi
    public function get_all_skripsi()
    {
        $this->db->select('*');
        $this->db->from('skp_progress');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_skripsi_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('skp_progress');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('skp_progress', array('status' => $status));
        return $this->db->affected_rows();
    }
    //end kolom 

    public function get_mahasiswa_for_dosen($pembimbing_id)
    {
        $this->db->select('u.id, u.nama, t.judul');
        $this->db->from('skp_progress pp');
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
        $this->db->from('skp_progress pp');
        $this->db->join('title t', 'pp.judul_id = t.id');
        $this->db->join('users u', 't.mahasiswa = u.id');
        $this->db->group_by('u.nama');
        $query = $this->db->get();
        return $query->result();
    }


    public function delete_progress($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('skp_progress');
        return $this->db->affected_rows();
    }

    public function get_skripsi_data_from_dospem_by_mahasiswa($id)
    {
        $this->db->select('skp_progress.id, skp_progress.tanggal, title.judul, users.nama as nama_pembimbing, skp_progress.bab, skp_progress.pembahasan, skp_progress.bukti, skp_progress.status');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id', 'inner');
        $this->db->join('users', 'skp_progress.pembimbing = users.id', 'inner');
        $this->db->where('title.mahasiswa', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
