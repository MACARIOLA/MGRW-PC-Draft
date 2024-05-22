<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mgwrpcdtb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve file path from database
$sql = "SELECT filepath FROM cms_pricelist_printer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Construct link to the file
        $file_path = $row["filepath"];
        // Force download the file
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($file_path) . "\"");
        readfile($file_path);
        exit;
    }
} else {
    // JavaScript to show an alert box and redirect to pricelist.html
    echo "<script>
        alert('No file found in the database.');
        window.location.href = '../pricelist.html';
    </script>";
}

$conn->close();
?>
