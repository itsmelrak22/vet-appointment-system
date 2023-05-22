<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Schedule;

$data = json_decode($_POST['data']);

// Perform validation and sanitization on the date
$date = trim($data->date); // Remove leading/trailing whitespace
$date = filter_var($date, FILTER_SANITIZE_STRING);
$hour = filter_var($data->hour, FILTER_SANITIZE_STRING);
$minutes = filter_var($data->minute, FILTER_SANITIZE_STRING);
$period = filter_var($data->period, FILTER_SANITIZE_STRING);
$type = filter_var($data->type, FILTER_SANITIZE_STRING);


$schedules = $instance->setQuery( "SELECT * FROM `schedules` WHERE `date` = '$date' AND `hour` = '$hour' AND `minutes` = '$minutes' AND `period` = '$period' ")->getAll();
if (count( $schedules ) > 0) {
    $errors[] = "Schedule is already Registered";
}

if( isset($errors) && count( $errors ) > 0 ){
    http_response_code(500);
    echo json_encode(array('error' => 'An error occurred.', "message" => $errors[0]));
    exit();
}else{
    try {
        $instance->setQuery(" INSERT INTO `schedules`( `date`, `hour`, `minutes`, `period`, `type`, `created_at`, `updated_at`) VALUES ('$date','$hour','$minutes','$period','$type','$today','$today')");
        http_response_code(200);
        echo json_encode(array('message' => 'Success' ));
        exit();
    } catch (\PDOException  $e) {
        http_response_code(500);
        echo json_encode(array('error' => 'An error occurred.', "message" => $e->getMessage()));
        exit();
    }
}

?>
