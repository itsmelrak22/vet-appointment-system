<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$today = date('Y-m-d H:i:s');
$userClass = new User;

header('Content-Type: application/json; charset=utf-8');
$target_dir = "../img/users/";

// print_r($_POST);
// print_r($_FILES["image"]);
// exit();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_username = $_POST['old_username'];
    $id = $_POST['id'];
    
        // Validate and sanitize the fullname
    $fullname = $_POST['fullname'];
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    if (empty($fullname)) {
        $errors[] = "Fullname is required";
    }

    // Validate and sanitize the username
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    if (empty($username)) {
        $errors[] = "username is required";
    }

    // Validate and sanitize the category
    $category = $_POST['category'];
    if ($category === '...') {
        $errors[] = "Category is required";
    } else {
        $category = filter_var($category, FILTER_SANITIZE_STRING);
    }

    // Check if the username is already taken
    $users = $userClass->setQuery( "SELECT * FROM `users` WHERE `username` = '$username' AND  `id` <> $id;" )->getAll();
    if (count( $users ) > 0) {
        $errors[] = "Username is already taken";
    }

    if( isset($errors) && count( $errors ) > 0 ){
        $_SESSION['errors'] = $errors;
        header('Location: ../admin_user_list.php');
    }else{

        if( isset($_FILES["image"]) && $_FILES["image"]["name"] ) {
            if ( $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $name = $_FILES["image"]["name"];
                $tmp_name = $_FILES["image"]["tmp_name"];
            
                // Specify the destination directory to save the uploaded image
                $destination = "../img/users/" . $name;
                $path = "img/users/" . $name;
            
                // Move the uploaded file to the desired location
                if (move_uploaded_file($tmp_name, $destination)) {
                  echo "Image uploaded successfully.";
    
                  $userClass->setQuery(" UPDATE `users`
                                            SET `avatar` = '$path',
                                                `updated_at` = '$today'
                                            WHERE `id` = $id;
                                            ");
                } else {
                die('Failed to upload image: ');
    
                }
              } else {
                die('Image upload error: ');
            }
        }


        try {
            $userClass->setQuery(" UPDATE `users`
                                    SET `name` = '$fullname',
                                        `username` = '$username',
                                        `category` = '$category',
                                        `updated_at` = '$today'
                                    WHERE `id` = $id;
                                    ");
        } catch (\PDOException  $e) {
            die('Database connection error: ' . $e->getMessage());
        }

        
        // $user = $userClass->find($id);
        // $_SESSION['user'] = $user;

        if (isset($_POST['is_edit_profile'])) {
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['name'] = $fullname;
            if($path){
                $_SESSION['user']['avatar'] = $path;
            }
            session_write_close();
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(); 
        }

        $_SESSION['success'] = "User has been Edited!";
        header('Location: ../admin_user_list.php');
    }
}
?>