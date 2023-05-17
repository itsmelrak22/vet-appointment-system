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

// Select appointments from database
$sql = "SELECT * FROM appointments2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["reference_number"]."</td>"; // add reference number column
        echo "<td>".$row["meeting_link"]."</td>";
        echo "<td>".$row["appointment_date"]."</td>";
        echo "<td>".$row["appointment_time"]."</td>";
        echo "<td>".$row["services"]."</td>";
        echo "<td>".$row["owner_name"]."</td>";
        echo "<td>".$row["pet_name"]."</td>";
        echo "<td>".$row["animal_type"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No appointments found</td></tr>";
}

// Get appointment data
$id = $_GET["id"];
$sql = "SELECT * FROM appointments2 WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Update appointment status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["status"];
    $sql = "UPDATE appointments2 SET status='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Generate random meeting link for completed appointments
        if ($status == "confirmed") {
            $meeting_link = "https://zoom.us/meeting/random_link";
            $sql = "UPDATE appointments2 SET meeting_link='$meeting_link' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
echo "<div class='alert alert-success' role='alert'>Appointment status updated successfully.</div>";
} else {
echo "<div class='alert alert-danger' role='alert'>Error updating appointment status: " . $conn->error . "</div>";
}
} else {
echo "<div class='alert alert-success' role='alert'>Appointment status updated successfully.</div>";
}
} else {
echo "<div class='alert alert-danger' role='alert'>Error updating appointment status: " . $conn->error . "</div>";
}
}



// Display appointment information
$sql = "SELECT * FROM appointments2 WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
?>

<form method="POST">
    <div class="form-group">
        <label for="status">Appointment Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="pending" <?php if ($row["status"] == "pending") echo "selected"; ?>>Pending</option>
            <option value="confirmed" <?php if ($row["status"] == "confirmed") echo "selected"; ?>>Confirmed</option>
            <option value="cancelled" <?php if ($row["status"] == "cancelled") echo "selected"; ?>>Cancelled</option>
            <option value="complete" <?php if ($row["status"] == "complete") echo "selected"; ?>>Complete</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
</form>
<?php
} else {
    echo "<div class='alert alert-danger' role='alert'>Error: Appointment not found.</div>";
}

$conn->close();
?>
