<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services</title>
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/servicess.css">
  </head>
  <body>
	 <!-- NAVBAR -->
		<nav class="fixed-top d-flex p-1"> 
		<div class="d-flex justify-content-between align-items-center m-2">
			<img src="images/colclogo.png" alt="Site Logo" class="brand-image img-circle ">
			<div class="logo">Circle of life Veterinary Clinic </div>
			<input type="checkbox" id="click">
			<label for="click" class="menu-btn">
			<i class="fas fa-bars"></i>
			</label>
			<ul>
				<li><a class="active" href="#home">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#service">Services</a></li>
				<li><a href="#contact-us">Contact</a></li>
				<li><a href="#">Virctual Consultation </a></li>
			</ul>
		</div>
		</nav>
	<header>
    <!-- SEE ALL SERVICES  -->

	
	<?php
// Connect to database
include 'config.php';

// Fetch services from database
$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);

// Create table header
echo "<table>";
echo "<tr><th>Service</th><th>Service Information</th><th>Price</th></tr>";

// Loop through each service and display name and price
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['info'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
}

// Close table
echo "</table>";

// Close database connection
mysqli_close($conn);
?>



	<footer>
		<div class="container">
			<p>&copy; 2023 Online Veterinary Appointment System. All Rights Reserved.</p>
		</div>
	</footer>

</body>
</html>
