<?php
// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "veterinary_appointments");

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the values submitted in the form
$name = $_POST['name'];
$info = $_POST['info'];
$price = $_POST['price'];

// Insert a new row into the services table
$sql = "INSERT INTO services (name, info, price) VALUES ('$name', '$info', '$price')";

if (mysqli_query($conn, $sql)) {
  echo "New service added successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
