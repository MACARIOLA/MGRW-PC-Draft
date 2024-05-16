<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "mgwrpcdtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$admin_username = isset($_POST['admin_username']) ? $_POST['admin_username'] : '';
$admin_password = isset($_POST['admin_password']) ? $_POST['admin_password'] : '';

if (empty($admin_username) || empty($admin_password)) {
    die("Invalid input data");
}

$sql = "SELECT * FROM admin_login_tbl WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../cms.php");  // Corrected redirection
    exit();
} else {
    // Display popup with JavaScript
    echo "<script>
            alert('Invalid login credentials');
            window.location.href = '../admin_login.html';
          </script>";
}

$conn->close();
?>
