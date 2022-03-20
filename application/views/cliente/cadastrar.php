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

        body {
            width: 100vw;
            height: 100vh;
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
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        section {
            width: 90%;
            max-width: 980px;
            background: white;
            padding: 20px;
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

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .grupo_form {
            display: flex;
            flex-direction: row;
        }

        .grupo_form_item {
            display: flex;
            flex-direction: column;
            
        }

        .input {
            display: block;
            margin: 0px 0px 15px;
            padding: 12px;
            font-size: 16px;
        }

        #nome {
            flex: 1 1;
        }

        #radios {
            display: flex;
            flex-direction: row;
            margin-bottom: 15px;
        }

        #radios div:nth-child(1) {
            margin-right: 20px;
        }

        #radios div {
            flex: 1 1;
        }

        #pessoa_juridica {
            margin-left: 10px;
        }

        #sexo_masculino {
            margin-left: 10px;
        }

        #cpf_cnpj,
        #rg_ie {
            flex: 1 1;
        }

        #cpf_cnpj {
            margin-right: 10px;
        }

        #telefone {
            margin-right: 10px;
            flex: 1 1;
        }

        #email {
            flex: 10 1;
        }

        textarea {
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        #cep {
            margin-right: 10px;
            flex: 1 1;
        }

        #logradouro {
            flex: 10 1;
        }

        #numero {
            margin-right: 10px;
            flex: 1 1;
        }

        #complemento {
            flex: 10 1;
        }

        #bairro {
            margin-right: 10px;
            flex: 10 1;
        }

        #uf {
            margin-right: 10px;
            flex: 1 1;
        }

        #ibge {
            flex: 1 1;
        }

        #btn_submit {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            flex: 0.3 1;
        }

        .p_msg {
            color: red;
            margin: 0px 0px 5px 5px;
        }

        .cpf_cnpj,
        .rg_ie {
            flex: 1 1;
        }

        .telefone,
        .cep {
            flex: 1 1;
        }

        .email,
        .logradouro {
            flex: 2 1;
        }

        .bairro {
            margin-right: 10px;
            flex: 1 1;
        }

        .uf {
            margin-right: 10px;
            flex: 1 1;
        }

        .ibge {
            flex: 1 1;
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
            <a href="<?php echo base_url('cliente/home'); ?>">Voltar para Home</a>
            <?php 
                if($msg) {
                    echo '<p>' . $msg . '</p>';
                }
             ?>
        </section>
        <section id="section_secundaria">
            <form action="#" method="POST">

                <div class="grupo_form">
                    <input type="text" class="input" id="nome" name="nome" maxlength="200" placeholder="Nome Completo" required
                    value="<?php echo $nome = (isset($clientes['nome']) ? $clientes['nome'] : "") ;?>">
                </div>
                <div>
                    <?php 
                            if(isset($_SESSION['msg_nome'])) {
                                echo '<p class="p_msg" >' . $_SESSION['msg_nome'] . '</p>' ;
                                unset($_SESSION['msg_nome']);
                            }    
                    ?>
                </div>
                <div id="radios">
                    <div>
                        <p>Tipo de Pessoa: </p>
                        <input type="radio" id="pessoa_fisica" name="tipo_pessoa" value="0" 
                        <?php  
                            if(isset($clientes['tipo_pessoa'])) {
                                echo $checked = ($clientes['tipo_pessoa'] == 0) ? 'checked' : "";
                            } else {
                                echo 'checked';
                            }
                        ?>>
                        <label for="pessoa_fisica">Pessoa Física</label>
                        <input type="radio" id="pessoa_juridica" name="tipo_pessoa" value="1"
                        <?php  
                            if(isset($clientes['tipo_pessoa'])) {
                                echo $checked = ($clientes['tipo_pessoa'] == 1) ? 'checked' : "";
                            } 
                        ?>>
                        <label for="pessoa_juridica">Pessoa Juridica</label>
                    </div>
                    <div>
                        <p>Sexo: </p>
                        <input type="radio" id="sexo_feminino" name="sexo" value="0" 
                        <?php  
                            if(isset($clientes['sexo'])) {
                                echo $checked = ($clientes['sexo'] == 0) ? 'checked' : "";
                            } else {
                                echo 'checked';
                            }
                        ?>>
                        <label for="sexo_feminino">Feminino</label>
                        <input type="radio" id="sexo_masculino" name="sexo" value="1"
                        <?php  
                            if(isset($clientes['sexo'])) {
                                echo $checked = ($clientes['sexo'] == 1) ? 'checked' : "";
                            }
                        ?>>
                        <label for="sexo_masculino">Masculino</label>
                    </div>
                </div>

                <div class="grupo_form">
                    <input type="text" class="input" id="cpf_cnpj" name="cpf_cnpj" maxlength="14" minlength="11" placeholder="CPF/CNPJ" required
                    value="<?php echo $cpf_cnpj = (isset($clientes['cpf_cnpj']) ? $clientes['cpf_cnpj'] : "") ;?>">

                    <input type="text" class="input" id="rg_ie" name="rg_ie" maxlength="12" minlength="6" placeholder="RG/IE" required
                    value="<?php echo $rg_ie = (isset($clientes['rg_ie']) ? $clientes['rg_ie'] : "") ;?>">
   
                </div>

                <div class="grupo_form">
                    <?php 
                            if(isset($_SESSION['msg_cpf_cnpj'])) {
                                echo '<p class="p_msg cpf_cnpj" >' . $_SESSION['msg_cpf_cnpj'] . '</p>' ;
                                unset($_SESSION['msg_cpf_cnpj']);
                            }    
                    ?>
                    <?php 
                            if(isset($_SESSION['msg_rg_ie'])) {
                                echo '<p class="p_msg rg_ie" >' . $_SESSION['msg_rg_ie'] . '</p>' ;
                                unset($_SESSION['msg_rg_ie']);
                            }    
                    ?>
                </div>

                <div class="grupo_form">
                    <input type="tel" class="input" id="telefone" name="telefone" maxlength="11" minlength="10" placeholder="Telefone" required
                    value="<?php echo $telefone = (isset($clientes['telefone']) ? $clientes['telefone'] : "") ;?>">
                    
                    <input type="email" class="input" id="email" name="email" placeholder="E-mail" required
                    value="<?php echo $email = (isset($clientes['email']) ? $clientes['email'] : "") ;?>">
                </div>

                <div class="grupo_form">
                    <?php 
                            if(isset($_SESSION['msg_telefone'])) {
                                echo '<p class="p_msg telefone" >' . $_SESSION['msg_telefone'] . '</p>' ;
                                unset($_SESSION['msg_telefone']);
                            }    
                    ?>
                    <?php 
                            if(isset($_SESSION['msg_email'])) {
                                echo '<p class="p_msg email" >' . $_SESSION['msg_email'] . '</p>' ;
                                unset($_SESSION['msg_email']);
                            }    
                    ?>
                </div>

                <textarea id="observacoes" name="observacoes" cols="30" rows="5" placeholder="Observações"><?php 
                    if(isset($clientes['observacoes'])) { echo trim($clientes['observacoes']); } 
                ?></textarea>

                <div class="grupo_form">
                    <input type="text" class="input" id="cep" name="cep" maxlength="8"  onblur="pesquisarCep(this.value);" placeholder="CEP" required
                    value="<?php echo $cep = (isset($clientes['cep']) ? $clientes['cep'] : "") ;?>">
                    
                    <input type="text" class="input" id="logradouro" name="logradouro" maxlength="200" placeholder="Endereço" required
                    value="<?php echo $logradouro = (isset($clientes['logradouro']) ? $clientes['logradouro'] : "") ;?>">
                </div>
                
                <div class="grupo_form">
                    <?php 
                        if(isset($_SESSION['msg_cep'])) {
                            echo '<p class="p_msg cep" >' . $_SESSION['msg_cep'] . '</p>' ;
                            unset($_SESSION['msg_cep']);
                        }    
                    ?>
                    <?php 
                        if(isset($_SESSION['msg_logradouro'])) {
                            echo '<p class="p_msg logradouro" >' . $_SESSION['msg_logradouro'] . '</p>' ;
                            unset($_SESSION['msg_logradouro']);
                        }    
                    ?>
                </div>

                <div class="grupo_form">
                    <input type="text" class="input" id="numero" name="numero" maxlength="10" placeholder="Número" required
                    value="<?php echo $numero = (isset($clientes['numero']) ? $clientes['numero'] : "") ;?>">
                    
                    <input type="text" class="input" id="complemento" name="complemento" placeholder="Complemento"
                    value="<?php echo $complemento = (isset($clientes['complemento']) ? $clientes['complemento'] : "") ;?>">
                </div>

                <div class="grupo_form">
                    <?php 
                        if(isset($_SESSION['msg_numero'])) {
                            echo '<p class="p_msg">' . $_SESSION['msg_numero'] . '</p>' ;
                            unset($_SESSION['msg_numero']);
                        }    
                    ?>
                </div>

                <div class="grupo_form">
                    <input type="text" class="input" id="bairro" name="bairro" placeholder="Bairro" required
                    value="<?php echo $bairro = (isset($clientes['bairro']) ? $clientes['bairro'] : "") ;?>">
                    
                    <input type="text" class="input" id="uf" name="uf" placeholder="Estado" required
                    value="<?php echo $uf = (isset($clientes['uf']) ? $clientes['uf'] : "") ;?>">
                    
                    <input type="number" class="input" id="ibge" name="ibge" placeholder="IBGE" required
                    value="<?php echo $ibge = (isset($clientes['ibge']) ? $clientes['ibge'] : "") ;?>">
                   
                </div>

                <div class="grupo_form">
                    <?php 
                        if(isset($_SESSION['msg_bairro'])) {
                            echo '<p class="p_msg bairro" >' . $_SESSION['msg_bairro'] . '</p>' ;
                            unset($_SESSION['msg_bairro']);
                        }    
                    ?>
                    <?php 
                        if(isset($_SESSION['msg_uf'])) {
                            echo '<p class="p_msg uf" >' . $_SESSION['msg_uf'] . '</p>' ;
                            unset($_SESSION['msg_uf']);
                        }    
                    ?>
                     <?php 
                        if(isset($_SESSION['msg_ibge'])) {
                            echo '<p class="p_msg ibge" >' . $_SESSION['msg_ibge'] . '</p>' ;
                            unset($_SESSION['msg_ibge']);
                        }    
                    ?>
                </div>

                <div class="grupo_form">
                    <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $botao ?>">
                </div>
            </form>
        </section>
    </main>
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