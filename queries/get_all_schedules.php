<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Schedule;

// Perform validation and sanitization on the date
$dates = $instance->setQuery( "SELECT DISTINCT `date` FROM `schedules` WHERE STR_TO_DATE(`date`, '%m/%d/%Y') >= CURDATE() AND `deleted_at` IS NULL;")->getAll();
http_response_code(200);
echo json_encode(array('message' => 'Success', 'data' => $dates ));
exit();

?>
