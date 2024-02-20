<?php 
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
$mail= new PHPMailer();
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=465;
$mail->SMTPDebug = "0";
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth=true;
$mail->Username="tucorreo@gmail.com";
$mail->Password="Tu contraseña aplicativa";
$mail->setFrom("tucorreo@gmail.com","David Plaza");
$mail->addAddress("destinatario@gmail.com","Pepito2");
$mail->Subject="OLEEEE";
$mail->msgHTML("Hola soy un mensaje");
 
if(!$mail->send()){echo $mail->ErrorInfo;}
else {
    echo "Correo enviado correctamente!";
}


?>

