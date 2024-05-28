<?php
@include 'admin-config.php';

// Edit reservation status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDreserve = $_POST['reservation_id'];
    $Status = $_POST['status'];

    if ($Status == 'Confirmed') {
        confirmReservation($conn, $IDreserve);
    } elseif ($Status == 'Cancelled') {
        cancelReservation($conn, $IDreserve);
    } else {
        echo "<script>alert('Invalid reservation status.');</script>";
    }

    // Call function to update reservation status and inventory after update
    updateReservationStatusAndInventory($conn, $IDreserve);
} else {
    error_log("Missing reservation_id or status in POST data");
}

// Function to update reservation status and inventory
function updateReservationStatusAndInventory($conn, $IDreserve) {
    // Call function to update inventory based on reservations
    updateInventoryBasedOnReservations($conn, $IDreserve);

    // Additional code to handle other updates if needed...
    // For example:
    // $sql = "UPDATE ...";
    // mysqli_query($conn, $sql);
}

// Function to confirm reservation
function confirmReservation($conn, $IDreserve) {
    // SQL update query
    $sql = "UPDATE `reservation` SET status='Confirmed' WHERE IDreservation='$IDreserve'";

    $update = mysqli_query($conn, $sql);

    if ($update) {
        error_log("Reservation confirmed successfully");
        echo "<script>alert('Reservation confirmed successfully.');</script>";
        // No header redirection here as it's assumed the page doesn't reload
    } else {
        error_log("Failed to confirm reservation: " . mysqli_error($conn));
        echo "<script>alert('Failed to confirm reservation.');</script>";
    }
}

// Function to cancel reservation
function cancelReservation($conn, $IDreserve) {
    // SQL update query
    $sql = "UPDATE `reservation` SET status='Cancelled' WHERE IDreservation='$IDreserve'";

    $update = mysqli_query($conn, $sql);

    if ($update) {
        // Call function to update inventory based on cancelled reservations
        updateInventoryBasedOnCancellations($conn, $IDreserve);
        
        error_log("Reservation cancelled successfully");
        echo "<script>alert('Reservation cancelled successfully.');</script>";
        // No header redirection here as it's assumed the page doesn't reload
    } else {
        error_log("Failed to cancel reservation: " . mysqli_error($conn));
        echo "<script>alert('Failed to cancel reservation.');</script>";
    }
}
// Function to update inventory based on confirmed reservations for a specific reservation ID
// Function to update inventory based on confirmed reservations for a specific reservation ID
function updateInventoryBasedOnReservations($conn, $IDreserve) {
    // Step 1: Get the reserved quantity for the specific reservation ID
    $getReservedQuantitySQL = "SELECT reserved_units, Prod_categ FROM reservation WHERE IDreservation = '$IDreserve' AND status = 'Confirmed'";
    $reservedQuantityResult = $conn->query($getReservedQuantitySQL);

    if ($reservedQuantityResult->num_rows > 0) {
        $reservedQuantityRow = $reservedQuantityResult->fetch_assoc();
        $reservedQuantity = $reservedQuantityRow['reserved_units'];
        $confirmedProd_categ = $reservedQuantityRow['Prod_categ'];

        // Step 2: Update the total units in the inventory by subtracting the reserved quantity
        $updateInventorySQL = "
            UPDATE inventory
            SET total_units = total_units - $reservedQuantity
            WHERE id = '$confirmedProd_categ';
        ";

        if ($conn->query($updateInventorySQL) === TRUE) {
            // Step 3: Get the sum of all reserved units without updating the total units
            $getSumReservedUnitsSQL = "SELECT SUM(reserved_units) AS total_reserved_units FROM reservation WHERE status = 'Confirmed'";
            $sumReservedUnitsResult = $conn->query($getSumReservedUnitsSQL);
            
            if ($sumReservedUnitsResult->num_rows > 0) {
                $sumReservedUnitsRow = $sumReservedUnitsResult->fetch_assoc();
                $total_reserved_units = $sumReservedUnitsRow['total_reserved_units'];
                
                // Step 4: Update the reserved units in the inventory
                $updateReservedUnitsSQL = "
                    UPDATE inventory
                    SET reserved_units = $total_reserved_units;
                ";

                if ($conn->query($updateReservedUnitsSQL) === TRUE) {
                    echo "<script>alert('Inventory updated successfully. Total reserved units: $total_reserved_units');</script>";
                } else {
                    echo "Error updating reserved units in inventory: " . $conn->error;
                }
            } else {
                echo "<script>alert('No confirmed reservations found.');</script>";
            }
        } else {
            echo "Error updating total units in inventory: " . $conn->error;
        }
    } else {
        echo "<script>alert('No confirmed reservation found with the specified reservation ID.');</script>";
    }
}

// Function to update inventory based on cancelled reservations
function updateInventoryBasedOnCancellations($conn, $IDreserve) {
    // Step 1: Fetch the reserved units for the cancelled reservation
    $fetchReservedUnitsSQL = "SELECT reserved_units FROM reservation WHERE IDreservation='$IDreserve'";
    $result = mysqli_query($conn, $fetchReservedUnitsSQL);
    $row = mysqli_fetch_assoc($result);
    $cancelledUnits = $row['reserved_units'];

    // Step 2: Update the inventory table
    $updateInventorySQL = "
        UPDATE inventory i
        SET i.reserved_units = GREATEST(i.reserved_units - $cancelledUnits, 0),
            i.total_units = i.total_units + $cancelledUnits;
    ";

    if ($conn->query($updateInventorySQL) === TRUE) {
        echo "<script>alert('Inventory updated successfully.');</script>";
    } else {
        echo "Error updating inventory: " . $conn->error;
    }
}
?>
