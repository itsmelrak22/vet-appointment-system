<?php
session_start();
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

header('Content-Type: application/json; charset=utf-8');

$today = date('Y-m-d H:i:s');
$instance = new Appointment;
// Initialize variables
$errors = [];
$success = false;

// print_r($_POST);
// exit();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate the input fields
    $id = $_POST["id"];
    $status = $_POST["status"];
    $remarks = $_POST["remarks"];

    // Perform validation for each field
    if (empty($status) || $status == 'pending') {
        $errors[] = "Please Select Status.";
    }


    // If there are no errors, the form is successfully submitted
    if (empty($errors)) {
        try {
            $instance->setQuery(" UPDATE `appointments` SET `status`='$status', `remarks` = '$remarks', `updated_at`='$today' WHERE id = $id");
            $appointment = $instance->getAppointmentInfo($id);
            if(isset($_POST['is_to_send_email']) && $status == 'confirmed'){
                sendConfirmEmail($appointment->email, 
                        $appointment->owner_name, 
                        $appointment->status, 
                        $appointment->appointment_date, 
                        $appointment->time, 
                        $appointment->id,
                        $appointment->remarks
                    );

            }
    
            if(isset($_POST['is_to_send_email']) && $status == 'cancelled'){
                sendCancelEmail($appointment->email, 
                        $appointment->owner_name, 
                        $appointment->status, 
                        $appointment->appointment_date, 
                        $appointment->time, 
                        $appointment->id,
                        $appointment->remarks
                    );
            }

            if(isset($_POST['is_to_send_email']) && $status == 'completed'){
                sendCompleteEmail($appointment->email, 
                        $appointment->owner_name, 
                        $appointment->status, 
                        $appointment->appointment_date, 
                        $appointment->time, 
                        $appointment->id,
                        $appointment->remarks
                    );
            }
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        if( !isset($_POST['is_to_send_email']) ){
            // header('Location: ../dashboard-virtual-confirm-app.php?id='.$id);
            $_SESSION['success'] = "Appointment has been updated !";
            header('Location: ../dashboard-walkin-pending.php');
        }

        
        // $_SESSION['success'] = "Appointment has been updated!";
        // header('Location: ../dashboard-walkin-confirm-app.php?id='.$id);
    }else{
        $_SESSION['errors'] = $errors;
        header('Location: ../dashboard-walkin-confirm-app.php?id='.$id);
        // echo "Error";
        // print_r($errors);
        // exit();
    }


}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function sendConfirmEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $APPOINTMENT_DATE, $APPOINTMENT_TIME, $ID, $REMARKS = null){
    $dateString = $APPOINTMENT_DATE;
    $timestamp = strtotime($dateString);
    $formattedDate = date('F d, Y l', $timestamp);

    $mailTo = $MAIL_TO;
    $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $formattedDate - $APPOINTMENT_TIME is $STATUS.</p>  
                <br> 
                <hr> 
                <p>Note: Please be there 10 minutes before your appointment time. Thank you. </p>
               <p> Best regard, </p>
            <p>Circle of life Veterinary Clinic</p> ";

    if ($REMARKS) {
        $body .= "<hr> <p>Clinic remarks:</p>
                    <p>$REMARKS</p>";
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
        header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
    }else{
        echo "Message Sent";
        $_SESSION['success'] = "Appointment has been updated and Email has been Sent!!";
        // header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
        header('Location: ../dashboard-walkin-pending.php');
        
    }

}

function sendCompleteEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $APPOINTMENT_DATE, $APPOINTMENT_TIME, $ID, $REMARKS = null){
    $dateString = $APPOINTMENT_DATE;
    $timestamp = strtotime($dateString);
    $formattedDate = date('F d, Y l', $timestamp);

    $mailTo = $MAIL_TO;
    $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $formattedDate - $APPOINTMENT_TIME has been completed .</p>  
                <br> 
                <hr> 
                <p>Thanks for trusting our service! </p>
               <p> Best regard, </p>
            <p>Circle of life Veterinary Clinic</p> ";

    if ($REMARKS) {
        $body .= "<hr> <p>Clinic remarks:</p>
                    <p>$REMARKS</p>";
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
        header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
    }else{
        echo "Message Sent";
        $_SESSION['success'] = "Appointment has been updated and Email has been Sent!!";
        // header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
        header('Location: ../dashboard-walkin-today.php');
        
    }

}

function sendCancelEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $APPOINTMENT_DATE, $APPOINTMENT_TIME, $ID, $REMARKS = null){
    $dateString = $APPOINTMENT_DATE;
    $timestamp = strtotime($dateString);
    $formattedDate = date('F d, Y l', $timestamp);

    $mailTo = $MAIL_TO;
    $body = " <p>Hello $RECEIVER_NAME,</p>
                <p>Your appointment on $formattedDate - $APPOINTMENT_TIME is $STATUS, you can contact us via email in admin@clvc.online </p>
            <p>Circle of life Veterinary Clinic</p> ";

    if ( $REMARKS ) {
        $body .= "<hr> <p>Clinic remarks:</p>
                    <p>$REMARKS</p>";
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
        header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
    }else{
        echo "Message Sent";
        $_SESSION['success'] = "Appointment has been updated and Email has been Sent!!";
        // header('Location: ../dashboard-walkin-confirm-app.php?id='.$ID);
        header('Location: ../dashboard-walkin-pending.php');

        
    }

}