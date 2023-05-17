<?php
require_once "config.php";

if(isset($_POST['id']) && !empty($_POST['id'])){
    // Prepare a delete statement
    $sql = "DELETE FROM users WHERE id = ?";

    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_POST['id']);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to user_admin page
            header("location: user_admin.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to user_admin page
        header("location: user_admin.php");
        exit();
    }
}



?>
