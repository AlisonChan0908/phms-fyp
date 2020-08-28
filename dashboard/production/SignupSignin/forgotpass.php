<?php 

require_once('../PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail -> isSMTP();
$mail -> SMTPAuth();
$mail -> SMTPSecure = 'ssl';
$mail -> Host = 'smtp@gmail.com';
$mail -> Port = '465';
$mail -> isHTML();
$mail -> Username = 'alicealison97@gmail.com';
$mail -> Password = '';
$mail ->SetFrom('');
$mail ->Subject = 'Hello World';
$mail -> Body = 'A test email';
$mail -> AddAddress = ('');

$mail ->Send();


?>