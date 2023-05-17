<?php
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the service from the database
    $query = "DELETE FROM services WHERE id = $id";
    mysqli_query($conn, $query);

    // Redirect back to the service list page
    header('Location: services_list.php');
    exit();
}
?>
