<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

header('Content-Type: application/json; charset=utf-8');
$username = htmlspecialchars($_POST['username'], ENT_QUOTES) ?? '';
$password = htmlspecialchars($_POST['password'], ENT_QUOTES) ?? '';
$token = $_POST['token'];


if(base64_decode($token) != 'CircleOfLife2023'){
    header('Location: ../../login.php');
    exit(0);
}


try {
    $conn = new User;
    $user = $conn->setQuery("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'")->getAll();

} catch (\Exception $e) {
    echo $e->getMessage();
    exit(0);
}


if(count($user) == 0){
    header('Location: ../login.php');
    exit(0);
}else{

    $_SESSION['user'] = $user[0];
    $_SESSION['token'] = base64_encode($username).$token;

    header('Location: ../dashboard.php');
    exit(0);
}
