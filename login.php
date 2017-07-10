<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require_once 'includes\config.inc.php';
        require_once BASE_URI . 'includes\styles.inc.html';
        if(isset($_SESSION['usuario'])) {
            header("Location: index.php");
            exit;
        }
        ?>
        <link rel="stylesheet" href="css\forms.css" />
        <title>IBJMC - Login</title>
        <script src="js/mask_form.js"></script>
        <style>
            .invalido {
                display: block;
                color: red;
                font-size: 16pt;
                font-weight: bold;
                text-align: center;
                padding: 10px 0;
                background-color: rgba(255,255,255,.2);
                box-sizing: border-box;
            } 
            
            .valido {
                display: block;
                color: green;
                font-size: 16pt;
                font-weight: bold;
                text-align: center;
                padding: 10px 0;
                background-color: rgba(255,255,255,.2);
                box-sizing: border-box;
            } 
        </style>
        <script type='text/javascript'>
            function toggleWrapper(display) {
                document.getElementById('wrapper').style.display = display;
            }
        </script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <div id="wrapper"></div>
                    <form method="post" action="cadastro.php" id="login" onSubmit="toggleWrapper('block'); btnLogin.value='Entrando... Aguarde'">
                        <fieldset>
                            <legend id="legenda-login">Fazer login</legend>
                            <p>Email <input type="email" id="email" name="email" required /></p>
                            <p>Senha <input type="password" id="pass" name="pass" required /></p>
                            <p><input type="submit" value="Entrar" id="btnLogin" name="btnLogin" /></p>
                        </fieldset>
                    </form>
                    <aside>
                        <form method="post" action="cadastro.php" id="cadastro" onSubmit="toggleWrapper('block'); btnCadastro.value='Cadastrando... Aguarde'">
                            <fieldset>
                                <legend id="legenda-cadastro">Registrar-se</legend>
                                <p>Nome <input type="text" id="nome" name="nome" placeholder="Nome completo" required /></p>
                                <p>Email <input type="email" id="email" name="email" required /></p>
                                <table>
                                    <tr>
                                        <th><p id="psenha">Senha</p></th>
                                        <th><p id="pcsenha">Confirmar senha</p></th>
                                    </tr>
                                    <tr>
                                        <td><input type="password" id="pass" name="pass" pattern=".{6,}" title="A senha deve conter pelo menos 6 caracteres." required /></td>
                                        <td><input type="password" id="cpass" name="cpass" pattern=".{6,}" title="A senha deve conter pelo menos 6 caracteres." required /></td>
                                    </tr>
                                    <tr>
                                        <th><p id="pnasc">Data de nascimento</p></th>
                                        <th><p>Sexo</p></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" onKeyPress="mask(this, maskDate)" placeholder="dd/mm/aaaa" id="nasc" name="nasc" maxlength="10" pattern=".{10}" title="Insira a data corretamente." required /></td>
                                        <td>
                                            <input type="radio" name="sexo" id="masc" value="m" checked /> <label for="masc">Masculino</label>
                                            <input type="radio" name="sexo" id="fem" value="f" /> <label for="fem">Feminino</label>
                                        <td>
                                    </tr>
                                </table>
                                <p>Já é membro IBJMC? 
                                    <input type="radio" id="smembro" name="membro" value="s" /> <label for="smembro">Sim</label> 
                                    <input type="radio" id="nmembro" name="membro" value="n" checked /> <label for="nmembro">Não</label>
                                </p>
                                <p><input type="submit" value="Cadastrar" id="btnCadastro" name="btnCadastro" /></p>
                            </fieldset>							
                        </form>
                    </aside>
                </div>
            </article>
        </section>
        <?php
            if(isset($_SESSION['erro'])) {
                $erro = $_SESSION['erro'];
                if($erro == 'systemError') {
                    echo "<span class='invalido'>Ocorreu um erro no sistema. Desculpe-nos o transtorno.</span>";
                } elseif($erro == 'emailInvalido') {
                    echo "<span class='invalido'>E-mail inválido. Tente novamente.</span>";
                } elseif($erro == 'senhaInvalida') {
                    echo "<span class='invalido'>Senhas não correspondentes. Tente novamente.</span>"; 
                } elseif($erro == 'dataInvalida') {
                    echo "<span class='invalido'>Data inválida. Tente novamente.</span>";
                } elseif($erro == 'dadosIndisponiveis') {
                    echo "<span class='invalido'>E-mail ou senha já cadastrada. Tente novamente.</span>";
                } elseif($erro == 'naoValidado') {
                    $email = $_SESSION['email'];
                    $senha = $_SESSION['senha'];
                    $nome = $_SESSION['nome'];
                    echo "<span class='invalido'>Enviamos a você um e-mail de validação. Por favor, verifique antes de prosseguir.</br>Não recebeu? <a href='email-reenvio.php?email=$email&senha=$senha&nome=$nome'>Clique aqui</a> para reenviar-mos a solicitação.</span>";
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    unset($_SESSION['nome']);
                } elseif($erro == 'erroValidacao') {
                    echo "<span class='invalido'>Erro ao validar e-mail. Tente novamente.</span>";
                } elseif($erro == 'dadosInvalidos') {
                    echo "<span class='invalido'>E-mail ou senha inválida. Tente novamente.</span>";
                }
                unset($_SESSION['erro']);
            } elseif(isset($_SESSION['success'])) {
                $alert = $_SESSION['success'];
                if($alert == 'verificacaoEmail') {
                    echo "<span class='valido'>Cadastro realizado com sucesso!</br>Enviamos a você um e-mail de confirmação. Por favor, verifique antes de prosseguir.</span>";
                } elseif($alert == 'emailReenviado') {
                    echo "<span class='valido'>E-mail reenviado!</span>";
                } elseif($alert == 'emailValidado') {
                    echo "<span class='valido'>E-mail validado com sucesso!</br>Agora é só efetuar o login.</span>";
                }
                unset($_SESSION['success']);
            }
        ?>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>