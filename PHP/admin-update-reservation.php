<?php
@include 'PHP/admin-config.php';

if(isset($_POST['update_reservation'])){
  $id = $_POST['id'];
  $reservation_name = $_POST['reservation'];
  $customer = $_POST['customer'];
  $product = $_POST['product'];
  $reserve_units = $_POST['reserved_units'];
  $status = $_POST['status'];
  
  $sql = "UPDATE `reservation` SET `reservation_name`='$reservation_name',`customer`='$customer',`product`='$product',`reserved_units`='$reserve_units', `status`='$status' WHERE id = $id";
  

  $update = mysqli_query($conn, $sql);
  
  if($update){
    echo "
    <script>alert('Update data successfully.')</script>
    ";
    header("Location: admin-inventory.php");
  }
  
}




?>
