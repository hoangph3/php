<?php declare(strict_types=1);
require_once 'utils.php';
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if(isset($_SESSION['email'])){
    $s_email = $_SESSION['email'];
}
$auth_code =  random_int(100000,999999); //6 digits
$_SESSION['auth_code'] = $auth_code;

$mail = new PHPMailer(true);
//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "daohambacnhat@gmail.com";                 
$mail->Password = "daohambachai@";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "daohambacnhat@gmail.com";             
$mail->FromName = "Adminstrator";

$mail->addAddress($s_email, "User");

$mail->isHTML(true);

$mail->Subject = "Authentication";
$mail->Body = "<h3>This is your authentic code:<br/></h3><h3>" . $auth_code .'</h3>';
$mail->AltBody = "This is your authentic code";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

echo "<script>window.location.assign('validation.php')</script>";
