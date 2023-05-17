<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$serviceClass = new Service;

header('Content-Type: application/json; charset=utf-8');
$target_dir = "../img/users/";

// print_r($_POST);
// print_r($_FILES["image"]);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
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

    // Check if already taken
    $services = $serviceClass->setQuery( "SELECT * FROM `services` WHERE `name` = '$name' AND  `id` <> $id;" )->getAll();
    if (count( $services ) > 0) {
        $errors[] = "Service is already Registered";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../services_list.php');
    }else{
        try {
            $serviceClass->setQuery(" UPDATE `services`
                                    SET `name` = '$name',
                                        `info` = '$info',
                                        `price` = '$price',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;
                                    ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        $_SESSION['success'] = "Service has been Edited!";
        header('Location: ../services_list.php');
    }
}
?>