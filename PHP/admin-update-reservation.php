<?php
@include 'admin-config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDreserve = $_POST['reservation_id'];
    $Status = $_POST['status'];


    // SQL update query
    $sql = "UPDATE `reservation` SET status='$Status' WHERE IDreservation='$IDreserve'";



    $update = mysqli_query($conn, $sql);

    if ($update) {
       
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
?>
