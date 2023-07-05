<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
date_default_timezone_set('Asia/Manila');
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid Request";
    exit();
}

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});
$id = $_POST['id'];
$appointment_type = $_POST['appointment-type'];

if($appointment_type == 'virtual'){
    $instance = new AppointmentVirtual;
    $appointment = $instance->getAppointmentInfo($id);

    if( $appointment->status == 'confirmed' || $appointment->status == 'pending'){
        sendConfirmEmail($appointment->email, 
                $appointment->owner_name, 
                $appointment->status, 
                $appointment->appointment_date, 
                "$appointment->start_hour:$appointment->start_minute $appointment->start_period - $appointment->end_hour:$appointment->end_minute $appointment->end_period", 
                $appointment->meeting_link,
                $id,$appointment_type);
    
    }
    
    if( $appointment->status == 'cancelled'){
        sendCancelEmail($appointment->email, 
                $appointment->owner_name, 
                $appointment->status, 
                $appointment->appointment_date, 
                "$appointment->start_hour:$appointment->start_minute $appointment->start_period - $appointment->end_hour:$appointment->end_minute $appointment->end_period", 
                $id,$appointment_type);
    }

}else if( $appointment_type == 'walkin' ){
    $instance = new Appointment;
    $appointment = $instance->getAppointmentInfo($id);

    if( $appointment->status == 'pending' || $appointment->status == 'confirmed'){
        sendConfirmEmail($appointment->email, 
                $appointment->owner_name, 
                $appointment->status, 
                $appointment->appointment_date, 
                $appointment->time, 
                '',
                $id,$appointment_type);
    
    }
    
    if( $appointment->status == 'cancelled'){
        sendCancelEmail($appointment->email, 
                $appointment->owner_name, 
                $appointment->status, 
                $appointment->appointment_date, 
                $appointment->time, 
                $id,$appointment_type);
    }
}
print_r($_POST);
print_r($appointment);
exit();


function sendConfirmEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $APPOINTMENT_DATE, $APPOINTMENT_TIME, $MEETING_LINK, $ID, $appointment_type){
    $dateString = $APPOINTMENT_DATE;
    $timestamp = strtotime($dateString);
    $formattedDate = date('F d, Y l', $timestamp);

    $mailTo = $MAIL_TO;
    
    if($MEETING_LINK){
        $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $formattedDate - $APPOINTMENT_TIME is $STATUS.  <br> <hr> Your meeting link is $MEETING_LINK <br> <hr>
                Note: Please be there 10 minutes before your appointment time. Thank you. </p>
               <p> Best regard, </p>
            <p>Circle of life Veterinary Clinic</p> ";
    }else{
        $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $APPOINTMENT_DATE - $APPOINTMENT_TIME is $STATUS.
                Note: Please be there 10 minutes before your appointment time. Thank you. </p>
               <p> Best regard, </p>
            <p>Circle of life Veterinary Clinic</p> ";
    }

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
    $mail->Subject = "Appointment $STATUS";
    $mail->Body = $body;
    $mail->AltBody = "Test Alt Body";

    if(!$mail->send()){
        // echo "Mailer Error :". $mail->ErrorInfo;
        // $_SESSION['errors'] = ["Someting Went wrong, email not sent"];
        // header('Location: ../dashboard-'.$_POST['appointment-type'].'-confirm-app.php?id='.$_POST['id']);
        $_SESSION['errors'] = ["Someting Went wrong, email not sent"];
        header('Location: ../dashboard-'.$appointment_type.'-confirm-app.php?id='.$ID);
    }else{
        // echo "Message Sent";
        $_SESSION['success'] = "Appointment has been updated and Email has been Sent!!";
        header('Location: ../dashboard-'.$appointment_type.'-confirm-app.php?id='.$ID);
    }

}

function sendCancelEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $APPOINTMENT_DATE, $APPOINTMENT_TIME, $ID, $appointment_type){
    $dateString = $APPOINTMENT_DATE;
    $timestamp = strtotime($dateString);
    $formattedDate = date('F d, Y l', $timestamp);

    $mailTo = $MAIL_TO;
    $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $formattedDate - $APPOINTMENT_TIME is $STATUS, you can contact us via email in admin@clvc.online </p>
            <p>Circle of life Veterinary Clinic</p> ";

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
    $mail->Subject = "Appointment $STATUS";
    $mail->Body = $body;
    $mail->AltBody = "Test Alt Body";

    if(!$mail->send()){
        // echo "Mailer Error :". $mail->ErrorInfo;
        // $_SESSION['errors'] = ["Someting Went wrong, email not sent"];
        // header('Location: ../dashboard-'.$_POST['appointment-type'].'-confirm-app.php?id='.$_POST['id']);
        $_SESSION['errors'] = ["Someting Went wrong, email not sent"];
        header('Location: ../dashboard-'.$appointment_type.'-confirm-app.php?id='.$ID);
    }else{
        // echo "Message Sent";
        $_SESSION['success'] = "Appointment has been updated and Email has been Sent!!";
        header('Location: ../dashboard-'.$appointment_type.'-confirm-app.php?id='.$ID);
    }

}

