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
    $selected_link = $_POST["selected_link"];

    // Perform validation for each field
    if (empty($selected_link)) {
        $errors[] = "Please Select Link.";
    }


    // If there are no errors, the form is successfully submitted
    if (empty($errors)) {
        try {
            $instance->setQuery(" UPDATE `appointments_virtual` SET `meeting_link_id`='$selected_link', `updated_at`='$today' WHERE id = $id");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        $_SESSION['success'] = "Appointment has been added!";
        header('Location: ../dashboard-virtual.php');
    }else{
        $_SESSION['errors'] = $errors;;
        header('Location: ../dashboard-virtual.php');
    }


}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

