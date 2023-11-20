<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

    public function get($table, $where = NULL, $orderby = NULL) {

        if (!empty($where) && !empty($orderby)) {
            $this->db->order_by($orderby);
            return $this->db->get_where($table, $where)->result();
        } else if (!empty($where)) {
            return $this->db->get_where($table, $where)->result();
        } else {
            return $this->db->get($table)->result();
        }
    }

    public function get_where_in($table, $condicion, $array, $orderby = NULL) {

        $this->db->where_in($condicion, $array);
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        return $this->db->get($table)->result();
    }

    public function update($table, $set, $where = NULL) {
        if (!empty($where)) {
            return $this->db->update($table, $set, $where);
        } else {
            return $this->db->update($table, $set);
        }
    }

    public function insert($table, $data, $batch = NULL) {

        if ($batch) {
            $this->db->insert_batch($table, $data);
        } else {
            $this->db->insert($table, $data);
        }

        return $this->db->insert_id();
    }

    public function delete($table, $where) {
        $this->db->delete($table, $where);
    }

    public function num_rows($query) {
        $resul = $this->db->query($query);
        return $resul->num_rows();
    }

}
