<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$instance = new MeetingLink;

header('Content-Type: application/json; charset=utf-8');

// print_r($_POST);
// print_r($_FILES["image"]);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $instance->setQuery(" UPDATE `meeting_links`
                                SET `deleted_at` = '$today'
                                WHERE `id` = $id;
                                ");
    } catch (\PDOException  $e) {
        die('Database connection error: ' . $e->getMessage());
    }

    $_SESSION['success'] = "Link has been Deleted!";
    header('Location: ../meeting_links.php');
}
?>