<?php
// Connect to database
$host = 'localhost';
$dbname = 'veterinary_appointments';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the request method is POST and the doctor ID is set
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];

        // Delete the doctor with the given ID from the database
        $stmt = $db->prepare('DELETE FROM doctor WHERE id = ?');
        $stmt->execute(array($id));

        // Redirect to the doctor profile page after deletion
        header('Location: doctor_list.php');
        exit;
    } else {
        // If the request method is not POST or the doctor ID is not set, redirect to the doctor profile page
        header('Location: doctor_list.php');
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
