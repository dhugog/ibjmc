<?php
require_once 'includes/config.inc.php';
require_once BASE_URI . 'model\dao\UsuarioDAO.class.php';
require_once BASE_URI . 'model\bean\Usuario.class.php';
require_once BASE_URI . 'includes\utils.php';
require_once BASE_URI . 'includes\sendEmail.inc.php';
session_destroy();
session_start();

if (filter_has_var(INPUT_POST, 'btnCadastro')) { 
    if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erro'] = 'emailInvalido';
        header('Location: login.php');
        exit;
    } elseif($_POST['pass'] != $_POST['cpass']) {
        $_SESSION['erro'] = 'senhaInvalida';
        header('Location: login.php');
        exit;
    } elseif(!validarData(filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_SPECIAL_CHARS))) {
        $_SESSION['erro'] = 'dataInvalida';
        header('Location: login.php');
        exit;
    } else {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        $nasc = str_replace('/', '-', filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_SPECIAL_CHARS));
        $nasc = date('Y-m-d', strtotime($nasc));
        $sexo = $_POST['sexo'];
        $membro = $_POST['membro'];

        $usuario = new Usuario($nome, $email, $senha, $nasc, $sexo, $membro);
        $reg = UsuarioDAO::checkReg($usuario);
        if($reg == 0 && UsuarioDAO::create($usuario)) { 
            $mail = prepareMail($usuario->getEmail(), $usuario->getNome(), $usuario->getSenha());
            if($mail->Send()) {
                $_SESSION['success'] = 'verificacaoEmail';
                header('Location: login.php');
                exit;
            } else {
                UsuarioDAO::delete(UsuarioDAO::$lastId);
                $_SESSION['erro'] = 'systemError';
                header('Location: login.php?reason=sendEmail');
                exit;
            }
        } elseif($reg == 1) {
            $_SESSION['erro'] = 'dadosIndisponiveis';
            header('Location: login.php');
            exit;
        } elseif(reg == 2) {
            $_SESSION['erro'] = 'systemError';
            header('Location: login.php?reason=register_user');
            exit;
        }
    }
}

elseif (filter_has_var(INPUT_POST, 'btnLogin')) {
    if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

        $user = UsuarioDAO::read("email = '$email' and senha = '$senha'");
        $checkLogin = $user->rowCount();
        $vUser = UsuarioDAO::read("email = '$email' and senha = '$senha' and verificado = 's'")->rowCount();
        $iUser = UsuarioDAO::read("email = '$email' and senha = '$senha' and verificado = 'n'")->rowCount();
        if($checkLogin == 0) {
            $_SESSION['erro'] = 'dadosInvalidos';
            header("Location: login.php");
            exit;
        } elseif($checkLogin > 0) {
            $_SESSION['usuario'] = $user->fetch(PDO::FETCH_ASSOC);
            if($iUser > 0) {
                $_SESSION['erro'] = 'naoValidado';
                $_SESSION['email'] = $_SESSION['usuario']['email'];
                $_SESSION['senha'] = $_SESSION['usuario']['senha'];
                $_SESSION['nome'] = $_SESSION['usuario']['nome'];
                unset($_SESSION['usuario']);
                header("Location: login.php");
                exit;
            } elseif($vUser > 0) {
                $userId = $_SESSION['usuario']['id_usuario'];
                UsuarioDAO::update("ultimo_acesso = NOW()", "id_usuario = $userId");
                header("Location: index.php");
                exit;
            } else {
                $_SESSION['erro'] = 'systemError';
                unset($_SESSION['usuario']);
                header("Location: login.php");
                exit;
            }
        } else {
            $_SESSION['erro'] = 'systemError';
            header("Location: login.php");
            exit;            
        }
    } else {
        $_SESSION['erro'] = 'emailInvalido';
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
    

