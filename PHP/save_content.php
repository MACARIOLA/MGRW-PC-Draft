<?php
include 'con_db.php';

// Fetch current company details and image
$sql = "SELECT * FROM about_us WHERE ID = 1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $Company = mysqli_fetch_assoc($result);
    $abt = "data:image;base64," . base64_encode($Company['image']);
} else {
    echo "Error fetching company details.";
}

$sql = "SELECT * FROM about_us WHERE id = 1";
$result = mysqli_query($conn, $sql);
$Company = mysqli_fetch_assoc($result);

// Update company details if the save button is clicked
if (isset($_POST['saveButton'])) {
    $updates = [];
    if (isset($_POST['company_info'])) {
        $company_info = $_POST['company_info'];
        $updates[] = "company_info='$company_info'";
    }
    if (isset($_POST['company_details'])) {
        $company_details = $_POST['company_details'];
        $updates[] = "company_details='$company_details'";
    }

    if (!empty($updates)) {
        $sql = "UPDATE about_us SET " . implode(", ", $updates) . " WHERE ID=1";
        if ($conn->query($sql) === TRUE) {
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error updating company details: " . $conn->error;
        }
    }
}

// Update company photo if the photo submit button is clicked
if (isset($_POST['ABTPHOTOSUB'])) {
    if (isset($_FILES['ABTPHOTO']['tmp_name'])) {
        $photo = $_FILES['ABTPHOTO']['tmp_name'];
        $photoSize = $_FILES['ABTPHOTO']['size'];

        if ($photoSize > 0 && $photoSize <= 1048576) { // 1MB = 1048576 bytes
            $photoData = addslashes(file_get_contents($photo));

            $sql = "UPDATE about_us SET image = '$photoData' WHERE ID = 1";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<meta http-equiv="refresh" content="0">';
            } else {
                echo "Error updating profile photo!";
            }
        } elseif ($photoSize > 1048576) {
            echo '<script>alert("Error: The image size must be 1MB or less.");</script>';
        }
    }
}
?>
