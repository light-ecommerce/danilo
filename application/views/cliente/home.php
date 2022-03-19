<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Nunito+Sans:wght@300;400&family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        header {
            background-color: #7159c1;
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            color: white;
        }

        header h1#titulo {
            font-family: 'Poppins', sans-serif;
        }

        header h1#logotipo {
            font-family: 'Lobster', cursive;

        }

        main {
            font-family: 'Nunito Sans', sans-serif;
            width: 80%;
            max-width: 1160px;
            display: block;
            margin: 0 auto;
        }

        section {
            width: 90%;
            max-width: 980px;
            background: white;
            padding: 40px 20px;
            box-shadow: 0px 2px 2px 2px rgba(0, 0, 0, 0.15),
                0px 10px 20px -10px rgba(0, 0, 0, 0.1)
        }

        #section_principal {
            margin: 20px 0px;
            padding: 20px;
        }

        #section_principal a{
            display: block;
            text-align: center;
            background-color: #7159c1;
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            color: white;
            padding: 10px;
        }

        #section_principal a:hover {
            background-color: #7140c1;
        }

        #section_principal p {
            text-align: center;
            display: inline-block;
            padding: 10px;
            background-color: #73b06f;
        }

        /* INICIO GRID LAYOUT */

        #clientes {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(8, 1fr);
            gap: 0px 15px;

            grid-template-areas: "id nome nome nome"
                                 "cpfcnpj rgie data data"
                                 "sexo telefone email email"
                                 "obs obs obs obs"
                                 "cep rua rua rua"
                                 "numero comple comple comple"
                                 "bairro bairro uf ibge"
                                 "btn_a btn_e . .";
                                
            margin-bottom: 40px;
        }

        #clientes p {
            align-self: center;
        }

        #clientes p:nth-child(1) {
            grid-area: id;
        }

        #clientes p:nth-child(2) {
            grid-area: nome;
        }

        #clientes p:nth-child(3) {
            grid-area: cpfcnpj;
        }

        #clientes p:nth-child(4) {
            grid-area: rgie;
        }

        #clientes p:nth-child(5) {
            grid-area: sexo;
        }

        #clientes p:nth-child(6) {
            grid-area: data;
        }

        #clientes p:nth-child(7) {
            grid-area: telefone;
        }

        #clientes p:nth-child(8) {
            grid-area: email;
        }

        #clientes p:nth-child(9) {
            grid-area: obs;
        }

        #clientes p:nth-child(10) {
            grid-area: cep;
        }

        #clientes p:nth-child(11) {
            grid-area: rua;
        }

        #clientes p:nth-child(12) {
            grid-area: numero;
        }

        #clientes p:nth-child(13) {
            grid-area: comple;
        }

        #clientes p:nth-child(14) {
            grid-area: bairro;
        }

        #clientes p:nth-child(15) {
            grid-area: uf;
        }

        #clientes p:nth-child(16) {
            grid-area: ibge;
        }

        #clientes a.btn_alterar {
            grid-area: btn_a;
        }

        #clientes a.btn_excluir {
            grid-area: btn_e;
        }


        /* FIM GRID LAYOUT */

        #clientes a {
            text-align: center;
            width: 120px;
            padding: 5px 10px;
            margin-right: 10px;
            color: white;
            cursor: pointer;
        }

        #clientes a.btn_alterar {
            background-color: #36cecc;
        }

        #clientes a.btn_alterar:hover {
            background-color: #27b1bf;
        }

        #clientes a.btn_excluir {
            background-color: #ce0a31;
        }

        #clientes a.btn_excluir:hover {
            background-color: #8d2036;
        }

    </style>
</head>

<body>
    <header>
        <h1 id="titulo"><?php echo $titulo; ?></h1>
        <h1 id="logotipo">Light System Software</h1>
    </header>
    <main>
        <section id="section_principal">
            <a href="<?php echo base_url('cliente/cadastrar'); ?>">Cadastrar Cliente</a>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo '<p>' . $_SESSION['msg'] . '</p>';
                    unset($_SESSION['msg']);
                }

                if (isset($_SESSION['msg_cadastro'])) {
                    echo '<p>' . $_SESSION['msg_cadastro'] . '</p>';
                    unset($_SESSION['msg_cadastro']);
                }
            ?>
        </section>
        <?php foreach ($clientes as $cliente) : ?>
            <section id="clientes">
                <p><strong> ID: </strong> <?php echo $cliente['id']; ?></p>
                <p><strong> Nome: </strong> <?php echo $cliente['nome']; ?></p>
                <p>
                    <?php if ($cliente['tipo_pessoa'] == 0) : ?>
                        <strong> CPF: </strong> <?php echo $cliente['cpf_cnpj']; ?>
                    <?php else : ?>
                        <strong> CNPJ: </strong> <?php echo $cliente['cpf_cnpj']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <?php if ($cliente['tipo_pessoa'] == 0) : ?>
                        <strong> RG: </strong> <?php echo $cliente['rg_ie']; ?>
                    <?php else : ?>
                        <strong> IE: </strong> <?php echo $cliente['rg_ie']; ?>
                    <?php endif; ?>
                </p>
                <p>
                    <?php if ($cliente['sexo'] == 0) : ?>
                        <strong> Sexo: </strong> Feminino
                    <?php else : ?>
                        <strong> Sexo: </strong> Masculino
                    <?php endif; ?>
                </p>
                <p><strong> Data Cadastro: </strong>
                    <?php
                    echo date('d/m/Y H:i:s', strtotime($cliente['data_cadastro']));
                    ?></p>
                <p><strong> Telefone: </strong> <?php echo $cliente['telefone']; ?></p>
                <p><strong> Email: </strong> <?php echo $cliente['email']; ?></p>
                <p><strong> Observações: </strong> <?php echo $cliente['observacoes']; ?></p>
                <p><strong> CEP: </strong> <?php echo $cliente['cep']; ?></p>
                <p><strong> Logradouro: </strong> <?php echo $cliente['logradouro']; ?></p>
                <p><strong> Número: </strong> <?php echo $cliente['numero']; ?></p>
                <p><strong> Complemento: </strong> <?php echo $cliente['complemento']; ?></p>
                <p><strong> Bairro: </strong> <?php echo $cliente['bairro']; ?></p>
                <p><strong> Estado: </strong> <?php echo $cliente['uf']; ?></p>
                <p><strong> IBGE: </strong> <?php echo $cliente['ibge']; ?></p>
                <a class="btn_alterar" href="<?php echo base_url('cliente/alterar/' . $cliente['id']); ?>">Alterar</a>
                <a class="btn_excluir" onclick="javascript: 
                    if (confirm('Você realmente deseja excluir este cliente?'))
                    location.href='<?php echo base_url('cliente/excluir/' . $cliente['id']); ?>'">Excluir</a>
            </section>
        <?php endforeach; ?>

    </main>
</body>

</html>