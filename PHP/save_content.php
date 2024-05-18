<?php
include 'con_db.php';

$sql = "SELECT * FROM about_us WHERE ID = 1";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $abt = "data:image;base64," . base64_encode($row['image']);
                }
            }

$sql = "SELECT * FROM about_us WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    $Company = mysqli_fetch_assoc($result);


    if (isset($_POST['saveButton'])) {
        // Check if the form fields are set and not empty
        if(isset($_POST['company_info']) && isset($_POST['company_details'])) {
            $company_info = $_POST['company_info'];
            $company_details = $_POST['company_details'];

            // Update company details in the database
            $sql = "UPDATE about_us SET company_info='$company_info', company_details='$company_details' WHERE id=1"; // Assuming you have an id for the company
            if ($conn->query($sql) === TRUE) {
                echo '<meta http-equiv="refresh" content="0">';
            } else {
                echo "Error updating company details: " . $conn->error;
            }
        }
    }

    if(isset($_POST['ABTPHOTOSUB'])) {
 

        // Handle photo upload based on photoId
        $photo = $_FILES['ABTPHOTO']['tmp_name'];
        $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
    
        $sql = "UPDATE about_us SET image = '$photoData' WHERE ID = 1";
    
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error updating profile photo!";
        }
    }





?>
