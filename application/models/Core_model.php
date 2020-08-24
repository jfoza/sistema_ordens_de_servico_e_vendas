<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model {

	public function get_all($table = null, $condition = null) {
		if($table) {
			if(is_array($condition)) {
				$this->db->where($condition);
			}
			return $this->db->get($table)->result();
		}
		else {
			return false;
		}
	}

	public function get_by_id($table = null, $condition = null) {
		if($table && is_array($condition)) {
			$this->db->where($condition);
			$this->db->limit(1);

			return $this->db->get($table)->row();
		}
		else {
			return false;
		}

	}

	public function insert($table = null, $data = null, $get_last_id = null) {
		if($table && is_array($data)) {
			$this->db->insert($table, $data);

			if($get_last_id) {
				$this->session->set_userdata('last_id', $this->db->insert_id());
			}

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
			} else {
				$this->session->set_flashdata('error', 'Erro ao salvar dados');
			}
		}
		else {
			return false;
		}
	}

	public function update($table = null, $data = null, $condition = null) {
		if($table && is_array($data) && is_array($condition)) {
			if($this->db->update($table, $data, $condition)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
			} else {
				$this->session->set_flashdata('error', 'Erro ao atualizar dados');
			}
		}
		else {
			return false;
		}
	}

	public function delete($table = null, $condition = null) {
		$this->db_debug = false;

		if($table && is_array($condition) && is_array($condition)) {
			$status = $this->db->delete($table, $condition);
			$error = $this->db->error();

			if(!$status) {
				foreach ($error as $code) {
					if($code == 1451) {
						$this->session->set_flashdata('error', 'Este registro não poderá ser excluído pois está sendo utilizado em outra tabela');
					}
				}
			} else {
				$this->session->set_flashdata('sucesso', 'Registro excluídomcom sucesso');
			}

			$this->db_debug = true;
		} else {
			return false;
		}
	}
}


