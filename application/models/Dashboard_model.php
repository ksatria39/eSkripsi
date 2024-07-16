<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function get_pendaftaran_percentage()
    {
        // Replace 'your_table_name' with the actual table name
        $query = $this->db->select('COUNT(*) AS total_pendaftar')
            ->from('users')
            ->get();
        $total_pendaftar = $query->row()->total_pendaftar;

        // You need to have a total number of records (e.g., from another table or calculated)
        // Replace 'total_records' with the actual total number
        $total_records = 100; // Example: 100 total records

        $percentage = ($total_pendaftar / $total_records) * 100;
        return round($percentage, 2); // Return the percentage rounded to two decimal places
    }


    // Similar functions for bimbingan and seminar percentages
    public function get_bimbingan_percentage()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('bab');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id', 'inner');
        $this->db->where('title.mahasiswa', $user_id); // assuming user_id is 2 for user2
        $query = $this->db->get();

        $bab_values = $query->result_array();

        $percentage = 0;
        foreach ($bab_values as $bab) {
            switch ($bab['bab']) {
                case 1:
                    $percentage = 25;
                    break;
                case 2:
                    $percentage = 60;
                    break;
                case 3:
                    $percentage = 80;
                    break;
                case 4:
                    $percentage = 100;
                    break;
                default:
                    $percentage += 0;
                    break;
            }
        }

        if (count($bab_values) > 0) {
            $total_bab = count($bab_values);
            $average_percentage = ($percentage / $total_bab);

            return round($average_percentage, 2); // return the average percentage rounded to two decimal places
        }
        return 0;
    } // ... logic for calculating bimbingan percentage

    public function get_seminar_percentage()
    {
        // ... logic for calculating seminar percentage
        // Replace 'eminar_table' with the actual table name for seminar data
        $query = $this->db->select('COUNT(*) AS total_seminar')
            ->from('pro_progress')
            ->where('status', 'completed') // Assuming a column named "status" with value "completed" for completed seminars
            ->get();
        $total_seminar = $query->row()->total_seminar;

        // You need to have a total number of seminars (e.g., from another table or calculated)
        // Replace 'total_seminars' with the actual total number
        $total_seminars = 100; // Example: 100 total seminars

        $percentage = ($total_seminar / $total_seminars) * 100;
        return round($percentage, 2); // Return the percentage rounded to two decimal places
    }



    //dosen
    public function getBelumDisetujuiJudul()
    {
        $user_id = $this->session->userdata('user_id'); // Mengambil user_id dari session

        $this->db->select('count(*) as total');
        $this->db->from('title');
        $this->db->join('users', 'title.mahasiswa = users.id');
        $this->db->where('title.status', 'Sedang diproses');
        $this->db->group_start();
        $this->db->where('title.dospem_1_id', $user_id);
        $this->db->or_where('title.dospem_2_id', $user_id);
        $this->db->group_end();
        $query = $this->db->get();

        return $query->row()->total; // Mengembalikan jumlah total
    }


    public function getMahasiswaDibimbing()
    {
        $user_id = $this->session->userdata('user_id'); // Mengambil user_id dari session

        $this->db->select('count(*) as total');
        $this->db->from('title');
        $this->db->join('users', 'title.mahasiswa = users.id');
        $this->db->where('title.status', 'Diterima');
        $this->db->group_start();
        $this->db->where('title.dospem_1_id', $user_id);
        $this->db->or_where('title.dospem_2_id', $user_id);
        $this->db->group_end();
        $query = $this->db->get();

        return $query->row()->total; // Mengembalikan jumlah total
    }

    public function getBelumBimbingan()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getBelumSeminar()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getBelumSkripsi()
    {
        $query = $this->db->get('users');
        return $query->result();
    }


    public function get_dosen_mahasiswa()
    {
        $query = "SELECT u.nama, COUNT(t.mahasiswa) AS jumlah_mahasiswa
               FROM users u
               LEFT JOIN title t ON u.id = t.dospem_1_id OR u.id = t.dospem_2_id
               WHERE u.group_id = 2  -- filter by role 'Dosen'
               GROUP BY u.nama
               ORDER BY jumlah_mahasiswa DESC";

        $result = $this->db->query($query);

        $dosen_mahasiswa = array();
        foreach ($result->result() as $row) {
            $dosen_mahasiswa[] = array(
                'nama_dosen' => $row->nama,
                'jumlah_mahasiswa' => $row->jumlah_mahasiswa
            );
        }

        return $dosen_mahasiswa;
    }

    public function get_guidance_count($mahasiswa_id)
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id');
        $this->db->where('title.mahasiswa', $mahasiswa_id);
        $query_pro = $this->db->get()->row()->count;

        $this->db->select('COUNT(*) as count');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id');
        $this->db->where('title.mahasiswa', $mahasiswa_id);
        $query_skp = $this->db->get()->row()->count;

        return [$query_pro, $query_skp];
    }

    public function get_last_guidance_date($mahasiswa_id)
    {
        // Query for the last guidance date from pro_progress
        $this->db->select_max('tanggal');
        $this->db->from('pro_progress');
        $this->db->join('title', 'pro_progress.judul_id = title.id');
        $this->db->where('title.mahasiswa', $mahasiswa_id);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query_pro = $this->db->get()->row();

        // Query for the last guidance date from skp_progress
        $this->db->select_max('tanggal');
        $this->db->from('skp_progress');
        $this->db->join('title', 'skp_progress.judul_id = title.id');
        $this->db->where('title.mahasiswa', $mahasiswa_id);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query_skp = $this->db->get()->row();

        return [isset($query_pro->tanggal) ? $query_pro->tanggal : '-', isset($query_skp->tanggal) ? $query_skp->tanggal : '-'];
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
}
