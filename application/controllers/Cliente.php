<?php

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cliente/cliente_model');
    }

    public function home() {
        $data = [
            'titulo' => 'Clientes',
            'clientes' => $this->cliente_model->retornaClientes()
        ];

        $this->load->helper('url');
        $this->load->view('cliente/home', $data);
    }

    public function cadastrar() {

        $data = [
            'titulo' => 'Cadastro de Clientes',
        ];
        $this->load->helper('url');
        $this->load->view('cliente/cadastrar', $data);
    }
}