<!DOCTYPE html>
<html>
    <head>
        <?php 
        require_once 'includes/config.inc.php';
        require_once BASE_URI . 'includes\styles.inc.html';
        if(empty($_SESSION['usuario'])) {
            header("Location: index.php");
            exit;
        }
        ?>
        <title>IBJMC - Meu perfil</title>
        <link rel="stylesheet" media="screen and (min-width:712px)" href="css/screen-large/large.forms.css" />
        <link rel="stylesheet" media="screen and (max-width:711px)" href="css/screen-small/small.forms.css" />
        <script src="js/mask_form.js"></script>
        <style>
            .input-size {
                width: 25%;
            }
        </style>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="main-sec">
            <article>
                <div class="box">
                    <form>
                        <fieldset>
                            <legend class="main-legend">Meu perfil</legend>
                            <p>Nome <input name="nome" id="nome" value="<?php echo $_SESSION['usuario']['nome'] ?>" required disable /></p>
                            <p>Data de nascimento <input type="tel" name="nasc" id="nasc" value="<?php echo date('d/m/Y', strtotime($_SESSION['usuario']['data_nascimento'])) ?>" placeholder="dd/mm/aaaa" onKeyUp="mask(this, maskDate)" maxlength="10" pattern=".{10}" title="Insira a data corretamente." required /></p>
                            <p>Sexo
                                <input type="radio" name="sexo" id="masc" value="m" <?php if($_SESSION['usuario']['sexo'] == 'm') echo 'checked' ?> /> <label for="masc">Masculino</label>
                                <input type="radio" name="sexo" id="fem" value="f" <?php if($_SESSION['usuario']['sexo'] == 'f') echo 'checked' ?> /> <label for="fem">Feminino</label>
                            </p>
                            <p>Membro
                                <input type="radio" id="smembro" name="membro" value="s" <?php if($_SESSION['usuario']['membro'] == 's') echo 'checked' ?> /> <label for="smembro">Sim</label> 
                                <input type="radio" id="nmembro" name="membro" value="n" <?php if($_SESSION['usuario']['membro'] == 'n') echo 'checked' ?> /> <label for="nmembro">Não</label>
                            </p>
                            <legend class="aside-legend">Informações adicionais</legend>
                            <table>
                                <?php 
                                if($_SESSION['usuario']['cep'] == "") { ?>
                                    <tr>
                                        <td>
                                            <p>CEP <input type="tel" name="cep" maxlength="9" onKeyUp="mask(this, maskCep); toggleEnd(this)" pattern=".{9}" title="Insira o CEP corretamente." /></p>
                                        </td>
                                        <td>
                                            <p style="font-size: 10pt;">Não sabe seu CEP?</br><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm" target="_blank">Clique aqui</a> para verificar.</p>
                                        </td>
                                    </tr>
                                    <tr id="endereco"></tr>
                                <?php
                                } else { 
                                    $complemento = explode(", ", $_SESSION['usuario']['complemento']);
                                    $numero = $complemento[0];
                                    $complemento = $complemento[1];
                                ?>
                                    <tr>
                                        <td style="width: auto;">
                                            <p>CEP <input type="tel" name="cep" maxlength="9" value="<?php echo $_SESSION['usuario']['cep'] ?>" onKeyUp="mask(this, maskCep);" pattern=".{9}" title="Insira o CEP corretamente." /></p>
                                        </td>
                                        <td style="width: auto;">
                                            <p>Número <input type="number" name="numero" value="<?php echo $numero ?>" required/></p>
                                        </td>
                                        <td style="width: auto;">
                                            <p>Compl. <input name="complemento" value="<?php echo $complemento ?>" required/></p>
                                        </td>
                                    </tr>                                        
                                <?php
                                }
                                ?>
                                <tr>
                                    <td><p>RG <input type="tel" name="rg" value="<?php echo $_SESSION['usuario']['rg'] ?>" maxlength="12" pattern=".{12}" title="Digite o RG corretamente." onKeyUp="mask(this, maskRg)" <?php if($_SESSION['usuario']['rg'] != "") { echo 'disabled'; } ?> /></p></td>
                                    <td><p>CPF <input type="tel" name="cpf" value="<?php echo $_SESSION['usuario']['cpf'] ?>" maxlength="14" pattern=".{14}" title="Digite o CPF corretamente." onKeyUp="mask(this, maskCpf)" <?php if($_SESSION['usuario']['cpf'] != "") { echo 'disabled'; } ?>/></p></td>
                                </tr>
                                <tr>
                                    <td><p>Telefone <input type="tel" name="telefone" placeholder="(##) ####-####" value="<?php echo $_SESSION['usuario']['telefone'] ?>" maxlength="14" pattern=".{14}" title="Digite o número de telefone corretamente." onKeyUp="mask(this, maskTel)" <?php if($_SESSION['usuario']['telefone'] != "") { echo 'required'; } ?> /></p></td>
                                    <td><p>Celular <input type="tel" name="celular" placeholder="(##) #####-####" value="<?php echo $_SESSION['usuario']['celular'] ?>" maxlength="15" pattern=".{15}" title="Digite seu número de celular corretamente." onKeyUp="mask(this, maskCel)" <?php if($_SESSION['usuario']['celular'] != "") { echo 'required'; } ?> /></p></td>
                                </tr>
                            </table>
                            <p><input type="submit" name="btnAlterarDados" value="Alterar dados" /></p>
                        </fieldset>
                    </form>
                    <aside>
                        <form>
                            <fieldset>
                                <legend class="aside-legend">Alterar senha</legend>
                                <p>Senha atual <input type="password" name="senhaAtual" /></p>
                                <table>
                                    <tr>
                                        <td><p>Nova senha <input type="password" name="novaSenha" /></p></td>
                                        <td><p>Confirmar senha <input type="password" name="cNovaSenha" /></p></td>
                                    </tr>
                                </table>
                                <p><input type="submit" name="btnAlterarSenha" value="Alterar senha" /></p>
                            </fieldset>
                        </form>
                        <form>
                            <fieldset>
                                <legend class="aside-legend">Alterar email</legend>
                                <p>E-mail <input type="email" name="email" id="email" value="<?php echo $_SESSION['usuario']['email'] ?>" required /></p>
                                <p><input type="submit" name="btnAlterarEmail" value="Alterar e-mail" /></p>
                            </fieldset>
                        </form>
                    </aside>
                </div>
            </article>
        </section>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>
