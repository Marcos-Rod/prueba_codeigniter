<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:');
        $data['updated_at'] = date('Y-m-d H:i:');

        if ($this->db->insert('users', $data))
            return $this->db->insert_id();

        return false;
    }

    public function insert_direction($data)
    {

        if ($this->db->insert('addresses', $data))
            return $this->db->insert_id();

        return false;
    }
}
