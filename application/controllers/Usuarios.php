<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data['titulo'] = 'Lista de Usuários';
        $this->load->view('layout/topo', $data);
        $this->load->view('usuarios/list');
        $this->load->view('layout/rodape');

    }

    public function add(){
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
            $data['titulo'] = 'Cadastrar Usuário';
    
            $this->load->view('layout/topo', $data);
            $this->load->view('usuarios/add');
            $this->load->view('layout/rodape');

        }


    }

    public function edit($id=NULL){

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

            $data['titulo'] = 'Editar Usuário';
            $data['query'] = $query;
        
            $this->load->view('layout/topo', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/rodape');

        }
    }

    public function del(){

    }
}