<?php

require BASE_URI . 'PHPMailer\PHPMailerAutoload.php';

function prepareMail($emailDestinatario, $nomeDestinatario, $senhaDestinatario) {

    $mail = new PHPMailer;

    $mail->isSMTP(); // Configura para envio de e-mails usando SMTP
    $mail->CharSet = 'UTF-8'; // Configura para envio de e-mails usando SMTP
    $mail->Host = 'smtp.live.com'; // Servidor SMTP
    $mail->SMTPAuth = true; // Usar autenticação SMTP

    $mail->Username = EMAIL_CONTATO; // Usuário da conta
    $mail->Password = EMAIL_SENHA; // Senha da conta

    $mail->SMTPSecure = 'tls'; // Tipo de encriptação que será usado na conexão SMTP
    $mail->Port = 587; // Porta do servidor SMTP. 587 para hotmail                  
    $mail->IsHTML(true); // Informa se vamos enviar mensagens usando HTML

    $mail->From = EMAIL_CONTATO; // Email do Remetente
    $mail->FromName = 'Daniel'; // Nome do Remetente

    $mail->addAddress($emailDestinatario); // Endereço do e-mail do destinatário
    $mail->Subject = 'Confirmação de e-mail - IBJMC'; // Assunto do e-mail
    $msg = "Olá, " . $nomeDestinatario . "<br>"
            . "<p>Confirme seu e-mail no link abaixo<p>"
            . "<a href='http://192.168.0.8/IBJMC/verificacao-email.php?email=$emailDestinatario&codigo=$senhaDestinatario'>IBJMC - Confirmar e-mail</a>";

    $mail->msgHTML($msg); // Mensagem que vai no corpo do e-mail

    return $mail;
}

