<?php

session_start();
// Establishing a connection to the database
$servername = "localhost";
$username = "root";       // your database username
$password = "";           // your database password
$dbname = "mgwrpcdtb";    // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save_radio'])) {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $radio1 = isset($_POST['radio1']) ? $conn->real_escape_string($_POST['radio1']) : '';
    $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
    $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
    $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
    $checkbox4 = isset($_POST['checkbox4']) ? 1 : 0;
    $checkbox5 = isset($_POST['checkbox5']) ? 1 : 0;
    $checkbox6 = isset($_POST['checkbox6']) ? 1 : 0;

    // SQL query to insert data into the database
    $query = "INSERT INTO item_review (name, comment, radio1, checkbox1, checkbox2, checkbox3, checkbox4, checkbox5, checkbox6) 
              VALUES ('$name', '$comment', '$radio1', '$checkbox1', '$checkbox2', '$checkbox3', '$checkbox4', '$checkbox5', '$checkbox6')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Insertion Failed";
        header("Location: index.php");
    }
}

// Close connection
$conn->close();
?>
