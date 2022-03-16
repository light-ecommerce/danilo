<?php

class Cliente_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function retornaClientes($id = false) {
        if ($id === FALSE) {
            $query = $this->db->get('clientes');
            return $query->result_array();
        }

        $query = $this->db->get_where('clientes', array('id' => $id));

        return $query->row_array();
    }
}
