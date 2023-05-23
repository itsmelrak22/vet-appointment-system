<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$serviceClass = new Service;

header('Content-Type: application/json; charset=utf-8');

// print_r($_POST);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    $info = $_POST['info'];
    $info = filter_var($info, FILTER_SANITIZE_STRING);
    if (empty($info)) {
        $errors[] = "Info is required";
    }

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    if (empty($price)) {
        $errors[] = "Price is required";
    }

    if( isset($_POST['duration_minutes']) ){
        $duration_minutes = $_POST['duration_minutes'];
        $duration_minutes = filter_var($duration_minutes, FILTER_SANITIZE_STRING);
        if (empty($duration_minutes)) {
            $errors[] = "Duration is required";
        }
    }

    if( isset($_POST['is_60_more']) ){
        $duration_minutes = 61;
    }
    


    $services = $serviceClass->setQuery( "SELECT * FROM `services` WHERE `name` = '$name'" )->getAll();
    if (count( $services ) > 0) {
        $errors[] = "Service is already Registered";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../services_list.php');
    }else{
        try {
            $serviceClass->setQuery(" INSERT INTO `services`( `name`, `info`, `price`, `duration_minutes`, `created_at`, `updated_at`) VALUES ('$name','$info','$price','$duration_minutes','$today', '$today') ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }

    $_SESSION['success'] = "Services has been added!";
    header('Location: ../services_list.php');
}
?>