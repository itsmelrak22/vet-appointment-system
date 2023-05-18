<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$intance = new MeetingLink;

header('Content-Type: application/json; charset=utf-8');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $link = $_POST['link'];
    $link = filter_var($link, FILTER_SANITIZE_STRING);
    if (empty($link)) {
        $errors[] = "Link is required";
    }

    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);
    if (empty($status)) {
        $errors[] = "Status is required";
    }

    $meeting_links = $intance->setQuery( "SELECT * FROM `meeting_links` WHERE `link` = '$link'" )->getAll();
    if (count( $meeting_links ) > 0) {
        $errors[] = "Link is already Registered";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../meeting_links.php');
    }else{
        try {
            $intance->setQuery(" INSERT INTO `meeting_links`( `link`, `status`,`created_at`, `updated_at`) VALUES ('$link','$status','$today', '$today') ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }

    $_SESSION['success'] = "Link has been added!";
    header('Location: ../meeting_links.php');
}
?>