<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require_once 'includes/config.inc.php';
        require_once BASE_URI . 'includes\styles.inc.html';
        ?>
        <link rel="stylesheet" href="css/forms.css" />
        <title>IBJMC - Contato</title>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <form>
                        <fieldset>
                            <legend id="legenda-login">Envie sua mensagem abaixo</legend>
                            <?php
                            if(isset($_SESSION['usuario'])) {
                                ?>
                                <p>Assunto<input name="assunto" id="assunto" required /></p>
                                <p>Mensagem<textarea id="msg" name="msg" required></textarea></p>
                                <p><input type="submit" value="Enviar" /></p>
                                <?php
                            } else {
                                ?>
                                <p>Nome<input name="nome" id="nome" required /></p>
                                <p>Email<input type="email" name="email" id="email" /></p>
                                <p>Assunto<input name="assunto" id="assunto" required /></p>
                                <p>Mensagem<br><textarea id="msg" name="msg" rows="5" required></textarea></p>
                                <p><input type="submit" value="Enviar" /></p>
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
            <div id="teste"></div>
            <div id="teste2"></div>
        </section>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>