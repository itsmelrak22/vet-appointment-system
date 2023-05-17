<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Doctor;

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


    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../doctor_list.php');
    }else{

        if( isset($_FILES["image"]) && $_FILES["image"]["name"] ) {
            if ( $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $filename = $_FILES["image"]["name"];
                $tmp_name = $_FILES["image"]["tmp_name"];
            
                // Specify the destination directory to save the uploaded image
                $destination = "../img/users/" . $filename;
                $path = "img/users/" . $filename;
            
                // Move the uploaded file to the desired location
                if (move_uploaded_file($tmp_name, $destination)) {
                  echo "Image uploaded successfully.";
    
                  $instance->setQuery(" UPDATE `doctor`
                                            SET `avatar` = '$path',
                                                `updated_at` = '$today'
                                            WHERE `id` = $id;
                                            ");
                } else {
                die('Failed to upload image: ');
    
                }
              } else {
                die('Image upload error: ');
            }
        }


        try {
            $instance->setQuery(" UPDATE `doctor`
                                    SET `name` = '$name',
                                        `age` = '$age',
                                        `description` = '$description',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;
                                    ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        $_SESSION['success'] = "Doctor Data has been Edited!";
        header('Location: ../doctor_list.php');
    }
}
?>