<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site_model', 'site');
    }

    public function index(){
        
        $data['titulo'] = "Catalogo de Livros";
        $data['descricao'] = "Catálogo de livros";
        $data['livros'] = $this->site->listaLivros();

        $this->load->view('web/view_site', $data);

    }


}