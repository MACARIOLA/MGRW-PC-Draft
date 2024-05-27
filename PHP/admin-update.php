<?php

@include 'admin-config.php';

if (isset($_POST['update_product'])) {
    $product_id = $_POST['id'];
    $product_products_id = $_POST['product_products_id']; 
    $product_name = $_POST['product_name'];
    $product_image = $_FILES['product_image']['tmp_name'];
    $product_image_size = $_FILES['product_image']['size'];
    $product_total_units = $_POST['product_total_units'];
    $product_reserved_units = $_POST['product_reserved_units'];
    $product_description = $_POST['product_description'];
    $product_unit_price = $_POST['product_unit_price'];
    $specs_cpu = $_POST['specs_cpu'];
    $specs_motherboard = $_POST['specs_motherboard'];
    $specs_ram = $_POST['specs_ram'];
    $specs_ssd = $_POST['specs_ssd'];
    $specs_monitor = $_POST['specs_monitor'];
    $specs_computercase = $_POST['specs_computercase'];
    $specs_powersupply = $_POST['specs_powersupply'];
    $specs_fan = $_POST['specs_fan'];

    // Check if image file is uploaded
    if (isset($_FILES['product_image']) && is_uploaded_file($_FILES['product_image']['tmp_name'])) {
        // Read the image file
        $imgContent = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));

        // Update SQL query with image data
        $update_data = "UPDATE inventory SET products_id='$product_products_id', products_name='$product_name', image='$imgContent', total_units='$product_total_units', reserved_units='$product_reserved_units', description='$product_description', unit_price='$product_unit_price', specs_cpu='$specs_cpu', specs_motherboard='$specs_motherboard', specs_ram='$specs_ram', specs_ssd='$specs_ssd', specs_monitor='$specs_monitor', specs_computercase='$specs_computercase', specs_powersupply='$specs_powersupply', specs_fan='$specs_fan' WHERE id = '$product_id'";
    } else {
        // If no image uploaded, update SQL query without image data
        $update_data = "UPDATE inventory SET products_id='$product_products_id', products_name='$product_name', total_units='$product_total_units', reserved_units='$product_reserved_units', description='$product_description', unit_price='$product_unit_price', specs_cpu='$specs_cpu', specs_motherboard='$specs_motherboard', specs_ram='$specs_ram', specs_ssd='$specs_ssd', specs_monitor='$specs_monitor', specs_computercase='$specs_computercase', specs_powersupply='$specs_powersupply', specs_fan='$specs_fan' WHERE id = '$product_id'";
    }

    // Execute the update query
    $upload = mysqli_query($conn, $update_data);

    if ($upload) {
        header("Location: admin-inventory.php");
    }
}

?>
