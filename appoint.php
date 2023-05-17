<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
  // Validate input
  $errors = array();

  $petname = mysqli_real_escape_string($conn, $_POST['petname']);
  $ownername = mysqli_real_escape_string($conn, $_POST['ownername']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);

  if (empty($petname)) { array_push($errors, "Pet name is required"); }
  if (empty($ownername)) { array_push($errors, "Owner name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($time)) { array_push($errors, "Time is required"); }

  // If input is valid, insert into database
  if (count($errors) == 0) {
    $query = "INSERT INTO appointments (petname, ownername, email, phone, date, time) 
              VALUES('$petname', '$ownername', '$email', '$phone', '$date', '$time')";
    mysqli_query($conn, $query);
    $_SESSION['success'] = true;
  } else {
    $_SESSION['errors'] = $errors;
  }

  if (isset($_SESSION["errors"])){
    foreach ($_SESSION["errors"] as $error){
      echo $error;
    }
    unset($_SESSION["errors"]);
    
    header("refresh:3;url=appoint.php");
  }
  if (isset($_SESSION["success"])){
    echo '<div class="message-box">
            <p>Appointment complete</p>
          </div>';
    unset($_SESSION["success"]);
    header("refresh:3;url=index1.php");
  }
  exit();
}
?>

<!-- <?php if (isset($_SESSION["errors"])) { ?>
  <ul style="color: red;">
    <?php foreach ($_SESSION["errors"] as $error) { ?>
      <li><?php echo $error; ?></li>
    <?php } ?>
  </ul>
  <?php unset($_SESSION["errors"]); ?>
<?php } ?>

<?php if (isset($_SESSION["success"])) { ?>
  <div class="message-box">
    <p>Appointment complete</p>
  </div>
  <?php unset($_SESSION["success"]); ?>
<?php } ?> -->



<!DOCTYPE html>
<html>
<head>
	<title>Online Veterinary Appointment System</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style2.css"> -->
	<!-- <link rel="stylesheet" type="teaxt/css" href="css/hoverstyle.css"> -->
	<link rel="stylesheet" type="text/css" href="css/appointstyle.css">

<h1>Book an appointment</h1>

<center>
<form method="post" action="">
  <label for="petname">Pet name</label>
  <input type="text" id="petname" name="petname">

  <label for="ownername">Owner name</label>
  <input type="text" id="ownername" name="ownername">

  <label for="email">Email</label>
  <input type="email" id="email" name="email">

  <label for="phone">Phone number</label>
  <input type="tel" id="phone" name="phone">

  <label for="date">Date</label>
  <input type="date" id="date" name="date">

  <label for="time">Time</label>
  <input type="time" id="time" name="time">

  <input type="submit" name="submit" value="Submit">
</form>

</center>
</body>
</html>
<?php
// Close database connection
mysqli_close($conn);
?>
