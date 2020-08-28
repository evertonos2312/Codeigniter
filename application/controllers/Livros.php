<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->userdata('logado')) {
			$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Você precisa realizar o Login</div>');
			redirect('login');
		}

		$this->load->model('livros_model', 'livros');
		$this->load->library('form_validation');
	}
	
	public function index(){
		$this->listar();
	}

	public function listar(){
		$data['titulo_site'] = 'Bookstore';
		$data['titulo_pagina'] = 'Lista de Livros';
		$data['livros'] = $this->livros->listarLivros();

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/view_listar');
		$this->load->view('layout/rodape');
	}

	public function adicionar(){
		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('autor', 'Autor', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('preco', 'Preço', 'trim|required');
		$this->form_validation->set_rules('resumo', 'Resumo', 'trim|required|min_length[3]');
		
		if ($this->form_validation->run() == TRUE) {
			// upload da imagem
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_livro')) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">'. $this->upload->display_errors()  .'</div>');
			redirect('livros/adicionar', 'refresh');

			} else {
			$inputAdicionar['titulo'] = $this->input->post('titulo');
			$inputAdicionar['autor'] = $this->input->post('autor');
			$inputAdicionar['preco'] = $this->input->post('preco');
			$inputAdicionar['resumo'] = $this->input->post('resumo');
			$inputAdicionar['ativo'] = $this->input->post('ativo');
			$inputAdicionar['img'] = $this->upload->data('file_name');

			$this->livros->cadastrarLivro($inputAdicionar);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso.</div>');
			redirect('livros', 'refresh');

			}

			
		} else {
		
			$data['titulo_site'] = 'Bookstore';
			$data['titulo_pagina'] = 'Cadastro de Livros';
			$this->load->view('layout/topo', $data);
			$this->load->view('livros/view_adicionar');
			$this->load->view('layout/rodape');	
		}
	}


	public function editar($id=NULL){
		
		
		if(!$id) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: nenhum livro selecionado.</div>');
			redirect('livros', 'refresh');
		}

		
		$query = $this->livros->pegaLivroID($id);
		
		if(!$query) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role"alert">Erro: Livro não encontrado.</div>');
			redirect('livros', 'refresh');
		}

		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('autor', 'Autor', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('preco', 'Preço', 'trim|required');
		$this->form_validation->set_rules('resumo', 'Resumo', 'trim|required|min_length[3]');

		if ($this->form_validation->run() == TRUE) {

			$nome_imagem = NULL;

			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			if ( $this->upload->do_upload('foto_livro')) {
				$nome_imagem = $this->upload->data('file_name');

			} 

			
			$inputEditar['titulo'] = $this->input->post('titulo');
			$inputEditar['autor'] = $this->input->post('autor');
			$inputEditar['preco'] = $this->input->post('preco');
			$inputEditar['resumo'] = $this->input->post('resumo');
			$inputEditar['ativo'] = $this->input->post('ativo');

			if ($nome_imagem) {
				$inputEditar['img'] = $nome_imagem;
			}

			$this->livros->atualizaLivro($inputEditar, ['id' => $this->input->post('id_livro')]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro atualizado com sucesso.</div>');
			redirect('livros', 'refresh');

		} else {
			$data['titulo_site'] = 'Bookstore';
			$data['titulo_pagina'] = 'Editar Livros';
			$data['query'] = $query;

			$this->load->view('layout/topo', $data);
			$this->load->view('livros/view_editar');
			$this->load->view('layout/rodape');
		}

		
	}
	
	public function apagar($id=NULL){
		if(!$id) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: nenhum livro selecionado.</div>');
			redirect('livros', 'refresh');
		}

		
		$query = $this->livros->pegaLivroID($id);
		
		if(!$query) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role"alert">Erro: Livro não encontrado.</div>');
			redirect('livros', 'refresh');


		}

		$this->livros->apagarLivro($query->id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro excluído com sucesso.</div>');
			redirect('livros', 'refresh');

	}

	public function ativar($id=NULL){
		if(!$id) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: nenhum livro selecionado.</div>');
			redirect('livros', 'refresh');
		}

		
		$query = $this->livros->pegaLivroID($id);
		
		if(!$query) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role"alert">Erro: Livro não encontrado.</div>');
			redirect('livros', 'refresh');

		}

		$this->livros->atualizaLivro(['ativo' => 1], ['id' => $query->id]);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro ativado!</div>');
			redirect('livros', 'refresh');

	}

	public function desativar($id=NULL){
		if(!$id) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro: nenhum livro selecionado.</div>');
			redirect('livros', 'refresh');
		}

		
		$query = $this->livros->pegaLivroID($id);
		
		if(!$query) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role"alert">Erro: Livro não encontrado.</div>');
			redirect('livros', 'refresh');

		}

		$this->livros->atualizaLivro(['ativo' => 0], ['id' => $query->id]);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro desativado!</div>');
			redirect('livros', 'refresh');

	}

	
}
