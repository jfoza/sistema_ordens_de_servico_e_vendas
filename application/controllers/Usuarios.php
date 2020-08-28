<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array(
			'titulo' => 'Usuários cadastrados',

			'styles' => array(
				'vendor/datatables/dataTables.bootstrap4.min.css',
			),

			'scripts' => array(
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js',
			),

			'usuarios' => $this->ion_auth->users()->result(),
		);

//		echo '<pre>';
//		print_r($data['usuarios']);
//		exit();

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');

	}

	public function edit($user_id = null) {
		if(!$user_id || !$this->ion_auth->user($user_id)->row()) {
			$this->session->set_flashdata('error', 'Usuário não encontrado');
			redirect('usuarios');
		} else {
			$this->form_validation->set_rules('first_name', '', 'trim|required');
			$this->form_validation->set_rules('last_name', '', 'trim|required');
			$this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
			$this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
			$this->form_validation->set_rules('password', 'senha', 'min_length[5]|max_length[255]');
			$this->form_validation->set_rules('confirm_password', 'confirmação de senha', 'matches[password]');

			if($this->form_validation->run()) {
				$data = elements(
					array(
						'first_name',
						'last_name',
						'email',
						'username',
						'active',
						'password',
					), $this->input->post()
				);

				$data = $this->security->xss_clean($data);

				$password = $this->input->post('password');

				if(!$password) {
					unset($data['password']);
				}

				if($this->ion_auth->update($user_id, $data)) {
					$perfil_usuario_db = $this->ion_auth->get_users_groups($user_id)->row();
					$perfil_usuario_post = $this->input->post('perfil_usuario');

					if($perfil_usuario_post != $perfil_usuario_db->id) {
						$this->ion_auth->remove_from_group($perfil_usuario_db->id, $user_id);
						$this->ion_auth->add_to_group($perfil_usuario_post, $user_id);
					}
					$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
				} else {
					$this->session->set_flashdata('error', 'Erro ao salvar os dados');
				}
				redirect('usuarios');

			} else {
				$data = array(
					'titulo'         => 'Editar usuário',
					'usuario'        => $this->ion_auth->user($user_id)->row(),
					'perfil_usuario' => $this->ion_auth->get_users_groups($user_id)->row(),
				);
				$this->load->view('layout/header', $data);
				$this->load->view('usuarios/edit');
				$this->load->view('layout/footer');
			}
		}
	}

	public function email_check($email) {
		$usuario_id = $this->input->post('user_id');

		if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id ))) {
			$this->form_validation->set_message('email_check', 'Este email já existe');
			return false;
		} else {
			return true;
		}
	}

	public function username_check($username) {
		$usuario_id = $this->input->post('user_id');

		if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id ))) {
			$this->form_validation->set_message('username_check', 'Este email já existe');
			return false;
		} else {
			return true;
		}
	}
}
