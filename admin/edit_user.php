<?php

require_once('config.php');
// Check if user ID is provided in URL
if (!isset($_GET['id'])) {
    header("Location: user_admin_list.php");
    exit();
}

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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $id = $_POST['id'];

    // Update user record in database
    $stmt = $conn->prepare("UPDATE users SET name=?, username=?, password=?, user_type=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $username, $password, $user_type, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to user admin page
    header("Location: user_admin.php");
    exit();
}

// Get user record from database
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user record exists
if ($result->num_rows === 0) {
    header("Location: user_admin.php");
    exit();
}

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!-- Display edit user form -->
<section>
    <main class="us">
        <div class="user">
            <img src="../images/walk.png" alt="eto"> Edit User Account </div>
        <br>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" value="<?php echo $user['password']; ?>" required>
            </div>
            <div>
                <label for="user_type">User Type:</label>
                <select name="user_type" required>
                    <option value="Admin"<?php if ($user['user_type'] === 'Admin') echo ' selected'; ?>>Admin</option>
                    <option value="Staff"<?php if ($user['user_type'] === 'Staff') echo ' selected'; ?>>Staff</option>
                </select>
            </div>
            <button type="submit">Save</button>
        </form>
    </main>
</section>
