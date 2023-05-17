<!DOCTYPE html>
<html>
<head>
	<title>Online Veterinary Appointment System</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/hoverstyle.css">
	<link rel="stylesheet" type="text/css" href="css/onlinestyle.css">
	<style>
		#appointment-dropdown {
			position: relative;
		}
		#appointment-dropdown:hover ul {
			display: block;
		}
		#appointment-dropdown ul {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #fff;
			padding: 10px;
			border: 1px solid #ddd;
		}
		#appointment-dropdown ul li {
			list-style-type: none;
			margin-bottom: 5px;
		}
		#appointment-dropdown ul li a {
			color: #333;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<header>
		<div class="container">
			<h1>Online Veterinary Appointment System</h1>
			<nav>
				<ul>
					<li><a href="dashboard.php">Admin</a></li>
					<li id="appointment-dropdown">
						<a href="dashboard.php">Appointment</a>
						<ul>
							<li><a href="onlineappointment.php">Online Appointment</a></li>
							<li><a href="#">Clinic Appointment</a></li>
						</ul>
					</li>
					<li><a href="messreq.php">Messages</a></li>
					<li class="right"><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>

<br><br><br><br>
<div class="container">
	<h1>Veterinary Appointments</h1>
	<?php
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

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $zoom_link = $_POST['zoom_link'];
	
	if (isset($_POST['zoom_link'])) {
    $zoom_link = $_POST['zoom_link'];
} else {
    $zoom_link = '';
}


    // Update the appointment status and zoom link
    $sql = "UPDATE appointments2 SET status='$status', zoom_link='$zoom_link' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Send the zoom link to the given email
        $to = $_POST['email'];
        $subject = 'Your appointment has been confirmed';
        $message = "Your appointment has been confirmed. Zoom link: " . $zoom_link;
        $headers = 'From: noreply@example.com' . "\r\n" .
                   'Reply-To: noreply@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "Confirmation email sent to $to.";
        } else {
            echo "Error sending confirmation email.";
        }
    } else {
        echo "Error updating appointment: " . $conn->error;
    }
}

// Retrieve appointment data from database
$sql = "SELECT * FROM appointments2 ORDER BY appointment_date DESC";
$result = $conn->query($sql);

// Check if there are any appointments
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display appointment information
        echo "<div class='appointment'>";
        echo "<h3>Appointment #" . $row["id"] . "</h3>";
        echo "<p><strong>Owner Name:</strong> " . $row["owner_name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Phone Number:</strong> " . $row["phone_number"] . "</p>";
        echo "<p><strong>Appointment Date:</strong> " . $row["appointment_date"] . "</p>";
        echo "<p><strong>Pet Name:</strong> " . $row["pet_name"] . "</p>";
        echo "<p><strong>Animal Type:</strong> " . $row["animal_type"] . "</p>";
        echo "<p><strong>Breed:</strong> " . $row["breed"] . "</p>";
        echo "<p><strong>Reference Number:</strong> " . $row["reference_number"] . "</p>";

        // Display the dropdown menu and the input field if the appointment is confirmed
        if ($row["status"] == "confirmed") {
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<label for='status'>Status:</label>";
            echo "<select name='status' id='status'>";
            echo "<option value='confirmed' selected>Confirmed</option>";
            echo "<option value='pending'>Pending</option>";
echo "<option value='cancelled'>Cancelled</option>";
echo "</select>";
echo "<br>";
echo "<label for='zoom_link'>Zoom Link:</label>";
echo "<input type='text' id='zoom_link' name='zoom_link' placeholder='Enter Zoom Link' required>";
echo "<br>";
echo "<input type='submit' value='Save Zoom Link'>";
echo "</form>";
} else {
echo "<form method='POST'>";
echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
echo "<label for='status'>Status:</label>";
echo "<select name='status' id='status'>";
echo "<option value='pending' selected>Pending</option>";
echo "<option value='confirmed'>Confirmed</option>";
echo "<option value='cancelled'>Cancelled</option>";
echo "</select>";
echo "<br>";
echo "<input type='submit' value='Update Status'>";
echo "</form>";
}

echo "</div>";
}
} else {
echo "<p>No appointments found.</p>";
}

$conn->close();
?>

</div>
</body>
</html>

</div>
</body>
</html>
