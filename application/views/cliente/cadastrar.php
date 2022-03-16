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
        margin-bottom: 10px;
    }

    label {
        margin-bottom: 5px;
        width: 100px;
    }

    form input[type= radio] {
        width: 10px;
        display: inline-block;
    }

    </style>

</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <hr>
    <button><a href="<?php echo base_url('cliente/home'); ?>">Voltar para Home</a></button>
    <hr>
    <form action="#" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="200" required>
        <p>Tipo de Pessoa: </p>
        <input type="radio" id="pessoa_fisica" name="tipo_pessoa" value="0">
        <label for="pessoa_fisica">Pessoa Física</label>
        <input type="radio" id="pessoa_juridica" name="tipo_pessoa" value="1">
        <label for="pessoa_juridica">Pessoa Juridica</label>
        <p>Sexo: </p>
        <input type="radio" id="sexo_feminino" name="sexo" value="0">
        <label for="sexo_feminino">Feminino</label>
        <input type="radio" id="sexo_masculino" name="sexo" value="1">
        <label for="sexo_masculino">Masculino</label>
        <label for="data_cadastro">Data Cadastro: </label>
        <input type="date" id="data_cadastro" name="data_cadastro" required>
        <label for="telefone">Telefone: </label>
        <input type="tel" id="telefone" name="telefone" required>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required>
        <label for="observacoes">Observações: </label>
        <textarea id="observacoes" name="observacoes" cols="30" rows="5"></textarea>
        <label for="cep">CEP: </label>
        <input type="number" id="cep" name="cep" required>
        <label for="logradouro">Endereço: </label>
        <input type="number" id="logradouro" name="logradouro" maxlength="200" required>
        <label for="numero">Número: </label>
        <input type="number" id="numero" name="numero" required>
        <label for="complemento">Complemento: </label>
        <input type="number" id="complemento" name="complemento" required>
        <label for="bairro">Bairro</label>
        <input type="number" id="bairro" name="bairro" required>
        <label for="uf">Estado: </label>
        <input type="number" id="uf" name="uf" required>
        <label for="ibge">IBGE: </label>
        <input type="number" id="ibge" name="ibge" required>
    </form>
</body>

</html>