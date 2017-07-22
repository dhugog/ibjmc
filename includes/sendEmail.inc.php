<?php

require BASE_URI . 'PHPMailer\PHPMailerAutoload.php';

function prepareMail($to, $subject, $msg) {

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
    $mail->FromName = 'IBJMC'; // Nome do Remetente

    $mail->addAddress($to); // Endereço do e-mail do destinatário
    $mail->Subject = $subject; // Assunto do e-mail

    $mail->msgHTML($msg); // Mensagem que vai no corpo do e-mail

    return $mail;
}

