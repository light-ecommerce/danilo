<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 80%;
        }

        form input,
        textarea {
            width: 300px;
            margin-bottom: 5px;
        }

        label {
            margin-bottom: 5px;
            width: 100px;
        }

        form input[type=radio] {
            width: 10px;
            display: inline-block;
        }
    </style>

</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <h3><?php echo $msg; ?></h3>
    <hr>
    <button><a href="<?php echo base_url('cliente/home'); ?>">Voltar para Home</a></button>
    <hr>
    <form action="#" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="200" required 
        value="<?php echo $nome = (isset($clientes['nome']) ? $clientes['nome'] : "") ;?>">
        <div>
            <p>Tipo de Pessoa: </p>
            <input type="radio" id="pessoa_fisica" name="tipo_pessoa" value="0" 
            <?php  
                if(isset($clientes['nome'])) {
                    echo $checked = ($clientes['tipo_pessoa'] == 0) ? 'checked' : "";
                } else {
                    echo 'checked';
                }
            ?>>
            <label for="pessoa_fisica">Pessoa Física</label>
            <input type="radio" id="pessoa_juridica" name="tipo_pessoa" value="1"
            <?php  
                if(isset($clientes['nome'])) {
                    echo $checked = ($clientes['tipo_pessoa'] == 1) ? 'checked' : "";
                } 
            ?>>
            <label for="pessoa_juridica">Pessoa Juridica</label>
        </div>
        <label for="cpf_cnpj">CPF/CNPJ: </label>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" maxlength="14" minlength="11" required 
        value="<?php echo $cpf_cnpj = (isset($clientes['cpf_cnpj']) ? $clientes['cpf_cnpj'] : "") ;?>">
        <label for="rg_ie">RG/IE: </label>
        <input type="text" id="rg_ie" name="rg_ie" maxlength="12" minlength="6" required
        value="<?php echo $rg_ie = (isset($clientes['rg_ie']) ? $clientes['rg_ie'] : "") ;?>">
        <div>
            <p>Sexo: </p>
            <input type="radio" id="sexo_feminino" name="sexo" value="0" 
            <?php  
                if(isset($clientes['nome'])) {
                    echo $checked = ($clientes['sexo'] == 0) ? 'checked' : "";
                } else {
                    echo 'checked';
                }
            ?>>
            <label for="sexo_feminino">Feminino</label>
            <input type="radio" id="sexo_masculino" name="sexo" value="1"
            <?php  
                if(isset($clientes['nome'])) {
                    echo $checked = ($clientes['sexo'] == 1) ? 'checked' : "";
                }
            ?>>
            <label for="sexo_masculino">Masculino</label>
        </div>
        <label for="telefone">Telefone: </label>
        <input type="tel" id="telefone" name="telefone" maxlength="11" minlength="10" required
        value="<?php echo $telefone = (isset($clientes['telefone']) ? $clientes['telefone'] : "") ;?>">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required 
        value="<?php echo $email = (isset($clientes['email']) ? $clientes['email'] : "") ;?>">
        <label for="observacoes">Observações: </label>
        <textarea id="observacoes" name="observacoes" cols="30" rows="5"><?php 
            if(isset($clientes['observacoes'])) { echo trim($clientes['observacoes']); } 
        ?> </textarea>
        <label for="cep">CEP: </label>
        <input type="text" id="cep" name="cep" maxlength="8" required onblur="pesquisarCep(this.value);"
        value="<?php echo $cep = (isset($clientes['cep']) ? $clientes['cep'] : "") ;?>">
        <label for="logradouro">Endereço: </label>
        <input type="text" id="logradouro" name="logradouro" maxlength="200" required
        value="<?php echo $logradouro = (isset($clientes['logradouro']) ? $clientes['logradouro'] : "") ;?>">
        <label for="numero">Número: </label>
        <input type="text" id="numero" name="numero" maxlength="10" required
        value="<?php echo $numero = (isset($clientes['numero']) ? $clientes['numero'] : "") ;?>">
        <label for="complemento">Complemento: </label>
        <input type="text" id="complemento" name="complemento"
        value="<?php echo $complemento = (isset($clientes['complemento']) ? $clientes['complemento'] : "") ;?>">
        <label for="bairro">Bairro: </label>
        <input type="text" id="bairro" name="bairro" required
        value="<?php echo $bairro = (isset($clientes['bairro']) ? $clientes['bairro'] : "") ;?>">
        <label for="uf">Estado: </label>
        <input type="text" id="uf" name="uf" required
        value="<?php echo $uf = (isset($clientes['uf']) ? $clientes['uf'] : "") ;?>">
        <label for="ibge">IBGE: </label>
        <input type="number" id="ibge" name="ibge" required 
        value="<?php echo $ibge = (isset($clientes['ibge']) ? $clientes['ibge'] : "") ;?>">
        <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $botao ?>">
    </form>

    <script>
        async function pesquisarCep(cep) {

            try {
                const url = `https://viacep.com.br/ws/${cep}/json/`;
                const resposta = await fetch(url);
                const data = await resposta.json();

                limparCampos();
                preencherCampos(data);
            } catch (e) {
                limparCampos();
                document.getElementById('cep').value = `Erro: Cep Inválido`;
            }

        }

        function limparCampos() {
            document.getElementById('logradouro').value = "";
            document.getElementById('numero').value = "";
            document.getElementById('complemento').value = "";
            document.getElementById('bairro').value = "";
            document.getElementById('uf').value = "";
            document.getElementById('ibge').value = "";
        }

        function preencherCampos(data) {
            document.getElementById('logradouro').value = data.logradouro;
            document.getElementById('complemento').value = data.complemento;
            document.getElementById('bairro').value = data.bairro;
            document.getElementById('uf').value = data.uf;
            document.getElementById('ibge').value = data.ibge;
        }
    </script>

</body>

</html>