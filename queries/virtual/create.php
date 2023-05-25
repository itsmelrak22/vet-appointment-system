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
    $appointment_type = $_POST["appointment_type"];
    $appointment_date = $_POST["appointment_date"];
    $owner_name = sanitizeInput($_POST["owner_name"]);
    $phone = sanitizeInput($_POST["phone"]);
    $email = sanitizeInput($_POST["email"]);
    $time = sanitizeInput($_POST["time"]);
    $service_id = 12;
    $pet_name = sanitizeInput($_POST["pet_name"]);
    $pet_type = sanitizeInput($_POST["pet_type"]);
    $pet_breed = sanitizeInput($_POST["pet_breed"]);
    $pet_height = sanitizeInput($_POST["pet_height"]);
    $pet_weight = sanitizeInput($_POST["pet_weight"]);
    $pet_age = sanitizeInput($_POST["pet_age"]);
    $reference_no = sanitizeInput($_POST["reference_no"]);
    $appointment_code = "COLC-". time();

    // Perform validation for each field
    if (empty($owner_name)) {
        $errors[] = "Please enter your name.";
    }

    if (empty($phone)) {
        $errors[] = "Please enter your phone number.";
    }

    if (empty($email)) {
        $errors[] = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($time)) {
        $errors[] = "Please select a time slot.";
    }

    if (empty($service_id)) {
        $errors[] = "Please select a Service.";
    }

    if (empty($pet_name)) {
        $errors[] = "Please enter your pet's name.";
    }

    if (empty($pet_type)) {
        $errors[] = "Please enter the type of pet or animal.";
    }

    if (empty($pet_breed)) {
        $errors[] = "Please enter the type of breed.";
    }

    if (empty($pet_height)) {
        $errors[] = "Please enter the height in cm.";
    }

    if (empty($pet_weight)) {
        $errors[] = "Please enter the weight in kg.";
    }

    if (empty($pet_age)) {
        $errors[] = "Please enter the age.";
    }

    if (empty($reference_no)) {
        $errors[] = "Please enter the age.";
    }

    // If there are no errors, the form is successfully submitted
    if (empty($errors)) {

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $upload_image = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
        
            // Specify the destination directory to save the uploaded image
            $destination = "../../img_uploads/gcash/" . $upload_image;
            $upload_path = "mg_uploads/gcash/" . $upload_image;
        
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
            $instance->setQuery(" INSERT INTO `appointments`( `pet_name`, `owner_name`, `pet_type`, `pet_breed`, `pet_height`, `pet_weight`, `pet_age`, `email`, `phone`, `appointment_date`, `time`, `service_id`, `appointment_type`, `appointment_code`, `status`, `upload_path`, `reference_no`, `created_at`, `updated_at`) 
                                        VALUES ('$pet_name','$owner_name','$pet_type','$pet_breed','$pet_height','$pet_weight','$pet_age','$email','$phone','$appointment_date','$time','$service_id','$appointment_type','$appointment_code','pending','$upload_path', '$reference_no', '$today','$today') ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        $_SESSION['success'] = "Appointment has been added!";
        header('Location: ../../appoint_virtual.php');
    }else{
        $_SESSION['errors'] = $errors;;
        header('Location: ../../appoint_virtual.php');
    }


}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

