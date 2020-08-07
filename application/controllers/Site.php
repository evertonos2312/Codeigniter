<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	
	public function index()
	{
		$data['titulo'] = 'Bootstrap';

		$this->load->view('layout/topo', $data);
		$this->load->view('site/conteudo');
		$this->load->view('layout/rodape');
	}

	public function livros() {
		$data['titulo'] = 'Lista de Livros';

		$this->load->model('livros_model', 'livros');

		$livros = $this->livros->listarLivros();

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/index');
		$this->load->view('layout/rodape');
	}

}
