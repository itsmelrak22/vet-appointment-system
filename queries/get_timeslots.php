<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Schedule;

$date = $_POST['date'];

// Perform validation and sanitization on the date
$date = trim($date); // Remove leading/trailing whitespace
$date = filter_var($date, FILTER_SANITIZE_STRING);
$schedules = $instance->setQuery( "SELECT * FROM `schedules` WHERE `date` = '$date' AND `deleted_at` IS NULL ")->getAll();
// $schedules = $instance->setQuery( "SELECT schedules.*, doctor.name, doctor.id as doctor_id FROM `schedules` LEFT JOIN `doctor` ON schedules.doctor_id = doctor.id WHERE schedules.date = '$date' AND schedules.deleted_at IS NULL ")->getAll();
http_response_code(200);
echo json_encode(array('message' => 'Success', 'data' => $schedules ));
exit();

?>
