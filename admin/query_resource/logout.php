<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

// header('Content-Type: application/json; charset=utf-8');
// echo $_POST['toggle-logout'];
// exit(0);

if(isset($_POST['toggle-logout'])){
    unset($_SESSION['token']);
    unset($_SESSION['username']);
    header('Location: ../../');

}

header('Location: ../../');


