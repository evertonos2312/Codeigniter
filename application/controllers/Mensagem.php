<?php 
    defined('BASEPATH') OR exit('No direct script allowed');

    class Mensagem extends CI_Controller {

        public function __construct() {
            parent:: __construct();

            $this->load->library('form_validation');
            $this->load->helper('form');
        }

        public function index(){

            if ($this->input->post('valor')) {

                $valor = $this->input->post('valor');

                if ($valor >= 10) {
                    $this->session->set_flashdata('msg', '<h1>Valor é maior ou igual a 10</h1>');
                } else {
                    $this->session->set_flashdata('msg', '<h4>Valor é menor que 10</h4>');

                }

                redirect('Mensagem');

            } else {
                $data['titulo'] = 'Exemplo Flashdata';

                $this->load->view('layout/topo', $data);
                $this->load->view('flashdata/form');
                $this->load->view('layout/rodape');
            }

        }
    }