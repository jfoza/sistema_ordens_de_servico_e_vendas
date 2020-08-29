<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller {
	public function index() {
		$this->load->view('layout/header');
		$this->load->view('login/index');
	}
}
