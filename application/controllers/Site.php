<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('livros_model', 'livros');
		$this->load->helper('funcoes_helper', 'funcoes');
	}
	
	public function index()
	{
		$data['titulo'] = 'Bootstrap';

		$this->load->view('layout/topo', $data);
		$this->load->view('site/conteudo');
		$this->load->view('layout/rodape');
	}

	public function livros() {
		$data['titulo'] = 'Lista de Livros';

		

		//carrega banco de dados
		$data['livros'] = $this->livros->listarLivros();

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/index');
		$this->load->view('layout/rodape');
	}

	public function info($id=NULL) {
		if ($id == NULL) {
			echo 'Você precisa passar uma id válida!';
		} else {
			
			$query = $this->livros->getById($id);

			
			if ($query) {

			$data['titulo'] = $query->nome_livro;
			$data['info'] = $query;
			
			$this->load->view('layout/topo', $data);
			$this->load->view('livros/info', $data);
			$this->load->view('layout/rodape', $data);
			} else {
				echo 'Você precisa passar uma ID válida';

			}
		}
	}

	public function validar() {
		$data['titulo'] = 'Biblioteca Form_Validation';

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'NOME', 'required|min_length[3]');
		
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email', array(
			'valid_email'=>'Você deve passar um e-mail válido'
		));

		$this->form_validation->set_rules('codigo', 'Código', 'numeric', array(
			'numeric'=> 'Você deve passar somente números!'
		));

		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[8]', array(
			'required' => 'Você passar uma senha!',
			'min_length' => 'Sua senha deve ter no mínimo 6 caracteres',
			'max_length' => 'Sua senha deve ter no máximo 8 caracteres'
		));

		$this->form_validation->set_rules('senha2', 'Repita a Senha', 'required|matches[senha]',
			array(
				'required' => 'Você deve preencher o campo Repita a Senha',
				'matches' => 'Senha não confere!'
			));
		
		if ($this->form_validation->run() == TRUE) {
			echo 'Formulário validado com sucesso';
		} else {
			$this->load->view('layout/topo', $data);
			$this->load->view('formulario/validar');
			$this->load->view('layout/rodape');
		}

		
	}
}
