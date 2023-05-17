<?php
// Get form data
$owner_name = $_POST['owner_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$appointment_date = $_POST['appointment_date'];
$pet_name = $_POST['pet_name'];
$animal_type = $_POST['animal_type'];
$breed = $_POST['breed'];
$reference_number = $_POST['reference_number'];

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinary_appointments";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add appointment to database
$sql = "INSERT INTO appointments2 (owner_name, email, phone_number, appointment_date, pet_name, animal_type, breed, reference_number)
VALUES ('$owner_name', '$email', '$phone_number', '$appointment_date', '$pet_name', '$animal_type', '$breed', '$reference_number')";

if ($conn->query($sql) === TRUE) {
    echo "<div style='text-align:center; background-color:#D4EDDA; color:#155724; padding: 10px;'>Appointment added successfully, Please wait for Admin's Confirmation.</div>";
    // Redirect to index.php after 3 seconds
    header("refresh:3;url=index.php");
} else {
    echo "Error adding appointment: " . $conn->error;
}

$conn->close();
?>