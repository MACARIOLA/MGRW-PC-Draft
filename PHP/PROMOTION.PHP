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

            function updatePhoto($conn, $photoID, $photoFieldName) {
                if(isset($_FILES[$photoFieldName]['tmp_name'])) {
                    $photo = $_FILES[$photoFieldName]['tmp_name'];
                    $photoSize = filesize($photo); // Get the size of the photo file
            
                    // Check if photo size exceeds the maximum allowed packet size
                    $maxAllowedPacket = (int) ini_get('mysqli.max_allowed_packet');
                    if ($photoSize > $maxAllowedPacket) {
                        // Display an error message or take appropriate action
                        echo '<script>alert("The photo size exceeds the maximum allowed packet size. Please try again with a smaller photo.");</script>';
                        return;
                    }
            
                    $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                    $sql = "UPDATE cms_home_promotions SET PHOTO = ? WHERE ID = ?";
                    $stmt = mysqli_prepare($conn, $sql);
            
                    // Bind parameters
                    mysqli_stmt_bind_param($stmt, "si", $photoData, $photoID);
            
                    // Execute query
                    if (mysqli_stmt_execute($stmt)) {
                        echo '<meta http-equiv="refresh" content="0">';
                    } else {
                        echo "Error updating profile photo!";
                    }
            
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

// Update photo for promotion 1
if(isset($_POST['submit'])) {
    updatePhoto($conn, 1, 'photo');
} 
// Update photo for promotion 2
elseif(isset($_POST['submit2'])) {
    updatePhoto($conn, 2, 'photo2');
} 
// Update photo for promotion 3
elseif(isset($_POST['submit3'])) {
    updatePhoto($conn, 3, 'photo3');
} 
else {
    // Handle error (no submit button clicked)
}
            
            ?>
