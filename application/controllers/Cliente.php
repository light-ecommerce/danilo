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
        $msg = "";
        $dados['cliente'] = FALSE;

        if ($this->input->post('btn_submit')) {
            $resultados = $this->input->post(array(
                'nome',
                'tipo_pessoa',
                'cpf_cnpj',
                'rg_ie',
                'sexo',
                'telefone',
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

            $dados = $this->helper_model->validaFormulario($resultados);
            $dados_clientes = $dados['dados_clientes'];

            if(isset($dados_clientes)) {
                if(count($dados_clientes) > 15) {
                    $msg = $this->cliente_model->insert($dados_clientes);
                    $pagina = base_url('cliente/home');
                    header("Location:" . $pagina);
                    $_SESSION['msg_cadastro'] = "Cliente Cadastrado com sucesso !";
                } 
            }
        }

        $data = [
            'titulo' => 'Cadastro de Clientes',
            'clientes' => $dados['cliente'],
            'msg'    => $msg,
            'botao' => 'Cadastrar Cliente'
        ];

        $this->load->view('cliente/cadastrar', $data);
    }

    public function alterar($id)
    {
        $resultados = FALSE;
        $msg = "";

        $cliente = $this->cliente_model->select($id);
        $cliente['cpf_cnpj'] = $this->helper_model->removeCaracteres($cliente['cpf_cnpj']);
        $cliente['rg_ie'] = $this->helper_model->removeCaracteres($cliente['rg_ie']);
        $cliente['telefone'] = $this->helper_model->removeCaracteres($cliente['telefone']);

        if ($this->input->post('btn_submit')) {
            $resultados = $this->input->post(array(
                'nome',
                'tipo_pessoa',
                'cpf_cnpj',
                'rg_ie',
                'sexo',
                'telefone',
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

            $resultados['id'] = $id;
            $dados = $this->helper_model->validaFormulario($resultados);
            $dados_clientes = $dados['dados_clientes'];
            $cliente = $dados['cliente'];

            if(isset($dados_clientes)) {
                if(count($dados_clientes) > 15) {
                    $msg = $this->cliente_model->update($dados_clientes);
                    $_SESSION['msg_cadastro'] = "Cliente Alterado com sucesso !";
                } 
            }

        }

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
