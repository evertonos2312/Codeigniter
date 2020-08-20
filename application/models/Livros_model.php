<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livros_model extends CI_Model {

    // Listar livros cadastrados
    public function listarLivros(){
        return $this->db->get('livros')->result();
      }

    //Cadastrar Livros
    public function cadastrarLivro($dados=NULL){
        if (is_array($dados)) {
            $this->db->insert('livros', $dados);
        }
    }
    //Get livro por ID
    public function pegaLivroID($id=NULL){
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('livros')->row();
        }
    }

    //Atualizar um livro
    public function atualizaLivro($dados=NULL, $condicao=NULL) {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('livros', $dados, $condicao);
        }
    }

    //Apagar um livro
    public function apagarLivro($id=NULL){
        if ($id) {
            $this->db->delete('livros', ['id' => $id]);
        }
    }
}