<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public $users, $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        // Listado de usuarios para la tabla de registros
        $this->users = $this->User_model->users();

        $this->load->view('view_html_header');
        $this->load->view('users/index.php');
        $this->load->view('view_html_footer');
    }

    public function create()
    {

        //Vistas para el formulario de nuevos usuarios

        $this->load->view('view_html_header');
        $this->load->view('users/create.php');
        $this->load->view('view_html_footer');
    }

    public function store()
    {

        if (!empty($_POST)) {

            // Validar campos
            $this->inputs_validate();

            if (!$this->form_validation->run()) {
                $this->load->view('view_html_header');
                $this->load->view('users/create');
                $this->load->view('view_html_footer');

                return;
            }

            //password aleatorio para el usuario
            $password = $this->create_password();

            //Formateo de datos para la el registro del usuario en la BD
            $data = $this->data_array();

            //Se agrega el campo de la contraseña para que pueda ser almacenada en la base de datos
            $data['basic']['password'] = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

            $id = $this->User_model->insert($data['basic']);

            $data['general']['user_id'] = $id;


            if ($id) {
                //Si se registra correctamente se creará el registro relacionado al usuario
                $this->User_model->insert_direction($data['general']);

                //Menssaje de sesión en caso de éxito
                $this->session->set_flashdata('success', "El usuario se agregó con éxito. La contraseña es <strong>$password</strong>");
            } else {
                //Menssajes de sesión en caso de error
                $this->session->set_flashdata('error', 'Hubo un error al agregar el usuario. Intente de nuevo.');
            }
        }

        redirect('users/create');
    }

    //Vista del formulario para editar
    public function edit($id)
    {

        $this->user = $this->User_model->find($id);

        $this->load->view('view_html_header');
        $this->load->view('users/edit');
        $this->load->view('view_html_footer');
    }

    //Funcion para actualizar los datos del usuario
    public function update($id)
    {
        $data = $this->data_array();
        $data['basic']['status'] = $_POST['status'];

        if (!empty($_POST['password'])) {
            $data['basic']['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        }

        $this->inputs_validate();

        if (!$this->form_validation->run()) {
            $this->user = $this->User_model->find($id);
            
            $this->load->view('view_html_header');
            $this->load->view('users/edit');
            $this->load->view('view_html_footer');

            return;
        }

        if (!$this->User_model->update($id, $data))
            $this->session->set_flashdata('error', 'Hubo un error al editar el usuario. Intente de nuevo.');

        
        $this->session->set_flashdata('success', "El usuario se editó con éxito.");

        return redirect("users/edit/$id");
    }

    public function show($id){
        $this->user = $this->User_model->find($id);

        $this->load->view('view_html_header');
        $this->load->view('users/show');
        $this->load->view('view_html_footer');
    }
    

    public function data_array()
    {
        //Datos para la el registro del usuario en la BD
        $data['basic'] = [
            'name' => $_POST['name'],
            'last_name' => $_POST['last_name'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'user_type' => $_POST['user_type']
        ];

        //Datos de la dirección del usuario
        $data['general'] = [
            'codigo_postal' => $_POST['codigo_postal'],
            'colonia' => $_POST['colonia'],
            'delegacion' => $_POST['delegacion'],
            'estado' => $_POST['estado'],
        ];

        return $data;
    }

    //Funcion para que devuelve una cadena aleatoria de 8 carácteres
    public function create_password()
    {
        $chars = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_.,');

        return substr($chars, 0, 8);
    }

    // Funcion pada validar los campos del formulario
    public function inputs_validate()
    {
        $this->form_validation->set_rules('name', 'Nombre', 'trim|required', ['required' => 'Debes escribir el nombre del usuario']);
        $this->form_validation->set_rules('last_name', 'Apellido', 'trim|required', ['required' => 'Debes escribir el apellido del usuario']);
        $this->form_validation->set_rules('gender', 'Género', 'trim|required', ['required' => 'Debes seleccionar un género']);
        $this->form_validation->set_rules('email', 'Correo', 'trim|required', ['required' => 'Debes escribir el correo']);
        $this->form_validation->set_rules('phone', 'Teléfono', 'trim|required', ['required' => 'Debes escribir el teléfono de contacto']);
        $this->form_validation->set_rules('user_type', 'tipo de usuario', 'trim|required|required|in_list[Administrativo,Administrativo-Operativo,Operativo]', ['required' => 'Debes asignar un tipo de usuario']);
        $this->form_validation->set_rules('colonia', 'colonia', 'trim|required', ['required' => 'Debes escribir la colonia']);
        $this->form_validation->set_rules('delegacion', 'delegación o municipio', 'trim|required', ['required' => 'Debes escribir la delegación']);
        $this->form_validation->set_rules('estado', 'estado', 'trim|required', ['required' => 'Debes escribir el estado']);
        $this->form_validation->set_rules('status', 'estatus', 'in_list[1,2]', ['in_list' => 'Selecciona solo uno de los estatus existentes']);
    }

    public function delete($id){
        $this->User_model->destroy($id);

        $this->session->set_flashdata('success', "El usuario se eliminó con éxito.");

        return redirect("users/");
    }
    
}
