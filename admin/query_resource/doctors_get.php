<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new Doctor;
$doctors = $instance->allWithOutTrash();
http_response_code(200);
echo json_encode(array('message' => 'Success', 'data' => $doctors ));
exit();

?>
