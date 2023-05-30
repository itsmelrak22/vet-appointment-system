<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

// header('Content-Type: application/json; charset=utf-8');

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

    // Perform validation for each field
    if (empty($status)) {
        $errors[] = "Please Select Status.";
    }


    // If there are no errors, the form is successfully submitted
    if (empty($errors)) {
        try {
            $instance->setQuery(" UPDATE `appointments_virtual` SET `status`='$status', `updated_at`='$today' WHERE id = $id");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        $_SESSION['success'] = "Appointment has been updated!";
        header('Location: ../dashboard-virtual-confirm-app.php?id='.$id);
    }else{
        $_SESSION['errors'] = $errors;;
        header('Location: ../dashboard-virtual-confirm-app.php?id='.$id);
    }


}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

