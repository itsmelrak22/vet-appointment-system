<?php
session_start();
date_default_timezone_set('Asia/Manila');
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid Request";
    exit();
}

// print_r($_POST);
// exit();

function sendEmail($MAIL_TO, $RECEIVER_NAME){
    $mailTo = $MAIL_TO;
    $body = "<h1>Test ".$_POST['appointment-type']." Email from admin@clvc.online!</h1> ";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;

    $mail->Username = "admin.clvc";
    $mail->Password = "password";
    $mail->SMTPSecure = "tls";

    $mail->Port = "2525";
    $mail->From = "admin@clvc.online";
    $mail->FromName = "Circle Of Life Clinic";
    $mail->addAddress($mailTo, $RECEIVER_NAME );

    $mail->isHTML('true');
    $mail->Subject = "Subject of the Email";
    $mail->Body = $body;
    $mail->AltBody = "Test Alt Body";

    if(!$mail->send()){
        echo "Mailer Error :". $mail->ErrorInfo;
        $_SESSION['errors'] = ["Someting Went wrong, email not sent"];
        header('Location: ../dashboard-'.$_POST['appointment-type'].'-confirm-app.php?id='.$_POST['id']);
    }else{
        echo "Message Sent";
        $_SESSION['success'] = "Email has been Sent!";
        header('Location: ../dashboard-'.$_POST['appointment-type'].'-confirm-app.php?id='.$_POST['id']);
    }

}

$receiver_email = $_POST['receiver_email'];
$receiver_name = $_POST['receiver_name'];


sendEmail($receiver_email, $receiver_name);

