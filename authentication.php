<?php declare(strict_types=1);
require_once 'utils.php';
require_once "vendor/autoload.php";
require_once "vendor/sonata-project/google-authenticator/src/FixedBitNotation.php";
require_once "vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
// Lay email tu username trong db
if(isset($_SESSION['auth'])){
    $s_username = $_SESSION['auth'];
}
//echo $username;
$connect = connect_db();
$sql_teacher = " select * from teacher where username = '$s_username' ";
$query_teacher = mysqli_query($connect, $sql_teacher);
$row_teacher = mysqli_fetch_array($query_teacher);

$sql_student = " select * from student where username = '$s_username' ";
$query_student = mysqli_query($connect, $sql_student);
$row_student = mysqli_fetch_array($query_student);

if (($row_teacher['username'] == $s_username)){
    $s_email = $row_teacher['email'];
}
else if(($row_student['username'] == $s_username)){
    $s_email = $row_student['email'];
}

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
$secret = $g->generateSecret();  
$auth_code =  $g->getCode($secret); //6 digits
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
$mail->Body = "This is your authentic code: " . $auth_code;
$mail->AltBody = "This is your authentic code";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

echo "<script>window.location.assign('validation.php')</script>";
