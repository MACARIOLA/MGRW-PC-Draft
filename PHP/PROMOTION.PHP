<?php
     include "con_db.php";
      

            $sql = "SELECT * FROM cms_home_promotions WHERE ID = 1";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $promoImage = "data:image;base64," . base64_encode($row['PHOTO']);
                }
            }


            $sql2 = "SELECT * FROM cms_home_promotions WHERE ID = 2";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $promoImage2 = "data:image;base64," . base64_encode($row2['PHOTO']);
                }
            }


            $sql3 = "SELECT * FROM cms_home_promotions WHERE ID = 3";
            $result3 = mysqli_query($conn, $sql3);
            if ($result3 && mysqli_num_rows($result3) > 0) {
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $promoImage3 = "data:image;base64," . base64_encode($row3['PHOTO']);
                }
            }

            //// for inserting photo

            if(isset($_POST['submit'])) {
 

                // Handle photo upload based on photoId
                $photo = $_FILES['photo']['tmp_name'];
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE cms_home_promotions SET PHOTO = '$photoData' WHERE ID = 1";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            }
            
            
            elseif(isset($_POST['submit2'])) {
                // Handle photo upload for photo2
                $photo = $_FILES['photo2']['tmp_name'];
               
                // Read the contents of the file
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE cms_home_promotions SET PHOTO = '$photoData' WHERE ID = 2";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            }
             elseif(isset($_POST['submit3'])) {
                // Handle photo upload for photo3
                $photo = $_FILES['photo3']['tmp_name'];
                
                // Read the contents of the file
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE cms_home_promotions SET PHOTO = '$photoData' WHERE ID = 3";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            } else {
                // Handle error (no submit button clicked)
            }


            
            ?>
