<?php
  $id = $_POST['id'];
  $status = $_POST['status'];

  // connect to the database
  $conn = mysqli_connect("localhost", "root", "", "veterinary_appointments");
  if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
  }

  // update the status of the appointment
  $sql = "UPDATE appointments SET status='$status' WHERE id='$id'";
  $result = $conn-> query($sql);

  if ($result) {
    // redirect back to the appointments page with a success message
    header("Location: appointments.php?success=Status updated successfully.");
  } else {
    // redirect back to the appointments page with an error message
    header("Location: appointments.php?error=Something went wrong. Please try again later.");
  }

  $conn-> close();
?>
