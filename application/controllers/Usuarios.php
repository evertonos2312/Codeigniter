<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logado')) {
			$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Você precisa realizar o Login</div>');
			redirect('login');
		}
        $this->load->model('usuarios_model');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->listar();
    }

    public function listar(){
        $data['titulo_site'] = 'Lista de Usuários';
        $data['titulo_pagina'] = 'Lista de Usuários';
        $data['usuarios'] = $this->usuarios_model->getUsuarios();
        $this->load->view('layout/topo', $data);
        $this->load->view('usuarios/view_listar');
        $this->load->view('layout/rodape');

    }

    public function adicionar(){
        $this->form_validation->set_rules('nome', 'NOME', 'required|min_length[3]');
		
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email', array(
			'valid_email'=>'Você deve passar um e-mail válido'
		));

		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[12]', array(
			'required' => 'Você passar uma senha!',
			'min_length' => 'Sua senha deve ter no mínimo 6 caracteres',
			'max_length' => 'Sua senha deve ter no máximo 8 caracteres'
		));

		$this->form_validation->set_rules('senha2', 'Repita a Senha', 'required|matches[senha]',
			array(
				'required' => 'Você deve preencher o campo Repita a Senha',
				'matches' => 'Senha não confere!'
            ));
            
        if ($this->form_validation->run() == TRUE){
            //Salvar dados no banco
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = do_hash($this->input->post('senha'));
            $dados['ativo'] = 1;

            $this->usuarios_model->doInsert($dados);

            redirect('usuarios', 'refresh');

        } else {
            $data['titulo_site'] = 'Cadastrar Usuário';
            $data['titulo_pagina'] = 'Cadastrar Usuário';
    
            $this->load->view('layout/topo', $data);
            $this->load->view('usuarios/view_adicionar');
            $this->load->view('layout/rodape');

        }


    }

    public function editar($id=NULL){

        if(!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um ID de usuário</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUsuarioId($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não existe</div>');
            redirect('usuarios');
        }


        $this->form_validation->set_rules('nome', 'NOME', 'required|min_length[3]');
		
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email', array(
			'valid_email'=>'Você deve passar um e-mail válido'
		));

        if ($this->form_validation->run() == TRUE){
            //Salvar dados no banco
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');

            $this->usuarios_model->doUpdate($dados, ['id' =>$this->input->post('id')]);

            redirect('usuarios', 'refresh');

        } else {

            $data['titulo_site'] = 'Editar Usuários';
            $data['titulo_pagina'] = 'Editar Usuários';
            $data['query'] = $query;
        
            $this->load->view('layout/topo', $data);
            $this->load->view('usuarios/view_editar');
            $this->load->view('layout/rodape');

        }
    }

    public function apagar($id=NULL){
        if(!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um ID de usuário</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUsuarioId($id);
        //Verifica ID
        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não existe</div>');
            redirect('usuarios');
        }
        //Verifica se usuário está logado
        if($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: Usuário logado</div>');
            redirect('usuarios');
        }
        //Apagar
        if($this->usuarios_model->doDelete(['id' => $query->id])){
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário apagado com sucesso</div>');
            
        } else {
            
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro ao apagar usuário</div>');
        }
            redirect('usuarios');
        
        }
        public function ativo($id=NULL){
            if(!$id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um ID de usuário</div>');
                redirect('usuarios');
            }
    
            $query = $this->usuarios_model->getUsuarioId($id);
            //Verifica ID
            if (!$query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não existe</div>');
                redirect('usuarios');
            }
            //Verifica se usuário está logado
            if($query->email == $this->session->userdata('email')) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: Usuário logado</div>');
                redirect('usuarios');
            }

            $dados['ativo'] = 1;
            $this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário ativado com sucesso.</div>');
            redirect('usuarios');
        }

        public function inativo($id=NULL){
            if(!$id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um ID de usuário</div>');
                redirect('usuarios');
            }
    
            $query = $this->usuarios_model->getUsuarioId($id);
            //Verifica ID
            if (!$query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não existe</div>');
                redirect('usuarios');
            }
            //Verifica se usuário está logado
            if($query->email == $this->session->userdata('email')) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: Usuário logado</div>');
                redirect('usuarios');
            }
             $dados['ativo'] = 0;
                $this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário desativado com sucesso.</div>');
                redirect('usuarios');
        }
}