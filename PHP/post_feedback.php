<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpcdtb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the review exists in the customer_product_reviews table
    $check_query = "SELECT COUNT(*) as count FROM customer_product_reviews WHERE id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Copy the row of data from customer_product_reviews into the customer_feedbacks
        $query = "
            INSERT INTO customer_feedbacks (id, name, comment, rating, first_time_buyer, regular_customer, budget_shopper, brand_loyalist, gift_shopper, window_shopper)
            SELECT id, name, comment, rating, first_time_buyer, regular_customer, budget_shopper, brand_loyalist, gift_shopper, window_shopper
            FROM customer_product_reviews
            WHERE id = ?
        ";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error executing statement: ' . $stmt->error;
        }
    } else {
        echo 'error: review id does not exist';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'error: invalid request method';
}
?>