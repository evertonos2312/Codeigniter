<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula5 extends CI_Controller {

	
	public function index()
	{	
		//Parametros
		$data['titulo'] 		= 'Titulo Aula 5';
		$data['conteudo'] 		= 'Hoje estamos aprendendo como trabalhar com Views.';
		$data['titulo_pagina'] 	= 'Aula #5';
		//carrega uma view
		$this->load->view('aula5_view', $data);
	}

	public function pagina($pagina=NULL)
	{
		$data['titulo'] = 'Aula com varias views';

		$data['conteudo'] = 'Hoje estamos aprendendo como trabalhar com views.';

		$data['rodape'] = 'Todos os direitos reservados';

		$this->load->view('layout/topo', $data);
		
		if ($pagina == 'contato'){
			$this->load->view('site/contato');
		}
		if ($pagina == NULL){
			$this->load->view('site/conteudo');
		}
		$this->load->view('layout/rodape');
	}
	
}
