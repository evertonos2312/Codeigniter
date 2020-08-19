<?php
    defined('BASEPATH') OR exit('No direct script acess allowed');

    class Usuarios_model extends CI_Model {
        
        public function doInsert($dados=NULL){
            if (is_array($dados)) {
                $this->db->insert('usuarios', $dados);
            }
        }

        public function getUsuarioId($id=NULL) {
            if ($id) {
                $this->db->where('id', $id);
                $this->db->limit(1);
                return $this->db->get('usuarios')->row();
            }
        }

        public function doUpdate($dados=NULL, $condicao=NULL) {
            if (is_array($dados) && $condicao) {
                $this->db->update('usuarios', $dados, $condicao);
            }
        }
    }