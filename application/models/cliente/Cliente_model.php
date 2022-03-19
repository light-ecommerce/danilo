<?php

class Cliente_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function select($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('clientes');
            return $query->result_array();
        }

        $query = $this->db->get_where('clientes', array('id' => $id));

        return $query->row_array();
    }

    public function insert($dados = FALSE) {
        if( $dados !== FALSE) {
            if($this->db->insert('clientes', $dados)) {
                return "Cliente cadastrado com sucesso !";
            } else {
                return "Erro ao cadastrar o cliente !";
            }
        }
    }

    public function delete($id) {
        if($this->db->delete('clientes', array('clientes', 'id' => $id))) {
            return "Cliente excluído com sucesso !";
        } else {
            return "Erro ao Excluir o cliente !";
        }
    }

    public function update($data) {
        $this->db->where('id', $data['id']);
        if($this->db->update('clientes', $data)) {
            return "Cadastro alterado com sucesso !";
        } else {
            return "Falha ao alterar o cadastro !";
        }
    }
}
