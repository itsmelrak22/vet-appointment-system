<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Doctor;

header('Content-Type: application/json; charset=utf-8');

$target_dir = "../img/doctors/";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    if (empty($name)) {
        $errors[] = "name is required";
    }

    $age = $_POST['age'];
    $age = filter_var($age, FILTER_SANITIZE_STRING);
    if (empty($age)) {
        $errors[] = "age is required";
    }

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    if (empty($description)) {
        $errors[] = "description is required";
    }

    // Check if the username is already taken
    // $doctors = $userClass->setQuery( "SELECT * FROM `doctor` WHERE `name` = '$name'" )->getAll();
    // if (count( $doctors ) > 0) {
    //     $errors[] = "nam is already taken";
    // }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../doctor_list.php');
    }else{

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $filename = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
        
            // Specify the destination directory to save the uploaded image
            $destination = "../img/doctors/" . $filename;
            $path = "img/doctors/" . $filename;
        
            // Move the uploaded file to the desired location
            if (move_uploaded_file($tmp_name, $destination)) {
              echo "Image uploaded successfully.";
            } else {
            die('Failed to upload image: ');

            }
          } else {
            die('Image upload error: ');
          }


        try {
            $instance->setQuery(" INSERT INTO `doctor`( `name`, `avatar`, `age`, `description`, `created_at`, `updated_at`) VALUES ('$name','$path','$age','$description', '$today', '$today') ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        $_SESSION['success'] = "Doctor has been added!";
        header('Location: ../doctor_list.php');
    }
}
?>