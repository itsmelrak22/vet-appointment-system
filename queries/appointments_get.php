<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Appointment;

$date = $_POST['date'];

// Perform validation and sanitization on the date
$date = trim($date); // Remove leading/trailing whitespace
$date = filter_var($date, FILTER_SANITIZE_STRING);
$schedules = $instance->setQuery( "SELECT * FROM `appointments` WHERE `appointment_date` = '$date'")->getAll();
http_response_code(200);
echo json_encode(array('message' => 'Success', 'data' => $schedules ));
exit();

?>
