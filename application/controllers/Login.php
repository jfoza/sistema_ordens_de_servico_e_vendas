<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller {
	public function index() {
		$identity = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$remember = FALSE; // remember the user

		if($this->ion_auth->login($identity, $password, $remember)) {
			redirect('home');
		} else {
			$this->session->set_flashdata('error', 'Verifique seu e-mail ou senha');
			$this->load->view('layout/header');
			$this->load->view('login/index');
			$this->load->view('layout/footer');
		}

//		echo '<pre>';
//		print_r($this->input->post());
//		exit();


	}
}
