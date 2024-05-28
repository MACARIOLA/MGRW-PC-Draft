<?php
@include 'admin-config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDreserve = $_POST['reservation_id'];
    $Status = $_POST['status'];

    // SQL update query
    $sql = "UPDATE `reservation` SET status='$Status' WHERE IDreservation='$IDreserve'";

    $update = mysqli_query($conn, $sql);

    if ($update) {
        // Update inventory reserve units based on confirmed reservations
        updateInventoryBasedOnReservations($conn);

        error_log("Update successful");
        echo "<script>alert('Update data successfully.');</script>";
        header("Location: admin-inventory.php");
        exit();
    } else {
        error_log("Update failed: " . mysqli_error($conn));
        echo "<script>alert('Failed to update data.');</script>";
    }
} else {
    error_log("Missing reservation_id or status in POST data");
}

// Function to update inventory based on confirmed reservations
function updateInventoryBasedOnReservations($conn) {
    // Step 1: Calculate the total confirmed reservations per product category
    $createTempTableSQL = "
        CREATE TEMPORARY TABLE temp_reservations AS
        SELECT Prod_categ, SUM(reserved_units) AS total_confirmed
        FROM reservation
        WHERE status = 'Confirmed'
        GROUP BY Prod_categ;
    ";

    if ($conn->query($createTempTableSQL) === TRUE) {
        // Step 2: Update the inventory table based on the calculated confirmed reservations
        $updateInventorySQL = "
            UPDATE inventory i
            JOIN temp_reservations tr ON i.id = tr.Prod_categ
            SET i.reserved_units = tr.total_confirmed,
                i.total_units = i.total_units - tr.total_confirmed;
        ";

        if ($conn->query($updateInventorySQL) === TRUE) {
            echo "Inventory updated successfully.";
        } else {
            echo "Error updating inventory: " . $conn->error;
        }

        // Step 3: Clean up by dropping the temporary table
        $dropTempTableSQL = "DROP TEMPORARY TABLE IF EXISTS temp_reservations;";
        if ($conn->query($dropTempTableSQL) !== TRUE) {
            echo "Error dropping temporary table: " . $conn->error;
        }
    } else {
        echo "Error creating temporary table: " . $conn->error;
    }
}

?>
