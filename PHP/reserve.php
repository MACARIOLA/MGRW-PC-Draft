<?php
session_start();
include 'PHP/con_db.php';

// Check if 'id' is passed via GET and set the session variable
if (isset($_GET['id'])) {
    $_SESSION['product_id'] = $_GET['id'];
    // Redirect to avoid resubmission of the GET request
    header("Location: product.php");
    exit();
}

// Retrieve the product ID from the session
if (isset($_SESSION['product_id'])) {
    $product_id = $_SESSION['product_id'];
    $sql = "SELECT * FROM inventory WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $contactNum = $_POST['contactNum'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    // Simple query construction
    $sql = "INSERT INTO reservations (Prod_categ, Date, reservation_name, customer, product, reserved_units, status) 
            VALUES ('$product', NOW(), '$firstName $lastName', '$email', '$contactNum', '$quantity', 'Pending')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Reservation successful!');
                window.location.href='product.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href='product.php';
              </script>";
    }

    mysqli_close($conn);
}
?>