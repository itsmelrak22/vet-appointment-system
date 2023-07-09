<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$userClass = new User;

header('Content-Type: application/json; charset=utf-8');

// print_r($_POST);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $old_password = $_POST['old_password'];

    // Validate and sanitize the password
    $old_password = $_POST['old_password'];
    if (empty($old_password)) {
        $errors[] = "Old Password is required";
    } else {
        // Optionally, you can also apply additional old_password validation rules
        $old_password = trim(filter_var($old_password, FILTER_SANITIZE_STRING));
    }
    
    // Validate and sanitize the password
    $new_password = $_POST['new_password'];
    if (empty($new_password)) {
        $errors[] = "Password is required";
    } else if (strlen($new_password) < 8) {
        $errors[] = "Password too short, minimum of 8 characters";
    } else {
        // Optionally, you can also apply additional new_password validation rules
        $new_password = trim(filter_var($new_password, FILTER_SANITIZE_STRING));
    }
    
    // Validate and sanitize the confirm password
    $confirm_new_password = $_POST['confirm_new_password'];
    if (empty($confirm_new_password)) {
        $errors[] = "Confirm Password is required";
    } elseif ($new_password !== $confirm_new_password) {
        $errors[] = "Passwords do not match";
    } else {
        $confirm_new_password = trim(filter_var($confirm_new_password, FILTER_SANITIZE_STRING));
    }
    
    // Check if the password is correct
    $users = $userClass->setQuery( "SELECT * FROM `users` WHERE `id` = '$id' AND `password` = '$old_password';" )->getAll();
    if (count( $users ) < 1) {
        $errors[] = "Invalid Password Credentials";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../admin_user_list.php');
    }else{

        try {
            $userClass->setQuery(" UPDATE `users`
                                    SET `password` = '$new_password',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;
                                    ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        $_SESSION['success'] = "User has been Edited!";
        header('Location: ../admin_user_list.php');
    }
}
?>