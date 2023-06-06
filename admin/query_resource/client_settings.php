<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new ClientSetting;

header('Content-Type: application/json; charset=utf-8');

    // print_r($_POST);
    // exit();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $is_disabled = $_POST['is_disabled'];
    try {
        $instance->setQuery(" UPDATE `client_settings`
                                SET `is_disabled` = '$is_disabled',
                                    `updated_at` = '$today'
                                WHERE `id` = $id;
                                ");
        $_SESSION['success'] = "Client Settings has been updated!";
        header('Location: ../client_settings.php');
    } catch (\PDOException  $e) {
        die('Database connection error: ' . $e->getMessage());
    }
   
}
?>