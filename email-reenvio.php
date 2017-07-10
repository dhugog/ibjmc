<?php

require_once 'includes/config.inc.php';
require BASE_URI . 'includes\sendEmail.inc.php';

if(!empty($_GET)) {
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $nome = $_GET['nome'];
    
    $mail = prepareMail($email, $nome, $senha);
    if($mail->Send()) {
        $_SESSION['success'] = 'emailReenviado';
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['erro'] = 'systemError';
        header("Location: login.php?reason=sendEmail");
        exit;
    }
    
} else {
    header("Location: index.php");
    exit;
}

