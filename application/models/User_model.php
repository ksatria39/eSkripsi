<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function check_npm_email_exists($npm, $email)
    {
        $this->db->where('npm', $npm);
        $this->db->or_where('email', $email);
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    public function register_user($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_user_by_npm_or_email($npm_or_email)
    {
        $this->db->where('npm', $npm_or_email);
        $this->db->or_where('email', $npm_or_email);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function check_password($user_id, $password)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get($this->table);
        $user = $query->row();

        if ($user) {
            return password_verify($password, $user->password);
        }

    return false;
    }
}