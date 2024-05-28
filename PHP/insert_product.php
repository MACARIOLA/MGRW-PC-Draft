<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {

    @include 'admin-config.php';

    // Retrieve and sanitize input values
    $product_products_id = mysqli_real_escape_string($conn, $_POST['product_products_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_unit_price = mysqli_real_escape_string($conn, $_POST['product_unit_price']);
    $product_total_units = intval($_POST['product_total_units']);
    $specs_cpu = mysqli_real_escape_string($conn, $_POST['specs_cpu']);
    $specs_motherboard = mysqli_real_escape_string($conn, $_POST['specs_motherboard']);
    $specs_ram = mysqli_real_escape_string($conn, $_POST['specs_ram']);
    $specs_ssd = mysqli_real_escape_string($conn, $_POST['specs_ssd']);
    $specs_monitor = mysqli_real_escape_string($conn, $_POST['specs_monitor']);
    $specs_computercase = mysqli_real_escape_string($conn, $_POST['specs_computercase']);
    $specs_powersupply = mysqli_real_escape_string($conn, $_POST['specs_powersupply']);
    $specs_fan = mysqli_real_escape_string($conn, $_POST['specs_fan']);
    
    // Handle the image file upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_contents = file_get_contents($file_tmp);
        $product_image = base64_encode($file_contents);
    } else {
        $product_image = "";
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO inventory
    (products_id, products_name, image, description, unit_price, total_units, reserved_units, specs_cpu, specs_motherboard, specs_ram, specs_ssd, specs_monitor, specs_computercase, specs_powersupply, specs_fan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if prepare() failed
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("ssssdiissssssss", $product_products_id, $product_name, $product_image, $product_description, $product_unit_price, $product_total_units, $specs_cpu, $specs_motherboard, $specs_ram, $specs_ssd, $specs_monitor, $specs_computercase, $specs_powersupply, $specs_fan);

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
