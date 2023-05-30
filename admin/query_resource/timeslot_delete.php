<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Schedule;

// print_r($_POST);
// exit();
$data = json_decode($_POST['data']);
// Perform validation and sanitization on the date
$id =  (int) $data->id;

    try {
        $instance->setQuery(" UPDATE `schedules` 
                                SET 
                                    `deleted_at`= '$today'
                                WHERE `id` = $id ");
        http_response_code(200);
        echo json_encode(array('message' => 'Success' ));
        exit();
    } catch (\PDOException  $e) {
        http_response_code(500);
        echo json_encode(array('error' => 'An error occurred.', "message" => $e->getMessage()));
        exit();
    }

?>
