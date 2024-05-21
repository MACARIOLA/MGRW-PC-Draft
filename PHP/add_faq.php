<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mgwrpcdtb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$new_question = $_POST["new_question"];
$new_answer = $_POST["new_answer"];

// Insert new question and answer into the database
$sql = "INSERT INTO cms_faqs (question, answer) VALUES ('$new_question', '$new_answer')";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully, redirect back to cms.php
    header("Location: ../cms.php");
    // Show success message on cms.php
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
