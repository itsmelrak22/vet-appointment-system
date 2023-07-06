<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new MeetingLink;

header('Content-Type: application/json; charset=utf-8');
$target_dir = "../img/users/";

// print_r($_POST);
// print_r($_FILES["image"]);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    $link = $_POST['link'];
    $link = filter_var($link, FILTER_SANITIZE_STRING);
    if (empty($link)) {
        $errors[] = "Link is required";
    }

    // $status = $_POST['status'];
    // $status = filter_var($status, FILTER_SANITIZE_STRING);
    // if (empty($status)) {
    //     $errors[] = "Status is required";
    // }


    // Check if already taken
    $meeting_links = $instance->setQuery( "SELECT * FROM `meeting_links` WHERE `link` = '$link' AND  `id` <> $id;" )->getAll();
    if (count( $meeting_links ) > 0) {
        $errors[] = "Service is already Registered";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../meeting_links.php');
    }else{
        try {
            // $instance->setQuery(" UPDATE `meeting_links`
            //                         SET `link` = '$link',
            //                             `status` = '$status',
            //                             `updated_at` = '$today'
            //                         WHERE `id` = $id;
            //                         ");
            $instance->setQuery(" UPDATE `meeting_links`
                                    SET `link` = '$link',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;
                                    ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        $_SESSION['success'] = "Service has been Edited!";
        header('Location: ../meeting_links.php');
    }
}
?>