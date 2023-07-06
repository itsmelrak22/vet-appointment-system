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
$start_hour =  $data->start_hour;
$start_minute = $data->start_minute;
$start_period = $data->start_period;
$end_hour = $data->end_hour;
$end_minute = $data->end_minute;
$end_period = $data->end_period;


$schedules = $instance->setQuery( "SELECT * FROM `schedules` 
                                    WHERE `date` = '$date' 
                                    AND `start_hour` = '$start_hour' 
                                    AND `start_minute` = '$start_minute' 
                                    AND `start_period` = '$start_period' 
                                    AND `end_hour` = '$end_hour' 
                                    AND `end_minute` = '$end_minute' 
                                    AND `end_period` = '$end_period' 
                                    AND `deleted_at` = NULL
                                ")->getAll();
if (count( $schedules ) > 0) {
    $errors[] = "Schedule is already Registered";
}

if( isset($errors) && count( $errors ) > 0 ){
    http_response_code(500);
    echo json_encode(array('error' => 'An error occurred.', "message" => $errors[0]));
    exit();
}else{
    try {
        $instance->setQuery(" INSERT INTO `schedules`( `date`, `start_hour`, `start_minute`, `start_period`, `end_hour`, `end_minute`, `end_period`, `created_at`, `updated_at`) 
                                    VALUES ('$date','$start_hour','$start_minute','$start_period','$end_hour', '$end_minute', '$end_period', '$today','$today')");
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
