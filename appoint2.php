<!DOCTYPE html>
<html>
<head>
    <title>Online Veterinary Appointment System</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/hoverstyle.css"> -->
    <link rel="stylesheet" type="text/css" href="css/appoint2style.css">
	<div class="payment-box">Send the Payment to: 09151587882</div>

    <center><h2>Appointment Form</h2></center>
    <form action="add_appointment.php" method="post" enctype="multipart/form-data">
        <label for="owner_name">Owner Name:</label>
        <input type="text" id="owner_name" name="owner_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required><br><br>

        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required><br><br>

        <label for="animal_type">Animal Type:</label>
        <select id="animal_type" name="animal_type" required>
            <option value="">--Please select--</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Others">Others</option>
        </select><br><br>

        <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed"><br><br>

<label for="image">Upload Gcash Screenshot Image:</label>
<input type="file" id="image" name="image" required><br><br>

<label for="reference_number">Gcash Reference Number:</label>
<input type="text" id="reference_number" name="reference_number" required><br><br>

<center><input type="submit" value="Submit"></center>
</form>

	
	<footer>
		<div class="container">
			<p>&copy; 2023 Online Veterinary Appointment System. All Rights Reserved.</p>
		</div>
	</footer>
	
</body>
</html>
