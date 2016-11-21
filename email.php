<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">  <?php 
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php
include "PHPMailer-master/PHPMailerAutoload.php";
 /*
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Método de envio
$mail->IsSMTP(); // Enviar por SMTP 
$mail->Host = "ssl://smtp.yahoo.com"; // Você pode alterar este parametro para o endereço de SMTP do seu provedor
$mail->Port = 465; 
 $mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório)
$mail->Username = "plataforma_unifei@yahoo.com"; // Usuário do servidor SMTP (endereço de email)
$mail->Password = "plataforma123"; // Mesma senha da sua conta de email
 
// Configurações de compatibilidade para autenticação em TLS

// $mail->SMTPDebug = 2; // Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
 
// Define o remetente
$mail->From = "plataforma_unifei@yahoo.com"; // Seu e-mail
$mail->FromName = "Plataforma de Financiamento da Unifei"; // Seu nome
 
// Define o(s) destinatário(s)
$mail->AddAddress('karendantas26@yahoo.com');
//$mail->AddAddress('fernando@email.com');
 
 
// CC
//$mail->AddCC('joana@provedor.com', 'Joana'); 
 
// BCC - Cópia oculta
//$mail->AddBCC('roberto@gmail.com', 'Roberto'); 
 
// Definir se o e-mail é em formato HTML ou texto plano
$mail->IsHTML(true); // Formato HTML . Use "false" para enviar em formato texto simples.
 $mail->SMTPDebug = 2;
$mail->CharSet = 'UTF-8'; // Charset (opcional)
 
// Assunto da mensagem
$mail->Subject = "Assunto da mensagem"; 
 
// Corpo do email
$mail->Body = 'Corpo do email em html.<br><br><font color=blue>Teste de cores</font><br><br><img src="http://meusitemodelo.com/imagem.jpg">';
 
 
// Anexos (opcional)
//$mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 
 
// Envia o e-mail
$enviado = $mail->Send();
 
 
// Exibe uma mensagem de resultado
if ($enviado) {
     echo "Seu email foi enviado com sucesso!";
} else {
     echo "Houve um erro enviando o email: ".$mail->ErrorInfo;
} ?> */
    //Create a new PHPMailer instance
   
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.mail.yahoo.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Whether to use SMTP authentication
//$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "plataforma_unifei@yahoo.com";
//Password to use for SMTP authentication
$mail->Password = "plataforma123";
//Set who the message is to be sent from
$mail->setFrom('karendantas26@yahoo.com', 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('karendantas26@yahoo.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = "Corpo do emai";
//Attach an image file

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
?>
</div> 
</body>
</html>