<?php

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cliente/cliente_model');
        $this->load->model('cliente/helper_model');
        $this->load->helper('date');
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
        $resultados = FALSE;

       if($this->input->post('nome')){
            $resultados = $this->input->post(array(
                'nome',
                'tipo_pessoa',
                'sexo',
                'data_cadastro',
                'email',
                'observacoes',
                'cep',
                'logradouro',
                'numero',
                'complemento',
                'bairro',
                'uf',
                'ibge'
            ));

            $cpf_cnpj = $this->input->post('cpf_cnpj');
            $rg_ie = $this->input->post('rg_ie');
            $telefone = $this->input->post('telefone');

            $resultados['cpf_cnpj'] = $this->helper_model->mascaraCpfCnpj($cpf_cnpj);
            $resultados['rg_ie'] = strtoupper($this->helper_model->mascaraRgIe($rg_ie));
            $resultados['telefone'] = $this->helper_model->mascaraTelefone($telefone);
            $resultados['data_cadastro'] = $this->helper_model->retornaData();

       }

        $msg = $this->cliente_model->insert($resultados);

        $data = [
            'titulo' => 'Cadastro de Clientes',
            'msg'    => $msg
        ];

        $this->load->helper('url');
        $this->load->view('cliente/cadastrar', $data);
    }



}