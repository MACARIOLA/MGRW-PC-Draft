<?php
include "con_db.php";

function fetchImage($conn, $id) {
    $sql = "SELECT PHOTO FROM cms_home_promotions WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($photo);
        $stmt->fetch();
        return "data:image;base64," . base64_encode($photo);
    }
    return null;
}

// Fetch promotion images
$promoImage = fetchImage($conn, 1);
$promoImage2 = fetchImage($conn, 2);
$promoImage3 = fetchImage($conn, 3);

// Function to handle photo uploads
function updatePhoto($conn, $photoField, $id) {
    if (isset($_FILES[$photoField]['tmp_name'])) {
        $photoTmpPath = $_FILES[$photoField]['tmp_name'];
        $photoSize = $_FILES[$photoField]['size'];

        // Check if the photo is not null and size is within the limit
        if ($photoSize > 0 && $photoSize <= 1048576) { // 1MB = 1048576 bytes
            $photoData = addslashes(file_get_contents($photoTmpPath));

            $sql = "UPDATE cms_home_promotions SET PHOTO = '$photoData' WHERE ID = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Image inserted successfully!");</script>';
                echo '<meta http-equiv="refresh" content="0">';
            } else {
                echo "Error updating profile photo!";
            }
        } elseif ($photoSize > 1048576) {
            echo '<script>alert("Error: The image size must be 1MB or less.");</script>';
        }
    }
}

// Handle photo uploads
if (isset($_POST['submit'])) {
    updatePhoto($conn, 'photo', 1);
} elseif (isset($_POST['submit2'])) {
    updatePhoto($conn, 'photo2', 2);
} elseif (isset($_POST['submit3'])) {
    updatePhoto($conn, 'photo3', 3);
} else {
    // Handle error (no submit button clicked)
}
?>
