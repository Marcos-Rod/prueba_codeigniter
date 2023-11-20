<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //Funcion para el listado de usuarios
    public function users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Funcion para el listado de usuarios con datos completos
    public function users_complete()
    {
        $this->db->select("users.*, addresses.id AS address_id, codigo_postal, colonia, delegacion, estado, user_id, DATE_FORMAT(users.created_at, '%d de %M de %Y') AS created_format");
        $this->db->from('users');
        $this->db->join('addresses', 'users.id = addresses.user_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Funcion para traer los datos de un usuario
    public function find($id)
    {
        $this->db->select("users.*, addresses.id AS address_id, codigo_postal, colonia, delegacion, estado, user_id, DATE_FORMAT(users.created_at, '%d de %M de %Y') AS created_format");
        $this->db->from('users', true);
        $this->db->join('addresses', 'users.id = addresses.user_id', 'left');
        $this->db->where('users.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Funcion para insertar usuarios
    public function insert($data)
    {
        //Registros de marca temporal
        $data['created_at'] = date('Y-m-d H:i:');
        $data['updated_at'] = date('Y-m-d H:i:');

        if ($this->db->insert('users', $data))
            return $this->db->insert_id();

        return false;
    }

    //actualizar info del usuario
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data['basic']);

        $this->update_direction($id, $data['general']);

        return true;
    }

    //Funcion para insertar la dirección del usuario
    public function insert_direction($data)
    {

        if ($this->db->insert('addresses', $data))
            return $this->db->insert_id();

        return false;
    }

    //Funcion para actualizar la dirección del usuario
    public function update_direction($user_id, $data)
    {
        if (!$this->exists_address($user_id)) {
            $data['user_id'] = $user_id;
            $this->insert_direction($data);
        } else {
            $this->db->where('user_id', $user_id);

            $this->db->update('addresses', $data);
        }

        return true;
    }

    //Saber si existe la direccion (en caso de que no tenga)
    public function exists_address($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('addresses');

        if ($query->num_rows() > 0)
            return true;

        return false;
    }

    public function destroy($id){
        $this->db->where('id', $id);
        $this->db->update('users', ['status' => 2]);

        return true;
    }
}
