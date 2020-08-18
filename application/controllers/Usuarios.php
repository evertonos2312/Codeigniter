<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->helper('security');
    }
    
    public function index(){
        $data['titulo'] = 'Lista de Usuários';
        $this->load->view('layout/topo', $data);
        $this->load->view('usuarios/list');
        $this->load->view('layout/rodape');

    }

    public function add(){
        $data['titulo'] = 'Cadastrar Usuário';

        $this->load->view('layout/topo', $data);
        $this->load->view('usuarios/add');
        $this->load->view('layout/rodape');

    }

    public function edit(){

    }

    public function del(){

    }
}