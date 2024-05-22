<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpcdtb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Remove previous file from database
    $delete_previous_query = "DELETE FROM cms_pricelist_others";
    $conn->query($delete_previous_query);

    // File upload handling
    $target_dir = "../uploads/"; // Directory where uploaded files will be stored
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only certain file formats
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "<script>alert('Sorry, only PDF, DOC, and DOCX files are allowed.'); window.location.href = '../admin-cms.php';</script>";
        $uploadOk = 0;
    }

    // Check if no file was uploaded
    if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('No file was uploaded.'); window.location.href = '../admin-cms.php';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); window.location.href = '../admin-cms.php';</script>";
    } else {
        // If everything is ok, upload file to the uploads folder
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Save details to database
            $sql = "INSERT INTO cms_pricelist_others (filename, filepath) VALUES ('". basename($_FILES["fileToUpload"]["name"]) ."', '". $target_file ."')";
            if ($conn->query($sql) === TRUE) {
                // Display alert box
                echo '<script>alert("The file '. htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). ' has been uploaded and saved to the database."); window.location.href = "../admin-cms.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href = '../admin-cms.php';</script>";
        }
    }

    $conn->close();
}
?>
