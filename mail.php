<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'mailer/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.com';                                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '72efd91ff44260';                           //SMTP username
    $mail->Password   = '8cdafdcff952b4';                        //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    
    $mail->Port       = 22;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Content format
    $mail->isHTML(true);        //Set email format to HTML
    $mail->CharSet = "UTF-8"; 

?>