<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new DoctorSchedule;

header('Content-Type: application/json; charset=utf-8');


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $doctor_id = $_POST['doctor_id'];
    $doctor_id = filter_var($doctor_id, FILTER_SANITIZE_STRING);
    if (empty($doctor_id)) {
        $errors[] = "Please Select Doctor";
    }

    $selected_date = $_POST['selected_date'];
    $selected_date = filter_var($selected_date, FILTER_SANITIZE_STRING);
    if (empty($selected_date)) {
        $errors[] = "Select Date";
    }


    $doctor_schedules = $instance->setQuery( "SELECT * FROM `doctor_schedules` WHERE `selected_date` = '$selected_date'" )->getAll();

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../doctor_schedules.php');
    }else{
        try {
            if (count( $doctor_schedules ) > 0) {
                $id = $doctor_schedules[0]['id'];
                $instance->setQuery("UPDATE `doctor_schedules`
                                    SET `selected_date` = '$selected_date',
                                        `doctor_id` = '$doctor_id',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;");
                $_SESSION['success'] = "doctor schedules has been Updated!";

            }else{
                $instance->setQuery(" INSERT INTO `doctor_schedules`( `selected_date`, `doctor_id`, `created_at`, `updated_at`) VALUES ('$selected_date','$doctor_id','$today', '$today') ");
                $_SESSION['success'] = "doctor schedules has been added!";
            }
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }

    header('Location: ../doctor_schedules.php');
}
?>