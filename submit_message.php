<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $message = $_POST['message'] ?? '';

  // Check that all required fields have been filled
  if (!$name || !$email || !$message) {
    header('Location: index1.php?error=missing_fields');
    exit;
  }

  // Connect to the database
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = '';
  $db_name = 'veterinary_appointments';
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert the message into the database
  $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
  if (mysqli_query($conn, $sql)) {
    header('Location: index1.php?success=true');
  } else {
    header('Location: index1.php?error=database_error');
  }

  mysqli_close($conn);
} else {
  header('Location: index1.php');
}
?>
