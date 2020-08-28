<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class Site_model  extends CI_Model{ 

    public function listaLivros() {
        $this->db->where('ativo', 1);
        $this->db->order_by('titulo', 'ASC');
        return $this->db->get('livros')->result();
    }
}