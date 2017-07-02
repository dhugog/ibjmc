<!DOCTYPE HTML>
<html>
    <head>
        <?php
        DEFINE('LIVE', true);
        require_once('includes/config.inc.php');
        require_once('includes/styles.html');
        ?>
        <link rel="stylesheet" href="css/forms.css" />
        <title>IBJMC - Login</title>
        <script src="js/mask_form.js"></script>
        <style>
            .invalido {
                display: block;
                color: red;
                font-size: 16pt;
                font-weight: bold;
                text-align: center;
                padding: 5px 0;
            } 
        </style>
    </head>
    <body>
        <?php include_once('includes/header.php'); ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <form method="post" action="" id="login">
                        <fieldset>
                            <legend>Fazer login</legend>
                            <p>Email <input type="email" id="email" name="email" required /></p>
                            <p>Senha <input type="password" id="pass" name="pass" required /></p>
                            <p><input type="submit" value="Entrar" name="login" /></p>
                        </fieldset>
                    </form>
                    <aside>
                        <h2>Registrar-se</h2>
                        <form method="post" action="" id="cadastro">
                            <fieldset>
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
                                <p><input type="submit" value="Cadastrar" name="cadastro" /></p>
                            </fieldset>							
                        </form>
                    </aside>
                </div>
            </article>
        </section>
        <?php
        if (filter_has_var(INPUT_POST, 'cadastro')) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
            if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            } else {
                echo "<span class='invalido'>Digite um e-mail válido.</span>";
            }
            
            if ($_POST['pass'] == $_POST['cpass']) {
                $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            } else {
                echo "<span class='invalido'>Senhas não correspondentes. Tente novamente.</span>";
            }
            
            $nasc = date('Y-m-d', strtotime(filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_SPECIAL_CHARS)));
            
            $sexo = $_POST['sexo'];
            $membro = $_POST['membro'];
        } 
        
        elseif (filter_has_var(INPUT_POST, 'login')) {
            if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            } else {
                echo "<span class='invalido'>Digite um e-mail válido.</span>";
            }
            
            $senha = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        }
        ?>
        <?php include_once('includes/footer.html'); ?>
    </body>
</html>