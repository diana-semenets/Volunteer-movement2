<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail ->CharSet = 'UTF-8';
$mail->setLanguage('en', 'PHPMailer-master/language');
$mail->IsHTML(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user';                     //SMTP username
    $mail->Password   = 'xxzaplzgxvclzksw';                               //SMTP password
    $mail->SMTPSecure = TLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('semenets.usa@gmail.com', 'Mailer');
    $mail->addAddress('diana777.cv@gmail.com', 'Joe User');     //Add a recipient
    

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    
    
    $body = '<h1>hello</h1>';
            if(trim(!empty($_POST['name']))) {
                $body .='<p> name: <strong>'.$_POST['name']'</strong> </p>'
            }
            $mail->Body    = $body;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $mail->smtpClose()
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}