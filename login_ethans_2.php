<?php
require "login_ethans.php";
require '/var/www/html/PHPMailer-master/PHPMailerAutoload.php';
$fname = $_POST["fName"];
$lname = $_POST["lName"];
$mobile = $_POST["phone"];
$email = $_POST["email"];
$course = $_POST["course"];

$sql_query = "insert into users_data values('$fname','$lname','".$mobile."','$email','$course');";

mysqli_query($conn,$sql_query);


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP 
$mail->Username = 'ethanstest2@gmail.com';                 // SMTP username
$mail->Password = 'ethans123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('ethanstest2@gmail.com');
$mail->addAddress($email);     // Add a recipient


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Hi';
$mail->Body    = 'Hello';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
?>
