<?php
// Connect to database
$dbhost = 'localhost';
$dbname = 'veterinary_appointments';
$dbuser = 'root';
$dbpass = '';

$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];

// Prepare SQL statement
$stmt = $db->prepare("INSERT INTO doctor (name, age, description) VALUES (:name, :age, :description)");

// Bind parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':description', $description);

// Execute statement
$stmt->execute();

// Redirect
header('Location: doctor_list.php');
?>
