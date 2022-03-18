<?php

class Helper_model extends CI_Model {

    public function __construct() {
        $this->load->helper('date');
        $this->load->helper('url');
    }

    public function retornaData() {
        $dateString = "%Y-%m-%d %h:%i:%s";
        $time = now('America/Sao_Paulo');
        return mdate($dateString, $time);
    }

    public function mascaraTelefone($telefone) {
        $telefone = preg_replace("/[^0-9]/ ","", $telefone);
        $numeroDigitos = strlen($telefone);

        if($numeroDigitos == 10) {
            $mascara = "(##)####-####";
        } elseif($numeroDigitos == 11) {
            $mascara = "(##)#####-####";
        } else {
            return "Caracteres inválidos";
            die();
        }

        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $telefone[$i];
        }

        return $mascara;
    }

    public function mascaraCpfCnpj($numero) {
        $numero = preg_replace("/[^0-9]/ ","", $numero);
        $numeroDigitos = strlen($numero);

        if($numeroDigitos == 11) {
            $mascara = "###.###.###-##";
        } elseif($numeroDigitos == 14) {
            $mascara = "##.###.###/####-##";
        } else {
            return "Numero de Caracteres inválidos";
            die();
        }
        
        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $numero[$i];
        }

        return $mascara;
    }

    public function mascaraRgIe($numero) {
        $numero = preg_replace("/[^A-Za-z0-9]/","", $numero);
        $numeroDigitos = strlen($numero);

        if($numeroDigitos == 9) {
            $mascara = "##.###.###-#";
        } elseif($numeroDigitos == 12) {
            $mascara = "###.###.###.###";
        } else {
            $mascara = "######";
        }
        
        for($i = 0; $i < $numeroDigitos; $i++) {
            $mascara[strpos($mascara,"#")] = $numero[$i];
        }

        return $mascara;
    }

    public function removeCaracteres($numero) {
        return $numero = str_replace(array(".","/","-","(",")"),"", $numero);
    }

    public function validaFormulario($data) {

            $nome = $data['nome'];
            if(empty($nome)){
                $_SESSION['msg_nome'] = "O Nome não pode ser Vazio!";
            } elseif(strlen($nome) > 200) {
                $_SESSION['msg_nome'] = "O nome não pode ter mais que 200 digitos!";
                $cliente['nome'] = $nome;
            } else {
                $cliente['nome'] = $nome;
                $dados_clientes['nome'] = $nome;
            }
    
            $cpf_cnpj = $data['cpf_cnpj'];
            if(empty($cpf_cnpj)){
                $_SESSION['msg_cpf_cnpj'] = "O CPF/CNPJ não pode ser Vazio!";
            } elseif(strlen($cpf_cnpj) != 11 && strlen($cpf_cnpj) != 14) {
                $_SESSION['msg_cpf_cnpj'] = "Informe um CPF/CNPJ válido!";
                $cliente['cpf_cnpj'] = $cpf_cnpj;
            } elseif(!is_numeric($cpf_cnpj)) {
                $_SESSION['msg_cpf_cnpj'] = "Utilize apenas números!";
                $cliente['cpf_cnpj'] = $cpf_cnpj;
            } else {
                $cliente['cpf_cnpj'] = $cpf_cnpj;
                $dados_clientes['cpf_cnpj'] = $this->helper_model->mascaraCpfCnpj($cpf_cnpj);
            }
    
            $rg_ie = $data['rg_ie'];
            if(empty($rg_ie)){
                $_SESSION['msg_rg_ie'] = "O RG/IE não pode ser Vazio!";
            } elseif(strlen($rg_ie) != 9 && strlen($rg_ie) != 12) {
                $_SESSION['msg_rg_ie'] = "Informe um RG/IE válido!";
                $cliente['rg_ie'] = $rg_ie;
            } else {
                $cliente['rg_ie'] = $rg_ie;
                $dados_clientes['rg_ie'] = strtoupper($this->helper_model->mascaraRgIe($rg_ie));
            }

            $telefone = $data['telefone'];
            if(empty($telefone)){
                $_SESSION['msg_telefone'] = "O Telefone não pode ser Vazio!";
            } elseif(strlen($telefone) != 10 && strlen($telefone) != 11) {
                $_SESSION['msg_telefone'] = "Informe ddd + celular ou fixo!";
                $cliente['telefone'] = $telefone;
            } elseif(!is_numeric($telefone)) {
                $_SESSION['msg_telefone'] = "Utilize apenas números!";
                $cliente['telefone'] = $telefone;
            } else {
                $cliente['telefone'] = $telefone;
                $dados_clientes['telefone'] = $this->helper_model->mascaraTelefone($telefone);
            }
    
            $email = $data['email'];
            if(empty($email)){
                $_SESSION['msg_email'] = "O email não pode ser Vazio!";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['msg_email'] = "O email não é válido!";
                $cliente['email'] = $email;
            } else {
                $cliente['email'] = $email;
                $dados_clientes['email'] = $email;
            }

            $cep = $data['cep'];
            if(empty($cep)){
                $_SESSION['msg_cep'] = "O cep não pode ser Vazio!";
            } elseif(strlen($cep) != 8) {
                $_SESSION['msg_cep'] = "Informe um CEP válido!";
                $cliente['cep'] = $cep;
            } elseif(!is_numeric($cep)) {
                $_SESSION['msg_cep'] = "Utilize apenas números!";
                $cliente['cep'] = $cep;
            } else {
                $cliente['cep'] = $cep;
                $dados_clientes['cep'] = $cep;
            }

            $logradouro = $data['logradouro'];
            if(empty($logradouro)){
                $_SESSION['msg_logradouro'] = "O Endereço não pode ser Vazio!";
            } elseif(strlen($logradouro) > 200) {
                $_SESSION['msg_logradouro'] = "O Endereço não pode ter mais que 200 digitos!";
                $cliente['logradouro'] = $logradouro;
            } else {
                $cliente['logradouro'] = $logradouro;
                $dados_clientes['logradouro'] = $logradouro;
            }

            $numero = $data['numero'];
            if(empty($numero)){
                $_SESSION['msg_numero'] = "O Número não pode ser Vazio!";
            } elseif(strlen($numero) > 10) {
                $_SESSION['msg_numero'] = "O Número não pode ter mais que 10 digitos!";
                $cliente['numero'] = $numero;
            } elseif(!is_numeric($numero) && !ctype_alpha($numero)) {
                $_SESSION['msg_numero'] = "Utilize apenas números ou letras!";
                $cliente['numero'] = $numero;
            } else {
                $cliente['numero'] = $numero;
                $dados_clientes['numero'] = $numero;
            }

            $bairro = $data['bairro'];
            if(empty($bairro)){
                $_SESSION['msg_bairro'] = "O Bairro não pode ser Vazio!";
            } elseif(strlen($bairro) > 100) {
                $_SESSION['msg_bairro'] = "O Bairro não pode ter mais que 100 digitos!";
                $cliente['bairro'] = $bairro;
            } else {
                $cliente['bairro'] = $bairro;
                $dados_clientes['bairro'] = $bairro;
            }

            $uf = $data['uf'];
            if(empty($uf)){
                $_SESSION['msg_uf'] = "O Estado não pode ser Vazio!";
            } elseif(strlen($uf) > 2) {
                $_SESSION['msg_uf'] = "O Estado não pode ter mais que 2 digitos!";
                $cliente['uf'] = $uf;
            } elseif(!ctype_alpha($uf)) {
                $_SESSION['msg_uf'] = "O Estado deverá conter apenas letras e sem acentuação!";
                $cliente['uf'] = $uf;
            } else {
                $cliente['uf'] = $uf;
                $dados_clientes['uf'] = $uf;
            }

            $ibge = $data['ibge'];
            if(empty($ibge)){
                $_SESSION['msg_ibge'] = "O IBGE não pode ser Vazio!";
            } elseif(strlen($ibge) != 7) {
                $_SESSION['msg_ibge'] = "Informe um IBGE válido!";
                $cliente['ibge'] = $ibge;
            } elseif(!is_numeric($ibge)) {
                $_SESSION['msg_ibge'] = "Utilize apenas números!";
                $cliente['ibge'] = $ibge;
            } else {
                $cliente['ibge'] = $ibge;
                $dados_clientes['ibge'] = $ibge;
            }

            $cliente['tipo_pessoa'] = $data['tipo_pessoa'];
            $cliente['sexo'] = $data['sexo'];
            $cliente['observacoes'] = $data['observacoes'];
            $cliente['complemento'] = $data['complemento'];

            $dados_clientes['data_cadastro'] = $this->helper_model->retornaData();
            $dados_clientes['tipo_pessoa'] = $data['tipo_pessoa'];
            $dados_clientes['sexo'] = $data['sexo'];
            $dados_clientes['observacoes'] = $data['observacoes'];
            $dados_clientes['complemento'] = $data['complemento'];
            if(isset($data['id'])) {
                $dados_clientes['id'] = $data['id'];
            }

            $array = ['dados_clientes' => $dados_clientes, 'cliente' => $cliente];
            return $array;
    }
}
