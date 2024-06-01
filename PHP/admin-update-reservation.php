<?php
@include 'admin-config.php';

//add on reservation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include your database configuration file
    include 'admin-config.php';

    // Function to generate a random ID
    function generateRandomID($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Check if all required fields are set
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['contact_number']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
        // Extract form data
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contact_number'];
        $productID = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Perform any necessary validation here...

        // Check if the product ID exists in the inventory
        $checkProductQuery = "SELECT * FROM inventory WHERE products_id = ?";
        $checkStmt = $conn->prepare($checkProductQuery);
        $checkStmt->bind_param("i", $productID);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Generate a random reservation ID
            $reservationID = generateRandomID();

            // Insert data into the database
            $insertQuery = "INSERT INTO reservation (Prod_categ, Date, IDreservation, customer, product, email, num, reserved_units, status) VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, 'Pending')";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssis", $productID, $reservationID, $firstName, $lastName, $email, $contactNumber, $quantity);

            if ($insertStmt->execute()) {
                // Reservation added successfully
                echo "<script>alert('Reservation added successfully.');</script>";
            } else {
                // Failed to add reservation
                echo "<script>alert('Failed to add reservation.');</script>";
            }

            // Close the prepared statement
            $insertStmt->close();
        } else {
            // Product ID does not exist in the inventory
            echo "<script>alert('Product ID does not exist in the inventory.');</script>";
        }

        // Close the prepared statement and database connection

    } else {
        // Required fields are missing
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}




// Edit reservation status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDreserve = $_POST['reservation_id'];
    $Status = $_POST['status'];

     // Get the current reservation status
     $currentStatus = checkReservationStatus($conn, $IDreserve);

     // Proceed only if the new status is different from the current status
     if ($currentStatus !== $Status) {
         if ($Status == 'Confirmed') {
             confirmReservation($conn, $IDreserve);
         } elseif ($Status == 'Cancelled') {
             cancelReservation($conn, $IDreserve);
         }
 
         // Call function to update reservation status and inventory after update
         updateReservationStatusAndInventory($conn, $IDreserve);
         echo "<script>alert('Reservation status updated successfully.');</script>";
     } else {
         echo "<script>alert('The reservation is already $currentStatus. No changes applied.');</script>";
     }
 
     // Close the database connection
     echo '<meta http-equiv="refresh" content="0">';
 } else {
     error_log("Missing reservation_id or status in POST data");
 }
 

// Function to check reservation status
function checkReservationStatus($conn, $IDreserve) {
    $sql = "SELECT status FROM reservation WHERE IDreservation='$IDreserve'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['status'];
    }
    return false;
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
    } else {
        error_log("Failed to confirm reservation: " . mysqli_error($conn));
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
    } else {
        error_log("Failed to cancel reservation: " . mysqli_error($conn));
    }
}

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
                
                $updateReservedUnitsSQL = "
                    UPDATE inventory i
                    JOIN (
                        SELECT Prod_categ, SUM(reserved_units) AS total_reserved_units
                        FROM reservation
                        WHERE status = 'Confirmed'
                        GROUP BY Prod_categ
                    ) AS tr ON i.id = tr.Prod_categ
                    SET i.reserved_units = tr.total_reserved_units;
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
    $fetchReservedUnitsSQL = "SELECT reserved_units, Prod_categ FROM reservation WHERE IDreservation='$IDreserve'";
    $result = mysqli_query($conn, $fetchReservedUnitsSQL);
    $row = mysqli_fetch_assoc($result);
    $cancelledUnits = $row['reserved_units'];
    $cancelledProd_categ = $row['Prod_categ'];

    // Step 2: Update the inventory table for the specific product category
    $updateInventorySQL = "
        UPDATE inventory
        SET reserved_units = GREATEST(reserved_units - $cancelledUnits, 0),
            total_units = total_units + $cancelledUnits
        WHERE id = '$cancelledProd_categ';
    ";

    if ($conn->query($updateInventorySQL) === TRUE) {
        echo "<script>alert('Inventory updated successfully.');</script>";
    } else {
        echo "Error updating inventory: " . $conn->error;
    }
}
?>
