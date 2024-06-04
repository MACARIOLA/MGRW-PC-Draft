
<?php
session_start(); // Start the session

include 'con_db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Retrieve the admin username and password from the form
$admin_username = isset($_POST['admin_username']) ? $_POST['admin_username'] : '';
$admin_password = isset($_POST['admin_password']) ? $_POST['admin_password'] : '';

// Check if the username or password is empty
if (empty($admin_username) || empty($admin_password)) {
    die("Invalid input data");
}

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM admin_login WHERE admin_username = ? AND admin_password = ?");
$stmt->bind_param("ss", $admin_username, $admin_password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Set session variables
    $_SESSION['admin_username'] = $admin_username;
    $_SESSION['admin_logged_in'] = true;

    echo "<script>
            alert('valid login credentials');
            window.location.href = 'admin-analytics.php';
          </script>";
    exit();
} else {
    // Invalid login credentials
    echo "<script>
            alert('Invalid login credentials');
            window.location.href = 'admin-login.php';
          </script>";
}

$stmt->close(); // Close the statement
$conn->close(); // Close the connection
}
?>

