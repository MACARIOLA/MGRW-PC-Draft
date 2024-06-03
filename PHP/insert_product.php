<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpcdtb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    $product_products_id = mysqli_real_escape_string($conn, $_POST['product_products_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_unit_price = mysqli_real_escape_string($conn, $_POST['product_unit_price']);
    $product_total_units = intval($_POST['product_total_units']);

    $check_sql = "SELECT COUNT(*) AS count FROM inventory WHERE products_id =?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $product_products_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $check_row = $check_result->fetch_assoc();

    if ($check_row['count'] > 0) {
        echo "<script>alert('Error: A product with the same ID already exists.'); window.location.href='../admin-inventory.php';</script>";
    } else {
        $check_sql = "SELECT COUNT(*) AS count FROM inventory WHERE products_name =?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $product_name);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        $check_row = $check_result->fetch_assoc();

        if ($check_row['count'] > 0) {
            echo "<script>alert('Error: A product with the same name already exists.'); window.location.href='../admin-inventory.php';</script>";
        } else {
            if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
                $file_tmp = $_FILES['product_image']['tmp_name'];
                $file_contents = file_get_contents($file_tmp);
                $product_image = base64_encode($file_contents);
            } else {
                $product_image = null;
            }

            $stmt = $conn->prepare("INSERT INTO inventory
            (products_id,
            products_name,
            image,
            unit_price,
            total_units,
            reserved_units)
            VALUES (?,?,?,?,?, 0)");

            if (!$stmt) {
                die("Prepare failed: ". $conn->error);
            }

            $stmt->bind_param("sssdi",
            $product_products_id,
            $product_name,
            $product_image,
            $product_unit_price,
            $product_total_units);

            if ($stmt->execute()) {
                echo "<script>alert('Product added successfully.'); window.location.href='../admin-inventory.php';</script>";
            } else {
                echo "Error: ". $stmt->error;
            }

            $stmt->close();
        }
    }

    $check_stmt->close();
    $conn->close();
}    
?>
