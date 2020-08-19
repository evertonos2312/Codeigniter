<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index() {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ($this->form_validation->run() == TRUE){

        } else {
           
            $data['titulo'] = 'Login';
            $this->load->view('login/view_login', $data);

        }

    }

}