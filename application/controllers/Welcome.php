<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function aula3($id=NULL)
	{
		if($id) {
			echo 'Aula 3' . $id;
		}
		else {
			echo 'Você deve passar uma ID';
		}
	}
}
