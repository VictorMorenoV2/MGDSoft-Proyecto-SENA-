<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'SMTP.php';
require 'PHPMailer.php';
require 'Exception.php';

include "../config/conexion.php";
    
if(isset($_POST['enviar'])){
    
      $email = $_POST ['correo'];
      $token = rand(1000,9999);

 


/*
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Reestablecer Contraseña LML';
$codigo = rand(1000,9999);
// mensaje
$mensaje = '
<html>
<head>
  <title>Nueva contraseña</title>
</head>
<body>
<h1>Llantas Moreno Lopez</h1>
 <div style="text-aling:Center; bacjground-color: white;"
  <p>Hemos actualizado su contraseña, su nueva contraseña es:</p>
   <h3>'.$codigo.'</h3>
   <p> <a href="http://localhost/MGDSoft/reset.htmlemail='.$email.'&token='.$token.'">Para restableceer tu contraseña da click aqui</a></p>
  <p> <small> Si usted no solicito este codigo favor de omitir </small> </p>
 </div> 
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo
/*$enviado = false;
if(mail($para, $título, $mensaje, $cabeceras)){
  $enviado=true;
}
*/

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mgdsoft27@zohomail.com';                     //SMTP username
    $mail->Password   = 'Mg2468763';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mgdsoft27@zohomail.com', 'RECUPERAR CONTRASEÑA');
    $mail->addAddress($email);     //Add a recipient
    /*$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nueva contraseña';
    $mail->Body    = '<p>Hemos actualizado su contraseña, el token para recuperar su contraseña es:</p><h3>'.$token.'</h3>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





  $query=("INSERT INTO recuperar (email,token) values('$email','$token')");
  $result= mysqli_query($conexion,$query);
  if($result){
    echo '
      <script>
         alert("Correo Enviado Exitosamente");
        window.location="verificarToken.php";     
        </script>
    
    ';
   
   
  } 

}


?>