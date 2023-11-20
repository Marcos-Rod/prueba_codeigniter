<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->users = $this->User_model->users();

        $this->load->view('view_html_header');
        $this->load->view('users/index.php');
        $this->load->view('view_html_footer');
    }

    public function create(){
        $this->load->view('view_html_header');
        $this->load->view('users/create.php');
        $this->load->view('view_html_footer');
    }

    public function store(){

        if(!empty($_POST)){
            $password = $this->create_password();
            
            $data = [
                'name' => $_POST['name'],
                'last_name' => $_POST['last_name'],
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'user_type' => 'Administrativo',
                'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 12])
            ];

            $direction = [
                'codigo_postal' => $_POST['codigo_postal'],
                'colonia' => $_POST['colonia'],
                'delegacion' => $_POST['delegacion'],
                'estado' => $_POST['estado'],
            ];
           
            $id = $this->User_model->insert($data);

            $direction['user_id'] = $id;

            
            if($id){
                $this->User_model->insert_direction($direction);
                $this->session->set_flashdata('success', "El usuario se agregó con exito. La contraseña es <strong>$password</strong>");
            } else {
                $this->session->set_flashdata('error', 'Hubo un error al agregar el usuario. Intente de nuevo.');

            }
        }

        redirect('users/create');;
    }


    public function create_password(){
        $chars = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_.,');

        return substr($chars, 0, 8);
    }
}
