<?php
    defined('BASEPATH') OR exit('No direct script acess allowed');

    class Aula18 extends CI_Controller {

        public function index(){
           
            $this->load->helper('string');
            echo random_string('sha1');

        }
    }