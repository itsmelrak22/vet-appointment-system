<?php
$conn = mysqli_connect("localhost", "root", "", "veterinary_appointments");
if ($conn-> connect_error) {
  die("Connection failed:". $conn-> connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM appointments WHERE id='$id'";
$result = $conn-> query($sql);

if ($result) {
  // appointment deleted successfully
  header("Location: walkin_list.php");
} else {
  // appointment deletion failed
  echo "Error deleting appointment: " . $conn->error;
}

$conn->close();
?>
