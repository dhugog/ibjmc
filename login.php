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
        <link rel="stylesheet" media="screen and (min-width:712px)" href="css/screen-large/large.forms.css" />
        <link rel="stylesheet" media="screen and (max-width:711px)" href="css/screen-small/small.forms.css" />
        <title>IBJMC - Login</title>
        <script src="js/mask_form.js"></script>
        <script type='text/javascript' src="js/utils.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <div id="wrapper"></div>
                    <form method="post" action="cadastro.php" id="login" onSubmit="toggleWrapper('block'); btnLogin.value='Entrando... Aguarde'">
                        <fieldset>
                            <legend class="main-legend">Fazer login</legend>
                            <p>E-mail <input type="email" id="email" name="email" required /></p>
                            <p>Senha <input type="password" id="pass" name="pass" required /></p>
                            <p><input type="submit" value="Entrar" id="btnLogin" name="btnLogin" /></p>
                        </fieldset>
                    </form>
                    <aside>
                        <form method="post" action="cadastro.php" id="cadastro" onSubmit="toggleWrapper('block'); btnCadastro.value='Cadastrando... Aguarde'">
                            <fieldset>
                                <legend class="aside-legend">Registrar-se</legend>
                                <p>Nome <input type="text" id="nome" name="nome" placeholder="Nome completo" required /></p>
                                <p>E-mail <input type="email" id="email" name="email" required /></p>
                                <table>
                                    <tr>
                                        <td><p>Senha <input type="password" id="pass" name="pass" pattern=".{6,}" title="A senha deve conter pelo menos 6 caracteres." required /></p></td>
                                        <td><p>Confirmar senha <input type="password" id="cpass" name="cpass" pattern=".{6,}" title="A senha deve conter pelo menos 6 caracteres." required /></p></td>
                                    </tr>
                                    <tr>
                                        <td><p style="padding-bottom: 0;">Data de nascimento</p></td>
                                        <td><p style="padding-bottom: 0;">Sexo</p></td>
                                    </tr>
                                    <tr>
                                        <td><p><input type="tel" onKeyUp="mask(this, maskDate)" placeholder="dd/mm/aaaa" id="nasc" name="nasc" maxlength="10" pattern=".{10}" title="Insira a data corretamente." required /></p></td>
                                        <td>
                                            <p style="text-align: center;">
                                                <input type="radio" name="sexo" id="masc" value="m" checked /> <label for="masc">Masculino</label>
                                                <input type="radio" name="sexo" id="fem" value="f" /> <label for="fem">Feminino</label>
                                            </p>
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
        <section id="alert-sec">
        <?php
            if(isset($_SESSION['erro'])) { ?>
                <script>window.location.href = '#alert-sec';</script>
                <?php
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
            } elseif(isset($_SESSION['success'])) { ?>
                <script>window.location.href = '#alert-sec';</script>
                <?php
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
        </section>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>