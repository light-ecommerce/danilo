<?php
session_start();

class Cliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente/cliente_model');
        $this->load->model('cliente/helper_model');
        $this->load->helper('date');
        $this->load->helper('url');
    }

    public function home()
    {
        $data = [
            'titulo' => 'Clientes',
            'clientes' => $this->cliente_model->select()
        ];

        $this->load->view('cliente/home', $data);
    }

    public function cadastrar()
    {
        $resultados = FALSE;

        if ($this->input->post('nome')) {
            $resultados = $this->input->post(array(
                'nome',
                'tipo_pessoa',
                'sexo',
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
            'msg'    => $msg,
            'botao' => 'Cadastrar Cliente'
        ];

        $this->load->view('cliente/cadastrar', $data);
    }

    public function alterar($id)
    {

        $resultados = FALSE;
        $msg = "";

        if ($this->input->post('nome')) {
            $resultados = $this->input->post(array(
                'nome',
                'tipo_pessoa',
                'sexo',
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

            $resultados['id'] = $id;
            $resultados['cpf_cnpj'] = $this->helper_model->mascaraCpfCnpj($cpf_cnpj);
            $resultados['rg_ie'] = strtoupper($this->helper_model->mascaraRgIe($rg_ie));
            $resultados['telefone'] = $this->helper_model->mascaraTelefone($telefone);
            $resultados['data_cadastro'] = $this->helper_model->retornaData();
            
            $msg = $this->cliente_model->update($resultados);
        }

        $cliente = $this->cliente_model->select($id);
        $cliente['cpf_cnpj'] = $this->helper_model->removeCaracteres($cliente['cpf_cnpj']);
        $cliente['rg_ie'] = $this->helper_model->removeCaracteres($cliente['rg_ie']);
        $cliente['telefone'] = $this->helper_model->removeCaracteres($cliente['telefone']);

        $data = [
            'titulo' => 'Alteração de Cadastro',
            'clientes' => $cliente,
            'msg'    => $msg,
            'botao' => 'Atualizar Cadastro'
        ];

        $this->load->view('cliente/cadastrar', $data);
    }

    public function excluir($id)
    {
        $_SESSION['msg'] = $this->cliente_model->delete($id);
        $pagina = base_url('cliente/home');
        header("Location:" . $pagina);
    }
}
