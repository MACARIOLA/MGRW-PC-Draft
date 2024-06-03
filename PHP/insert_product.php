<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpcdtb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize input values
    $product_products_id = mysqli_real_escape_string($conn, $_POST['product_products_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_unit_price = mysqli_real_escape_string($conn, $_POST['product_unit_price']);
    $product_total_units = intval($_POST['product_total_units']);

    // Handle the image file upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_contents = file_get_contents($file_tmp);
        $product_image = base64_encode($file_contents);
    } else {
        $product_image = null;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO inventory
    (products_id,
    products_name,
    image,
    unit_price,
    total_units,
    reserved_units)
    VALUES (?, ?, ?, ?, ?, 0)");

    // Check if prepare() failed
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssdi",
    $product_products_id,
    $product_name,
    $product_image,
    $product_unit_price,
    $product_total_units);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to admin-inventory.php
        header("Location: ../admin-inventory.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
