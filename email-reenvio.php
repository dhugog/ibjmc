<?php

require_once 'includes/config.inc.php';
require BASE_URI . 'includes\sendEmail.inc.php';

if(!empty($_GET)) {
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $nome = $_GET['nome'];
    
    $msg = "Olá, " . $nome . "<br>"
    . "<p>Confirme seu e-mail no link abaixo<p>"
    . "<a href='http://192.168.0.2/IBJMC/verificacao-email.php?email=$email&codigo=$senha'>IBJMC - Confirmar e-mail</a>";
    $mail = prepareMail($email, "Confirmação de e-mail - IBJMC", $msg);
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

