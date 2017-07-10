<?php

require_once 'includes/config.inc.php';
require_once BASE_URI . 'model/dao/UsuarioDAO.class.php';

if(!empty($_GET)) {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_STRING);
    
    $exec = UsuarioDAO::update("verificado = 's'", "email = '$email' and senha = '$senha'");
    if($exec > 0) {
        $_SESSION['success'] = 'emailValidado';
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['erro'] = 'erroValidacao';
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

