<?php

@include 'admin-config.php';
if(isset($_POST['update_product'])){
   $product_id = $_POST['id'];
   $product_products_id = $_POST['product_products_id']; 
   $product_name = $_POST['product_name'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   $product_total_units = $_POST['product_total_units'];
   $product_reserved_units = $_POST['product_reserved_units'];

   
   if(!empty($product_image)){
         $update_data = "UPDATE inventory SET products_id='$product_products_id', products_name='$product_name', image='$product_image',
         total_units='$product_total_units', reserved_units='$product_reserved_units' WHERE id = '$product_id'";
      }else{
         $update_data = "UPDATE inventory SET products_id='$product_products_id', products_name='$product_name',
        
          total_units='$product_total_units', reserved_units='$product_reserved_units' WHERE id = '$product_id'";
      }
      $upload = mysqli_query($conn, $update_data);
      if($upload){
         if(!empty($product_image)){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
         }
         header("Location: admin-inventory.php");
      }
   }


?>