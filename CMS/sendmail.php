<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if (isset($_POST["submit"])) {
	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'sjcc.cms.donotreply@gmail.com';
	$mail->Password = 'wrjoeyercdqdhjim';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('sjcc.cms.donotreply@gmail.com');

	
	$mail->addAddress($_POST["mail"]);

	
    
	$mail->isHTML(true);

	$mail->Subject = "AMS Registration";
	$message = '
			Hello World
            <hr style="border: 1px solid green; margin: 20px 0;">
';
	$mail->Body = $message;
	$mail->send();



}
?>