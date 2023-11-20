<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('view_html_header');
        $this->load->view('view_html_main');
        $this->load->view('view_html_footer');
    }

}
