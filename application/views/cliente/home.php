<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <hr>
    <button><a href="<?php echo base_url('cliente/cadastrar');?>">Cadastrar Cliente</a></button>
    <hr>
    <?php foreach($clientes as $cliente): ?>
        <p><strong> ID: </strong> <?php echo $cliente['id'];?></p>
        <p><strong> Nome: </strong> <?php echo $cliente['nome'];?></p>
        <p>
            <?php if($cliente['tipo_pessoa'] == 0) : ?>
                <strong> CPF: </strong> <?php echo $cliente['cpf_cnpj'];?>
            <?php else: ?>
                <strong> CNPJ: </strong> <?echo $cliente['cpf_cnpj'];?>
            <?php endif; ?>
        </p>
        <p>
            <?php if($cliente['sexo'] == 0) : ?>
                <strong> Sexo: </strong> Feminino 
            <?php else: ?>
                <strong> Sexo: </strong> Masculino
            <?php endif; ?>
        </p>
        <p><strong> Data Cadastro: </strong> <?php echo $cliente['data_cadastro'];?></p>
        <p><strong> Telefone: </strong> <?php echo $cliente['telefone'];?></p>
        <p><strong> Email: </strong> <?php echo $cliente['email'];?></p>
        <p><strong> Observações: </strong> <?php echo $cliente['observacoes'];?></p>
        <p><strong> CEP: </strong> <?php echo $cliente['cep'];?></p>
        <p><strong> Logradouro: </strong> <?php echo $cliente['logradouro'];?></p>
        <p><strong> Complemento: </strong> <?php echo $cliente['complemento'];?></p>
        <p><strong> Bairro: </strong> <?php echo $cliente['bairro'];?></p>
        <p><strong> Estado: </strong> <?php echo $cliente['uf'];?></p>
        <p><strong> IBGE: </strong> <?php echo $cliente['ibge'];?></p>
        <button><a href="#">Alterar</a></button>
        <button><a href="#">Excluir</a></button>
        <hr>
    <?php endforeach; ?>
</body>
</html>