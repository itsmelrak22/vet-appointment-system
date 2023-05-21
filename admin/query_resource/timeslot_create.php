<?php
// Retrieve the selected date from the AJAX request
$date = $_POST['date'];

print_r( $date );
exit();

// Perform validation and sanitization on the date
$date = trim($date); // Remove leading/trailing whitespace
$date = filter_var($date, FILTER_SANITIZE_STRING); // Sanitize the date as a string

// Validate the date format (YYYY-MM-DD)
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
  // Invalid date format
  echo 'Invalid date format';
  exit;
}

// Example: Insert the timeslot into the database
// Replace the following code with your database connection and query logic

// Database connection configuration
$servername = 'your_servername';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database_name';

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

// Prepare the SQL statement
$sql = "INSERT INTO timeslots (date) VALUES (:date)";
$stmt = $pdo->prepare($sql);

// Bind the parameters
$stmt->bindParam(':date', $date);

// Execute the query
if ($stmt->execute()) {
  // Timeslot added successfully
  echo 'Timeslot added to the database';
} else {
  // Error occurred while adding the timeslot
  echo 'Error adding timeslot';
}
?>
