<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$userClass = new User;

header('Content-Type: application/json; charset=utf-8');
$target_dir = "../img/users/";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
        // Validate and sanitize the fullname
    $fullname = $_POST['fullname'];
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    if (empty($fullname)) {
        $errors[] = "Fullname is required";
    }

    // Validate and sanitize the username
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    if (empty($username)) {
        $errors[] = "username is required";
    }

    // Validate and sanitize the password
    $password = $_POST['password'];
    if (empty($password)) {
        $errors[] = "Password is required";
    } else if ( strlen($password) < 8 ){
        $errors[] = "Password to short, minimum of 8 characters";
    }else {
        // Optionally, you can also apply additional password validation rules
        $password = filter_var($password, FILTER_SANITIZE_STRING);
    }

    // Validate and sanitize the confirm password
    $confirmPassword = $_POST['confirm_password'];
    if (empty($confirmPassword)) {
        $errors[] = "Confirm Password is required";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    } else {
        $confirmPassword = filter_var($confirmPassword, FILTER_SANITIZE_STRING);
    }

    // Validate and sanitize the category
    $category = $_POST['category'];
    if ($category === '...') {
        $errors[] = "Category is required";
    } else {
        $category = filter_var($category, FILTER_SANITIZE_STRING);
    }

    // Check if the username is already taken
    $users = $userClass->setQuery( "SELECT * FROM `users` WHERE `username` = '$username'" )->getAll();
    if (count( $users ) > 0) {
        $errors[] = "Username is already taken";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../admin_user_list.php');
    }else{

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $name = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
        
            // Specify the destination directory to save the uploaded image
            $destination = "../img/users/" . $name;
            $path = "img/users/" . $name;
        
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
            $userClass->setQuery(" INSERT INTO `users`( `name`, `username`, `password`, `category`, `avatar`, `created_at`, `updated_at`) VALUES ('$fullname','$username','$password','$category', '$path', '$today', '$today') ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        $_SESSION['success'] = "User has been added!";
        header('Location: ../admin_user_list.php');
    }
}
?>