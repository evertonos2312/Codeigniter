<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula extends CI_Controller {

    public function index($funcao=NULL)
    {
        if ($funcao == 1) {
            $this->listar();
        }
        
        if ($funcao == 2) {
            $this->adicionar();
        }

        if ($funcao == 3) {
            $this->alterar();
        }
        if ($funcao == NULL) {
            echo 'Você deve passar uma função';
        }
    } 
    private function listar() 
    {
        echo 'listar';
    }
    private function adicionar() 
    {
        echo 'adicionar';
        
    }
    private function alterar()
    {
        echo 'alterar';
        
    } 

}