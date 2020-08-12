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

			echo '<pre>';
				print_r($query);
			// if ($query) {

			// $data['titulo'] = $query->nome_livro;
			// $data['info'] = $query;
			
			// $this->load->view('layout/topo', $data);
			// $this->load->view('livros/info', $data);
			// $this->load->view('layout/rodape', $data);
			// } else {
			// 	echo 'Você precisa passar uma ID válida';

			// }
		}
	}
}
