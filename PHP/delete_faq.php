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

// Get the ID from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$faqId = isset($data['id']) ? intval($data['id']) : 0;

$response = [];
if ($faqId > 0) {
    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM cms_faqs WHERE id = ?");
    $stmt->bind_param("i", $faqId);

    // Execute the query
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'Execute error: ' . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    $response['success'] = false;
    $response['error'] = 'Invalid FAQ ID';
}

// Close the database connection
$conn->close();

// Send response
header('Content-Type: application/json');
echo json_encode($response);
?>
