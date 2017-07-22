<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require_once 'includes/config.inc.php';
        require_once BASE_URI . 'includes\styles.inc.html';
        include_once BASE_URI . 'includes\sendEmail.inc.php'; 
        ?>
        <link rel="stylesheet" media="screen and (min-width:712px)" href="css/screen-large/large.forms.css" />
        <link rel="stylesheet" media="screen and (max-width:711px)" href="css/screen-small/small.forms.css" />
        <title>IBJMC - Contato</title>
        <script type='text/javascript' src="js/utils.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <div id="wrapper"></div>
                    <form method="post" action="" onSubmit="toggleWrapper('block'); btnEnviar.value='Enviando... Aguarde'">
                        <fieldset>
                            <legend class="main-legend">Envie sua mensagem abaixo</legend>
                            <?php
                            if(isset($_SESSION['usuario'])) {
                                ?>
                                <p>Assunto<input name="assunto" id="assunto" required /></p>
                                <p>Mensagem<textarea name="msg" id="msg" required></textarea></p>
                                <p><input type="submit" name="btnEnviar" value="Enviar" /></p>
                                <?php
                            } else {
                                ?>
                                <p>Nome<input name="nome" id="nome" required /></p>
                                <p>Email<input name="email" type="email" id="email" /></p>
                                <p>Assunto<input name="assunto" id="assunto" required /></p>
                                <p>Mensagem<br><textarea name="msg" id="msg" rows="5" required></textarea></p>
                                <p><input type="submit" name="btnEnviar" value="Enviar" /></p>
                                <?php
                            }
                            ?>
                        </fieldset>
                    </form>
                    <aside>
                        <h2>Contato pastoral</h2>
                        <p id="contato-wpp">(015) 98802-9447</p>
                        <p id="contato-tim">(011) 94814-5449</p>
                        <p id="contato-email">prsantosdossantos@hotmail.com</p>
                    </aside>
                </div>
            </article>
        </section>
        <section id="alert-sec">
        <?php 
            if(isset($_POST['btnEnviar'])) {
                $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
                $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
                if(isset($_SESSION['usuario'])) {
                    $nome = $_SESSION['usuario']['nome'];
                    $email = $_SESSION['usuario']['email'];                    
                } else {
                    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                    if(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
                        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    } else {
                        $email = "Não informado.";
                    }
                }
                $msg .= "<br><br>$nome<br>$email";
                $mail = prepareMail("dangaspy2008@hotmail.com", $assunto, $msg);
                if($mail->Send()) {
                    echo "<span class='valido'>E-mail enviado com sucesso! Agradecemos o contato.</span>";
                } else {
                    echo "<span class='invalido'>Erro ao enviar e-mail. Desculpe-nos a inconveniência.</span>";
                }
                ?>
                <script>window.location.href = '#alert-sec';</script>
                <?php
            }
        ?>
        </section>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>